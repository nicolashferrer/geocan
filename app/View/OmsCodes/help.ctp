<script type="text/javascript">
$(document).ready(function() {
	
	
	$(".ayudaCodigosItem").live( "click", function() { 
		
		var nivel = $(this).attr("nivel");
		
		//Despinto todos los items del nivel al que pertenece el item clickeado
		$(".ayudaCodigosItem[nivel='" + nivel + "']").removeClass('selected');
		
		//Pinto el item clickeado
		$(this).addClass('selected');
		
		//Disparo la funcion dependiendo del nivel...
		$("#"+nivel).trigger('change');
		
		} )
	
	
	
    $('#primerNivel').change(function(){
    		
		$("#btok").attr("disabled","disabled");
		
		var primercodigo = $('#primerNivel > .selected').attr("value");
	
		var primertexto = $('#primerNivel > .selected').text();	
		
		if (primercodigo != '') {
			
			$('#desc').val(primertexto);
		
			$.getJSON('<?php echo $this->Html->url(array(
	"controller" => "oms_codes",
	"action" => "getSigNivel"));?>' + '/' + primercodigo, function(data){
				$('#segundoNivel').html("");
				$('#tercerNivel').html("");
				if (data.length > 0) {
					$.each(data, function(optionIndex, option) {
						
						var html = "<div class='ayudaCodigosItem' nivel='segundoNivel' value=\"" + option['id'] + ',' + option['codigo'] + "\">" + option['descripcion'] + "</div>";
						
						$('#segundoNivel').append(html);
					});
				} else {
					$('#segundoNivel').html("");
					$('#tercerNivel').html("");
				}
			});
		} else {
			$('#segundoNivel').html("");
			$('#tercerNivel').html("");
		}
    });
	
	$('#segundoNivel').change(function(){
			
		$("#btok").removeAttr("disabled");
		
		var segundocodigo = $('#segundoNivel > .selected').attr("value");
		
		var segundotexto = $('#segundoNivel > .selected').text();
		
		if (segundocodigo != '') {
		
			var aux = segundocodigo.split(',');
			segundocodigo = aux[1];
					
			$('#id').val(aux[0]);
			$('#codigo').val(segundocodigo);
			$('#desc').val(segundotexto);	
			
			$.getJSON('<?php echo $this->Html->url(array(
	"controller" => "oms_codes",
	"action" => "getSigNivel"));?>' + '/' + segundocodigo, function(data){
				$('#tercerNivel').html("");
				if (data.length > 0) {
					$.each(data, function(optionIndex, option) {
					
						var html = "<div class='ayudaCodigosItem' nivel='tercerNivel' value=\"" + option['id'] + ',' + option['codigo'] + "\">" + option['descripcion'] + "</div>";
						//var html = "<option value=\"" + option['id'] + ',' + option['codigo'] + "\">" + option['descripcion'] + "</option>";
						$('#tercerNivel').append(html);
					});
				} else {
					$('#tercerNivel').html("No hay subopciones para seleccionar.");
				}
			});
		} else {
			$('#tercerNivel').html("No hay subopciones para seleccionar.");
		}
    });
	
	$('#tercerNivel').change(function(){
		var tercercodigo = $('#tercerNivel > .selected').attr("value");
		var tercertexto = $('#tercerNivel > .selected').text();
		
		var aux = tercercodigo.split(',');
		tercercodigo = aux[1];
		$('#id').val(aux[0]);
		$('#codigo').val(tercercodigo);	
		$('#desc').val(tercertexto);	
    });
	
});

	function ok(){
		var codigo = $('#codigo').val();
		var texto = $('#desc').val();
		var id = $('#id').val();
		var resultado = codigo + ' - ' + texto; 
		top.cambiarCodigo(id,resultado);
	}
</script>
<input type="hidden" value="" id="id">
<input type="hidden" value="" id="desc">
<div id="primerNivel" class="ayudaCodigos">
<?php foreach ($codigos as $codigo => $desc): ?>
	<div value="<?php echo $codigo ?>" class="ayudaCodigosItem" nivel="primerNivel"><?php echo $desc ?></div>
<?php endforeach; ?>
</div>

<div id="segundoNivel" class="ayudaCodigos">
</div>

<div id="tercerNivel" class="ayudaCodigos">
</div>
C&oacute;digo: <input id="codigo" type="text" size="5" value="" class="inputcorto" disabled="disabled">
<input type="button" value="OK" onclick="ok();" id="btok">