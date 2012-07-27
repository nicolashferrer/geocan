<script>

	$(document).ready(function(){
		generarToolTips();
	}); 
	
	function generarToolTips() {
		// Tooltip only Text
		$('.detallestip').hover(function() {

			// Hover over code
			var title = $(this).attr('det');

			if (title == null) {
				title = "";
			}

			$('<p class="tip2"></p>').html(title).appendTo('body').fadeIn('slow');

		}, function() {
			// Hover out code
			$('.tip2').remove();
		}).mousemove(function(e) {
			var mousex = e.pageX + 10;
			//Get X coordinates
			var mousey = e.pageY + 10;
			//Get Y coordinates
			$('.tip2').css({
				top : mousey,
				left : mousex
			})
		});
	}
</script>

<?php

function traducirEvento($evento) {

	$evento = strtolower($evento);

	switch ($evento) {
		case 'edit' :
			return 'Edici&oacute;n';
			break;

		case 'create' :
			return 'Creaci&oacute;n';
			break;

		case 'delete' :
			return 'Eliminaci&oacute;n';
			break;

		default :
			return '';
			break;
	}
}

function traducirModelo($modelo) {

	$modelo = strtolower($modelo);

	switch ($modelo) {
		case 'primary' :
			return 'Direcci&oacute;n';
			break;

		case 'secondary' :
			return 'Direcci&oacute;n';
			break;

		case 'address' :
			return 'Direcci&oacute;n';
			break;

		case 'user' :
			return 'Usuario';
			break;

		case 'answer' :
			return 'Respuesta';
			break;
			
		case 'question' :
			return 'Pregunta';
			break;

		case 'patient' :
			return 'Paciente';
			break;

		case 'omsregister' :
			return 'OMS';
			break;

		case 'note' :
			return 'Nota';
			break;

		case 'city' :
			return 'Ciudad';
			break;

		case 'province' :
			return 'Provincia';
			break;

		default :
			return $modelo;
			break;
	}
}

function procesarJSON($cadena) {

	$obj = json_decode($cadena, true);

	//debug($obj);

	$salida = "";

	foreach ($obj as $o) {

		foreach ($o as $clave => $valor) {

			if (strlen($valor) > 25) {
				$valor = substr($valor, 0,30) . "[...]";
			}

			$salida .= "<b>" . $clave . "</b> => " . $valor . "<br/>\n";

		}

	}

	return $salida;

}
?>
	<div class="audits form">
		<?php echo $this->Form->create('Audits');?>
		<fieldset>
				<legend><?php echo __('Filtrado de Logs'); ?></legend>
		<?php

				echo "<div>";
				echo $this->Form->input('Audit.event',
    			array('label' => 'Acción',
      			'options' => array('' => 'Todas','EDIT' => 'Edición', 'CREATE' => 'Creación', 'DELETE' => 'Eliminación'),
      			'default' => !empty($this->request->data) ? $this->request->data['Audit']['event'] : ''));
				echo "</div>";
				
				echo "<div>";
				echo $this->Form->input('Audit.model',
    			array('label' => 'Modelo',
      			'options' => array('' => 'Todos','User' => 'Usuario', 'Patient' => 'Paciente', 'Question' => 'Pregunta'),
      			'default' => !empty($this->request->data) ? $this->request->data['Audit']['model'] : ''));
				echo "</div>";
		

		?>
		</fieldset>
		<?php echo $this->Form->end(__('Filtrar'));?>
	</div>
<div class="audits index">
	<fieldset>
		<legend><?php echo __('Auditor&iacute;a'); ?></legend>
		<table cellpadding="0" cellspacing="0">
		<tr>
				<th><?php echo $this -> Paginator -> sort('event', 'Acción'); ?></th>
				<th><?php echo $this -> Paginator -> sort('model', 'Modelo'); ?></th>
				<th><?php echo $this -> Paginator -> sort('entity_id', 'Entidad'); ?></th>
				<th><?php echo $this -> Paginator -> sort('created', 'Fecha'); ?></th>
				<th><?php echo $this -> Paginator -> sort('User.username', 'Usuario'); ?></th>
				<th><center>Detalles</center></th>
		</tr>
		<?php foreach ($audits as $audit): ?>
		<tr>
			<td><?php echo traducirEvento(h($audit['Audit']['event'])); ?>&nbsp;</td>
			<td><?php echo traducirModelo(h($audit['Audit']['model'])); ?>&nbsp;</td>
			<td><?php echo h($audit['Audit']['entity_id']); ?> <img class="detallestip" src="<?php echo $this->webroot; ?>img/view.png" style="vertical-align: middle;" det="<?php echo procesarJSON($audit['Audit']['json_object']); ?>"/>&nbsp;</td>
			<td><?php echo h($audit['Audit']['created']); ?>&nbsp;</td>
			<td><?php echo h($audit['User']['username']); ?>&nbsp;</td>
			<td>
				<center></center>
			</td>
		</tr>
	<?php

			endforeach;
 ?>
		</table>
		<p>
		<?php
		echo $this -> Paginator -> counter(array('format' => __('Pagina {:page} de {:pages}')));
		?>	</p>

		<div class="paging">
		<?php 
		
			echo $this -> Paginator -> prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
			echo $this -> Paginator -> numbers(array('separator' => ''));
			echo $this -> Paginator -> next(__('siguiente') . ' >', array(), null, array('class' => 'next disabled'));
		?>
		</div>
	</fieldset>
</div>
