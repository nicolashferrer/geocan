<script type="text/javascript" charset="utf-8">
	
	function checkLaboral() {
	
		var estado = $('#chLaboral').is(':checked');
		
		$('#fsLaboral').toggle();
		
			if (estado == true) {
			
				$('#provinciasLaboral').attr("disabled", "disabled");
				$('#localidadesLaboral').attr("disabled", "disabled");
				$('#calleLaboral').attr("disabled", "disabled");
				$('#alturaLaboral').attr("disabled", "disabled");
				$('#imgbusquedaLaboral').css("display", "none");
				$('#ControlCargoLaboral').val("false");	
				
			} else {
			
				$('#provinciasLaboral').removeAttr("disabled");
				$('#localidadesLaboral').removeAttr("disabled");
				$('#calleLaboral').removeAttr("disabled");
				$('#alturaLaboral').removeAttr("disabled");
				$('#imgbusquedaLaboral').css("display", "inline");
			
			}
	}
	
	function checkParticular() {
	
		var estado = $('#chParticular').is(':checked');
		
		$('#fsParticular').toggle();
		
		if (estado == true) {
		
			$('#provinciasParticular').attr("disabled", "disabled");
			$('#localidadesParticular').attr("disabled", "disabled");
			$('#calleParticular').attr("disabled", "disabled");
			$('#alturaParticular').attr("disabled", "disabled");
			$('#imgbusquedaParticular').css("display", "none");
			$('#ControlCargoParticular').val("false");	
			
		} else {
		
			$('#provinciasParticular').removeAttr("disabled");
			$('#localidadesParticular').removeAttr("disabled");
			$('#calleParticular').removeAttr("disabled");
			$('#alturaParticular').removeAttr("disabled");
			$('#imgbusquedaParticular').css("display", "inline");
		
		}
	}
	
	$(document).ready(function() {
	
				$('#provinciasParticular').change(function() {

				var $id = $('#provinciasParticular').val();

				if ($id > 0) {
					$.getJSON('<?php echo $this->Html->url(array(
			"controller" => "cities",
			"action" => "getCiudades"));?>' + '/' + $(this).val(), function(data){
						$('#localidadesParticular').empty();
						$.each(data, function(optionIndex, option) {
							var html = "<option value=\"" + option['id'] + "\">" + option['nombre'] + "</option>";
							$('#localidadesParticular').append(html);
						})
						if ($id == 1) { //La provincia es Buenos Aires
							$('#localidadesParticular').val(1); // Selecciono Bahia Blanca
						}
					});
				} else {
					$('#localidadesParticular').empty();
				}
					
			});
			
			$('#provinciasLaboral').change(function() {
			
			
				var $id = $('#provinciasLaboral').val();
				if ($id > 0) {
					$.getJSON('<?php echo $this->Html->url(array(
			"controller" => "cities",
			"action" => "getCiudades"));?>' + '/' + $(this).val(), function(data){
						$('#localidadesLaboral').empty();
						$.each(data, function(optionIndex, option) {
							var html = "<option value=\"" + option['id'] + "\">" + option['nombre'] + "</option>";
							$('#localidadesLaboral').append(html);
						})
						if ($id == 1) { //La provincia es Buenos Aires
							$('#localidadesLaboral').val(1); // Selecciono Bahia Blanca
						}
					});
				} else {
					$('#localidadesLaboral').empty();
				}
				
				
			});
			
		$('#OmsRegisterAddForm').submit(function() {
        
			var estadoParticular = $('#chParticular').is(':checked');
			var estadoLaboral = $('#chLaboral').is(':checked');
			var cargoParticular = $('#ControlCargoParticular').val();
			var cargoLaboral = $('#ControlCargoLaboral').val();	
			
			if (estadoParticular == false && cargoParticular == "false") {
				alert("Debe ingresar la nueva direcci�n particular.");
				return false;
			}
			
			if (estadoLaboral == false && cargoLaboral == "false") {
				alert("Debe ingresar la nueva direcci&oacute;n laboral.");
				return false;
			}
			
			return true;
		
		});
	
		$('#provinciasParticular').val(1);
		$('#provinciasParticular').trigger("change");
		$('#provinciasLaboral').val(1);
		$('#provinciasLaboral').trigger("change");
		
		checkParticular();
		checkLaboral();
	
	});
	
</script>


