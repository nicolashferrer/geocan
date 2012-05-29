<div class="patients form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Modificar Contrase&ntildea'); ?></legend>
		<?php
			echo $this->Form->input('pass_viejo', array('label' => 'Antigua Password', 'type' => 'password'));
			echo $this->Form->input('password', array('label' => 'Nueva Password'));
			echo $this->Form->input('password_confirm', array('label' => 'Confirmar Password', 'type' => 'password'));
		?>
	</fieldset>
<?php echo $this->Form->end(__('Modificar'));?>
