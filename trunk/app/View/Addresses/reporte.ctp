<?php
 echo $this->Html->script('markerclusterer_packed'); // Include jQuery library 
?>
<script>
	
	var map; // EL MAPA!!
	var markerCluster; // MAPA DE CLUSTERS

	var mcOptions = {gridSize: 40};

	
	var defaultWidth="100%";					//Width of the map	
	var defaultHeight="500px";					//Height of the map
	var defaultZoom=14;							//Default zoom 
	var defaultLatitude=-38.717570;		//Default latitude if the browser doesn't support localization or you don't want localization -38.717570, -62.265671
	var defaultLongitude=-62.265671;	//Default longitude if the browser doesn't support localization or you don't want localization
	
	var marcadores = [];
	
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
				$.each(data, function(optionIndex, option) {
					console.log(option.Patient);
					agregarMarcador(option.Patient);
				});
				markerCluster = new MarkerClusterer(map, marcadores,mcOptions);
		});
	}
	
	$(document).ready(function(){

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

	});
	
</script>

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
<p class="slide"><a href="#" class="btn-slide">Filtros</a></p> 
<div id="map_canvas"></div>