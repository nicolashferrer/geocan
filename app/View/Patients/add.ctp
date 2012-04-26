<script type="text/javascript" charset="utf-8">
	
$(document).ready(function() {

	$('#PatientFechaNacimiento').datepicker({ dateFormat: "dd/mm/yy", 
	changeMonth: true, changeYear: true, constrainInput: true, 
	showOn: "button", buttonImage: "<?php echo $this->webroot; ?>img/calendar.png", buttonImageOnly: true,
	yearRange: "1930:2020", monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
	'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	monthNamesShort: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
	'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
	dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
	dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
	showOtherMonths: true,
	selectOtherMonths: true,
	altFormat: "yy-mm-dd"  // IMPORTANTISIMOOOOOOOOOOOOOOOOOOOOOOOOOOOO
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
	
	$('#provinciasParticular').val(1);
	$('#provinciasParticular').trigger("change");
	$('#provinciasLaboral').val(1);
	$('#provinciasLaboral').trigger("change");
});
</script>
<div class="patients form">
<?php echo $this->Form->create('Patient');?>
	<fieldset>
		<legend><?php echo __('Información Basica'); ?></legend>
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
		
		echo $this->Form->input('nro_documento',array('label' => 'Número De Documento'));
		echo $this->Form->input('iniciales');
		echo $this->Form->input('fecha_nacimiento',array('label' => 'Fecha De Nacimiento', 'type' => 'text'));
		$options=array('M'=>'Masculino','F'=>'Femenino');
		$attributes=array('legend'=>false,'value'=>'M','separator'=>'');	
		echo "<div class=input>";
		echo $this->Form->label("Sexo");
		echo $this->Form->radio('sexo',$options,$attributes);
		echo "</div>";
		
		?>
				<fieldset>
					<legend><?php echo __('Direccion Particular'); ?></legend>
					<select id="provinciasParticular">
					<?php foreach ($provinces as $key => $province): ?>
						<option value="<?php echo $key ?>"><?php echo $province ?></option>
					<?php endforeach; ?>
					</select><select id="localidadesParticular">
						<option value="0" selected>Seleccionar</option>
					</select><input type="text" size="25" value="Nombre de la Calle" id="calleParitulcar"><input type="text" size="25" class="inputcorto" value="Altura" id="alturaParticular">
					<a href="JavaScript:buscar('Particular');" id=comprobarParticular"><img src="<?php echo $this->webroot; ?>img/search.png" style="vertical-align: middle;" /></a>
				</fieldset>
				<fieldset>
					<legend><?php echo __('Direccion Laboral'); ?></legend>
					<select id="provinciasLaboral">
					<?php foreach ($provinces as $key => $province): ?>
						<option value="<?php echo $key ?>"><?php echo $province ?></option>
					<?php endforeach; ?>
					</select> 
					<select id="localidadesLaboral">
						<option value="0" selected>Seleccionar</option>
					</select><input type="text" size="25" value="Nombre de la Calle" id="calleLaboral"><input type="text" size="25" class="inputcorto" value="Altura" id="alturaLaboral">
					<a href="JavaScript:buscar('Laboral');" id=comprobarLaboral"><img src="<?php echo $this->webroot; ?>img/search.png" style="vertical-align: middle;" /></a>
				</fieldset>
		</fieldset>
		<br>
		<fieldset>
			<legend><?php echo __('Informacion Adicional'); ?></legend>
			<?php
			
			$i = 0;
			foreach ($questions as $question):
			
				$opciones=array('1'=>'Si','0'=>'No',''=>'No Contesta');
				$atributos=array('legend'=>false,'value'=>'','separator'=>'');
				echo "<div class=input>";
				echo $this->Form->label($question['Question']['descripcion']);
				echo $this->Form->hidden('Answer.'.$i.'.question_id', array('value' => $question['Question']['id']));
				//echo $this->Form->hidden('Answer.'.$i.'patient_id', array('value' => ''));
				echo $this->Form->radio('Answer.'.$i.'.valor',$opciones,$atributos);
				echo "</div>";
				//echo '<br>';
				$i++;
			
			endforeach;	
		?>
		</fieldset>

<?php echo $this->Form->end(__('Dar de Alta'));?>
</div>