<div class="omsRegisters form">
<?php echo $this->Form->create('OmsRegister');?>
	<fieldset>
		<legend><?php echo __('Add Oms Register'); ?></legend>
	<?php
	
		//debug($provinces);
	
		// debug($patient);
		//debug($patient['Primary']['id']);
		//debug($patient['Secondary']['id']);
	
		echo $this->Form->hidden('patient_id', array('value' => $patient['Patient']['id']));
		
		$hoy = new DateTime();
//		$hoyformateado = $hoy->format('Y-m-d H:i:s');
		$hoyformateado = $hoy->format('Y-m-d');
		
	//	echo $this->Form->hidden('fecha',array('value'=>$hoyformateado));
		
		// Aca van los ids de las direcciones actuales del usuario por si es necesario usarlas
				
		echo $this->Form->hidden('Control.cargo_particular', array('value' => 'false'));
		echo $this->Form->hidden('Control.cargo_laboral', array('value' => 'false'));
		
		echo $this->Form->hidden('Primary.city_id', array('value' => '1'));
		echo $this->Form->hidden('Primary.latitud');
		echo $this->Form->hidden('Primary.longitud');
		echo $this->Form->hidden('Primary.direccion');
		
		echo $this->Form->hidden('Secondary.city_id', array('value' => '1'));
		echo $this->Form->hidden('Secondary.latitud');
		echo $this->Form->hidden('Secondary.longitud');
		echo $this->Form->hidden('Secondary.direccion');
		
		echo $this->Form->hidden('address_part_id', array('value' => $patient['Primary']['id']));
		echo $this->Form->hidden('address_lab_id', array('value' => $patient['Secondary']['id']));

		echo $this->Form->input('medic_id',array('label'=>'M&eacute;dico'));
		echo $this->Form->input('oms_code_id',array('label'=>'C&oacute;digo'));
		echo $this->Form->input('fecha',array('type' => 'text','value' => $hoyformateado));
		
		$options=array('0'=>'Desconocido','1'=>'1','2'=>'2','3'=>'3','4'=>'4');
		$attributes=array('legend'=>false,'value'=>'0','separator'=>'');	
		echo "<div class=input>";
		echo $this->Form->label("Estad&iacute;o");
		echo $this->Form->radio('estadio',$options,$attributes);
		echo "</div>";	

	?>
		<div class=input>
		<input type="checkbox" id="chParticular" value="" checked onclick="checkParticular();"> Utilizar direccion particular actual del paciente.
		<fieldset id="fsParticular">
			<legend><?php echo __('Direccion Particular'); ?></legend>
			<select id="provinciasParticular">
			<?php foreach ($provinces as $key => $province): ?>
				<option value="<?php echo $key ?>"><?php echo $province ?></option>
			<?php endforeach; ?>
			</select><select id="localidadesParticular">
				<option value="0" selected>Seleccionar</option>
			</select><input type="text" size="25" value="Nombre de la Calle" id="calleParticular"><input type="text" size="25" class="inputcorto" value="Altura" id="alturaParticular">
			<a href="JavaScript:buscar('Particular');" id="comprobarParticular"><img id="imgbusquedaParticular" src="<?php echo $this->webroot; ?>img/search.png" style="vertical-align: middle;" /></a>
		</fieldset>
		</div>
		<div class=input>
		<input type="checkbox" id="chLaboral" value="" checked onclick="checkLaboral();"> Utilizar direccion laboral actual del paciente.
		<fieldset id="fsLaboral">
			<legend><?php echo __('Direccion Laboral'); ?></legend>
			<select id="provinciasLaboral">
			<?php foreach ($provinces as $key => $province): ?>
				<option value="<?php echo $key ?>"><?php echo $province ?></option>
			<?php endforeach; ?>
			</select> 
			<select id="localidadesLaboral">
				<option value="0" selected>Seleccionar</option>
			</select><input type="text" size="25" value="Nombre de la Calle" id="calleLaboral"><input type="text" size="25" class="inputcorto" value="Altura" id="alturaLaboral">
			<a href="JavaScript:buscar('Laboral');" id="comprobarLaboral"><img id="imgbusquedaLaboral" src="<?php echo $this->webroot; ?>img/search.png" style="vertical-align: middle;" /></a>
		</fieldset>
		</div>
	</fieldset>
<?php echo $this->Form->end(__('Crear'));?>
</div>
