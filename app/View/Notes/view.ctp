<div class="notes view">
	<fieldset>
	<legend><?php echo __('Nota'); ?></legend>
	<dl>
		<dt><?php echo __('M&eacute;dico'); ?></dt>
		<dd>
			<?php echo h($note['Medic']['nombrecompleto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contenido'); ?></dt>
		<dd>
			<?php echo ($note['Note']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha'); ?></dt>
		<dd>
			<?php echo h($note['Note']['fecha']); ?>
			&nbsp;
		</dd>
	</dl>
	<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Editar Nota'), array('action' => 'edit', $note['Note']['id'])); ?> </li>
			</ul>
		</div>
	</fieldset>
	<form><div class="submit"></div></form>
</div>
