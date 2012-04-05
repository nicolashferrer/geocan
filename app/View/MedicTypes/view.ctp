<div class="medicTypes view">
<h2><?php  echo __('Medic Type');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($medicType['MedicType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($medicType['MedicType']['tipo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Medic Type'), array('action' => 'edit', $medicType['MedicType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Medic Type'), array('action' => 'delete', $medicType['MedicType']['id']), null, __('Are you sure you want to delete # %s?', $medicType['MedicType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Medic Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medic Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Medics'), array('controller' => 'medics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medic'), array('controller' => 'medics', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Medics');?></h3>
	<?php if (!empty($medicType['Medic'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Apellido'); ?></th>
		<th><?php echo __('Matricula'); ?></th>
		<th><?php echo __('Medic Type Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($medicType['Medic'] as $medic): ?>
		<tr>
			<td><?php echo $medic['id'];?></td>
			<td><?php echo $medic['nombre'];?></td>
			<td><?php echo $medic['apellido'];?></td>
			<td><?php echo $medic['matricula'];?></td>
			<td><?php echo $medic['medic_type_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'medics', 'action' => 'view', $medic['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'medics', 'action' => 'edit', $medic['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'medics', 'action' => 'delete', $medic['id']), null, __('Are you sure you want to delete # %s?', $medic['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Medic'), array('controller' => 'medics', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
