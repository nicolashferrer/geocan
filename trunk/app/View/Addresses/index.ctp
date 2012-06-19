<div class="addresses index">
	<h2><?php echo __('Direcciones');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('city_id');?></th>
			<th><?php echo $this->Paginator->sort('latitud');?></th>
			<th><?php echo $this->Paginator->sort('longitud');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($addresses as $address): ?>
	<tr>
		<td><?php echo h($address['Address']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($address['City']['id'], array('controller' => 'cities', 'action' => 'view', $address['City']['id'])); ?>
		</td>
		<td><?php echo h($address['Address']['latitud']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['longitud']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $address['Address']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $address['Address']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $address['Address']['id']), null, __('Are you sure you want to delete # %s?', $address['Address']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	<?php
		$default = array('type'=>'0','zoom'=>13,'lat'=>'42.5846353751749','long'=>'11.5191650390625');
		echo $this->GoogleMapV3->map();
		foreach ($addresses as $address){
		$markerOptions= array(
			'id'=>$address['Address']['id'],								//Id of the marker
			'latitude'=>$address['Address']['latitud'],		//Latitude of the marker
			'longitude'=>$address['Address']['longitud'],		//Longitude of the marker
			'markerIcon'=>'http://google-maps-icons.googlecode.com/files/home.png', //Custom icon
			'shadowIcon'=>'http://google-maps-icons.googlecode.com/files/home.png', //Custom shadow
			'infoWindow'=>true,					//Boolean to show an information window when you click the marker or not
			'windowText'=>$address['Address']['direccion']				//Default text inside the information window
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
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Address'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
	</ul>
</div>
