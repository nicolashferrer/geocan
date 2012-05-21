<div class="notes form">
<?php echo $this->Form->create('Note');?>
	<fieldset>
		<legend><?php echo __('Agregar nota'); ?></legend>
	<?php
		echo $this->Form->hidden('Note.oms_register_id',array('value'=>$id));
		
		echo $this->Form->input('medic_id',array('label'=>'M&eacute;dico'));
		echo $this->Form->input('descripcion',array('label'=>'Descripci&oacute;n','size' => '100%'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Notes'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Medics'), array('controller' => 'medics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medic'), array('controller' => 'medics', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Oms Registers'), array('controller' => 'oms_registers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Oms Register'), array('controller' => 'oms_registers', 'action' => 'add')); ?> </li>
	</ul>
</div>
