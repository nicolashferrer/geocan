<script>
	
		function mostrarNombresCiudad(id,div) {
		
		$.getJSON('<?php echo $this->Html->url(array(
			"controller" => "cities",
			"action" => "getNombre"));?>' + '/' + id, function(data){
					
						try {
							$('#'+div).text(data.City.nombre);
						} catch (e) {
							$('#'+div).text("");
						}
					});
							
	}
	
		$(document).ready(function() {
			
		<?php 
			if (isset($omsRegister['Primary']['city_id'])) {
				echo "mostrarNombresCiudad(".$omsRegister['Primary']['city_id'].",'nomCiudadPart');";
			}
			
			if (isset($omsRegister['Secondary']['city_id'])) {
				echo "mostrarNombresCiudad(".$omsRegister['Secondary']['city_id'].",'nomCiudadLab');";
			}
		?>
			
		});
	
</script>

<?php

	$descParticular = "No posee";
	$descLaboral = "No Posee";

	if (isset($omsRegister['Primary']['direccion'])) {
		$descParticular = "<span id='nomCiudadPart'></span>, " . $omsRegister['Primary']['direccion'];
	}

	if (isset($omsRegister['Secondary']['direccion'])) {
		$descLaboral = "<span id='nomCiudadLab'></span>, " . $omsRegister['Secondary']['direccion'];
	}
		 
?>

<div class="omsRegisters view">
	<fieldset>
	<legend><?php echo __('Oms'); ?></legend>
		<dl>
			<dt><?php echo __('Paciente'); ?></dt>
			<dd>
				<?php echo $omsRegister['Patient']['iniciales']; ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Médico'); ?></dt>
			<dd>
				<?php echo $omsRegister['Medic']['nombrecompleto']; ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Dirección particular'); ?></dt>
			<dd>
				<?php 
				//echo $omsRegister['Primary']['direccion'];
				echo $descParticular;
				?>
				&nbsp;
			</dd>
			<dt><?php echo __('Dirección laboral'); ?></dt>
			<dd>
				<?php //echo $omsRegister['Secondary']['direccion']; 
					echo $descLaboral;
				?>
				&nbsp;
			</dd>
			<dt><?php echo __('Código Oms'); ?></dt>
			<dd>
				<?php echo $omsRegister['OmsCode']['codigo_desc']; ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Fecha'); ?></dt>
			<dd>
				<?php echo h($omsRegister['OmsRegister']['fecha']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Estadio'); ?></dt>
			<dd>
				<?php 
					$estadio = $omsRegister['OmsRegister']['estadio']; 
					if ($estadio == 0)
						echo 'Desconocido';
					else
						echo $estadio;
				?>
				&nbsp;
			</dd>
			<dt><?php echo __('Estadificaci&oacute;n'); ?></dt>
			<dd>
				<?php 
					$cod = $omsRegister['OmsRegister']['codificacion']; 
					$grupos = split('@', $cod);
					$T= split(';', $grupos[0]);
					$N= split(';', $grupos[1]);
					$M= split(';', $grupos[2]);
					
					echo $T[0] . ' ' . $T[1] . ' - ' . $N[0] . ' ' . $N[1] . ' - ' . $M[0] . ' ' . $M[1];
				?>
				&nbsp;
			</dd>
		</dl>
		<div class="actions">
			<ul>
				<li>
					<?php
						if (($auth['group_id']==1)||($auth['group_id']==3)||(($auth['group_id']==2) && ($auth['medic_id']==$omsRegister['Medic']['id'])))
						{
							echo $this->Html->link(__('Editar Oms'), array('action' => 'edit', $omsRegister['OmsRegister']['id'],$omsRegister['Patient']['id']));
						} 
						else
						{
							if ($auth['group_id']==2)
								echo $this->Html->link(__('Editar Estadio'), array('action' => 'edit', $omsRegister['OmsRegister']['id'],$omsRegister['Patient']['id']));
						}
					?> 
				</li>
			</ul>
		</div>
	</fieldset>

	<fieldset>
	<legend><?php echo __('Notas'); ?></legend>
		<?php if (!empty($omsRegister['Note'])):?>
		<table cellpadding = "0" cellspacing = "0">
		<tr>
			<th><?php echo __('Medico'); ?></th>
			<th><?php echo __('Fecha'); ?></th>
			<th class="actions"></th>
		</tr>
		<?php
			$i = 0;
		
			foreach ($omsRegister['Note'] as $note): ?>
			<tr>
				<td><?php echo $note['Medic']['nombre'].' '.$note['Medic']['apellido'];;?></td>
				<td><?php echo $note['fecha'];?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('Ver'), array('controller' => 'notes', 'action' => 'view', $note['id'],$omsRegister['OmsRegister']['id'])); ?>
					<?php if (($auth['group_id']==1) || (($auth['group_id']==2) && ($auth['medic_id']==$note['medic_id']))) {
							echo $this->Html->link(__('Editar'), array('controller' => 'notes', 'action' => 'edit', $note['id'],$omsRegister['OmsRegister']['id']));
							echo $this->Form->postLink(__('Borrar'), array('controller' => 'notes', 'action' => 'delete', $note['id'],$omsRegister['OmsRegister']['id']), null, __('Está seguro que desea borrar la nota?', $note['id']));
					} 
				?>		
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
	<form><div class="submit"></div></form>
</div>