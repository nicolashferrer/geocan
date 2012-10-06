<script type="text/javascript" charset="utf-8">
	
	var avisado = false;
	
	var fdefuncion = null;
	
$(document).ready(function() {
	
	$('#PatientFechaNacimiento').datepicker(datepicker_config);
	fdefuncion = $('#PatientFechaDefuncion').datepicker(datepicker_config);
	fdefuncion.datepicker('disable');
	$('#PatientFechaDefuncion').val("");
	
	$('input[name="data[Patient][vive]"]').change(function() {
		
		if ($(this).val() == 1) {
			fdefuncion.datepicker('disable');
			$('#PatientFechaDefuncion').val("");
		} else {
			fdefuncion.datepicker('enable');
		}
	
	});

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
					recalcularParticular();
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
					recalcularLaboral();
				}
			});
		} else {
			$('#localidadesLaboral').empty();
		}
		
				
			$("#calleParticular").Watermark("Calle");
			$("#alturaParticular").Watermark("Altura");
			$("#calleLaboral").Watermark("Calle");
			$("#alturaLaboral").Watermark("Altura");
				
	});
	
	$('#PatientAddForm').submit(function(event) {
        


		var estadoParticular = $('#chParticular').is(':checked');
		var estadoLaboral = $('#chLaboral').is(':checked');
		var cargoParticular = $('#ControlCargoParticular').val();
		var cargoLaboral = $('#ControlCargoLaboral').val();	
		
		if (estadoParticular == true && cargoParticular == "false") {
			//alert("Debe ingresar una direccion particular.");
			jAlert("Debe ingresar una direcci&oacute;n particular.","Datos Faltantes");
			return false;
		}
		
		if (estadoLaboral == true && cargoLaboral == "false") {
			//alert("Debe ingresar una direccion laboral.");
			jAlert("Debe ingresar una direcci&oacute;n laboral.","Datos Faltantes");
			return false;
		}
		
		if ((estadoParticular == false) && (estadoLaboral == false)) {
		
			if (!avisado) {
			
				event.preventDefault();
		
				jConfirm('&iquest;Confirma la creaci&oacute;n de un paciente sin direcciones?', 'Paciente sin direcciones', function(r) {
					if (r) { 
					avisado = true;
					$('#PatientAddForm').submit();
				} else {
					return false;
				}
				});
				
			}
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

	function checkParticular() {
	
		var estado = $('#chParticular').is(':checked');
		
		if (estado == false) {
		
			$('#provinciasParticular').attr("disabled", "disabled");
			$('#localidadesParticular').attr("disabled", "disabled");
			$('#calleParticular').attr("disabled", "disabled");
			$('#calleParticular').val("Calle");
			$('#alturaParticular').val("Altura");
			$('#alturaParticular').attr("disabled", "disabled");
			$('#imgbusquedaParticular').css("display", "none");
			$('#ControlCargoParticular').val("false");	
			
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
	
	function checkLaboral() {
	
		var estado = $('#chLaboral').is(':checked');
		
			if (estado == false) {
			
				$('#provinciasLaboral').attr("disabled", "disabled");
				$('#localidadesLaboral').attr("disabled", "disabled");
				$('#calleLaboral').attr("disabled", "disabled");
				$('#alturaLaboral').attr("disabled", "disabled");
				$('#calleLaboral').val("Calle");
				$('#alturaLaboral').val("Altura");
				$('#imgbusquedaLaboral').css("display", "none");
				$('#ControlCargoLaboral').val("false");	
				
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
	
	function recalcularParticular() {
		
		<?php 
		
		if ($this->request->data) {
					
			if (isset($this->request->data['Primary']['direccion'])) {
					
				$dir = $this->request->data['Primary']['direccion'];
				
				$cachos = explode(" ", $dir);
				
				$altura = $cachos[sizeof($cachos)-1];
				
				$cachos = array_slice($cachos,0,sizeof($cachos)-1);
								
				$ladire = implode(" ", $cachos);
				
				echo "checkParticular();";
				echo "$('#calleParticular').val('$ladire');";
				echo "$('#alturaParticular').val('$altura');";
				echo "buscar('Particular',true);";
					

			}
					
		}
		
		?>
		
	}
	
	function recalcularLaboral() {
		
		<?php 
		
		if ($this->request->data) {
					
			if (isset($this->request->data['Secondary']['direccion'])) {
					
				$dir = $this->request->data['Secondary']['direccion'];
				
				$cachos = explode(" ", $dir);
				
				$altura = $cachos[sizeof($cachos)-1];
				
				$cachos = array_slice($cachos,0,sizeof($cachos)-1);
								
				$ladire = implode(" ", $cachos);
				
				echo "$('#chLaboral').attr('checked', true);";
				echo "checkLaboral();";
				echo "$('#calleLaboral').val('$ladire');";
				echo "$('#alturaLaboral').val('$altura');";
				echo "buscar('Laboral',true);";
				
			}
			
		}
		
		?>
		
	}

	
</script>
<div class="patients form">
<?php echo $this->Form->create('Patient');?>
	<fieldset>
		<legend><?php echo __('Informaci&oacute;n B&aacute;sica'); ?></legend>
	<?php
			
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
		
		echo $this->Form->input('nro_documento',array('label' => 'N&uacute;mero De Documento', 'value' => $id));
		echo $this->Form->input('iniciales');
		echo $this->Form->input('fecha_nacimiento',array('label' => 'Fecha De Nacimiento', 'type' => 'text'));
		$options=array('M'=>'Masculino','F'=>'Femenino');
		$attributes=array('legend'=>false,'value'=>'M','separator'=>'');
		
		echo "<div>";
		echo "<label class='label_radio required'>Sexo</label>";
		echo $this->Form->radio('sexo',$options,$attributes);
		echo "</div>";
		
		echo $this->Form->input('Patient.peso');
		echo $this->Form->input('Patient.altura');
		echo $this->Form->input('Patient.job_id',array('label' =>'Ocupación'));
		
		$options=array('1'=>'No','0'=>'Si');
		$attributes=array('legend'=>false,'value'=>'1','separator'=>'');
		
		echo "<div>";
		echo "<label class='label_radio required'>Fallecido</label>";
		echo $this->Form->radio('vive',$options,$attributes);
		echo "</div>";
		
		echo $this->Form->input('fecha_defuncion',array('label' => 'Fecha De Defunción', 'type' => 'text'));
		
		?>
			<div class=input>
				<fieldset>
					<legend>
					<input type="checkbox" id="chParticular" value="" checked onclick="checkParticular();"><?php echo __('Direcci&oacute;n Particular'); ?></legend>
					<select id="provinciasParticular">
					<?php foreach ($provinces as $key => $province): ?>
						<option value="<?php echo $key ?>"><?php echo $province ?></option>
					<?php endforeach; ?>
					</select><select id="localidadesParticular">
						<option value="0" selected>Seleccionar</option>
					</select>
					<input type="text" size="25" id="calleParticular" />
					<input type="text" size="5" id="alturaParticular" />
					<a href="JavaScript:buscar('Particular',false);" id="comprobarParticular"><img id="imgbusquedaParticular" src="<?php echo $this->webroot; ?>img/search.png" style="vertical-align: middle;" /></a>
				</fieldset>
				<fieldset>
					<legend><input type="checkbox" id="chLaboral" value="" onclick="checkLaboral();"><?php echo __('Direccion Laboral'); ?></legend>
					<select id="provinciasLaboral">
					<?php foreach ($provinces as $key => $province): ?>
						<option value="<?php echo $key ?>"><?php echo $province ?></option>
					<?php endforeach; ?>
					</select> 
					<select id="localidadesLaboral">
						<option value="0" selected>Seleccionar</option>
					</select>
					<input type="text" size="25" id="calleLaboral" />
					<input type="text" size="5" id="alturaLaboral" />
					<a href="JavaScript:buscar('Laboral',false);" id="comprobarLaboral"><img id="imgbusquedaLaboral" src="<?php echo $this->webroot; ?>img/search.png" style="vertical-align: middle;" /></a>
				</fieldset>
				</div>
		</fieldset>
		<br>
		<fieldset>
			<legend><?php echo __('Informaci&oacute;n Adicional'); ?></legend>
			<?php
			
			$i = 0;
			foreach ($questions as $question):
			
				if ($this->request->data) {
					

						if (isset($this->request->data['Answer'][$i])) {
							$valorviejo = $this->request->data['Answer'][$i]['valor'];
							if ($valorviejo == true) {
								$valorviejo = '1';
							} else if ($valorviejo == null) {
								$valorviejo = "";
							} else {
								$valorviejo = "0";
							}
							
						} else {
							$valorviejo = "";
						}


					
				} else {
					$valorviejo = "";
				}
				
				$opciones=array('1'=>'Si','0'=>'No',''=>'No Contesta');
				$atributos=array('legend'=>false,'value'=>$valorviejo,'separator'=>'');
				echo "<div>";
				echo "<label class='label_radio'>".$question['Question']['descripcion']."</label>";
				echo $this->Form->hidden('Answer.'.$i.'.question_id', array('value' => $question['Question']['id']));
				//echo $this->Form->hidden('Answer.'.$i.'patient_id', array('value' => ''));
				echo $this->Form->radio('Answer.'.$i.'.valor',$opciones,$atributos);
				echo "</div>";
				//echo '<br>';
				$i++;
			
			endforeach;	
		?>
		</fieldset>
<?php echo $this->Form->end(__('Agregar'));?>
</div>
