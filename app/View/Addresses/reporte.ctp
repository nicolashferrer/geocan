<?php

	echo $this->Html->script('markerclusterer_packed'); // Include jQuery library
	echo $this->Html->script('jquery.easing.1.3');
	echo $this->Html->script('oms.min');
	echo $this->Html->script('jquery.idTabs.min.js');
	echo $this->Html->script('jquery-ui-1.8.19.min');
	echo $this->Html->css('start/jquery-ui-1.8.19.custom');

?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  
<script>
	
	var codigosAgregados = 0;
	
	var marcadorCount = 0; // Contador global para asignar un ID unico a los marcadores

	// Load the Visualization API and the piechart package.
    google.charts.load('current', {'packages':['corechart']});
    //google.charts.load("visualization", "1", {'packages':['corechart']});
    

	var pointarray, heatmap;
	var map;
	var mapaux;
	
	var markerCluster = null; // Mapa de clusters

	var mcOptions = {gridSize: 50, maxZoom: 17};
	var spiderOptions = { keepSpiderfied:true };

	var defaultWidth="100%";					//Width of the map	
	var defaultHeight="500px";					//Height of the map
	var defaultZoom=12;							//Default zoom 
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
	var pfallecido = 0;
	var pvivo = 0;
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
		pfallecido = 0;
		pvivo = 0;
		
	}

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
			$("#sliders").show();
		} else {
			$("#btncalor").removeClass('active');
			$("#sliders").hide();
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
			$("#sliders").hide();
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
		
		if (paciente.vive==0) {
			pfallecido++;
		} else {
			pvivo++;
		}
		
		var jaux = 0;
		var pactual;
		for (jaux=0;jaux<cantpreguntas;jaux++) {
			pactual = preguntasactivas[jaux][0]; // Obtengo el ID de la pregunta que tengo guardada en el arreglo de preguntas
			
			if (paciente[pactual] == null) { // NO CONTESTA
				respuestas[jaux][2]++;
			} else if (paciente[pactual] == true) { // SI
				respuestas[jaux][0]++;
			} else { // NO
				respuestas[jaux][1]++;
			}
		}
		
		edades[pos][genero]++;
		
		total++;
	
	}

	function dibujarEstadisticas() {

		// Set a callback to run when the Google Visualization API is loaded.
    	google.charts.setOnLoadCallback(chart1);
		google.charts.setOnLoadCallback(chart2);
		google.charts.setOnLoadCallback(chart3);
		google.charts.setOnLoadCallback(chart4);
        
        // Generacion dinamica de los graficos de las respuestas!
        for (iaux=0;iaux<cantpreguntas;iaux++) {
        	
    		google.charts.setOnLoadCallback(chartAux(iaux));
        }
	}

	function chart1(){

    	// Create our data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Rango');
        data.addColumn('number', 'Hombres');
        data.addColumn('number', 'Mujeres');
        data.addColumn('number', 'Subtotal');
        data.addRows([
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

        // Set chart options
        var options = {
          title: 'Edades y Generos ( Total = ' + total + ' )',
          height: 300,width: 1146,
          hAxis: {title: 'Rango de Edades en Años', titleTextStyle: {color: 'black'}}
        };

        // Instantiate and draw our chart, passing in some options.
        chart = new google.visualization.ColumnChart(document.getElementById('div_estadisticas'));
        chart.draw(data, options);

        //Haciendo responsive el chart
        /*$(chartContainer).find('svg')
        	.attr("viewBox","0 0 1146 300")
        	.attr("preserveAspectRatio","xMidYMid meet")
        	.attr("width","100%")
        	.attr("height","100%");

    	$(chartContainer).find('svg').parent().parent().css("width","100%");*/
	}

	function chart2(){

        // Create our data table.
        var data2 = new google.visualization.DataTable();
        data2.addColumn('string', 'Genero');
        data2.addColumn('number', 'Cantidad');
        data2.addRows([
          ['Hombres', hombres ],
          ['Mujeres', mujeres ]
        ]);

        var options2 = {
			title: 'Generos ( Total = ' + total + ' )',
			width: 400
        };

        var chart2 = new google.visualization.PieChart(document.getElementById('div_torta'));
        chart2.draw(data2, options2);
	}

	function chart3(){
          
        var data3 = new google.visualization.DataTable();
        data3.addColumn('string', 'Rango de Edad');
        data3.addColumn('number', 'Total');
        data3.addRows([
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
			title: 'Pacientes por Rango de Edades ( Total = ' + total + ' )',
			width: 400
        };

        var chart3 = new google.visualization.PieChart(document.getElementById('div_torta2'));
        chart3.draw(data3, options3);
	}

	function chart4(){

        var data4 = new google.visualization.DataTable();
        data4.addColumn('string', 'Estado');
        data4.addColumn('number', 'Total');
        data4.addRows([
          ['Vivo' , pvivo ],
          ['Fallecido', pfallecido ]
        ]);
        
        var options4 = {
			title: 'Estado de Pacientes ( Total = ' + total + ' )',
			width: 400
        };

        var chart4 = new google.visualization.PieChart(document.getElementById('div_torta4'));
        chart4.draw(data4, options4);
	}

	function chartAux(i){

		// #1 - Creo el div dinamicanete donde va a ir el grafico
    	$("#div_preguntas").append("<div style='float:left;' id='div_pregunta_"+ i +"'></div>");

    	var callback = function() {

    		var index = i;
    		// #2 - Genero la tabla de google con los datos de una respuesta
	    	var dataaux = new google.visualization.DataTable();
	        dataaux.addColumn('string', 'Respuesta');
	        dataaux.addColumn('number', 'Total');
	        dataaux.addRows([
	          	['Si', respuestas[index][0]],
		  		['No', respuestas[index][1]],
		  		['No Contesta', respuestas[index][2]]
	        ]);
	    	
	    	// #3 - Genero las opciones para el chart
	    	var optionsaux = {
				title: '' + preguntasactivas[index][1] + ' ( Total = ' + total + ' )',
				width: 400
	   		 };
	   		 
	   		 // #4 Creo el grafico....
	   		var _chartaux = new google.visualization.PieChart(document.getElementById('div_pregunta_'+index));
	    	_chartaux.draw(dataaux, optionsaux);		
    	}

    	return callback;
	}
	
	var infoWindow = new google.maps.InfoWindow();
	
	function agregarMarcador(paciente) {
		
		marcadorCount++;
		var image = '';
		var textosexo;
		var imgvive = "";
		var fallecido = "No"
		var edad_paciente = paciente.edad;
		
		if (paciente.vive==0) {
			imgvive = "-dead";
			fallecido = "Si";
			if (paciente.fecha_defuncion != null) {
				
				var d = new Date(paciente.fecha_defuncion);
				
				//Le sumo 1 dia porque por alguna razon, al crear la fecha anterior se crea con 1 dia antes.
				var ms = d.getTime() + 86400000;
				d = new Date(ms);

				// Transformo la fecha al formato que usamos en el sistema dd/mm/aaaa
				var curr_date = d.getDate();
				var curr_month = d.getMonth();
				curr_month++;
				var curr_year = d.getFullYear();
				var fecha_def = curr_date + "/" + curr_month + "/" + curr_year;
				
				edad_paciente = paciente.edad_defuncion;

				fallecido += ", el "  + fecha_def + " a los " + paciente.edad_defuncion  + " años";
			} else {
				edad_paciente = "Desconocida";
			}
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
		
		var codificacion = paciente.codificacion.replace(/;/gi, " ");
		codificacion = codificacion.replace(/@/gi, " - "); 
		
		var contenido = '<div id="iwtabs_'+marcador.get("id")+'" class="usual"><ul><li><a href="#tab1_'+marcador.get("id")+'">Información</a></li><li><a href="#tab2_'+marcador.get("id")+'">Información Adicional</a></li></ul>';
		contenido += '<div id="tab1_'+marcador.get("id")+'"><b>Sexo:</b> ' + textosexo;
		contenido += '<br><b>Edad:</b> ' + edad_paciente;
		contenido += '<br><b>Fallecido:</b> ' + fallecido;
		contenido += '<br><b>Ocupación:</b> ' + paciente.ocupacion;
		contenido += '<br><b>Direcci&oacute;n:</b> ' + paciente.direccion;
		contenido += '<br><b>OMS:</b> ' + paciente.codigo + ' - ' + paciente.descripcion;
		contenido += '<br><b>Codificaci&oacute;n:</b> ' + codificacion;
		contenido += '<br><b>Estadio Inicial:</b> ' + paciente.estadio;
		contenido += '</div><div id="tab2_'+marcador.get("id")+'" style="display:none;">' + tabPreguntas + '</div>';
		contenido += '</div>';
		
		google.maps.event.addListener(marcador, 'click', function() {
			if (mostrarIW) {
				infoWindow.close();
				infoWindow.setContent(contenido);
				infoWindow.open(map,marcador);
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
					radius: 60,
					opacity:1
				});
				
				toggleCluster(false); // Activamos clustering por defecto
					
				//heatmap.setMap(map);
				dibujarEstadisticas();
				
		});
	}
	
	function changeGradient() {
	  var gradient = [
		'rgba(0, 255, 255, 0)',
		'rgba(0, 255, 255, 1)',
		'rgba(0, 191, 255, 1)',
		'rgba(0, 127, 255, 1)',
		'rgba(0, 63, 255, 1)',
		'rgba(0, 0, 255, 1)',
		'rgba(0, 0, 223, 1)',
		'rgba(0, 0, 191, 1)',
		'rgba(0, 0, 159, 1)',
		'rgba(0, 0, 127, 1)',
		'rgba(63, 0, 91, 1)',
		'rgba(127, 0, 63, 1)',
		'rgba(191, 0, 31, 1)',
		'rgba(255, 0, 0, 1)'
	  ];
	  heatmap.set('gradient', heatmap.get('gradient') ? null : gradient);
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
		});
	
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
	
		$(".btn-slide").click(function(){
		  $("#panel").slideToggle("slow");
		  $(this).toggleClass("active");
		});
		
		crearMapa();
		
		$('#ConsultaReporteForm').submit(function(event) {
			
			buscar();
			$('#tabs').tabs('select', 0);
			return false;
		});

		$( "#radio-slider" ).slider({
			orientation: "vertical",
			range: "min",
			min: 0,
			max: 100,
			step: 10,
			value: 60,
			slide: function( event, ui ) {
				heatmap.set('radius', ui.value);
			}
		});
		
		$( "#opacity-slider" ).slider({
			orientation: "vertical",
			range: "min",
			min: 0,
			max: 1,
			step: 0.1,
			value: 1,
			slide: function( event, ui ) {
				heatmap.set('opacity', ui.value );
			}
		});		
		
		$( "#tabs" ).tabs();
	
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


<div id="tabs" class="tabs">
  <ul>
    <li><a href="#tabs-1"><span class="ui-icon ui-icon-pin-s" style="display: inline-block;"></span> Mapa</a></li>
    <li><a href="#tabs-2"><span class="ui-icon ui-icon-heart" style="display: inline-block;"></span> Estad&iacute;sticas de G&eacute;nero, Edad y Estado</a></li>
    <li><a href="#tabs-3"><span class="ui-icon ui-icon-person" style="display: inline-block;"></span> Estad&iacute;sticas de informaci&oacute;n de Pacientes</a></li>
	<li class="filter-tab"><a href="#tabs-4"><span class="ui-icon ui-icon-search" style="display: inline-block;"></span> Filtros</a></li>
  </ul>
  <div id="tabs-1" style="height:500px;">
		<div id="map_canvas"></div>
		<div id="opcionbutton"> 
				<div id="sliders" style="display:none">
					<table style="width:100%;">
					<tr>
						<td style="text-align:center;width:50%;">
							<span>Radio</span>
						</td>	
						<td style="text-align:center;width:50%;">
							<span>Opacidad</span>
						</td>
					</tr>
					<tr style="background-color:transparent;">
						<td style="width:50%;">
							<div id="radio-slider" style="height:200px;position:relative;margin:auto;"></div>
						<td style="width:50%;">
							<div id="opacity-slider" style="height:200px;position:relative;margin:auto;"></div>
						</td>	
					</tr>
					</table>
					<a id="btngradiente" class="button long" href="JavaScript:changeGradient();">Gradiente</a>
				</div>
				<a id="btncalor" class="button long" href="JavaScript:toggleHeatmap();">Mapa de Calor</a>
				<a id="btncluster" class="button long" href="JavaScript:toggleCluster(false);">Agrupado</a>
		</div>
  </div>
  <div id="tabs-2" style="height:500px;">
			<div>
				<div id="div_estadisticas" style="width:100%; height:300px;"></div>
				<div style='float:left;' id="div_torta"></div>
				<div style='float:left;' id="div_torta2"></div>
				<div style='float:left;' id="div_torta4"></div>
			</div>
  </div>
  <div id="tabs-3" style="height:500px;">
			<div id="div_preguntas"></div>
  </div>
  <div id="tabs-4" style="height:500px;overflow: scroll;">
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
</div>
