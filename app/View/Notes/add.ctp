<div class="notes form">

<?php echo $this->Form->create('Note');?>

	<fieldset>
		<legend><?php echo __('Agregar nota'); ?></legend>
	<?php
		
		echo $this->Form->hidden('Note.oms_register_id',array('value'=>$id));
		echo $this->Form->input('medic_id',array('label'=>'M&eacute;dico'));
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