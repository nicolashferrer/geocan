<div class="omsRegisters view">
	<fieldset>
	<legend><?php echo __('Oms'); ?></legend>
		<dl>
			<dt><?php echo __('Paciente'); ?></dt>
			<dd>
				<?php echo $this->Html->link($omsRegister['Patient']['iniciales'], array('controller' => 'patients', 'action' => 'view', $omsRegister['Patient']['id'])); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Médico'); ?></dt>
			<dd>
				<?php echo $this->Html->link($omsRegister['Medic']['nombrecompleto'], array('controller' => 'medics', 'action' => 'view', $omsRegister['Medic']['id'])); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Dirección particular'); ?></dt>
			<dd>
				<?php echo $this->Html->link($omsRegister['AddressPart']['id'], array('controller' => 'addresses', 'action' => 'view', $omsRegister['AddressPart']['id'])); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Dirección laboral'); ?></dt>
			<dd>
				<?php echo $this->Html->link($omsRegister['AddressLab']['id'], array('controller' => 'addresses', 'action' => 'view', $omsRegister['AddressLab']['id'])); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Código Oms'); ?></dt>
			<dd>
				<?php echo $this->Html->link($omsRegister['OmsCode']['codigo'], array('controller' => 'oms_codes', 'action' => 'view', $omsRegister['OmsCode']['id'])); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Fecha'); ?></dt>
			<dd>
				<?php echo h($omsRegister['OmsRegister']['fecha']); ?>
				&nbsp;
			</dd>
		</dl>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Editar Oms'), array('action' => 'edit', $omsRegister['OmsRegister']['id'])); ?> </li>
			</ul>
		</div>
	</fieldset>

	<fieldset>
	<legend><?php echo __('Notas'); ?></legend>
		<?php if (!empty($omsRegister['Note'])):?>
		<table cellpadding = "0" cellspacing = "0">
		<tr>
			<th><?php echo __('Fecha'); ?></th>
			<th><?php echo __('Descripcion'); ?></th>
			<th class="actions"><?php echo __('Actions');?></th>
		</tr>
		<?php
			$i = 0;
			foreach ($omsRegister['Note'] as $note): ?>
			<tr>
				<td><?php echo $note['fecha'];?></td>
				<td><?php echo $note['descripcion'];?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('Ver'), array('controller' => 'notes', 'action' => 'view', $note['id'])); ?>
					<?php echo $this->Html->link(__('Editar'), array('controller' => 'notes', 'action' => 'edit', $note['id'])); ?>
					<?php echo $this->Form->postLink(__('Borrar'), array('controller' => 'notes', 'action' => 'delete', $note['id']), null, __('Está seguro que desea borrar la nota?', $note['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nueva nota'), array('controller' => 'notes', 'action' => 'add', $omsRegister['OmsRegister']['id'])); ?></li>
		</ul>
	</div>
</fieldset>
</div>


	
</div>