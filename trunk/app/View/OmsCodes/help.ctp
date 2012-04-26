<script type="text/javascript">
$(document).ready(function() {
    $('#primerNivel').change(function(){
		
		var $primercodigo = $('#primerNivel').val();
		if ($primercodigo != '') {
			
			$('#codigo').val($primercodigo);
		
			$.getJSON('<?php echo $this->Html->url(array(
	"controller" => "omscodes",
	"action" => "getSigNivel"));?>' + '/' + $(this).val(), function(data){
				$('#segundoNivel').empty();
				$('#tercerNivel').empty();
				if (data.length > 0) {
					$.each(data, function(optionIndex, option) {
						var html = "<option value=\"" + option['codigo'] + "\">" + option['descripcion'] + "</option>";
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
		
		var $segundocodigo = $('#segundoNivel').val();
		if ($segundocodigo != '') {
		
			$('#codigo').val($segundocodigo);
			
			$.getJSON('<?php echo $this->Html->url(array(
	"controller" => "omscodes",
	"action" => "getSigNivel"));?>' + '/' + $(this).val(), function(data){
				$('#tercerNivel').empty();
				if (data.length > 0) {
					$.each(data, function(optionIndex, option) {
						var html = "<option value=\"" + option['codigo'] + "\">" + option['descripcion'] + "</option>";
						$('#tercerNivel').append(html);
					});
				}
			});
		} else {
			$('#tercerNivel').empty();
		}
    });
	
	$('#tercerNivel').change(function(){
		var $tercercodigo = $('#tercerNivel').val();
		$('#codigo').val($tercercodigo);	
    });
	
});
</script>
<select id="primerNivel" size="2">
<?php foreach ($codigos as $codigo => $desc): ?>
	<option value="<?php echo $codigo ?>"><?php echo $desc ?></option>
<?php endforeach; ?>
</select>
<select id="segundoNivel" size="2">
</select>
<select id="tercerNivel" size="2">
</select><br>
C&oacute;digo: <input id="codigo" type="text" size="5" value="">