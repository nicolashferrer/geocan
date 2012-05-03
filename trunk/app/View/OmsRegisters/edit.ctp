<script>
	$(document).ready(function() {
	
			$('#OmsRegisterFecha').datepicker({ dateFormat: "dd/mm/yy", 
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
				selectOtherMonths: true
			});
	});
</script>
<div class="omsRegisters form">
<?php echo $this->Form->create('OmsRegister');?>
	<fieldset>
		<legend><?php echo __('Edit Oms Register'); ?></legend>
	<?php
		//debug($omsregister);
	
		echo $this->Form->hidden('id',array('value' => $omsregister['OmsRegister']['id']));
		//echo $this->Form->hidden('patient_id',array('value' => $omsregister['OmsRegister']['patient_id']));
		echo $this->Form->input('medic_id',array('label'=>'M&eacute;dico','value' => $omsregister['OmsRegister']['medic_id']));
		//echo $this->Form->input('address_part_id');
		//echo $this->Form->input('address_lab_id');
		//echo $this->Form->input('oms_code_id');
		//echo $this->Form->input('fecha');
		echo $this->Form->input('fecha',array('label' => '&nbsp; Fecha','type' => 'text','value' => $omsregister['OmsRegister']['fecha'] ));
		
		$options=array('0'=>'Desconocido','1'=>'1','2'=>'2','3'=>'3','4'=>'4');
		$attributes=array('legend'=>false,'value'=> $omsregister['OmsRegister']['estadio'] ,'separator'=>'');	
		echo "<div class=input>";
		echo $this->Form->label("Estad&iacute;o");
		echo $this->Form->radio('estadio',$options,$attributes);
		echo "</div>";	
	?>
	</fieldset>
<?php echo $this->Form->end(__('Editar'));?>
</div>
