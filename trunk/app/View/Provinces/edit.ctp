<div class="provinces form">
<?php echo $this->Form->create('Province');?>
	<fieldset>
		<legend><?php echo __('Modificar Provincia'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Modificar'));?>
</div>
