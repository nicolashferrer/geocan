<div class="provinces index">
	<fieldset>
		<legend><?php echo __('Provincias'); ?></legend>
		<div class="actions">
			<ul>
				<li>
					<?php echo $this->Html->link(__('Nueva Provincia'), array('action' => 'add')); ?>
				</li>
			</ul>
		</div>
		<table cellpadding="0" cellspacing="0">
			<tr>
				<th><?php echo $this->Paginator->sort('nombre');?></th>
				<th class="actions"><?php echo __('Acciones');?></th>
			</tr>
			<?php foreach ($provinces as $province): ?>
				<tr>
					<td><?php echo h($province['Province']['nombre']); ?>&nbsp;</td>
					<td class="actions">
						<?php echo $this->Html->link(__('Modificar'), array('action' => 'edit', $province['Province']['id'])); ?>
						<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $province['Province']['id']), null, __('Esta seguro que desea eliminar la provincia # %s?', $province['Province']['nombre'])); ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
		
		<p>
			<?php
			echo $this->Paginator->counter(array(
			'format' => __('Pagina {:page} de {:pages}')
			));	?>
		</p>

		<div class="paging">
		<?php
			echo $this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
			echo $this->Paginator->numbers(array('separator' => ''));
			echo $this->Paginator->next(__('siguiente') . ' >', array(), null, array('class' => 'next disabled'));
		?>
		</div>
	</fieldset>
</div>