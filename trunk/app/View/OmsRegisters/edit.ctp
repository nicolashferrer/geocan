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
		echo "<label class='label_radio required'>Estad&iacute;o Inicial</label>";
		echo $this->Form->radio('estadio',$options,$attributes);
		echo "</div>";	
		
		
		$cod = $this->request->data['OmsRegister']['codificacion']; 
		$grupos = split('@', $cod);
		$T= split(';', $grupos[0]);
		$N= split(';', $grupos[1]);
		$M= split(';', $grupos[2]);
		
		echo "<div>";
		echo "<label class='label_radio required'>Estadificaci&oacute;n</label>";
		
		$options = array('Tx' => 'Tx','T0' => 'T0','Tis' => 'Tis','T1' => 'T1','T2' => 'T2','T3' => 'T3','T4' => 'T4');
		$attributes=array('legend'=>false,'value'=> $T[0],'empty'=>false);
		echo $this->Form->select('codificacion.T', $options, $attributes);
		
		$options = array('A' => 'A','B' => 'B','C' => 'C');
		$attributes=array('legend'=>false,'value'=>$T[1]);
		echo $this->Form->select('codificacion.Tn', $options, $attributes);
		
		echo "   -   "; 
		
		$options = array('Nx' => 'Nx','N0' => 'N0','N1' => 'N1','N2' => 'N2','N3' => 'N3');
		$attributes=array('legend'=>false,'value'=>$N[0],'empty'=>false);
		echo $this->Form->select('codificacion.N', $options, $attributes);
		
		$options = array('A' => 'A','B' => 'B','C' => 'C');
		$attributes=array('legend'=>false,'value'=>$N[1]);
		echo $this->Form->select('codificacion.Nn', $options, $attributes);
		
		echo "   -   "; 
		
		$options = array('Mx' => 'Mx','M0' => 'M0','M1' => 'M1');
		$attributes=array('legend'=>false,'value'=>$M[0],'empty'=>false);
		echo $this->Form->select('codificacion.M', $options, $attributes);
		
		$options = array('A' => 'A','B' => 'B','C' => 'C');
		$attributes=array('legend'=>false,'value'=>$M[1]);
		echo $this->Form->select('codificacion.Mn', $options, $attributes);
		
		echo "</div>";
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Editar'));?>
</div>
