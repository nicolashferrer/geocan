<?php
	echo $this->Html->script('markerclusterer_packed'); // Include jQuery library
	echo $this->Html->css('liteaccordion');
	echo $this->Html->script('jquery.easing.1.3');
	echo $this->Html->script('liteaccordion.jquery');

?>
<script type="text/javascript" src="https://www.google.com/jsapi" charset="utf-8"></script>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=visualization">/*2*/</script>
<script>
	
	google.load("visualization", "1", {packages:["corechart"]});
	var pointarray, heatmap;//2
	var map; // EL MAPA!!
	
	var markerCluster = null; // MAPA DE CLUSTERS

	var mcOptions = {gridSize: 50};

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
		
	}
	
	function limpiarMapa() {
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
		
		if (marcadores) {
			for (i in marcadores) {
				marcadores[i].setMap(heatmap.getMap() ? map : null);
			}
			
		}
		
		if (!heatmap.getMap()&&markerCluster!=null) {
			
			$("#btncalor").addClass('active');
			markerCluster.clearMarkers();
			
		}else {
			
			$("#btncalor").removeClass('active');
			markerCluster = new MarkerClusterer(map, marcadores,mcOptions);
			
		} 
	
        heatmap.setMap(heatmap.getMap() ? null : map);
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
	
		var image = '';
		var textosexo;
		
		if (paciente.sexo=="M") {
			textosexo = "Masculino";
			image = '<?php echo $this->webroot ?>img/blue-marker.png';
		} else {
			textosexo = "Femenino";
			image = '<?php echo $this->webroot ?>img/pink-marker.png';
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
		
		marcadores.push(marcador);
		
		var contenido = '<b>Sexo:</b> ' + textosexo;
		contenido += '<br><b>Edad:</b> ' + paciente.edad;
		contenido += '<br><b>Direcci&oacute;n:</b> ' + paciente.direccion;
		contenido += '<br><b>OMS:</b> ' + paciente.codigo + ' - ' + paciente.descripcion;
		contenido += '<br><b>Estadio:</b> ' + paciente.estadio;
								
		var ventana = new google.maps.InfoWindow({
	            content: contenido
	    });
		
		google.maps.event.addListener(marcador, 'click', function() {
								ventana.open(map,marcador);
		        			});
	}

	function buscar() {
		var datos = $("#ConsultaReporteForm").serialize();
		$.getJSON('<?php echo $this->Html->url(array("controller" => "addresses","action" => "reporteBusqueda"));?>?'+datos,
		function(data){
				limpiarMapa();
				limpiarEstadisticas();
				$.each(data, function(optionIndex, option) {
					agregarMarcador(option.Patient);
					agregarEstadisticas(option.Patient);
				});
				
				markerCluster = new MarkerClusterer(map, marcadores,mcOptions);
				pointArray = new google.maps.MVCArray(marcadoresHeatmap);
				heatmap = new google.maps.visualization.HeatmapLayer({
					data: pointArray,
					radius: 50
				});
					
				//heatmap.setMap(map);
				dibujarEstadisticas();
				
		});
	}
	
	$(document).ready(function(){
		
		$(".iframe").colorbox({iframe:true, width:"700px", height:"450px", scrolling:true});
		
		$(".ayudaCodigosItem").live( "click", function() { 
			
		//Despinto todos los items
		$(".ayudaCodigosItem").removeClass('selected');
		
		//Pinto el item clickeado
		$(this).addClass('selected');
		
		} )
	

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
			
			buscar()
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
	}
	
	function agregarOms() {
			
		var contenido = $("#sugerencias").val();
		var id = $('#OmsCodeId').val();
		
		
		
		if (id!=null && id!="" && !existeOms(id)) {
		
			var item = "<div class='ayudaCodigosItem' style='padding:0px;' value=\"" + id + "\">" + contenido + "</div>";
	
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


			<!-- syntax highlighter -->
        <script src="http://nicolahibbert.com/demo/liteAccordion/js/shCore.js"></script>
        <script src="http://alexgorbatchev.com.s3.amazonaws.com/pub/sh/3.0.83/scripts/shBrushXml.js"></script>
        <script src="http://alexgorbatchev.com.s3.amazonaws.com/pub/sh/3.0.83/scripts/shBrushJScript.js"></script>
        <script>SyntaxHighlighter.all();</script> 


<div id="toppanel">
	<div id="panel"> <!--the hidden panel -->
		<div class="patients form">
			<?php echo $this->Form->create('Consulta');?>
			<fieldset>
					<legend><?php echo __('Informaci&oacute;n B&aacute;sica'); ?></legend>
			<?php

					$options=array(''=>'Indistinto','M'=>'Masculino','F'=>'Femenino');
					$attributes=array('legend'=>false,'value'=>'','separator'=>'');
					
					echo "<div>";
					echo "<label class='label_radio'>Genero</label>";
					echo $this->Form->radio('sexo',$options,$attributes);
					echo "</div>";
					
					$options=array(''=>'Indistinto (Prioridad Particular)','P'=>'Particular','L'=>'Laboral');
					$attributes=array('legend'=>false,'value'=>'','separator'=>'');
					
					echo "<div>";
					echo "<label class='label_radio'>Domicilio</label>";
					echo $this->Form->radio('tipodir',$options,$attributes);
					echo "</div>";
					
					echo "<div class=input>";
					echo "<label>Edad Entre </label><input type='text' size='5' name='data[Consulta][edadMin]' id='edadMin' />y&nbsp;<input type='text' size='5' name='data[Consulta][edadMax]' id='edadMax' />";
					echo "</div>";
			?>
			</fieldset>
			<fieldset>
				<legend><?php echo __('OMS'); ?></legend>
				<?php
					echo "<div class=input>";
					echo "<label class='label_radio'>C&oacute;digo</label>";
					echo "<input type='hidden' id='OmsCodeId' value=''>";
					echo "<input type='text' size='25' value='' id='sugerencias' class='inputlargo'><a class='iframe' title='Selector de C&oacute;digos OMS' href='".$this->Html->url(array("controller" => "oms_codes",	"action" => "help"))."'><img src='".$this->webroot."css/images/help.gif' style='vertical-align: middle;' /></a><a href='JavaScript:agregarOms();'>Agregar</a>";
					echo "</div>";
					echo "<div class='ayudaCodigos' style='width:98%;height:50px;padding:0px;' id='listaCodigos'></div><a href='JavaScript:removerOms()'>Remover</a>";
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
			<div id="opcionbutton"> <a id="btncalor" class="button long" href="JavaScript:toggleHeatmap();">Mapa de Calor</a></div>		
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
