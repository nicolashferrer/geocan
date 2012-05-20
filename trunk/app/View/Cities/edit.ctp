<div class="cities form">
<?php echo $this->Form->create('City');?>
	<fieldset>
		<legend><?php echo __('Modificar Ciudad'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('province_id',array('label' => 'Provincia'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Modificar'));?>
</div>
