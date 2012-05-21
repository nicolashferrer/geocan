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
		echo $this->Html->css('colorbox'); // Css de Plugin jquery para ventanas modales
		echo $this->Html->css('menu'); 
	
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->script('jquery-1.7.2.min'); // Include jQuery library
		echo $this->Html->script('jquery-ui-1.8.19.min'); // Include Jquery UI para calendarios y demas
		echo $this->Html->script('geocodev3'); // Include jQuery library
		echo $this->Html->script('jquery.autocomplete-min'); // Plugin jquery para autocompletamiento de codigos oms
		echo $this->Html->script('jquery.colorbox-min'); // Plugin jquery para ventanas modales
		echo $this->Html->script('menu');
		echo $this->Html->script('geocan-utils');
		
	?>
		<script type="text/javascript">
		var timer = null

		function fechaActual(){
			var time = new Date()
			var date = time.getDate();
			date=((date < 10) ? "0" : "") + date
			var mes = time.getMonth()+1;
			mes=((mes < 10) ? "0" : "") + mes
			var anio = time.getFullYear();
			var hours = time.getHours()
			hours=((hours < 10) ? "0" : "") + hours
			var minutes = time.getMinutes()
			minutes=((minutes < 10) ? "0" : "") + minutes
			var seconds = time.getSeconds()
			seconds=((seconds < 10) ? "0" : "") + seconds
			var clock = date + "/" + mes + "/" + anio + " " + hours + ":" + minutes + ":" + seconds
			//document.forms[0].display.value = clock
			$("#fechaActual").html(clock);
			timer = setTimeout("fechaActual()",1000)
		}
	
	$(document).ready(function() { 
	
		$('.success,.message').delay(5000).hide('fade', {color: '#EFEFEF'}, 1000);
		
				
	});
	</script>
</head>
<body onLoad="fechaActual()">
	<div id="container">
		<div id="header">
			<div id="header-logo"><a href="<?php echo $this->Html->url(array("controller" => "patients","action" => "search"));?>"><?php echo $this->Html->image('logo.jpg', array('alt' => 'GeoCan'))?></a></div>
			<div id="menucontainer">
				<ul id="nav">
					<?php if ($isAuthed) {  ?>
					<li class="top"><a href="<?php echo $this->Html->url(array("controller" => "patients","action" => "search"));?>" class="top_link"><span>Inicio</span></a></li>
					<li class="top"><a href="#nogo2" id="patients" class="top_link"><span class="down">Pacientes</span></a>
						<ul class="sub">
							<li><?php echo $this->Html->link('Buscar...',array('controller' => 'patients', 'action' => 'search'))?></li>
							<li><?php echo $this->Html->link('Nuevo Paciente',array('controller' => 'patients', 'action' => 'add'))?></li>
						</ul>
					</li>
					<li class="top"><a href="#nogo2" id="administration" class="top_link"><span class="down">Administraci&oacute;n</span></a>
						<ul class="sub">
							<li><?php echo $this->Html->link('Usuarios',array('controller' => 'users', 'action' => 'index'))?></li>
							<li><?php echo $this->Html->link('Grupos',array('controller' => 'groups', 'action' => 'index'))?></li>
						</ul>
					</li>
					<li class="topder"><a href="#" class="top_link"><span id="fechaActual"></span></a></li>					
					<li class="topder"><a href="#" class="top_link"><span class="down"><?php echo $this->Form->label($auth['username']); ?></span></a>
					<ul class="sub">
						<li><?php echo $this->Html->link(utf8_encode('Cambiar Contraseña'),array('controller' => 'users', 'action' => 'logout'))?></li>
						<li><?php echo $this->Html->link('Salir',array('controller' => 'users', 'action' => 'logout'))?></li>
					</ul>
					</li>
					<?php } else { ?>
					<li class="topder"><a href="#" class="top_link"><span id="fechaActual"></span></a></li>	
					<?php } ?>
					
				</ul>
			</div>
			
		</div>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>
			<?php echo $this->Session->flash('auth'); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			GeoCan&copy; 2012 
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
