<script type="text/javascript" charset="utf-8">
	var options, a;
	var avisado = false;

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
				$('#ControlMismaLaboral').val("true");
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
				$('#ControlMismaLaboral').val("false");
			
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
			$('#ControlMismaParticular').val("true");	
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
			$('#ControlMismaParticular').val("false");
		
		}
	}
	
	$(document).ready(function() {
	
			$('#OmsRegisterFecha').datepicker(datepicker_config);
		
	
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
			
		$('#OmsRegisterAddForm').submit(function(event) {
        
			var codigo = $('#OmsRegisterOmsCodeId').val();
			var estadoParticular = $('#chParticular').is(':checked');
			var estadoLaboral = $('#chLaboral').is(':checked');
			var cargoParticular = $('#ControlCargoParticular').val();
			var cargoLaboral = $('#ControlCargoLaboral').val();	
			
			var partActual = $('#OmsRegisterAddressPartId').val();
			var labActual = $('#OmsRegisterAddressLabId').val();	

			if (codigo == '') {
				jAlert("Debe ingresar o seleccionar un c&oacute;digo OMS.","Datos Faltantes");		
				return false;
			}
			
			
			if (estadoParticular == false && cargoParticular == "false") {
				jAlert("Debe ingresar una direcci&oacute;n particular.","Datos Faltantes");
				return false;
			}
			
			if (estadoLaboral == false && cargoLaboral == "false") {
				jAlert("Debe ingresar una direcci&oacute;n laboral.","Datos Faltantes");
				return false;
			}
			
			if (partActual=="" && labActual=="") {
				if (!avisado) {
				
					event.preventDefault();
			
					jConfirm('&iquest;Confirma la creaci&oacute;n de un registro OMS sin direcciones? El paciente no cuenta actualmente con ninguna direcci&oacute;n particular o laboral..', 'Registro OMS sin direcciones', function(r) {
						if (r) { 
						avisado = true;
						$('#OmsRegisterAddForm').submit();
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
		
		options = { serviceUrl:'<?php echo $this->Html->url(array("controller" => "oms_codes",	"action" => "sugerencias"));?>/', minChars:2, maxHeight:300, width:400,
		onSelect: function(value, data){ $('#OmsRegisterOmsCodeId').val(data);
		}};
		a = $('#sugerencias').autocomplete(options);
	
		$(".iframe").colorbox({iframe:true, width:"700px", height:"450px", scrolling:true});
		
		
		<?php 
			if (isset($patient['Primary']['city_id'])) {
				echo "mostrarNombresCiudad(".$patient['Primary']['city_id'].",'nomCiudadPart');";
			}
			
			if (isset($patient['Secondary']['city_id'])) {
				echo "mostrarNombresCiudad(".$patient['Secondary']['city_id'].",'nomCiudadLab');";
			}
		?>

	});
	
	function cambiarCodigo(id, desc ) {
		$("#sugerencias").val(desc);
		$('#OmsRegisterOmsCodeId').val(id);
		$(".iframe").colorbox.close();
	}
	
	
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
	
</script>


<div class="omsRegisters form">
<?php echo $this->Form->create('OmsRegister');?>
	<fieldset>
		<legend><?php echo __('Nuevo Oms'); ?></legend>
	<?php
	
		$descParticular = "(No posee)";
		$descLaboral = "(No Posee)";
	
		if (isset($patient['Primary']['direccion'])) {
			$descParticular = "(<span id='nomCiudadPart'></span>, " . $patient['Primary']['direccion'] . ")";
		}
	
		if (isset($patient['Secondary']['direccion'])) {
			$descLaboral = "(<span id='nomCiudadLab'></span>, " . $patient['Secondary']['direccion'] . ")";
		}
		 
	
		//debug($provinces);
	
	//	debug($patient['Primary']['city_id']);
		//debug($patient);
		//debug($patient['Primary']['id']);
		//debug($patient['Secondary']['id']);
	
		echo $this->Form->hidden('patient_id', array('value' => $patient['Patient']['id']));
		
		$hoy = new DateTime();
//		$hoyformateado = $hoy->format('Y-m-d H:i:s');
		$hoyformateado = $hoy->format('d/m/Y');
		
	//	echo $this->Form->hidden('fecha',array('value'=>$hoyformateado));
		
		// Aca van los ids de las direcciones actuales del usuario por si es necesario usarlas
				
		echo $this->Form->hidden('Control.cargo_particular', array('value' => 'false'));
		echo $this->Form->hidden('Control.cargo_laboral', array('value' => 'false'));
		echo $this->Form->hidden('Control.misma_particular', array('value' => 'false'));
		echo $this->Form->hidden('Control.misma_laboral', array('value' => 'false'));
		
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

		//echo $this->Form->input('medic_id',array('label'=>'M&eacute;dico'));
				
		if ($auth['group_id']!=2) {
			echo $this->Form->input('medic_id',array('label'=>'M&eacute;dico'));
		} else {
			echo "<div><label class='label_radio required'>M&eacute;dico</label>".$medic['Medic']['nombrecompleto']."</div>";
			echo $this->Form->hidden('medic_id',array('value'=>$auth['medic_id']));
		}
		
		echo "<div class=input>"; 
		echo "<label class='label_radio required'>C&oacute;digo</label>";
		echo "<input type='text' size='25' value='' id='sugerencias' class='inputlargo'><a class='iframe' title='Selector de C&oacute;digos OMS' href='".$this->Html->url(array("controller" => "oms_codes",	"action" => "help"))."'><img src='".$this->webroot."css/images/search.png' style='vertical-align: middle;' /></a>";
		echo "</div>";
		
		echo $this->Form->hidden('oms_code_id');
		echo $this->Form->input('fecha',array('label' => '&nbsp; Fecha Diagnositico','type' => 'text','value' => $hoyformateado));
		
		$options=array('0'=>'Desconocido','1'=>'1','2'=>'2','3'=>'3','4'=>'4');
		$attributes=array('legend'=>false,'value'=>'0','separator'=>'');	
		echo "<div>";
		echo "<label class='label_radio required'>Estad&iacute;o Inicial</label>";
		echo $this->Form->radio('estadio',$options,$attributes);
		echo "</div>";	
		
		echo "<div>";
		echo "<label class='label_radio required'>Estadificaci&oacute;n</label>";
		
		$options = array('Tx' => 'Tx','T0' => 'T0','Tis' => 'Tis','T1' => 'T1','T2' => 'T2','T3' => 'T3','T4' => 'T4');
		$attributes=array('legend'=>false,'value'=>'Tx','empty'=>false);
		echo $this->Form->select('codificacion.T', $options, $attributes);
		
		$options = array('A' => 'A','B' => 'B','C' => 'C');
		$attributes=array('legend'=>false,'value'=>'');
		echo $this->Form->select('codificacion.Tn', $options, $attributes);
		
		echo "   -   "; 
		
		$options = array('Nx' => 'Nx','N0' => 'N0','N1' => 'N1','N2' => 'N2','N3' => 'N3');
		$attributes=array('legend'=>false,'value'=>'Nx','empty'=>false);
		echo $this->Form->select('codificacion.N', $options, $attributes);
		
		$options = array('A' => 'A','B' => 'B','C' => 'C');
		$attributes=array('legend'=>false,'value'=>'');
		echo $this->Form->select('codificacion.Nn', $options, $attributes);
		
		echo "   -   "; 
		
		$options = array('Mx' => 'Mx','M0' => 'M0','M1' => 'M1');
		$attributes=array('legend'=>false,'value'=>'Mx','empty'=>false);
		echo $this->Form->select('codificacion.M', $options, $attributes);
		
		$options = array('A' => 'A','B' => 'B','C' => 'C');
		$attributes=array('legend'=>false,'value'=>'');
		echo $this->Form->select('codificacion.Mn', $options, $attributes);
		
		echo "</div>";


	?>	
		<div class=input>
		<input type="checkbox" id="chParticular" value="" checked onclick="checkParticular();"> Utilizar direcci&oacute;n particular actual del paciente. <b><?php echo $descParticular; ?></b>

		<fieldset id="fsParticular">
			<legend><?php echo __('Nueva Direcci&oacute;n Particular'); ?></legend>
			<select id="provinciasParticular">
			<?php foreach ($provinces as $key => $province): ?>
				<option value="<?php echo $key ?>"><?php echo $province ?></option>
			<?php endforeach; ?>
			</select><select id="localidadesParticular">
				<option value="0" selected>Seleccionar</option>
			</select><input type="text" size="25" value="Calle" id="calleParticular" class="clear-text-field">
			<input type="text" size="5" value="Altura" id="alturaParticular" class="clear-text-field">
			<a href="JavaScript:buscar('Particular');" id="comprobarParticular"><img id="imgbusquedaParticular" src="<?php echo $this->webroot; ?>img/search.png" style="vertical-align: middle;" /></a>
		</fieldset>
		</div>
		<div class=input>
		<input type="checkbox" id="chLaboral" value="" checked onclick="checkLaboral();"> Utilizar direcci&oacute;n laboral actual del paciente. <b><?php echo $descLaboral; ?></b>
		<fieldset id="fsLaboral">
			<legend><?php echo __('Nueva Direcci&oacute;n Laboral'); ?></legend>
			<select id="provinciasLaboral">
			<?php foreach ($provinces as $key => $province): ?>
				<option value="<?php echo $key ?>"><?php echo $province ?></option>
			<?php endforeach; ?>
			</select> 
			<select id="localidadesLaboral">
				<option value="0" selected>Seleccionar</option>
			</select><input type="text" size="25" value="Calle" id="calleLaboral" class="clear-text-field">
			<input type="text" size="5" value="Altura" id="alturaLaboral" class="clear-text-field">
			<a href="JavaScript:buscar('Laboral');" id="comprobarLaboral"><img id="imgbusquedaLaboral" src="<?php echo $this->webroot; ?>img/search.png" style="vertical-align: middle;" /></a>
		</fieldset>
		</div>
	</fieldset>
<?php echo $this->Form->end(__('Crear'));?>
</div>