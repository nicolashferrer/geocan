<div class="users index">
	<fieldset>
		<legend><?php echo __('Usuarios'); ?></legend>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('action' => 'add')); ?></li>
			</ul>
		</div>
		<table cellpadding="0" cellspacing="0">
			<tr>
				<th><?php echo $this->Paginator->sort('Nombre Usuario');?></th>
				<th><?php echo $this->Paginator->sort('Grupo');?></th>
				<!-- th><?php echo $this->Paginator->sort('Creado');?></th -->
				<!-- th><?php echo $this->Paginator->sort('Modificado');?></th -->
				<th><?php echo $this->Paginator->sort('Medico');?></th>
				<th class="actions"><?php echo __('Acciones');?></th>
			</tr>
		<?php foreach ($users as $user): ?>
			<tr>
				<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
				<td><?php echo h($user['Group']['name']); ?>&nbsp;</td>
				<!-- td><?php echo h($user['User']['created']); ?>&nbsp;</td -->
				<!-- td><?php echo h($user['User']['modified']); ?>&nbsp;</td -->
				<td><?php echo $user['Medic']['nombre'].' '.$user['Medic']['apellido'];?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $user['User']['id'])); ?>
					<?php echo $this->Html->link(__('Modificar'), array('action' => 'edit', $user['User']['id'])); ?>
					<?php echo $this->Html->link(__('Resetear Password'), array('action' => 'resetPassword', $user['User']['id'], $user['User']['username'])); ?>
					<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $user['User']['id']), null, __('Esta seguro que desea eliminar el usuario %s?', $user['User']['username'])); ?>
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
	</fieldset>
</div>
