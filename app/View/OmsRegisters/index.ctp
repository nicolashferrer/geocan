<div class="omsRegisters index">
	<h2><?php echo __('Oms Registers');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('patient_id');?></th>
			<th><?php echo $this->Paginator->sort('medic_id');?></th>
			<th><?php echo $this->Paginator->sort('address_part_id');?></th>
			<th><?php echo $this->Paginator->sort('address_lab_id');?></th>
			<th><?php echo $this->Paginator->sort('oms_code_id');?></th>
			<th><?php echo $this->Paginator->sort('fecha');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($omsRegisters as $omsRegister): ?>
	<tr>
		<td><?php echo h($omsRegister['OmsRegister']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($omsRegister['Patient']['id'], array('controller' => 'patients', 'action' => 'view', $omsRegister['Patient']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($omsRegister['Medic']['id'], array('controller' => 'medics', 'action' => 'view', $omsRegister['Medic']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($omsRegister['AddressPart']['id'], array('controller' => 'addresses', 'action' => 'view', $omsRegister['AddressPart']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($omsRegister['AddressLab']['id'], array('controller' => 'addresses', 'action' => 'view', $omsRegister['AddressLab']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($omsRegister['OmsCode']['id'], array('controller' => 'oms_codes', 'action' => 'view', $omsRegister['OmsCode']['id'])); ?>
		</td>
		<td><?php echo h($omsRegister['OmsRegister']['fecha']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $omsRegister['OmsRegister']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $omsRegister['OmsRegister']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $omsRegister['OmsRegister']['id']), null, __('Are you sure you want to delete # %s?', $omsRegister['OmsRegister']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Oms Register'), array('action' => 'add')); ?></li>
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
