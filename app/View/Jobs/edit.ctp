<div class="jobs form">
<?php echo $this->Form->create('Job');?>
	<fieldset>
		<legend><?php echo __('Modificar Ocupacion'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('descripcion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Modificar'));?>
</div>
