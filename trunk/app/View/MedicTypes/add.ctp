<div class="medicTypes form">
<?php echo $this->Form->create('MedicType');?>
	<fieldset>
		<legend><?php echo __('Agregar Tipo de Medico'); ?></legend>
	<?php
		echo $this->Form->input('tipo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Agregar'));?>
</div>
