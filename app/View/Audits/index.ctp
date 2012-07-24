<div class="medics index">
	<fieldset>
		<legend><?php echo __('Auditor&iacute;a'); ?></legend>
		<table cellpadding="0" cellspacing="0">
		<tr>
				<th><?php echo $this->Paginator->sort('event');?></th>
				<th><?php echo $this->Paginator->sort('model');?></th>
				<th><?php echo $this->Paginator->sort('entity_id');?></th>
				<th class="actions"></th>
		</tr>
		<?php
		foreach ($audits as $audit): ?>
		<tr>
			<td><?php echo h($audit['Audit']['event']); ?>&nbsp;</td>
			<td><?php echo h($audit['Audit']['model']); ?>&nbsp;</td>
			<td><?php echo h($audit['Audit']['entity_id']); ?>&nbsp;</td>
			<td class="actions">
				
			</td>
		</tr>
	<?php endforeach; ?>
		</table>
		<p>
		<?php
		echo $this->Paginator->counter(array(
		'format' => __('Pagina {:page} de {:pages}')
		));
		?>	</p>

		<div class="paging">
		<?php
			echo $this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
			echo $this->Paginator->numbers(array('separator' => ''));
			echo $this->Paginator->next(__('siguiente') . ' >', array(), null, array('class' => 'next disabled'));
		?>
		</div>
	</fieldset>
</div>
