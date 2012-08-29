<div class="jobs form">
<?php echo $this->Form->create('Job');?>
	<fieldset>
		<legend><?php echo __('Nuevo Trabajo'); ?></legend>
	<?php
		echo $this->Form->input('descripcion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Agregar'));?>
</div>
