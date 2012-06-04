<script type="text/javascript">
		
	function checkMedico() {
	
		var estado = $('#chMedico').is(':checked');
		
		//$('#fsMedico').toggle();
		
		if ((estado==false) && ($('#UserGroupId').val()=='2'))
		{
			$('#chMedico').attr("checked",true);
			jAlert('Un medico debe tener un medico seleccionado',tituloinfo);
		}
		else
		{
			$('#fsMedico').toggle();
			$('#ControlConMedico').val(estado);	
		}
	}

	$(document).ready(function() {
	
		$('#UserGroupId').change(function(){
		if (($(this).val()=='2') && (!$('#chMedico').is(':checked')))
		{
			$('#chMedico').attr("checked",true);
			checkMedico();
		}
		});
	
	});

</script>

<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Agregar Usuario'); ?></legend>
		<?php
			echo $this->Form->input('username',array('label'=>'Nombre Usuario'));
			echo $this->Form->input('group_id',array('label'=>'Grupo'));
			echo $this->Form->hidden('Control.conMedico', array('value' => 'true'));
		?>
		
		<div class=input>
			<input type="checkbox" id="chMedico" value="" checked onclick="checkMedico();"/> Asociar Medico<br />
			<div id="fsMedico">
					<?php 
						echo $this->Form->input('medic_id',array('label'=>'Medico'));
					?>
			</div>
		</div>
	</fieldset>
<?php echo $this->Form->end(__('Agregar'));?>
