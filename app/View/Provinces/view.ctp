<div class="provinces view">
<h2><?php  echo __('Province');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($province['Province']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($province['Province']['nombre']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Province'), array('action' => 'edit', $province['Province']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Province'), array('action' => 'delete', $province['Province']['id']), null, __('Are you sure you want to delete # %s?', $province['Province']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Provinces'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Province'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Cities');?></h3>
	<?php if (!empty($province['City'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Province Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($province['City'] as $city): ?>
		<tr>
			<td><?php echo $city['id'];?></td>
			<td><?php echo $city['nombre'];?></td>
			<td><?php echo $city['province_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'cities', 'action' => 'view', $city['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'cities', 'action' => 'edit', $city['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'cities', 'action' => 'delete', $city['id']), null, __('Are you sure you want to delete # %s?', $city['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New City'), array('controller' => 'cities', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
