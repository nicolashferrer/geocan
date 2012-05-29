<div class="users view">
	<fieldset>
		<legend><?php echo __('Usuario'); ?></legend>
		<dl>
			<dt><?php echo __('Nombre Usuario'); ?></dt>
			<dd>
				<?php echo h($user['User']['username']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Grupo'); ?></dt>
			<dd>
				<?php echo h($user['Group']['name']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Creado'); ?></dt>
			<dd>
				<?php echo h($user['User']['created']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Modificado'); ?></dt>
			<dd>
				<?php echo h($user['User']['modified']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Medico'); ?></dt>
			<dd>
				<?php echo $user['Medic']['nombre'].' '.$user['Medic']['apellido']; ?>
				&nbsp;
			</dd>
		</dl>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Modificar Usuario'), array('action' => 'edit', $user['User']['id'])); ?> </li>
				<li>
					<?php 
						if ($user['group']['name']='administradores')
							echo $this->Html->link(__('Resetear Password'), array('action' => 'resetPassword', $user['User']['id']));
					?>
				</li>
			</ul>
		</div>
	</fieldset>
</div>
