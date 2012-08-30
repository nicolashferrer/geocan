<div class="jobs index">
	<fieldset>
		<legend><?php echo __('Ocupaciones'); ?></legend>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Nueva Ocupacion'), array('action' => 'add')); ?></li>
			</ul>
		</div>
		<table cellpadding="0" cellspacing="0">
		<tr>
				<th><?php echo $this->Paginator->sort('id');?></th>
				<th><?php echo $this->Paginator->sort('descripcion');?></th>
				<th class="actions"></th>
		</tr>
		<?php
		foreach ($jobs as $job): ?>
			<tr>
				<td><?php echo h($job['Job']['id']); ?>&nbsp;</td>
				<td><?php echo h($job['Job']['descripcion']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('Modificar'), array('action' => 'edit', $job['Job']['id'])); ?>
					<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $job['Job']['id']), null, __('Esta seguro que desea eliminar la ocupacion # %s?', $job['Job']['descripcion'])); ?>
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

