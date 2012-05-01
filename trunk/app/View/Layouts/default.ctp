<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'GeoCan');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset('utf-8'); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=es&libraries=places""></script>  
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('start/jquery-ui-1.8.19.custom'); // Css de Jquery UI
		echo $this->Html->css('styles'); // Css de plugin jquery autocompletar
	
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->script('jquery-1.7.2.min'); // Include jQuery library
		echo $this->Html->script('jquery-ui-1.8.19.min'); // Include Jquery UI para calendarios y demas
		echo $this->Html->script('geocodev3'); // Include jQuery library
		echo $this->Html->script('jquery.autocomplete-min'); // Plugin jquery para autocompletamiento de codigos oms
		
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<div id="header-logo">
			<?php echo $this->Html->image('logo.jpg', array('alt' => 'GeoCan'))?>
			</div>
			<div id="header-statusbar">
			<?php if ($isAuthed): ?>
				<?php echo $this->Form->label('Usuario:'); ?>
				<?php echo $this->Form->label($auth['username']); ?>
				<?php echo $this->Form->label('|'); ?>
				<?php echo $this->Html->link('Salir',array('controller' => 'users', 'action' => 'logout'))?>
			<?php endif; ?>
			</div>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			GeoCan &copy; 2012
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
