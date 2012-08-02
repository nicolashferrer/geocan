<script>

	$(document).ready(function() {
	
		$('#btbuscar').click(function() {
	
			$('#resultadoOK').hide();
			$('#resultadoKO').hide();
	
			var dni = $('#dni').val();
		
			if ( (dni == "") ||  (dni == null) ) {
			
				jAlert("Debe ingresar un n&uacute;mero de documento.","Ingresar Datos");
				
			} else {

			dni = dni.replace(/\./gi, ""); 
			
			$.getJSON('<?php echo $this->Html->url(array("controller" => "patients","action" => "recuperarPaciente"));?>' + '/' + dni, function(data){
					if(data.encontre==true) {
						//$('#elid').html(data.id);
						$('#linkVer').html('<a href="<?php echo $this->Html->url(array("controller" => "patients","action" => "view"));?>/' + data.id+'">Ver Ficha Paciente</a>');
						$('#linkOms').html('<a href="<?php echo $this->Html->url(array("controller" => "oms_registers","action" => "add"));?>/' + data.id+'">Cargar Oms</a>');
						$('#resultadoOK').show();
					} else {
						$('#linkCrear').html('<a href="<?php echo $this->Html->url(array("controller" => "patients","action" => "add"));?>/' + dni+'">Nuevo Paciente</a>');
						$('#resultadoKO').show();
					}
			});
			
			}
		});
	});
	
	function submitenter(myfield,e)
	{
		var keycode;
		if (window.event) keycode = window.event.keyCode;
		else if (e) keycode = e.which;
		else return true;

		if (keycode == 13)
		   {
		   $('#btbuscar').trigger("click");
		   return false;
		   }
		else
		   return true;
	}	
	
</script>

<div class="input" align="center">
	<fieldset>
		<legend>Buscar Paciente</legend>
		<div class="input"> N&uacute;mero De Documento <input type="input" id="dni" size="25" onKeyPress="return submitenter(this,event);">
		<br><br>
		<input class="boton" type="submit" id="btbuscar" value="Buscar">
		</div>
		<br>
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
		<p>No se encontro ningun paciente con ese n&uacute;mero de documento.</p>
		<div class="actions">
			<ul>
				<li id="linkCrear"></li>
			</ul>
		</div>
		</div>
		
	</fieldset>
</div>