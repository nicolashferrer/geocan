<div class="medics form">
<?php echo $this->Form->create('Medic');?>
	<fieldset>
		<legend><?php echo __('Add Medic'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
		echo $this->Form->input('apellido');
		echo $this->Form->input('matricula');
		echo $this->Form->input('medic_type_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Medics'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Medic Types'), array('controller' => 'medic_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medic Type'), array('controller' => 'medic_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Notes'), array('controller' => 'notes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Note'), array('controller' => 'notes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Oms Registers'), array('controller' => 'oms_registers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Oms Register'), array('controller' => 'oms_registers', 'action' => 'add')); ?> </li>
	</ul>
</div>
