<div class="medics view">
<h2><?php  echo __('Medic');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($medic['Medic']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($medic['Medic']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Apellido'); ?></dt>
		<dd>
			<?php echo h($medic['Medic']['apellido']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Matricula'); ?></dt>
		<dd>
			<?php echo h($medic['Medic']['matricula']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Medic Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($medic['MedicType']['id'], array('controller' => 'medic_types', 'action' => 'view', $medic['MedicType']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Medic'), array('action' => 'edit', $medic['Medic']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Medic'), array('action' => 'delete', $medic['Medic']['id']), null, __('Are you sure you want to delete # %s?', $medic['Medic']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Medics'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medic'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Medic Types'), array('controller' => 'medic_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medic Type'), array('controller' => 'medic_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Notes'), array('controller' => 'notes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Note'), array('controller' => 'notes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Oms Registers'), array('controller' => 'oms_registers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Oms Register'), array('controller' => 'oms_registers', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Notes');?></h3>
	<?php if (!empty($medic['Note'])):?>
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
		foreach ($medic['Note'] as $note): ?>
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
<div class="related">
	<h3><?php echo __('Related Oms Registers');?></h3>
	<?php if (!empty($medic['OmsRegister'])):?>
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
		foreach ($medic['OmsRegister'] as $omsRegister): ?>
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
