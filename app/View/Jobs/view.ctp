<div class="jobs view">
<h2><?php  echo __('Job');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($job['Job']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($job['Job']['descripcion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Job'), array('action' => 'edit', $job['Job']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Job'), array('action' => 'delete', $job['Job']['id']), null, __('Are you sure you want to delete # %s?', $job['Job']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Jobs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Patients'), array('controller' => 'patients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient'), array('controller' => 'patients', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Patients');?></h3>
	<?php if (!empty($job['Patient'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Iniciales'); ?></th>
		<th><?php echo __('Fecha Nacimiento'); ?></th>
		<th><?php echo __('Sexo'); ?></th>
		<th><?php echo __('Address Particular Id'); ?></th>
		<th><?php echo __('Address Laboral Id'); ?></th>
		<th><?php echo __('Nro Documento'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Peso'); ?></th>
		<th><?php echo __('Altura'); ?></th>
		<th><?php echo __('Vive'); ?></th>
		<th><?php echo __('Fecha Defuncion'); ?></th>
		<th><?php echo __('Job Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($job['Patient'] as $patient): ?>
		<tr>
			<td><?php echo $patient['id'];?></td>
			<td><?php echo $patient['iniciales'];?></td>
			<td><?php echo $patient['fecha_nacimiento'];?></td>
			<td><?php echo $patient['sexo'];?></td>
			<td><?php echo $patient['address_particular_id'];?></td>
			<td><?php echo $patient['address_laboral_id'];?></td>
			<td><?php echo $patient['nro_documento'];?></td>
			<td><?php echo $patient['created'];?></td>
			<td><?php echo $patient['modified'];?></td>
			<td><?php echo $patient['peso'];?></td>
			<td><?php echo $patient['altura'];?></td>
			<td><?php echo $patient['vive'];?></td>
			<td><?php echo $patient['fecha_defuncion'];?></td>
			<td><?php echo $patient['job_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'patients', 'action' => 'view', $patient['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'patients', 'action' => 'edit', $patient['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'patients', 'action' => 'delete', $patient['id']), null, __('Are you sure you want to delete # %s?', $patient['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Patient'), array('controller' => 'patients', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
