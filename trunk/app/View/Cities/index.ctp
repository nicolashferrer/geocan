<div class="cities index">
	<fieldset>
		<legend><?php echo __('Ciudades'); ?></legend>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Nueva Ciudad'), array('action' => 'add')); ?></li>
			</ul>
		</div>
		<table cellpadding="0" cellspacing="0">
		<tr>
				<th><?php echo $this->Paginator->sort('Nombre');?></th>
				<th><?php echo $this->Paginator->sort('Provincia');?></th>
				<th class="actions"></th>
		</tr>
		<?php foreach ($cities as $city): ?>
			<tr>
				<td><?php echo h($city['City']['nombre']); ?>&nbsp;</td>
				<td><?php echo h($city['Province']['nombre']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('Modificar'), array('action' => 'edit', $city['City']['id'])); ?>
					<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $city['City']['id']), null, __('Esta seguro que desea eliminar la ciudad %s?', $city['City']['nombre'])); ?>
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
