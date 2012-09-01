<script type="text/javascript" charset="utf-8">
	
	var fdefuncion = null;
	
	
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
				$('#calleLaboral').val("Calle");
				$('#alturaLaboral').val("Altura");
				
				//Remuevo el icono del mapita si es que existe...
				$('#imgmapaLaboral').remove();
				
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
			
			$('#calleParticular').val("Calle");
			$('#alturaParticular').val("Altura");

			//Remuevo el icono del mapita si es que existe...
			$('#imgmapaParticular').remove();	
			
			
		} else {
		
			$('#provinciasParticular').removeAttr("disabled");
			$('#localidadesParticular').removeAttr("disabled");
			$('#calleParticular').removeAttr("disabled");
			$('#alturaParticular').removeAttr("disabled");
			$('#imgbusquedaParticular').css("display", "inline");
		
		}
	}
	
	$(document).ready(function() {
	
				$('#PatientFechaNacimiento').datepicker(datepicker_config);
				fdefuncion = $('#PatientFechaDefuncion').datepicker(datepicker_config);
	
				$('input[name="data[Patient][vive]"]').change(function() {
				
					if ($(this).val() == 1) {
						fdefuncion.datepicker('disable');
						$('#PatientFechaDefuncion').val("");
					} else {
						fdefuncion.datepicker('enable');
					}
			
				});
			
				<?php
				
					if($this->request->data['Patient']['vive']=='1') {
				?>
						fdefuncion.datepicker('disable');
						$('#PatientFechaDefuncion').val("");
				<?php
					}
				?>
			
	
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

<div class="patients form">
<?php echo $this->Form->create('Patient');?>
	<fieldset>
		<legend><?php echo __('Modificar Paciente'); ?></legend>

	<?php
	
		//debug($this->request->data);
	
		echo $this->Form->input('id');
		
		echo $this->Form->input('iniciales');
		
		echo $this->Form->input('peso');
	//	echo $this->Form->error('Patient.peso');
		
		echo $this->Form->input('altura');
		
		$options=array('1'=>'No','0'=>'Si');
		$attributes=array('legend'=>false,'value'=>$this->request->data['Patient']['vive'],'separator'=>'');
		
		echo "<div>";
		echo "<label class='label_radio required'>Fallecido</label>";
		echo $this->Form->radio('vive',$options,$attributes);
		echo "</div>";
		
		echo $this->Form->input('fecha_defuncion',array('label' => 'Fecha De Defunción', 'type' => 'text'));
		
		echo $this->Form->input('Patient.job_id',array('label' =>'Ocupación'));
		
		echo $this->Form->hidden('Control.cargo_particular', array('value' => 'false'));
		echo $this->Form->hidden('Control.cargo_laboral', array('value' => 'false'));
		
		//if (!empty($patient['Primary']['id'])){
		echo $this->Form->hidden('Control.particular_actual', array('value' => $this->request->data['Patient']['address_particular_id']));
		echo $this->Form->hidden('address_particular_id', array('value' => $this->request->data['Patient']['address_particular_id']));
		//}
		//if (!empty($patient['Secondary']['id'])){
		echo $this->Form->hidden('Control.laboral_actual', array('value' => $this->request->data['Patient']['address_laboral_id']));
		echo $this->Form->hidden('address_laboral_id', array('value' => $this->request->data['Patient']['address_laboral_id']));
		//}
		
		echo $this->Form->hidden('Primary.city_id');
		echo $this->Form->hidden('Primary.latitud');
		echo $this->Form->hidden('Primary.longitud');
		echo $this->Form->hidden('Primary.direccion');
		
		echo $this->Form->hidden('Secondary.city_id');
		echo $this->Form->hidden('Secondary.latitud');
		echo $this->Form->hidden('Secondary.longitud');
		echo $this->Form->hidden('Secondary.direccion');
				
		echo $this->Form->input('fecha_nacimiento',array('label' => 'Fecha De Nacimiento', 'type' => 'text'));
		
		$options=array('M'=>'Masculino','F'=>'Femenino');
		$attributes=array('legend'=>false,'value'=> $this->request->data['Patient']['sexo'],'separator'=>'');	
		echo "<div>";
			echo "<label class='label_radio required'>Sexo</label>";
			echo $this->Form->radio('sexo',$options,$attributes);
		echo "</div>";
		
		//echo $this->Form->hidden('nro_documento', array('value' => $patient['Patient']['nro_documento']));
		
		?>
		<div class=input>
		<input type="checkbox" id="chParticular" value="" checked onclick="checkParticular();"/>No modificar la direcci&oacute;n particular del paciente.<br />
		<fieldset id="fsParticular">
			<legend><?php echo __('Direcci&oacute;n Particular'); ?></legend>
			<select id="provinciasParticular">
			<?php foreach ($provinces as $key => $province): ?>
				<option value="<?php echo $key ?>"><?php echo $province ?></option>
			<?php endforeach; ?>
			</select><select id="localidadesParticular">
				<option value="0" selected>Seleccionar</option>
			</select>
			<input type="text" size="25" value="Calle" id="calleParticular" class="clear-text-field" />
			<input type="text" size="5" value="Altura" id="alturaParticular" class="clear-text-field" />
			<a href="JavaScript:buscar('Particular');" id="comprobarParticular"><img id="imgbusquedaParticular" src="<?php echo $this->webroot; ?>img/search.png" style="vertical-align: middle;" /></a>
		</fieldset>
		<input type="checkbox" id="chLaboral" value="" checked onclick="checkLaboral();"/>No modificar la direcci&oacute;n laboral del paciente.<br />
		<fieldset id="fsLaboral">
			<legend><?php echo __('Direcci&oacute;n Laboral'); ?></legend>
			<select id="provinciasLaboral">
			<?php foreach ($provinces as $key => $province): ?>
				<option value="<?php echo $key ?>"><?php echo $province ?></option>
			<?php endforeach; ?>
			</select> 
			<select id="localidadesLaboral">
				<option value="0" selected>Seleccionar</option>
			</select>
			<input type="text" size="25" value="Calle" id="calleLaboral" class="clear-text-field" />
			<input type="text" size="5" value="Altura" id="alturaLaboral" class="clear-text-field" />
			<a href="JavaScript:buscar('Laboral');" id="comprobarLaboral"><img id="imgbusquedaLaboral" src="<?php echo $this->webroot; ?>img/search.png" style="vertical-align: middle;" /></a>
		</fieldset>
		</div>
	</fieldset>
<?php echo $this->Form->end(__('Modificar'));?>
