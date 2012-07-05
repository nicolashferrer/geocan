<script>
	$(document).ready(function() { 
	
		$('#btvolver').remove();
		
		$( '#captcha_reload' ).click( function() {
			$( '#captcha_img' ).attr('src', '/users/securimage/' + Math.random()); // Append random number to prevent caching
			$( '#captcha_text' ).val('');
		});
	
	});
	

</script>
<div id="login">
	<fieldset>
		<legend><?php echo __('Ingreso al Sistema'); ?></legend>
		<?php
		echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' =>'login')));
		echo $this->Form->input('User.username',array('label' => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Usuario'));
		echo $this->Form->input('User.password',array('label' => 'Contrase&ntilde;a'));
		echo "<div class=input> <label></label>";
		echo $this->Html->image($this->Html->url(array('controller'=>'users', 'action'=>'captcha'), true),array('style'=>'','vspace'=>2)); 
		echo "</div>";
		echo $this->Form->input('User.captcha',array('autocomplete'=>'off','label'=>'Captcha','class'=>'','error'=>__('Failed validating code',true)));
		echo $this->Form->end('Ingresar');
		?>
	</fieldset>
</div>
