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
	<?php echo $this -> Html -> charset('utf-8'); ?>
	<title>
		<?php echo $cakeDescription ?>
		<?php echo $title_for_layout; ?>
	</title>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=es&libraries=places&libraries=visualization"></script>

	<?php
	echo $this -> Html -> meta('icon');

	echo $this -> Html -> css('cake.generic');
	echo $this -> Html -> css('start/jquery-ui-1.8.19.custom');
	// Css de Jquery UI
	echo $this -> Html -> css('styles');
	// Css de plugin jquery autocompletar
	echo $this -> Html -> css('colorbox');
	// Css de Plugin jquery para ventanas modales
	echo $this -> Html -> css('menu');
	echo $this -> Html -> css('jquery.alerts');
	echo $this -> Html -> css('idtabs');

	echo $this -> fetch('meta');
	echo $this -> fetch('css');
	echo $this -> fetch('script');
	echo $this -> Html -> script('jquery-1.7.2.min');
	// Include jQuery library
	echo $this -> Html -> script('jquery-ui-1.8.19.min');
	// Include Jquery UI para calendarios y demas
	echo $this -> Html -> script('geocodev3');
	// Include jQuery library
	echo $this -> Html -> script('jquery.autocomplete-min');
	// Plugin jquery para autocompletamiento de codigos oms
	echo $this -> Html -> script('jquery.colorbox-min');
	// Plugin jquery para ventanas modales
	echo $this -> Html -> script('menu');
	echo $this -> Html -> script('geocan-utils');
	echo $this -> Html -> script('jquery.alerts');
	echo $this -> Html -> script('jquery.watermarkinput');
	?>
		<script type="text/javascript">
			var timer = null

			function fechaActual() {
				var time = new Date()
				var date = time.getDate();
				date = ((date < 10) ? "0" : "") + date
				var mes = time.getMonth() + 1;
				mes = ((mes < 10) ? "0" : "") + mes
				var anio = time.getFullYear();
				var hours = time.getHours()
				hours = ((hours < 10) ? "0" : "") + hours
				var minutes = time.getMinutes()
				minutes = ((minutes < 10) ? "0" : "") + minutes
				var seconds = time.getSeconds()
				seconds = ((seconds < 10) ? "0" : "") + seconds
				var clock = date + "/" + mes + "/" + anio + " " + hours + ":" + minutes + ":" + seconds
				//document.forms[0].display.value = clock
				$("#fechaActual").html(clock);
				timer = setTimeout("fechaActual()", 1000)
			}


			$(document).ready(function() {

				$('.success,.message').delay(5000).hide('fade', {
					color : '#EFEFEF'
				}, 1000);


				<?php if ($this->Session->read('PacienteActual') != '') {
				//echo $this->Html->link(utf8_encode('Volver a la ficha del �ltimo paciente consultado'),array('controller' => 'patients', 'action' => 'view', $this->Session->read('PacienteActual')));	
				?>
					$('.submit').append('<input type="button" id="btvolver" value="Volver a la ficha del Paciente" onClick="JavaScript:location.href='+ '\'<?php echo $this->webroot; ?>patients/view/<?php  echo $this->Session->read('PacienteActual'); ?>\'' + ';">');
					
				<?php
				}
				
				?>

				

				$('#loadingDiv').hide()// hide it initially
				.ajaxStart(function() {
					$(this).show();
				}).ajaxStop(function() {
					$(this).hide();
				});

			});

			function poneralgo() {

				$("#pepito").html("Contenido dinamico");
			}
	</script>
