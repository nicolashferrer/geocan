<?php

 function traducirEvento($evento) {
 	
	$evento = strtolower($evento);
 	
	switch ($evento) {
		case 'edit':
			return 'Edici&oacute;n';
			break;
		
		case 'create':
			return 'Creaci&oacute;n';
			break;
			
		case 'delete':
			return 'Eliminaci&oacute;n';
			break;
			
		default:
			return '';
			break;
	}
 }
 
  function traducirModelo($modelo) {
 	
	$modelo = strtolower($modelo);
 	
	switch ($modelo) {
		case 'primary':
			return 'Direcci&oacute;n';
			break;
		
		case 'secondary':
			return 'Direcci&oacute;n';
			break;
			
		case 'address':
			return 'Direcci&oacute;n';
			break;
			
		case 'user':
			return 'Usuario';
			break;
			
		case 'answer':
			return 'Respuesta';
			break;
			
		case 'patient':
			return 'Paciente';
			break;
		
		case 'omsregister':
			return 'OMS';
			break;
			
		case 'note':
			return 'Nota';
			break;
			
		case 'city':
			return 'Ciudad';
			break;
			
		case 'province':
			return 'Provincia';
			break;
					
		default:
			return $modelo;
			break;
	}
 }

?>

<div class="medics index">
	<fieldset>
		<legend><?php echo __('Auditor&iacute;a'); ?></legend>
		<table cellpadding="0" cellspacing="0">
		<tr>
				<th><?php echo $this->Paginator->sort('event','Acción');?></th>
				<th><?php echo $this->Paginator->sort('model','Modelo');?></th>
				<th><?php echo $this->Paginator->sort('entity_id','ID Entidad');?></th>
				<th><?php echo $this->Paginator->sort('created','Fecha');?></th>
				<th><?php echo $this->Paginator->sort('User.username','Usuario');?></th>
				<th class="actions"></th>
		</tr>
		<?php foreach ($audits as $audit): ?>
		<tr>
			<td><?php echo traducirEvento(h($audit['Audit']['event'])); ?>&nbsp;</td>
			<td><?php echo traducirModelo(h($audit['Audit']['model'])); ?>&nbsp;</td>
			<td><?php echo h($audit['Audit']['entity_id']); ?>&nbsp;</td>
			<td><?php echo h($audit['Audit']['created']); ?>&nbsp;</td>
			<td><?php echo h($audit['User']['username']); ?>&nbsp;</td>
			<td class="actions">
				
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
