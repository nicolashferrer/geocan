<div class="notes form">
<?php  echo $this->Form->create('Note');?>
	<fieldset>
		<legend><?php echo __('Editar Nota'); ?></legend>
	<?php
		echo "<div><label class='label_radio required'>M&eacute;dico</label>".$this->request->data['Medic']['nombrecompleto']."</div>";
		echo $this->Form->hidden('medic_id',array('value'=>$auth['medic_id']));
		echo $this->Form->hidden('Medic.nombrecompleto',array('value'=>$this->request->data['Medic']['nombrecompleto']));
		echo $this->Form->input('id');
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
