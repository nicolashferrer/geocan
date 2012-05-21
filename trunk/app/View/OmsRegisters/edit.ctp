<script>
	$(document).ready(function() {
	
			$('#OmsRegisterFecha').datepicker(datepicker_config);
	});
</script>
<div class="omsRegisters form">
<?php echo $this->Form->create('OmsRegister');?>
	<fieldset>
		<legend><?php echo __('Editar Oms'); ?></legend>
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
