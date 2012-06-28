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