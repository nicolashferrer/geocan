<div class="notes form">

<?php echo $this->Form->create('Note');?>

	<fieldset>
		<legend><?php echo __('Agregar nota'); ?></legend>
	<?php
		
		echo $this->Form->hidden('Note.oms_register_id',array('value'=>$id));
		
		if ($auth['group_id']!=2) {
			echo $this->Form->input('medic_id',array('label'=>'M&eacute;dico'));
		} else {
			echo "<div><label class='label_radio required'>M&eacute;dico</label>".$medic['Medic']['nombrecompleto']."</div>";
			echo $this->Form->hidden('medic_id',array('value'=>$auth['medic_id']));
		}
				
		echo $this->Tinymce->input('Note.descripcion', 
			array( 
				'label' => 'Contenido'
            ),
			array( 
                'language'=>'es',
				'width'=>'100%',
				'height'=>300
            ), 
            'basic' 
        ); 
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar'));?>
</div>