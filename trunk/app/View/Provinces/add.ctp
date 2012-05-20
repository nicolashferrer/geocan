<div class="provinces form">
<?php echo $this->Form->create('Province');?>
	<fieldset>
		<legend><?php echo __('Agregar Provincia'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Agregar'));?>
</div>

