<div class="notes form">
<?php echo $this->Form->create('Note');?>
	<fieldset>
		<legend><?php echo __('Editar Nota'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('id');
		//echo $this->Form->input('descripcion',array('label'=>'Descripci&oacute;n','size' => '100%'));
		echo $this->Tinymce->input('Note.descripcion', array( 
            'label' => 'Contenido'
            ),array( 
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
