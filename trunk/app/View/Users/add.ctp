<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Agregar Usuario'); ?></legend>
	<?php
		echo $this->Form->input('username',array('label'=>'Nombre Usuario'));
		echo $this->Form->input('password',array('label'=>'Contrase&ntildea'));
		echo $this->Form->input('group_id',array('label'=>'Grupo'));
		echo $this->Form->input('medic_id',array('label'=>'Medico'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Agregar'));?>
