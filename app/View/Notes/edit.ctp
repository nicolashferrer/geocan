<div class="notes form">
<?php echo $this->Form->create('Note');?>
	<fieldset>
		<legend><?php echo __('Editar Nota'); ?></legend>
	<?php
		echo $this->Form->input('id');
		//echo $this->Form->input('medic_id');
		//echo $this->Form->input('oms_register_id');
		//echo $this->Form->input('fecha');
		echo $this->Form->input('descripcion',array('label'=>'Descripci&oacute;n','size' => '100%'));
	?>
	</fieldset>
	<?php echo $this->Form->end(__('Guardar'));?>
</div>
