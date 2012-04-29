<div class="patients view">
	<fieldset>
		<legend><?php echo __('Paciente'); ?></legend>
			<dl>
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
					<?php echo h($patient['Primary']['direccion']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Dir. Laboral'); ?></dt>
				<dd>
					<?php echo h($patient['Secondary']['direccion']); ?>
					&nbsp;
				</dd>
			</dl>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Editar Paciente'), array('action' => 'edit', $patient['Patient']['id'])); ?> </li>
			</ul>
		</div>
	</fieldset>


	<fieldset>
		<legend><?php echo __('Preguntas'); ?></legend>
			<?php if (!empty($results)):?>
			<table cellpadding = "0" cellspacing = "0">
			<tr>
				<th><?php echo __('Descripcion'); ?></th>
				<th><?php echo __('Respuesta'); ?></th>

				<th class="actions"><?php echo __('Acciones');?></th>

			</tr>
			<?php
				$i = 0;
				foreach ($results as $question):?>
				<tr>
					<td><?php echo $question['questions']['descripcion'];?></td>
					<td><?php if ($question['answers']['valor'] == 'true')
									echo 'Si';
							  elseif ($question['answers']['valor'] == 'false')
									echo 'No'; 
							  else 	
									echo 'No contesto' ?></td>
					<td class="actions">
						<?php echo $this->Html->link(__('Editar'), array('controller' => 'answers', 'action' => 'edit', $question['answers']['id'])); ?>
					</td>
				</tr>
			<?php endforeach; ?>
			</table>
	</fieldset>
<?php endif; ?>


	<fieldset>
		<legend><?php echo __('Registros de OMS'); ?></legend>
			<?php if (!empty($patient['OmsRegister'])):?>
				<table cellpadding = "0" cellspacing = "0">
				<tr>
					<th><?php echo __('Medico'); ?></th>
					<th><?php echo __('Dir. Particular'); ?></th>
					<th><?php echo __('Dir. Laboral'); ?></th>
					<th><?php echo __('Codigo OMS'); ?></th>
					<th><?php echo __('Fecha'); ?></th>
					<th class="actions"><?php echo __('Actions');?></th>
				</tr>
				<?php
					$i = 0;
					foreach ($patient['OmsRegister'] as $omsRegister): ?>
					<tr>
						<td><?php echo $omsRegister['Medic']['nombre'].' '.$omsRegister['Medic']['apellido']; ?></td>
						<td><?php echo $omsRegister['AddressPart']['direccion'];?></td>
						<td><?php echo $omsRegister['AddressLab']['direccion'];?></td>
						<td><?php echo $omsRegister['Oms']['codigo'];?></td>
						<td><?php echo $omsRegister['fecha'];?></td>
						<td class="actions">
							<?php echo $this->Html->link(__('Ver'), array('controller' => 'oms_registers', 'action' => 'view', $omsRegister['id'])); ?>
							<?php echo $this->Html->link(__('Editar'), array('controller' => 'oms_registers', 'action' => 'edit', $omsRegister['id'])); ?>
							<?php echo $this->Form->postLink(__('Borrar'), array('controller' => 'oms_registers', 'action' => 'delete', $omsRegister['id']), null, __('Esta usted seguro que desea eliminar # %s?', $omsRegister['id'])); ?>
						</td>
					</tr>
					<?php endforeach; ?>
				</table>
			<?php endif; ?>

		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Nuevo OMS'), array('controller' => 'oms_registers', 'action' => 'add',$patient['Patient']['id']));?> </li>
			</ul>
		</div>
	</fieldset>

</div>