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
				<th><?php echo $this->Paginator->sort('User.username','Nombre Usuario');?></th>
				<th><?php echo $this->Paginator->sort('Group.name','Grupo');?></th>
				<th><?php echo $this->Paginator->sort('User.blocked','Habilitado');?></th>
				<th><?php echo $this->Paginator->sort('Medic.nombrecompleto',utf8_encode('M�dico'));?></th>
				<th class="actions"></th>
			</tr>
		<?php foreach ($users as $user): ?>
			<tr>
				<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
				<td><?php echo h($user['Group']['name']); ?>&nbsp;</td>
				<td><?php 
						
						if ($user['User']['blocked']==1) {
							echo "No";
							$val = 0;
							$textoBoton = "Habilitar";
						} else {
							echo "Si";
							$val = 1;
							$textoBoton = "Deshabilitar";
						}
				
				
				
						//echo h($user['User']['blocked']); 
					
					
					?>&nbsp;</td>
				<!-- td><?php echo h($user['User']['created']); ?>&nbsp;</td -->
				<!-- td><?php echo h($user['User']['modified']); ?>&nbsp;</td -->
				<td><?php echo $user['Medic']['nombre'].' '.$user['Medic']['apellido'];?>&nbsp;</td>
				<td class="actions">
					<?php //echo $this->Html->image('view.png', array('url' =>  array('action' => 'view', $user['User']['id']),'border' => '0','escape' => false, 'align' => 'center'))?>
					<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $user['User']['id'])); ?>
					<?php //echo $this->Html->image('edit.png', array('url' => array('action' => 'edit', $user['User']['id']),'border' => '0','escape' => false, 'align' => 'center')); ?>
					<?php echo $this->Html->link(__('Modificar'), array('action' => 'edit', $user['User']['id'])); ?>
					<?php echo $this->Html->link(__($textoBoton), array('action' => 'cambiarBlocked', $user['User']['id'],$val)); ?>
					<?php echo $this->Html->link(__('Resetear Password'), array('action' => 'resetPassword', $user['User']['id'])); ?>
					<?php //echo $this->Html->link($this->Html->image('delete.png', array('border' => '0','align' => 'center')), array('action' => 'delete', $user['User']['id']), array('escape' => false) , sprintf(__('Esta seguro que desea eliminar el usuario %s?', true), $user['User']['username'])); ?>
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
