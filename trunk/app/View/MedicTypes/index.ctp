<div class="medicTypes index">
	<fieldset>
		<legend><?php echo __('Tipos de Medicos'); ?></legend>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Nuevo Tipo de Medico'), array('action' => 'add')); ?></li>
			</ul>
		</div>
		<table cellpadding="0" cellspacing="0">
		<tr>
				<th><?php echo $this->Paginator->sort('tipo');?></th>
				<th class="actions"></th>
		</tr>
		<?php
		foreach ($medicTypes as $medicType): ?>
		<tr>
			<td><?php echo h($medicType['MedicType']['tipo']); ?>&nbsp;</td>
			<td class="actions">
				<?php echo $this->Html->link(__('Modificar'), array('action' => 'edit', $medicType['MedicType']['id'])); ?>
				<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $medicType['MedicType']['id']), null, __('Esta seguro que desea eliminar el tipo de medico %s?', $medicType['MedicType']['tipo'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
		</table>
		<p>
		<?php
		echo $this->Paginator->counter(array(
		'format' => __('Paginas {:page} de {:pages}')
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
