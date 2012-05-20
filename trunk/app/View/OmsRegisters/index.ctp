<div class="omsRegisters index">
	<h2><?php echo __('Registros OMS');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('patient_id');?></th>
			<th><?php echo $this->Paginator->sort('medic_id');?></th>
			<th><?php echo $this->Paginator->sort('address_part_id');?></th>
			<th><?php echo $this->Paginator->sort('address_lab_id');?></th>
			<th><?php echo $this->Paginator->sort('oms_code_id');?></th>
			<th><?php echo $this->Paginator->sort('fecha');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($omsRegisters as $omsRegister): ?>
	<tr>
		<td><?php echo h($omsRegister['OmsRegister']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($omsRegister['Patient']['id'], array('controller' => 'patients', 'action' => 'view', $omsRegister['Patient']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($omsRegister['Medic']['id'], array('controller' => 'medics', 'action' => 'view', $omsRegister['Medic']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($omsRegister['Primary']['id'], array('controller' => 'addresses', 'action' => 'view', $omsRegister['Primary']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($omsRegister['Secondary']['id'], array('controller' => 'addresses', 'action' => 'view', $omsRegister['Secondary']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($omsRegister['OmsCode']['id'], array('controller' => 'oms_codes', 'action' => 'view', $omsRegister['OmsCode']['id'])); ?>
		</td>
		<td><?php echo h($omsRegister['OmsRegister']['fecha']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $omsRegister['OmsRegister']['id'])); ?>
			<?php echo $this->Html->link(__('Modificar'), array('action' => 'edit', $omsRegister['OmsRegister']['id'])); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $omsRegister['OmsRegister']['id']), null, __('Are you sure you want to delete # %s?', $omsRegister['OmsRegister']['id'])); ?>
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
</div>
