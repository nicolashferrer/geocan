<div class="medics index">
	<h2><?php echo __('Medics');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('nombre');?></th>
			<th><?php echo $this->Paginator->sort('apellido');?></th>
			<th><?php echo $this->Paginator->sort('matricula');?></th>
			<th><?php echo $this->Paginator->sort('medic_type_id');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($medics as $medic): ?>
	<tr>
		<td><?php echo h($medic['Medic']['id']); ?>&nbsp;</td>
		<td><?php echo h($medic['Medic']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($medic['Medic']['apellido']); ?>&nbsp;</td>
		<td><?php echo h($medic['Medic']['matricula']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($medic['MedicType']['id'], array('controller' => 'medic_types', 'action' => 'view', $medic['MedicType']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $medic['Medic']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $medic['Medic']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $medic['Medic']['id']), null, __('Are you sure you want to delete # %s?', $medic['Medic']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Medic'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Medic Types'), array('controller' => 'medic_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medic Type'), array('controller' => 'medic_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Notes'), array('controller' => 'notes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Note'), array('controller' => 'notes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Oms Registers'), array('controller' => 'oms_registers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Oms Register'), array('controller' => 'oms_registers', 'action' => 'add')); ?> </li>
	</ul>
</div>
