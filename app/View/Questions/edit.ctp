<div class="questions form">
<?php echo $this->Form->create('Question');?>
	<fieldset>
		<legend><?php echo __('Editar Pregunta'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('visible');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Modificar'));?>
</div>

