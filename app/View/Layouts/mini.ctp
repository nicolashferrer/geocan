<?php

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
	
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->script('jquery-1.7.2.min'); // Include jQuery library
		echo $this->Html->script('jquery-ui-1.8.19.min'); // Include Jquery UI para calendarios y demas
		
	?>
</head>
<body>
	<div id="content">
		<?php echo $this->fetch('content'); ?>
	</div>
</body>
</html>