<div class="patients form">
<?php echo $this->Form->create('Patient');?>
	<fieldset>
		<legend><?php echo __('Modificar Contrase&ntildea'); ?></legend>
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('id_viejo', array('label' => 'Antigua Password', 'type' => 'password'));
			echo $this->Form->input('password');
			echo $this->Form->input('password_confirm', array('label' => 'Confirmar Password', 'type' => 'password'));
		?>
	</fieldset>
<?php echo $this->Form->end(__('Modificar'));?>
