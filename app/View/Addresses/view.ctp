<div class="addresses view">
<h2><?php  echo __('Address');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($address['Address']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo $this->Html->link($address['City']['id'], array('controller' => 'cities', 'action' => 'view', $address['City']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Latitud'); ?></dt>
		<dd>
			<?php echo h($address['Address']['latitud']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Longitud'); ?></dt>
		<dd>
			<?php echo h($address['Address']['longitud']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Address'), array('action' => 'edit', $address['Address']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Address'), array('action' => 'delete', $address['Address']['id']), null, __('Are you sure you want to delete # %s?', $address['Address']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Address'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
	</ul>
</div>
