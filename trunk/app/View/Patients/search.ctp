<script>

	$(document).ready(function() {
	
		$('#btbuscar').click(function() {
	
		$('#resultadoOK').hide();
		$('#resultadoKO').hide();
	
		var $dni = $('#dni').val();
		
		$.getJSON('<?php echo $this->Html->url(array("controller" => "patients","action" => "recuperarPaciente"));?>' + '/' + $dni, function(data){
				if(data.encontre==true) {
					//$('#elid').html(data.id);
					$('#linkVer').html('<a href="<?php echo $this->Html->url(array("controller" => "patients","action" => "view"));?>/' + data.id+'">Ver Ficha Paciente</a>');
					$('#linkOms').html('<a href="<?php echo $this->Html->url(array("controller" => "oms_registers","action" => "add"));?>/' + data.id+'">Cargar Oms</a>');
					$('#resultadoOK').show();
				} else {
					$('#resultadoKO').show();
				}
			});

		});
		
	});
	
</script>

<div class="form" align="center">
	<fieldset>
		<legend>Buscar Paciente</legend>
		N&uacute;mero De Documento <input type="input" id="dni" size="25">
		<input class="boton" type="submit" id="btbuscar" value="Buscar">
		<br><br>
		<div id="resultadoOK" style="display:none">
		<p>El paciente fue encontrado. &iquest;Que operaci&oacute;n desea realizar?</p>
		<div class="actions">
			<ul>
				<li id="linkVer"></li>
				<li id="linkOms"></li>
			</ul>
		</div>
		</div>
		
		<div id="resultadoKO" style="display:none">
		<p>No se encontro ningun paciente con ese n&uacute;mero documento.</p>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Crear Nuevo Paciente'), array("controller" => "patients",'action' => 'add')); ?> </li>
			</ul>
		</div>
		</div>
		
	</fieldset>
</div>