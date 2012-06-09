<script type="text/javascript" charset="utf-8">
		
	function checkMedico() {
	
		var estado = $('#chMedico').is(':checked');
		
		//$('#fsMedico').toggle();
		
		if ((estado==false) && ($('#UserGroupId').val()=='2'))
		{
			$('#chMedico').attr("checked",true);
			alert('Un medico debe tener un medico seleccionado');
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
		
		<?php
			if ($this->data['User']['medic_id']!=null)
			{
		?>
			$('#chMedico').attr("checked",true);	
			checkMedico();
		<?php
			}
		?>
		
	});

</script>

<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Modificar Usuario'); ?></legend>
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('username',array('label'=>'Nombre Usuario', 'readonly' => 'readonly'));
			echo $this->Form->input('group_id',array('label'=>'Grupo'));
			echo $this->Form->hidden('Control.conMedico', array('value' => 'false'));
			//debug($this->data['User']['medic_id']);
		?>
		<div class=input>
			<input type="checkbox" id="chMedico" value="" onclick="checkMedico();"/> Con Medico<br />
			<div id="fsMedico" style="display:none">
					<?php 
						echo $this->Form->input('medic_id',array('label'=>'Medico'));
					?>
			</div>
		</div>
	</fieldset>
<?php echo $this->Form->end(__('Modificar'));?>
</div>
