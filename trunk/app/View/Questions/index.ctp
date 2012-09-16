<div class="questions index">
	<fieldset>
		<legend><?php echo __('Preguntas'); ?></legend>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Nueva Pregunta'), array('action' => 'add')); ?></li>
			</ul>
		</div>
		<table cellpadding="0" cellspacing="0">
		<tr>
				<th><?php echo $this->Paginator->sort('descripcion');?></th>
				<th><?php echo $this->Paginator->sort('visible');?></th>
				<th class="actions"></th>
		</tr>
		<?php foreach ($questions as $question): ?>
			<tr>
				<td><?php echo h($question['Question']['descripcion']); ?>&nbsp;</td>
				<td><?php 
						if ($question['Question']['visible']==true)
							echo 'Si'; 
						else
							echo 'No';
					?>
					&nbsp;
				</td>
				<td class="actions">
					<?php echo $this->Html->link(__('Modificar'), array('action' => 'edit', $question['Question']['id'])); ?>
					<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $question['Question']['id']), null, __('Esta seguro que desea eliminar la pregunta "%s"?', $question['Question']['descripcion'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
		<p>
			<?php
			echo $this->Paginator->counter(array(
			'format' => __('Paginas {:page} de {:pages}')
			));
			?>	
		</p>

		<div class="paging">
		<?php
			echo $this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
			echo $this->Paginator->numbers(array('separator' => ''));
			echo $this->Paginator->next(__('siguiente') . ' >', array(), null, array('class' => 'next disabled'));
		?>
		</div>
	</fieldset>
</div>
