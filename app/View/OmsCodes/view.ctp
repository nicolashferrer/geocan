<div class="omsCodes view">
<h2><?php  echo __('Oms Code');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($omsCode['OmsCode']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Codigo'); ?></dt>
		<dd>
			<?php echo h($omsCode['OmsCode']['codigo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($omsCode['OmsCode']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Padre'); ?></dt>
		<dd>
			<?php echo h($omsCode['OmsCode']['padre']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Oms Code'), array('action' => 'edit', $omsCode['OmsCode']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Oms Code'), array('action' => 'delete', $omsCode['OmsCode']['id']), null, __('Are you sure you want to delete # %s?', $omsCode['OmsCode']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Oms Codes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Oms Code'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Oms Registers'), array('controller' => 'oms_registers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Oms Register'), array('controller' => 'oms_registers', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Oms Registers');?></h3>
	<?php if (!empty($omsCode['OmsRegister'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Patient Id'); ?></th>
		<th><?php echo __('Medic Id'); ?></th>
		<th><?php echo __('Address Part Id'); ?></th>
		<th><?php echo __('Address Lab Id'); ?></th>
		<th><?php echo __('Oms Code Id'); ?></th>
		<th><?php echo __('Fecha'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($omsCode['OmsRegister'] as $omsRegister): ?>
		<tr>
			<td><?php echo $omsRegister['id'];?></td>
			<td><?php echo $omsRegister['patient_id'];?></td>
			<td><?php echo $omsRegister['medic_id'];?></td>
			<td><?php echo $omsRegister['address_part_id'];?></td>
			<td><?php echo $omsRegister['address_lab_id'];?></td>
			<td><?php echo $omsRegister['oms_code_id'];?></td>
			<td><?php echo $omsRegister['fecha'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'oms_registers', 'action' => 'view', $omsRegister['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'oms_registers', 'action' => 'edit', $omsRegister['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'oms_registers', 'action' => 'delete', $omsRegister['id']), null, __('Are you sure you want to delete # %s?', $omsRegister['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Oms Register'), array('controller' => 'oms_registers', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
