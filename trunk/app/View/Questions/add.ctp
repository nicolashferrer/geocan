<div class="questions form">
<?php echo $this->Form->create('Question');?>
	<fieldset>
		<legend><?php echo __('Agregar Pregunta'); ?></legend>
		<?php
			echo $this->Form->input('descripcion');
			echo $this->Form->input('visible');
		?>
	</fieldset>
<?php echo $this->Form->end(__('Agregar'));?>
</div>
