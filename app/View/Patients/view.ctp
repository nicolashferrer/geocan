<div class="patients view">
<h2><?php  echo __('Paciente');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($patient['Patient']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Iniciales'); ?></dt>
		<dd>
			<?php echo h($patient['Patient']['iniciales']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Nacimiento'); ?></dt>
		<dd>
			<?php echo h($patient['Patient']['fecha_nacimiento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sexo'); ?></dt>
		<dd>
			<?php echo h($patient['Patient']['sexo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dir. Particular'); ?></dt>
		<dd>
			<?php echo $this->Html->link($patient['AddressParticular']['id'], array('controller' => 'addresses', 'action' => 'view', $patient['AddressParticular']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dir. Laboral'); ?></dt>
		<dd>
			<?php echo $this->Html->link($patient['AddressLaboral']['id'], array('controller' => 'addresses', 'action' => 'view', $patient['AddressLaboral']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nro. Documento'); ?></dt>
		<dd>
			<?php echo h($patient['Patient']['nro_documento']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Patient'), array('action' => 'edit', $patient['Patient']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Patient'), array('action' => 'delete', $patient['Patient']['id']), null, __('Are you sure you want to delete # %s?', $patient['Patient']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Patients'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Patient'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('controller' => 'addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Address Particular'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Answers'), array('controller' => 'answers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Answer'), array('controller' => 'answers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Oms Registers'), array('controller' => 'oms_registers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Oms Register'), array('controller' => 'oms_registers', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div class="related">
	<h3><?php echo __('Preguntas');?></h3>
	<?php if (!empty($results)):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Valor'); ?></th>
		<!------------ ACA AGREGAR ACCIONES DE LAS PREGUNTAS
		<th class="actions"><?php echo __('Actions');?></th>
		-->
	</tr>
	<?php
		$i = 0;
		foreach ($results as $question): ?>
		<tr>
			<td><?php echo $question['questions']['descripcion'];?></td>
			<td><?php echo $question['answers']['valor'];?></td>
			<!--------- ACCIONES DE LAS PREG
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'answers', 'action' => 'view', $answer['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'answers', 'action' => 'edit', $answer['id'])); ?>
				<?php echo $this->Form->postLink(__('Borrar'), array('controller' => 'answers', 'action' => 'delete', $answer['id']), null, __('Are you sure you want to delete # %s?', $answer['id'])); ?>
			</td>
			------------------------------------------>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
<div class="related">
	<h3><?php echo __('Registros de OMS');?></h3>
	<?php if (!empty($patient['OmsRegister'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Patient Id'); ?></th>
		<th><?php echo __('Medic Id'); ?></th>
		<th><?php echo __('Address Part Id'); ?></th>
		<th><?php echo __('Address Lab Id'); ?></th>
		<th><?php echo __('Oms Code Id'); ?></th>
		<th><?php echo __('Fecha'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($patient['OmsRegister'] as $omsRegister): ?>
		<tr>
			<td><?php echo $omsRegister['id'];?></td>
			<td><?php echo $omsRegister['patient_id'];?></td>
			<td><?php echo $omsRegister['medic_id'];?></td>
			<td><?php echo $omsRegister['address_part_id'];?></td>
			<td><?php echo $omsRegister['address_lab_id'];?></td>
			<td><?php echo $omsRegister['oms_code_id'];?></td>
			<td><?php echo $omsRegister['fecha'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'oms_registers', 'action' => 'view', $omsRegister['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'oms_registers', 'action' => 'edit', $omsRegister['id'])); ?>
				<?php echo $this->Form->postLink(__('Borrar'), array('controller' => 'oms_registers', 'action' => 'delete', $omsRegister['id']), null, __('Are you sure you want to delete # %s?', $omsRegister['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nuevo OMS'), array('controller' => 'oms_registers', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>