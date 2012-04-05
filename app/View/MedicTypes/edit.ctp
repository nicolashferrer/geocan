<div class="medicTypes form">
<?php echo $this->Form->create('MedicType');?>
	<fieldset>
		<legend><?php echo __('Edit Medic Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tipo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('MedicType.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('MedicType.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Medic Types'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Medics'), array('controller' => 'medics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medic'), array('controller' => 'medics', 'action' => 'add')); ?> </li>
	</ul>
</div>
