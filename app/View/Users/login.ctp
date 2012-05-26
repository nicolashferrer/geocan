<div id="login">
	<fieldset>
		<legend><?php echo __('Ingreso al Sistema'); ?></legend>
		<?php
		echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' =>'login')));
		echo $this->Form->input('User.username',array('label' => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Usuario'));
		echo $this->Form->input('User.password',array('label' => 'Contrase&ntilde;a'));
		echo $this->Form->end('Ingresar');
		?>
	</fieldset>
</div>
