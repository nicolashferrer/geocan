<div class="groups form">
<?php echo $this->Form->create('Group');?>
	<fieldset>
		<legend><?php echo __('Agregar Grupo'); ?></legend>
		<?php
			echo $this->Form->input('name',array('label'=>'Nombre'));
		?>
	</fieldset>
<?php echo $this->Form->end(__('Agregar'));?>
</div>
