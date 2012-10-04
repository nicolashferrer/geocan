<?php

	echo $this->Html->script('markerclusterer_packed'); // Include jQuery library
	echo $this->Html->css('liteaccordion');
	echo $this->Html->script('jquery.easing.1.3');
	echo $this->Html->script('liteaccordion.jquery');
	echo $this->Html->script('oms.min');
	echo $this->Html->script('jquery.idTabs.min.js');

?>
<script type="text/javascript" src="https://www.google.com/jsapi" charset="utf-8"></script>
  
<script>
	
	var codigosAgregados = 0;
	
	var marcadorCount = 0; // Contador global para asignar un ID unico a los marcadores
	
	google.load("visualization", "1", {packages:["corechart"]});
	var pointarray, heatmap;//2
	var map; // EL MAPA!!
	var mapaux;
	
	var markerCluster = null; // MAPA DE CLUSTERS

	var mcOptions = {gridSize: 50, maxZoom: 17};
	var spiderOptions = { keepSpiderfied:true };

	var defaultWidth=$('#content').width()-207+"px";					//Width of the map	
	var defaultHeight="500px";					//Height of the map
	var defaultZoom=14;							//Default zoom 
	var defaultLatitude=-38.717570;		//Default latitude if the browser doesn't support localization or you don't want localization -38.717570, -62.265671
	var defaultLongitude=-62.265671;	//Default longitude if the browser doesn't support localization or you don't want localization
	
	var marcadores = [];
	var marcadoresHeatmap=[];
	var cantpreguntas = <?php echo sizeof($questions); ?>;
	
	var preguntasactivas = new Array(cantpreguntas);
	
	var iaux = 0;
	var spider;
	
	var mostrarIW = true; // determina si al hacer click sobre un marker, muestra o no la info window
	
	<?php
		
	foreach ($questions as $question):
	
	?>
	
		preguntasactivas[iaux] = new Array(2);
		preguntasactivas[iaux][0] = '<?php echo $question['Question']['id']; ?>';
		preguntasactivas[iaux][1] = '<?php echo $question['Question']['descripcion']; ?>';
		iaux++;
		
	<?php
	endforeach;	
			
	?>
	//Estadisticas
	var total = 0;
	var hombres = 0;
	var mujeres = 0;
	var edades = new Array(11); // De 0 a 10...
	var respuestas = new Array(cantpreguntas); // Arreglo que contendra info sobre las respuestas de los pacientes sobre las preguntas activas
	
	function limpiarEstadisticas() {
		
		var i;
		
		for(i=0;i<11;i++) {
			edades[i]=new Array(2); // Arreglo para generos: posicion 0 es hombre y 1 es mujer
			edades[i][0]=0;
			edades[i][1]=0;
		}
		
		// Borro los divs temporales de los graficos por si ya estan creados
		$("div[id^='div_pregunta_']").remove();
		
		for(i=0;i<cantpreguntas;i++) {
			respuestas[i]=new Array(3); // Arreglo para posibles respuestas de la pregunta i: posicion 0 es SI, 1 es NO y 2 es NO CONTESTA
			respuestas[i][0]=0; // Si
			respuestas[i][1]=0; // No
			respuestas[i][2]=0; // No Contesta
		}
		
		total = 0;
		hombres = 0;
		mujeres = 0;
		
	}
	//2

	function crearMapa() {
	
		var noLocation = new google.maps.LatLng(defaultLatitude,defaultLongitude);
		var initialLocation;
		var browserSupportFlag =  new Boolean();

		var myOptions = {
			zoom: defaultZoom,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		
		$("#map_canvas").css("width",defaultWidth);
		$("#map_canvas").css("height",defaultHeight);
		
		map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
		map.setCenter(noLocation);
		
		mapaux = map;
		spider=new OverlappingMarkerSpiderfier(map,spiderOptions);
		spider.addListener('spiderfy', function(aranias,noaranias) {
			mostrarIW = false; 
			//alert(aranias[0]); 
			//debugger;
			});
		
	}
	
	function limpiarMapa() {
		
		spider.unspiderfy();
		
		if (marcadores) {
			for (i in marcadores) {
				marcadores[i].setMap(null);
			}
			marcadores = [];
		}
		
		if (marcadores&&markerCluster!=null) {
			markerCluster.clearMarkers();
		}
		if (heatmap!=null) {
			heatmap.setMap(null);}
					marcadoresHeatmap=[];
		
	}
	
	function toggleHeatmap() {
		
		spider.unspiderfy();
			
		if (marcadores) {
			for (i in marcadores) {
				marcadores[i].setMap(heatmap.getMap() ? map : null);
			}
			
		}
		
		if (!heatmap.getMap()) {
			
			$("#btncalor").addClass('active');
					
		} else {
			
			$("#btncalor").removeClass('active');
			//markerCluster = new MarkerClusterer(map, marcadores,mcOptions);
			
		} 
		
		if (markerCluster) {

    		$("#btncluster").removeClass('active');
	        		
    		markerCluster.clearMarkers();
			markerCluster = null;
			for (var i = 0, marker; marker = marcadores[i]; i++) {
	      		marker.setOptions({map:null,visible:true})
	
	    	}
		}
			
        heatmap.setMap(heatmap.getMap() ? null : map);
     }
	
	 // Si silencioso es TRUE no cambia el estado del boton de "modo clustering", si es falso , hace el efecto de presion sobre el boton.
     function toggleCluster(silencioso) {
     	
     	spider.unspiderfy();
		
		//Si esta activado calor, lo desactivo
		if (heatmap.getMap()) {
			$("#btncalor").removeClass('active');
			heatmap.setMap(null);
		}
		
		// Si no esta activado, lo activo
	   	if (!markerCluster) {
    	
    		if (!silencioso) {
    			$("#btncluster").addClass('active');
    		}
    		
    		for (var i = 0, marker; marker = marcadores[i]; i++) {
				marker.setMap(null);
    		}
    	
    		markerCluster = new MarkerClusterer(map, marcadores,mcOptions);
    			
    	} else {
    		
    		if (!silencioso) {
	    		$("#btncluster").removeClass('active');
	    	}
	    		
    		markerCluster.clearMarkers();
			markerCluster = null;
			for (var i = 0, marker; marker = marcadores[i]; i++) {
	      		marker.setOptions({map:map,visible:true})
	
	    	}
    	}
    	
     }
	
	function agregarEstadisticas(paciente) {
	
		var pos = 0;
		var genero = 0; // 0 es hombre, 1 es mujer
		var resp = 2; // 0 es SI, 1 es NO, 2 es NO CONTESTA
		
		try {
			pos = Math.floor(paciente.edad/10);
		} catch(er) {
			alert(er);
		}
		
		if (pos>10) {
			pos = 10;
		}
 
		if (paciente.sexo=="M") {
			hombres++;
			genero = 0;
		} else {
			mujeres++;
			genero = 1;
		}
		
		
		var iaux = 0;
		var pactual;
		for (iaux=0;iaux<cantpreguntas;iaux++) {
			pactual = preguntasactivas[iaux][0]; // Obtengo el ID de la pregunta que tengo guardada en el arreglo de preguntas
			
			if (paciente[pactual] == null) { // NO CONTESTA
				respuestas[iaux][2]++;
			} else if (paciente[pactual] == true) { // SI
				respuestas[iaux][0]++;
			} else { // NO
				respuestas[iaux][1]++;
			}
		}
		
		//alert(paciente['1']);
		
		edades[pos][genero]++;
		
		total++;
	
	}
	
	function dibujarEstadisticas() {
	
        var data = google.visualization.arrayToDataTable([
          ['Rango', 'Hombres', 'Mujeres', 'SubTotal'],
          ['< 10', edades[0][0], edades[0][1], edades[0][0] + edades[0][1] ],
          ['10-19', edades[1][0], edades[1][1], edades[1][0] + edades[1][1] ],
          ['20-29', edades[2][0], edades[2][1], edades[2][0] + edades[2][1] ],
          ['30-39', edades[3][0], edades[3][1], edades[3][0] + edades[3][1] ],
          ['40-49', edades[4][0], edades[4][1], edades[4][0] + edades[4][1] ],
          ['50-59', edades[5][0], edades[5][1], edades[5][0] + edades[5][1] ],
          ['60-69', edades[6][0], edades[6][1], edades[6][0] + edades[6][1] ],
          ['70-79', edades[7][0], edades[7][1], edades[7][0] + edades[7][1] ],
          ['80-89', edades[8][0], edades[8][1], edades[8][0] + edades[8][1] ],
          ['90-99', edades[9][0], edades[9][1], edades[9][0] + edades[9][1] ],
          ['> 100', edades[10][0], edades[10][1], edades[10][0] + edades[10][1] ]
        ]);

        var options = {
          title: 'Edades y Generos ( Total = ' + total + ' )',
          height: 300,
          hAxis: {title: 'Rango de Edades en <?php echo utf8_encode('Años'); ?>', titleTextStyle: {color: 'black'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('div_estadisticas'));
        chart.draw(data, options);
		
		
		var data2 = google.visualization.arrayToDataTable([
          ['Genero', 'Cantidad'],
          ['Hombres', hombres],
          ['Mujeres', mujeres]
        ]);

        var options2 = {
			title: 'Generos ( Total = ' + total + ' )',
			width: 400
        };

        var chart2 = new google.visualization.PieChart(document.getElementById('div_torta'));
        chart2.draw(data2, options2);
        
        
        var data3 = google.visualization.arrayToDataTable([
          ['Rango de Edad', 'Total'],
          ['< 10' , edades[0][0] + edades[0][1] ],
          ['10-19', edades[1][0] + edades[1][1] ],
          ['20-29', edades[2][0] + edades[2][1] ],
          ['30-39', edades[3][0] + edades[3][1] ],
          ['40-49', edades[4][0] + edades[4][1] ],
          ['50-59', edades[5][0] + edades[5][1] ],
          ['60-69', edades[6][0] + edades[6][1] ],
          ['70-79', edades[7][0] + edades[7][1] ],
          ['80-89', edades[8][0] + edades[8][1] ],
          ['90-99', edades[9][0] + edades[9][1] ],
          ['> 100', edades[10][0] + edades[10][1]]
        ]);
        
        var options3 = {
			title: 'Personas por Rango de Edades ( Total = ' + total + ' )',
			width: 400
        };

        var chart3 = new google.visualization.PieChart(document.getElementById('div_torta2'));
        chart3.draw(data3, options3);
        
        
        // Generacion dinamica de los graficos de las respuestas!
        for (iaux=0;iaux<cantpreguntas;iaux++) {
        	
        	// #1 - Creo el div dinamicanete donde va a ir el grafico
        	$("#div_preguntas").append("<div style='float:left;' id='div_pregunta_"+ iaux +"'></div>");
        	
        	// #2 - Genero la tabla de google con los datos de una respuesta
        	var dataaux = google.visualization.arrayToDataTable([
          		['Respuesta', 'Cantidad'],
          		['Si', respuestas[iaux][0]],
          		['No', respuestas[iaux][1]],
          		['No Contesta', respuestas[iaux][2]]
        	]);
        	
        	// #3 - Genero las opciones para el chart
        	var optionsaux = {
				title: '' + preguntasactivas[iaux][1] + ' ( Total = ' + total + ' )',
				width: 400
       		 };
       		 
       		 // #4 Creo el grafico....
       		var chartaux = new google.visualization.PieChart(document.getElementById('div_pregunta_'+iaux));
       		
        	chartaux.draw(dataaux, optionsaux);
        	
        }
	}

	function agregarMarcador(paciente) {
	
		marcadorCount++;
		var image = '';
		var textosexo;
		var imgvive = "";
		
		if (paciente.vive==0) {
			imgvive = "-dead"
		}
		
		if (paciente.sexo=="M") {
			textosexo = "Masculino";
			image = '<?php echo $this->webroot ?>img/blue-marker'+imgvive+'.png';
		} else {
			textosexo = "Femenino";
			image = '<?php echo $this->webroot ?>img/pink-marker'+imgvive+'.png';
		}
		
		var shadowImage = '<?php echo $this->webroot ?>img/msmarker.shadow.png';
		
		var myLatLng = new google.maps.LatLng(paciente.latitud,paciente.longitud);
		 marcadoresHeatmap.push(myLatLng);
		//aca saco los marcadores de aca
		var marcador = new google.maps.Marker({
			      	position: myLatLng,
			     	map: map,
			        icon: image,
			        shadow: shadowImage
		});
		
		marcador.set("id", marcadorCount);
		marcadores.push(marcador);
		spider.addMarker(marcador);
				
		var tabPreguntas = '';
		
		for (var iaux=0;iaux<cantpreguntas;iaux++) {
			tabPreguntas +=  '<b>' + preguntasactivas[iaux][1] + ':</b>';
			
			if (paciente[preguntasactivas[iaux][0]] == null) { // NO CONTESTA
				tabPreguntas += ' No Contesta<br>';
			} else if (paciente[preguntasactivas[iaux][0]] == true) { // SI
				tabPreguntas += ' Si<br>';
			} else { // NO
				tabPreguntas += ' No<br>';
			}
			
		}
		
		
		var contenido = '<div id="iwtabs_'+marcador.get("id")+'" class="usual"><ul><li><a href="#tab1_'+marcador.get("id")+'">Información</a></li><li><a href="#tab2_'+marcador.get("id")+'">Información Adicional</a></li></ul>';
		contenido += '<div id="tab1_'+marcador.get("id")+'"><b>Sexo:</b> ' + textosexo;
		contenido += '<br><b>Edad:</b> ' + paciente.edad;
		contenido += '<br><b>Ocupación:</b> ' + paciente.ocupacion;
		contenido += '<br><b>Direcci&oacute;n:</b> ' + paciente.direccion;
		contenido += '<br><b>OMS:</b> ' + paciente.codigo + ' - ' + paciente.descripcion;
		contenido += '<br><b>Estadio:</b> ' + paciente.estadio;
		contenido += '</div><div id="tab2_'+marcador.get("id")+'" style="display:none;">' + tabPreguntas + '</div>';
		contenido += '</div>';
		
		
		
							
		var ventana = new google.maps.InfoWindow({
	            content: contenido
	    });
		
		google.maps.event.addListener(marcador, 'click', function() {
							if (mostrarIW) {
								ventana.open(map,marcador);
								$("#iwtabs_"+marcador.get("id")+" ul").idTabs('tab1_'+marcador.get("id"));
							}
							
							mostrarIW = true;
							
		        			});
	}

	function buscar() {
		var datos = $("#ConsultaReporteForm").serialize();

		$.getJSON('<?php echo $this->Html->url(array("controller" => "addresses","action" => "reporteBusqueda"));?>?'+datos,
		function(data){
				limpiarMapa();
				limpiarEstadisticas();
				
				if (data.length == 0) {
					jAlert("No se encontraron pacientes con los filtros ingresados.","No hay Datos.");
				}
				
				$.each(data, function(optionIndex, option) {
					agregarMarcador(option.Patient);
					agregarEstadisticas(option.Patient);
				});
				
			//	markerCluster = new MarkerClusterer(map, null,mcOptions);
			//	markerCluster.addMarkers(marcadores);
				pointArray = new google.maps.MVCArray(marcadoresHeatmap);
				heatmap = new google.maps.visualization.HeatmapLayer({
					data: pointArray,
					radius: 50
				});
				
				toggleCluster(false); // Activamos clustering por defecto
					
				//heatmap.setMap(map);
				dibujarEstadisticas();
				
		});
	}
	

	$(document).ready(function(){
		
		$(".iframe").colorbox({iframe:true, width:"700px", height:"450px", scrolling:true});
		
		options = { serviceUrl:'<?php echo $this->Html->url(array("controller" => "oms_codes",	"action" => "sugerencias"));?>/', minChars:2, maxHeight:300, width:400,
		onSelect: function(value, data){ $('#OmsCodeId').val(data);
		}};
		a = $('#sugerencias').autocomplete(options);
		
		$(".ayudaCodigosItem").live( "click", function() { 
			
		//Despinto todos los items
		$(".ayudaCodigosItem").removeClass('selected');
		
		//Pinto el item clickeado
		$(this).addClass('selected');
		
		} )
	
		$('#ConsultaFechaFrom').datepicker(datepicker_config);
		$('#ConsultaFechaTo').datepicker(datepicker_config); 
		
		
		$("#sugerencias").keyup(function(event){
			
			// SI se presiona el enter en el textfield de codigo... lo agrego directo
   			if(event.keyCode == 13){
   				event.preventDefault();
				agregarOms();
				return false;
			}
		});


		$("#accordion").liteAccordion({
			theme : 'basic',                        // basic, dark, light, or stitch  
			headerWidth: 48,
			slideSpeed : 800,                       // slide animation speed 
			containerWidth : $('#content').width()-15,                   // fixed (px)  
            containerHeight : 500,                  // fixed (px)  
		});//El Acordion
	
		$(".btn-slide").click(function(){
		  $("#panel").slideToggle("slow");
		  $(this).toggleClass("active");
		});
		
		crearMapa();
		
		$('#ConsultaReporteForm').submit(function(event) {
			
			buscar();
			$("#panel").slideToggle("slow");
			return false;
		}
		);
		
		buscar(); //Disparamos una bsqueda global al entrar a la pantalla

	});
	
	
	function cambiarCodigo(id, desc ) {
		$("#sugerencias").val(desc);
		$('#OmsCodeId').val(id);
		$(".iframe").colorbox.close();
		agregarOms();
	}
	
	function agregarOms() {
			
		var contenido = $("#sugerencias").val();
		var id = $('#OmsCodeId').val();
		
		
		
		if (id!=null && id!="" && !existeOms(id)) {
			
			codigosAgregados++;
			
			$("#sugerencias").val("");
			$('#OmsCodeId').val("");
		
			var item = "<div class='ayudaCodigosItem' style='padding:0px;' value=\"" + id + "\"><input type='hidden' id='CodigoItem"+codigosAgregados+"' name='data[Codigo]["+codigosAgregados+"][item]' value='"+id+"'>" + contenido + "</div>";
	
			$('#listaCodigos').append(item);
		
		}
		
	}
	
	function existeOms(id) {
		
		return $('div[value='+id+']').attr("value") != null;

	}
	
	function removerOms() {
		
	 	$(".ayudaCodigosItem.selected").remove();	
		
	}
	
	
</script>



<div id="toppanel">
	<div id="panel"> <!--the hidden panel -->
		<div class="patients form">
			<?php echo $this->Form->create('Consulta');?>
			<fieldset>
					<legend><?php echo __('Informaci&oacute;n B&aacute;sica'); ?></legend>
			<?php
			
					$options=array(''=>'Indistinto','V'=>'Vivo','F'=>'Fallecido');
					$attributes=array('legend'=>false,'value'=>'','separator'=>'');
					
					echo "<div>";
					echo "<label class='label_radio'>Estado</label>";
					echo $this->Form->radio('estado',$options,$attributes);
					echo "</div>";

					$options=array(''=>'Indistinto','M'=>'Masculino','F'=>'Femenino');
					$attributes=array('legend'=>false,'value'=>'','separator'=>'');
					
					echo "<div>";
					echo "<label class='label_radio'>Género</label>";
					echo $this->Form->radio('sexo',$options,$attributes);
					echo "</div>";
					
					$options=array(''=>'Indistinto (Prioridad Particular)','P'=>'Particular','L'=>'Laboral');
					$attributes=array('legend'=>false,'value'=>'','separator'=>'');
					
					echo "<div>";
					echo "<label class='label_radio'>Domicilio</label>";
					echo $this->Form->radio('tipodir',$options,$attributes);
					echo "</div>";
					
					echo "<div class=input>";
					echo "<label>Edad en Diagnóstico Entre </label><input type='text' size='5' name='data[Consulta][edadMin]' id='edadMin' />y&nbsp;<input type='text' size='5' name='data[Consulta][edadMax]' id='edadMax' />";
					echo "</div>";
					
					echo "<div class=input>";
					echo "<label>Fecha Diagnóstico Entre </label><input type='text' size='10' name='data[Consulta][fechaFrom]' id='ConsultaFechaFrom' />  y&nbsp;<input type='text' size='10' name='data[Consulta][fechaTo]' id='ConsultaFechaTo' />";
					echo "</div>";
					
			?>
			
			</fieldset>
			<fieldset>
				<legend><?php echo __('OMS'); ?></legend>
				<?php
					echo "<div class=input>";
					echo "<label class='label_radio'>C&oacute;digo</label>";
					echo "<input type='hidden' id='OmsCodeId' value=''>";
					echo "<input type='text' size='25' value='' id='sugerencias' class='inputlargo'><a href='JavaScript:agregarOms();' title='Agregar a la lista'><img src='".$this->webroot."img/icon_add.png' style='vertical-align: middle;'/></a><a class='iframe' title='Selector de C&oacute;digos OMS' href='".$this->Html->url(array("controller" => "oms_codes",	"action" => "help"))."'><img src='".$this->webroot."css/images/search.png' style='vertical-align: middle;'/></a>";
					echo "</div>";
					echo "<div style='width:100%;height:50px; clear:right !important;'><div class='ayudaCodigos' style='float:left;width:640px;height:50px;padding:0px;' id='listaCodigos'></div><div style='width: 30px;float:left;'><a href='JavaScript:removerOms()' title='Remover de la lista'><img src='".$this->webroot."img/icon_delete.png' style='vertical-align: middle;'/></a></div></div>";
				?>	
			</fieldset>
			<fieldset>
				<legend><?php echo __('Informaci&oacute;n Adicional'); ?></legend>
				<?php
				
				$i = 0;
				foreach ($questions as $question):
				
					$opciones=array('1'=>'Si','0'=>'No',''=>'Indistinto');
					$atributos=array('legend'=>false,'value'=>'','separator'=>'');
					echo "<div>";
					echo "<label class='label_radio'>".$question['Question']['descripcion']."</label>";
					echo $this->Form->hidden('Answer.'.$i.'.question_id', array('value' => $question['Question']['id']));
					//echo $this->Form->hidden('Answer.'.$i.'patient_id', array('value' => ''));
					echo $this->Form->radio('Answer.'.$i.'.valor',$opciones,$atributos);
					echo "</div>";
					//echo '<br>';
					$i++;
				
				endforeach;	
				?>
			</fieldset>
			<?php echo $this->Form->end(__('Consultar'));?>
		</div>
	</div>
	<!--
	<p class="slide"><a href="#" class="btn-slide">Filtros</a></p> 
	-->
	
	<!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
			<li class="left">&nbsp;</li>
			<li id="toggle">
				<a href="#" class="btn-slide">Filtros</a>	
			</li>
			<li class="right">&nbsp;</li>
		</ul> 
	</div> <!-- / top -->
	
</div>
<div id="accordion" style="margin-top:42px;">
	<ol>
		<li>
			<h2><span>Mapa</span></h2>
			<div id="map_canvas" style="margin-left:48px;"></div>
			<div id="opcionbutton"> 
				<a id="btncalor" class="button long" href="JavaScript:toggleHeatmap();">Mapa de Calor</a><a id="btncluster" class="button long" href="JavaScript:toggleCluster(false);">Agrupado</a>
			</div>		
		</li>
		<li>
			<h2><span>Estad&iacute;sticas de G&eacute;nero y Edad</span></h2>
			<div>
				<div id="div_estadisticas"></div>
				<div style='float:left;' id="div_torta"></div>
				<div style='float:left;' id="div_torta2"></div>
			</div>
		</li>
		<li>
			<h2><span>Estad&iacute;sticas de informaci&oacute;n de Pacientes</span></h2>
			<div>
				<div id="div_preguntas"></div>
			</div>
		</li>
	</ol>
	<noscript>
		<p>Por favor habilite JavaScript para una experiencia completa.</p>
	</noscript>
</div>