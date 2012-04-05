<div class="omsRegisters view">
<h2><?php  echo __('Oms Register');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($omsRegister['OmsRegister']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patient'); ?></dt>
		<dd>
			<?php echo $this->Html->link($omsRegister['Patient']['id'], array('controller' => 'patients', 'action' => 'view', $omsRegister['Patient']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Medic'); ?></dt>
		<dd>
			<?php echo $this->Html->link($omsRegister['Medic']['id'], array('controller' => 'medics', 'action' => 'view', $omsRegister['Medic']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address Part'); ?></dt>
		<dd>
			<?php echo $this->Html->link($omsRegister['AddressPart']['id'], array('controller' => 'addresses', 'action' => 'view', $omsRegister['AddressPart']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address Lab'); ?></dt>
		<dd>
			<?php echo $this->Html->link($omsRegister['AddressLab']['id'], array('controller' => 'addresses', 'action' => 'view', $omsRegister['AddressLab']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Oms Code'); ?></dt>
		<dd>
			<?php echo $this->Html->link($omsRegister['OmsCode']['id'], array('controller' => 'oms_codes', 'action' => 'view', $omsRegister['OmsCode']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha'); ?></dt>
		<dd>
			<?php echo h($omsRegister['OmsRegister']['fecha']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Oms Register'), array('action' => 'edit', $omsRegister['OmsRegister']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Oms Register'), array('action' => 'delete', $omsRegister['OmsRegister']['id']), null, __('Are you sure you want to delete # %s?', $omsRegister['OmsRegister']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Oms Registers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Oms Register'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Notes');?></h3>
	<?php if (!empty($omsRegister['Note'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Medic Id'); ?></th>
		<th><?php echo __('Oms Register Id'); ?></th>
		<th><?php echo __('Fecha'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($omsRegister['Note'] as $note): ?>
		<tr>
			<td><?php echo $note['id'];?></td>
			<td><?php echo $note['medic_id'];?></td>
			<td><?php echo $note['oms_register_id'];?></td>
			<td><?php echo $note['fecha'];?></td>
			<td><?php echo $note['descripcion'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'notes', 'action' => 'view', $note['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'notes', 'action' => 'edit', $note['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'notes', 'action' => 'delete', $note['id']), null, __('Are you sure you want to delete # %s?', $note['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Note'), array('controller' => 'notes', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