</head>
<body onLoad="fechaActual()">
	<div id="container">
		<div id="header"><div id="loadingDiv"><?php echo $this->Html->image('loading.gif', array('alt' => 'Cargando...'))?></div>
			<div id="header-logo"><a href="<?php echo $this -> Html -> url(array("controller" => "pages", "action" => "welcome")); ?>"><?php echo $this->Html->image('logo.jpg', array('alt' => 'GeoCan'))?></a></div>
			<div id="menucontainer">
				<ul id="nav">
					<?php if ($isAuthed) {  ?>
					<li class="top"><a href="<?php echo $this -> Html -> url(array("controller" => "pages", "action" => "welcome")); ?>" class="top_link"><span>Inicio</span></a></li>
					<li class="top"><a href="#nogo2" id="patients" class="top_link"><span class="down">Pacientes</span></a>
						<ul class="sub">
							<li><?php echo $this->Html->link('Buscar...',array('controller' => 'patients', 'action' => 'search'))?></li>
							<li><?php echo $this->Html->link('Nuevo Paciente',array('controller' => 'patients', 'action' => 'add'))?></li>
						</ul>
					</li>
					<li class="top"><a href="<?php echo $this -> Html -> url(array("controller" => "addresses", "action" => "reporte")); ?>" class="top_link"><span>Reporte</span></a></li>
					<li class="top"><a href="#nogo2" id="administration" class="top_link"><span class="down">Administraci&oacute;n</span></a>
						<ul class="sub">
							<li><a href="#" class="fly">Geolocaci&oacute;n</a>
								<ul>
									<?php if ($auth['group_id']==1) { ?>
										<li><?php echo $this->Html->link('Provincias',array('controller' => 'provinces', 'action' => 'index'))?></li>
									<?php } ?>
									<li><?php echo $this->Html->link('Ciudades',array('controller' => 'cities', 'action' => 'index'))?></li>
								</ul>
							</li>
							<?php if ($auth['group_id']==1) { ?>
								<li><a href="#" class="fly">M&eacute;dicos</a>
									<ul>
										<li><?php echo $this->Html->link(utf8_encode('M�dicos'),array('controller' => 'medics', 'action' => 'index'))?></li>
										<li><?php echo $this->Html->link(utf8_encode('Tipos de M�dicos'),array('controller' => 'medic_types', 'action' => 'index'))?></li>
									</ul>
								</li>
							<?php } ?>
							<li><a href="#" class="fly">Pacientes</a>
								<ul>
									<li><?php echo $this->Html->link(utf8_encode('Preguntas'),array('controller' => 'questions', 'action' => 'index'))?></li>
									<li><?php echo $this->Html->link(utf8_encode('Ocupaciones'),array('controller' => 'jobs', 'action' => 'index'))?></li>
								</ul>
								
							</li>
							<?php if ($auth['group_id']==1) { ?>
								<li><a href="#" class="fly">Usuarios</a>
									<ul>
										<li><?php echo $this->Html->link('Usuarios',array('controller' => 'users', 'action' => 'index'))?></li>
									</ul>
								</li>
							<?php } ?>
						</ul>
						<?php if ($auth['group_id']==1) { ?>
						<li class="top"><a href="<?php echo $this -> Html -> url(array("controller" => "audits", "action" => "index")); ?>" class="top_link"><span>Auditor&iacute;a</span></a></li>
						<?php } ?>
					</li>
					<li class="topder"><a href="#" class="top_link"><span id="fechaActual"></span></a></li>					
					<li class="topder"><a href="#" class="top_link"><span class="down"><?php echo $this -> Form -> label($auth['username']); ?></span></a>
					<ul class="sub">
						<li><?php echo $this->Html->link(utf8_encode('Cambiar Contrase�a'),array('controller' => 'users', 'action' => 'editPassword', $auth['id']))?></li>
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

			<?php echo $this -> Session -> flash(); ?>
			<?php echo $this -> Session -> flash('auth'); ?>

			<?php echo $this -> fetch('content'); ?>			
		</div>
	</div>
			<div id="footer">
			<b>GeoCan &copy; 2012</b> <br> Versi&oacute;n BETA - Por favor no ingresar datos reales. <br> La intensi&oacute;n de esta versi&oacute;n es poder probar las caracter&iacute;sticas del sistema y lograr una mejor experiencia de usuario.
			<br><?php echo $this->Html->image('soporteemail.png', array('alt' => 'GeoCan'))?>
		</div>
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-33234223-1']);
			_gaq.push(['_setDomainName', 'geocan.com.ar']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script');
				ga.type = 'text/javascript';
				ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(ga, s);
			})();

</script>
	<?php //echo $this -> element('sql_dump'); ?>
	
</body>

</html>
