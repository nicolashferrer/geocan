
<div class="patients index">
	<h2><?php echo __('Patients');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('iniciales');?></th>
			<th><?php echo $this->Paginator->sort('fecha_nacimiento');?></th>
			<th><?php echo $this->Paginator->sort('sexo');?></th>
			<th><?php echo $this->Paginator->sort('address_particular_id');?></th>
			<th><?php echo $this->Paginator->sort('address_laboral_id');?></th>
			
			<th><?php echo $this->Paginator->sort('edad');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($result as $patient): ?>
	<tr>
		<td><?php echo h($patient['Patient']['id']); ?>&nbsp;</td>
		<td><?php echo h($patient['Patient']['iniciales']); ?>&nbsp;</td>
		<td><?php echo h($patient['Patient']['fecha_nacimiento']); ?>&nbsp;</td>
		<td><?php echo h($patient['Patient']['sexo']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($patient['Primary']['id'], array('controller' => 'addresses', 'action' => 'view', $patient['Primary']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($patient['Secondary']['id'], array('controller' => 'addresses', 'action' => 'view', $patient['Secondary']['id'])); ?>
		</td>
		
		<td><?php echo h($patient['Patient']['edad']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $patient['Patient']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $patient['Patient']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $patient['Patient']['id']), null, __('Are you sure you want to delete # %s?', $patient['Patient']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} de {:pages}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
