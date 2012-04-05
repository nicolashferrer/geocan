<div class="medicTypes form">
<?php echo $this->Form->create('MedicType');?>
	<fieldset>
		<legend><?php echo __('Add Medic Type'); ?></legend>
	<?php
		echo $this->Form->input('tipo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Medic Types'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Medics'), array('controller' => 'medics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medic'), array('controller' => 'medics', 'action' => 'add')); ?> </li>
	</ul>
</div>
