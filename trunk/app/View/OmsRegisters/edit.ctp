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

		echo $this->Form->hidden('id');
		
		
		if (($auth['group_id']==1)||($auth['group_id']==3)||(($auth['group_id']==2) && ($auth['medic_id']==$this->request->data['Medic']['id'])))
		{
			if ($auth['group_id']!=2){
				echo $this->Form->input('medic_id',array('label'=>'M&eacute;dico')); 
			} else {
				echo "<div><label class='label_radio required'>M&eacute;dico</label>".$this->request->data['Medic']['nombrecompleto']."</div>";

				echo $this->Form->hidden('medic_id');
				echo $this->Form->hidden('Medic.nombrecompleto',array("value" => $this->request->data['Medic']['nombrecompleto']));
			}
		
			echo $this->Form->input('fecha',array('label' => '&nbsp; Fecha','type' => 'text','value' => $this->request->data['OmsRegister']['fecha'] ));
		}
		
		$options=array('0'=>'Desconocido','1'=>'1','2'=>'2','3'=>'3','4'=>'4');
		$attributes=array('legend'=>false,'value'=> $this->request->data['OmsRegister']['estadio'] ,'separator'=>'');	
		echo "<div>";
		echo "<label class='label_radio required'>Estad&iacute;o</label>";
		echo $this->Form->radio('estadio',$options,$attributes);
		echo "</div>";	
	?>
	</fieldset>
<?php echo $this->Form->end(__('Editar'));?>
</div>
