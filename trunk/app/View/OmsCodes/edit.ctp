<div class="omsCodes form">
<?php echo $this->Form->create('OmsCode');?>
	<fieldset>
		<legend><?php echo __('Edit Oms Code'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('codigo');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('padre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('OmsCode.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('OmsCode.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Oms Codes'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Oms Registers'), array('controller' => 'oms_registers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Oms Register'), array('controller' => 'oms_registers', 'action' => 'add')); ?> </li>
	</ul>
</div>
