<script type="text/javascript">
	
$(document).ready(function() {
	$('.password').addClass("required");
});

</script>
<div class="patients form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Modificar Contrase&ntildea'); ?></legend>
		<?php
			echo $this->Form->input('pass_viejo', array(
					'label' => 'Antigua Contraseña',
					'type' => 'password'
				)
			);
			echo $this->Form->input('password', array(
					'label' => 'Nueva Contraseña'
				)
			);
			echo $this->Form->input('password_confirm', array(
					'label' => 'Confirmar Contraseña', 
					'type' => 'password'
				)
			);
		?>
	</fieldset>
<?php echo $this->Form->end(__('Modificar'));?>
