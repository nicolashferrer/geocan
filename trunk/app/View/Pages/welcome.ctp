<table width="100%" border="0" align="center" cellspacing="60">
  <tr class="welcome">
    <td class="welcome" style="text-align:right !important;"><a href="<?php echo $this -> Html -> url(array("controller" => "patients", "action" => "search")); ?>"><?php echo $this->Html->image('busqueda.png', array('alt' => 'GeoCan'))?></a></td>
    <td class="welcome" style="text-align:left !important;"><a href="<?php echo $this -> Html -> url(array("controller" => "patients", "action" => "add")); ?>"><?php echo $this->Html->image('altapaciente.png', array('alt' => 'GeoCan'))?></a></td>
  </tr>
  <tr class="welcome">
    <td class="welcome"style="text-align:right !important;"><a href="<?php echo $this -> Html -> url(array("controller" => "addresses", "action" => "reporte")); ?>"><?php echo $this->Html->image('estadisticas.png', array('alt' => 'GeoCan'))?></a></td>
    <td class="welcome"style="text-align:left !important;"><a href="mailto:soporte@geocan.com.ar"><?php echo $this->Html->image('contacto.png', array('alt' => 'GeoCan'))?></a></td>
  </tr>
</table>