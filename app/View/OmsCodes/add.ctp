<div class="omsCodes form">
<?php echo $this->Form->create('OmsCode');?>
	<fieldset>
		<legend><?php echo __('Agregar Codigo OMS'); ?></legend>
		<?php
			echo $this->Form->input('codigo');
			echo $this->Form->input('descripcion');
			echo $this->Form->input('padre');
		?>
	</fieldset>
<?php echo $this->Form->end(__('Agregar'));?>
</div>

