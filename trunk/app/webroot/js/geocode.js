function buscar() {
	
	var g = new GoogleGeocode('ABQIAAAAwkWhQa0bJFP_LG6ECJqFvRTtYauscGxxsCcBsgH34zGWVYfjkBQm5qCPHIv3D1GUdBz_ppnNJ8ktbA');
	var address = jQuery('#address').val();
	g.geocode(address, function(data) {
	if(data != null) {
//		alert("latitude: " +data.latitude + " longitude: " + data.longitude );
	$("#resultados").append("<p><b>" + address + "</b> lat: " + data.latitude + " long: " + data.longitude +
	" <a href=http://maps.google.com/maps?q="+data.latitude+","+data.longitude+" target='_blank'>Comprobar Coordenadas!</a>"
	+
	 "</p>");
	} else {
		alert('ERROR! Unable to geocode address');
	}
	});
}

// para probar las coordenadas se puede ir aca http://maps.google.com/maps?q=-38.7177301,%20-62.2638319



$(function() {
	$('#btbuscar').click(buscar());
});