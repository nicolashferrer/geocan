<div class="medics index">
	<fieldset>
		<legend><?php echo __('Medicos'); ?></legend>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Nuevo Medico'), array('action' => 'add')); ?></li>
			</ul>
		</div>
		<table cellpadding="0" cellspacing="0">
		<tr>
				<th><?php echo $this->Paginator->sort('nombre');?></th>
				<th><?php echo $this->Paginator->sort('apellido');?></th>
				<th><?php echo $this->Paginator->sort('matricula');?></th>
				<th><?php echo $this->Paginator->sort('MedicType.tipo','Tipo de Medico');?></th>
				<th class="actions"></th>
		</tr>
		<?php
		foreach ($medics as $medic): ?>
		<tr>
			<td><?php echo h($medic['Medic']['nombre']); ?>&nbsp;</td>
			<td><?php echo h($medic['Medic']['apellido']); ?>&nbsp;</td>
			<td><?php echo h($medic['Medic']['matricula']); ?>&nbsp;</td>
			<td>
				<?php echo h($medic['MedicType']['tipo']); ?>
			</td>
			<td class="actions">
				<?php echo $this->Html->link(__('Modificar'), array('action' => 'edit', $medic['Medic']['id'])); ?>
				<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $medic['Medic']['id']), null, __('Esta seguro que desea eliminar el medico %s %s?', $medic['Medic']['nombre'],$medic['Medic']['apellido'])); ?>
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
