<div class="medics form">
<?php echo $this->Form->create('Medic');?>
	<fieldset>
		<legend><?php echo __('Editar Medico'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('apellido');
		echo $this->Form->input('matricula');
		echo $this->Form->input('medic_type_id',array('label'=>'Tipo de Medico'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Modificar'));?>
</div>
