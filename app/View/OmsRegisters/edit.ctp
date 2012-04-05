<div class="omsRegisters form">
<?php echo $this->Form->create('OmsRegister');?>
	<fieldset>
		<legend><?php echo __('Edit Oms Register'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('patient_id');
		echo $this->Form->input('medic_id');
		echo $this->Form->input('address_part_id');
		echo $this->Form->input('address_lab_id');
		echo $this->Form->input('oms_code_id');
		echo $this->Form->input('fecha');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('OmsRegister.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('OmsRegister.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Oms Registers'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Patients'), array('controller' => 'patients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient'), array('controller' => 'patients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Medics'), array('controller' => 'medics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medic'), array('controller' => 'medics', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('controller' => 'addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Address Part'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Oms Codes'), array('controller' => 'oms_codes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Oms Code'), array('controller' => 'oms_codes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Notes'), array('controller' => 'notes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Note'), array('controller' => 'notes', 'action' => 'add')); ?> </li>
	</ul>
</div>
