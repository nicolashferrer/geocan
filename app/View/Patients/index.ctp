<div class="patients index">
	<fieldset>
		<legend><?php echo __('Pacientes'); ?></legend>
		<div class="actions">
			<ul>
				<li>
					<?php echo $this->Html->link(__('Nuevo Paciente'), array('action' => 'add')); ?>
				</li>
			</ul>
		</div>
		<table cellpadding="0" cellspacing="0">
		<tr>
				<th><?php echo $this->Paginator->sort('Iniciales');?></th>
				<th><?php echo $this->Paginator->sort('Fecha Nacimiento');?></th>
				<th><?php echo $this->Paginator->sort('Sexo');?></th>
				<th><?php echo $this->Paginator->sort('Dir. Particular');?></th>
				<th><?php echo $this->Paginator->sort('Dir. Laboral');?></th>
				<th><?php echo $this->Paginator->sort('Edad');?></th>
				<th class="actions"><?php echo __('Acciones');?></th>
		</tr>
		<?php
		foreach ($patients as $patient): ?>
		<tr>
			<td><?php echo h($patient['Patient']['iniciales']); ?>&nbsp;</td>
			<td><?php echo h($patient['Patient']['fecha_nacimiento']); ?>&nbsp;</td>
			<td><?php echo h($patient['Patient']['sexo']); ?>&nbsp;</td>
			<td><?php echo h($patient['Primary']['direccion']); ?>&nbsp;</td>
			<td><?php h($patient['Secondary']['direccion']); ?>&nbsp;</td>
			<td><?php echo h($patient['Patient']['edad']); ?>&nbsp;</td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $patient['Patient']['id'])); ?>
				<?php echo $this->Html->link(__('Modificar'), array('action' => 'edit', $patient['Patient']['id'])); ?>
				<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $patient['Patient']['id']), null, __('Esta seguro que desea eliminar el paciente # %s?', $patient['Patient']['iniciales'])); ?>
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
