<div class="groups view">
	<fieldset>
		<legend><?php echo __('Grupo'); ?></legend>
		<dl>
			<dt><?php echo __('Nombre'); ?></dt>
			<dd>
				<?php echo h($group['Group']['name']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Creado'); ?></dt>
			<dd>
				<?php echo h($group['Group']['created']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Modificado'); ?></dt>
			<dd>
				<?php echo h($group['Group']['modified']); ?>
				&nbsp;
			</dd>
		</dl>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Modificar Grupo'), array('action' => 'edit', $group['Group']['id'])); ?> </li>
			</ul>
		</div>
	</fieldset>

	<fieldset>
		<legend><?php echo __('Usuarios'); ?></legend>
		<?php if (!empty($group['User'])):?>
		<table cellpadding = "0" cellspacing = "0">
			<tr>
				<th><?php echo __('Nombre Usuario'); ?></th>
				<th><?php echo __('Medico'); ?></th>
				<th class="actions"></th>
			</tr>
			<?php
				$i = 0;
				foreach ($group['User'] as $user): ?>
				<tr>
					<td><?php echo $user['username'];?>&nbsp;</td>
					<td><?php echo $user['Medic']['nombre'].' '.$user['Medic']['apellido'];?>&nbsp;</td>
					<td class="actions">
						<?php echo $this->Html->link(__('Ver'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
						<?php echo $this->Html->link(__('Modificar'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
						<?php echo $this->Form->postLink(__('Eliminar'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, __('Esta seguro que desea eliminar el usuario %s?', $user['username'])); ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
		<?php endif; ?>

		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'users', 'action' => 'add'));?> </li>
			</ul>
		</div>
	</fieldset>
</div>
