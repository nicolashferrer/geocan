<div class="omsRegisters form">
<?php echo $this->Form->create('OmsRegister');?>
	<fieldset>
		<legend><?php echo __('Add Oms Register'); ?></legend>
	<?php
	
		// debug($patient);
		//debug($patient['Primary']['id']);
		//debug($patient['Secondary']['id']);
	
		echo $this->Form->hidden('patient_id', array('value' => $patient['Patient']['id']));
		
		
		// Aca van los ids de las direcciones actuales del usuario por si es necesario usarlas
		
		echo $this->Form->hidden('Aux.particular_actual', array('value' => $patient['Primary']['id']));
		echo $this->Form->hidden('Aux.laboral_actual', array('value' => $patient['Secondary']['id']));
		
		// Control para ver si el usuario carga nuevas direcciones o se usan las anteriores		
		echo $this->Form->hidden('Control.cargo_particular', array('value' => 'false'));
		echo $this->Form->hidden('Control.cargo_laboral', array('value' => 'false'));

		echo $this->Form->input('medic_id');
		echo $this->Form->input('oms_code_id');
		
		echo $this->Form->input('fecha');
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Crear'));?>
</div>
