<div class="groups index">
	<fieldset>
		<legend><?php echo __('Grupos'); ?></legend>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Nuevo Grupo'), array('action' => 'add')); ?></li>
			</ul>
		</div>
		<table cellpadding="0" cellspacing="0">
		<tr>
				<th><?php echo $this->Paginator->sort('Group.name','Nombre');?></th>
				<th class="actions"></th>
		</tr>
		<?php foreach ($groups as $group): ?>
			<tr>
				<td><?php echo h($group['Group']['name']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $group['Group']['id'])); ?>
					<?php echo $this->Html->link(__('Modificar'), array('action' => 'edit', $group['Group']['id'])); ?>
					<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $group['Group']['id']), null, __('Esta seguro que desea eliminar el grupo %s?', $group['Group']['name'])); ?>
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
