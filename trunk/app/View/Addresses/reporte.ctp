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

<div class="addresses index">
	<?php
		$default = array('type'=>'0','zoom'=>13,'lat'=>'42.5846353751749','long'=>'11.5191650390625');
		echo $this->GoogleMapV3->map();
		foreach ($addresses as $address){
		$markerOptions= array(
		//	'id'=>$address['Patient']['id'],								//Id of the marker
			'latitude'=>$address['Patient']['latitud'],		//Latitude of the marker
			'longitude'=>$address['Patient']['longitud'],		//Longitude of the marker
			'markerIcon'=>'http://google-maps-icons.googlecode.com/files/home.png', //Custom icon
			'shadowIcon'=>'http://google-maps-icons.googlecode.com/files/home.png', //Custom shadow
			'infoWindow'=>true,					//Boolean to show an information window when you click the marker or not
			'windowText'=> '<br>Edad: '.$address['Patient']['edad'].'<br>'. $address['Patient']['direccion']	//Default text inside the information window
		);
			echo $this->GoogleMapV3->addMarker($markerOptions);
		}
		/*
 		$default = array('type'=>'0','zoom'=>13,'lat'=>'42.5846353751749','long'=>'11.5191650390625');
        $points = array();
        $points[0]['Point'] = array('longitude' =>$default['long'],'latitude' =>$default['lat']);
        $key = $this->GoogleMap->key;
		//echo $javascript->link($this->GoogleMap->url);
        echo $this->GoogleMap->map($default,'width: 600px; height: 400px');
        echo $this->GoogleMap->addMarkers($points);
        echo $this->GoogleMap->moveMarkerOnClick('StructureLongitudine','StructureLatitudine');*/
?>
		
	</div>