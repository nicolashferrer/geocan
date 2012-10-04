<?php

	//debug($patient);
	
	function calcularEdad2($fechaNacimiento,$fechaDefuncion)
	
		{
		//	$fecha1 = new DateTime($fechaNacimiento);
			echo $fechaNacimiento;

			$diff = abs(strtotime($fechaDefuncion) - strtotime($fechaNacimiento)); 
			
			return floor($diff / (365*60*60*24)); 
		}
		
		function calcularEdad($fechaNacimiento,$fechaDefuncion)
		{
			list($day,$month,$year) = explode("/",$fechaNacimiento);
			list($day2,$month2,$year2) = explode("/",$fechaDefuncion);
			
			
			$year_diff = abs($year2 - $year);
			$month_diff = abs($month2 - $month);
			$day_diff = abs($day2 - $day);
			if ($month_diff < 0) $year_diff--;
			elseif (($month_diff==0) && ($day_diff < 0)) $year_diff--;
			return $year_diff;
		}
						 

?>

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
				<dt><?php echo __('Edad'); ?></dt>
				<dd>
					<?php
						 if ($patient['Patient']['vive'] == 1) {
							echo $patient['Patient']['edad'];
						}
						  else {
						  	
							if (!empty($patient['Patient']['fecha_defuncion'])) {
								echo calcularEdad($patient['Patient']['fecha_nacimiento'],$patient['Patient']['fecha_defuncion']); 	
							}  else {
								echo 'Desconocida';	
							}
														   
						}
					 
					 
					 ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Sexo'); ?></dt>
				<dd>
					<?php if ($patient['Patient']['sexo'] == 'M')
							echo 'Masculino';
						  else
							echo 'Femenino'; ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Peso'); ?></dt>
				<dd>
					<?php echo h($patient['Patient']['peso']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Altura'); ?></dt>
				<dd>
					<?php echo h($patient['Patient']['altura']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Superficie Corporal'); ?></dt>
				<dd>
					<?php 
						
						// Paso la altura de metros a centimetros...
						$altura = $patient['Patient']['altura']*100;
						
						$peso = $patient['Patient']['peso'];
						
						$sup = sqrt(($altura * $peso)/3600);
					
						echo round($sup, 3);
					
					
					
					?>
					&nbsp;
				</dd>
				<dt><?php echo __('&Iacute;ndice masa corporal'); ?></dt>
				<dd>
					<?php 
					
						$alturacuadrado = pow($patient['Patient']['altura'],2);
					
						if ($alturacuadrado == 0) {
							
							 echo 0;
							
						} else {
						
							$masa = $patient['Patient']['peso'];
							
							$indice = ($masa/$alturacuadrado);
						
							echo round($indice, 3) ; 
						}
					
					?>
					&nbsp;
				</dd>
				<dt><?php echo __('Fallecido'); ?></dt>
				<dd>
					<?php if ($patient['Patient']['vive'] == 1) {
							echo 'No';
						}
						  else {
						  	
							if (!empty($patient['Patient']['fecha_defuncion'])) {
								echo 'Si, el ' . $patient['Patient']['fecha_defuncion'] . ' a los ' . calcularEdad($patient['Patient']['fecha_nacimiento'],$patient['Patient']['fecha_defuncion']) . ' años de edad.'; 	
							}  else {
								echo 'Si';	
							}
														   
						}
						?>
					&nbsp;
				</dd>
				<dt><?php echo __('Ocupación'); ?></dt>
				<dd>
					<?php echo h($patient['Job']['descripcion']); ?>
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
				<li><?php echo $this->Html->link(__('Modificar Paciente'), array('action' => 'edit', $patient['Patient']['id'])); ?> </li>
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
			</tr>
			<?php
				$i = 0;
				foreach ($results as $question):?>
				<tr>
					<td><?php echo $question['questions']['descripcion'];?></td>
					<td><?php if ($question['answers']['valor'] == true)
									echo 'Si';
							  elseif ($question['answers']['id'] == null)
									echo 'No contesto'; 
								  else 	
									echo 'No'; ?>	
					</td>
				</tr>
			<?php endforeach; ?>
			
			</table>
			<div class="actions">
				<ul>
					<li><?php echo $this->Html->link(__('Modificar Respuestas'), array('action' => 'editAnswers', $patient['Patient']['id'])); ?> </li>
				</ul>
			</div>
		<?php endif; ?>
	</fieldset>



	<fieldset>
		<legend><?php echo __('Registros OMS'); ?></legend>
			<?php if (!empty($patient['OmsRegister'])):?>
				<table cellpadding = "0" cellspacing = "0">
				<tr>
					<th><?php echo __('C&oacute;digo'); ?></th>
					<th><?php echo __('Fecha'); ?></th>
					<th><?php echo __('Edad'); ?></th>
					<th><?php echo __('M&eacute;dico'); ?></th>
					<!--
					<th><?php // echo __('Dir. Particular'); ?></th>
					<th><?php // echo __('Dir. Laboral'); ?></th>
					-->
					
					<th class="actions"></th>
				</tr>
				<?php
					$i = 0;
				//	debug($patient['OmsRegister']);
					foreach ($patient['OmsRegister'] as $omsRegister): ?>
					<tr>
						<td><?php echo $omsRegister['Oms']['codigo'];?></td>
						<td><?php echo $omsRegister['fecha'];?></td>
						<td><?php echo $omsRegister['OmsRegister'][0]['edad'];?></td>
						<td><?php echo $omsRegister['Medic']['nombre'].' '.$omsRegister['Medic']['apellido']; ?></td>
						<!--
						
						<td><?php // echo $omsRegister['AddressPart']['direccion'];?></td>
						<td><?php // echo $omsRegister['AddressLab']['direccion'];?></td>
						-->
						
						
						
						<td class="actions">
							<?php echo $this->Html->link(__('Detalles y Notas'), array('controller' => 'oms_registers', 'action' => 'view', $omsRegister['id'])); ?>
							<?php
								if (($auth['group_id']==1)||($auth['group_id']==3)||(($auth['group_id']==2) && ($auth['medic_id']==$omsRegister['medic_id'])))
								{
									echo $this->Html->link(__('Editar'), array('controller' => 'oms_registers', 'action' => 'edit', $omsRegister['id'],$patient['Patient']['id']));
									echo $this->Form->postLink(__('Borrar'), array('controller' => 'oms_registers', 'action' => 'delete', $omsRegister['id'],$patient['Patient']['id']), null, __('Esta seguro que desea eliminar "%s"?', $omsRegister['Oms']['codigo'])); 
								}
							?>
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
	<form><div class="submit"></div></form>
</div>