<script type="text/javascript">
$(document).ready(function() {
    $('#primerNivel').change(function(){
		
		$("#btok").attr("disabled","disabled");
		
		var primercodigo = $('#primerNivel').val();
		var primertexto = $('#primerNivel option:selected').text();
		if (primercodigo != '') {
			
			$('#desc').val(primertexto);
		
			$.getJSON('<?php echo $this->Html->url(array(
	"controller" => "oms_codes",
	"action" => "getSigNivel"));?>' + '/' + $(this).val(), function(data){
				$('#segundoNivel').empty();
				$('#tercerNivel').empty();
				if (data.length > 0) {
					$.each(data, function(optionIndex, option) {
						var html = "<option value=\"" + option['id'] + ',' + option['codigo'] + "\">" + option['descripcion'] + "</option>";
						$('#segundoNivel').append(html);
					});
				}
			});
		} else {
			$('#segundoNivel').empty();
			$('#tercerNivel').empty();
		}
    });
	
	$('#segundoNivel').change(function(){
		
		$("#btok").removeAttr("disabled");
		
		var segundocodigo = $('#segundoNivel').val();
		
		var segundotexto = $('#segundoNivel option:selected').text();
		if (segundocodigo != '') {
		
			var aux = segundocodigo.split(',');
			segundocodigo = aux[1];
			
			$('#id').val(aux[0]);
			$('#codigo').val(segundocodigo);
			$('#desc').val(segundotexto);	
			
			$.getJSON('<?php echo $this->Html->url(array(
	"controller" => "oms_codes",
	"action" => "getSigNivel"));?>' + '/' + segundocodigo, function(data){
				$('#tercerNivel').empty();
				if (data.length > 0) {
					$.each(data, function(optionIndex, option) {
						var html = "<option value=\"" + option['id'] + ',' + option['codigo'] + "\">" + option['descripcion'] + "</option>";
						$('#tercerNivel').append(html);
					});
				}
			});
		} else {
			$('#tercerNivel').empty();
		}
    });
	
	$('#tercerNivel').change(function(){
		var tercercodigo = $('#tercerNivel').val();
		var tercertexto = $('#tercerNivel option:selected').text();
		
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
<select id="primerNivel" size="2" class="ayudaCodigos">
<?php foreach ($codigos as $codigo => $desc): ?>
	<option value="<?php echo $codigo ?>"><?php echo $desc ?></option>
<?php endforeach; ?>
</select>
<select id="segundoNivel" size="2" class="ayudaCodigos">
</select>
<select id="tercerNivel" size="2" class="ayudaCodigos">
</select><br>
C&oacute;digo: <input id="codigo" type="text" size="5" value="" class="inputcorto" disabled="disabled">
<input type="button" value="OK" onclick="ok();" id="btok">