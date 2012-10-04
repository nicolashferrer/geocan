<div class="questions form">
<?php echo $this->Form->create('Question');?>
	<fieldset>
		<legend><?php echo __('Editar Pregunta'); ?></legend>
	<?php
		echo $this->Form->input('id');
		
		//Si es admin, puede cambiar la pregunta, sino el campo es readonly
		if ($auth['group_id']==1) {
			echo $this->Form->input('descripcion');
		} else {
			echo $this->Form->input('descripcion',array('readonly' => 'readonly'));
		}
		
		echo $this->Form->input('visible');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Modificar'));?>
</div>

