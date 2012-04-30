
$(document).ready(function(){
	
	/*
	
	El autocompletar todavia no sirve mucho porque no se puede limitar a una ciudad o provincia!
	Solo se puede limitar a un pais, y te muestra cualquier fruta!
	
	var options = {
	  types: ['geocode'],
	  componentRestrictions: {country: "ar" }
	 };

	 var input = document.getElementById('calle');

	 var autocomplete = new google.maps.places.Autocomplete(input, options);
	 */
});


//tipoDireccion = "laboral" o "particular"
function buscar(tipoDireccion) {
	
	var provincia = $('#provincias'+tipoDireccion+' option:selected').text();
	var localidad = $('#localidades'+tipoDireccion+' option:selected').text();
	var calle = $('#calle'+tipoDireccion).val();
	var altura = $('#altura'+tipoDireccion).val();
	
	var altura_redondeada = Math.round(altura/100) * 100;
	
	if (altura_redondeada == 0) {
		altura_redondeada = 1;
	}
	
	if (isNaN(altura_redondeada)) {
		altura_redondeada = 0;
	}
	
	if ((calle != "" && altura !="") && (isNaN(altura)==false)) {
		var address = calle + ' ' + altura_redondeada + ', ' + localidad + ', ' + provincia + ', Argentina';
		//alert("Busco La direccion: " + address);
		processGeocoding(address, direccionGoogle, tipoDireccion); 
	} else {
		alert("Ingresa bien la direccion!");
	}
}

	//tipoDireccion = "laboral" o "particular"
    function processGeocoding(location, callback, tipoDireccion)  
    {  
        // Propiedades de la georreferenciación  
        var request = {  
            address: location  
        }  
		
		var geocoder = new google.maps.Geocoder();
		
        // Invocación a la georreferenciación (proceso asíncrono)  
        geocoder.geocode(request, function(results, status) {  
            /* 
             * OK 
             * ZERO_RESULTS 
             * OVER_QUERY_LIMIT 
             * REQUEST_DENIED 
             * INVALID_REQUEST 
             */  

			 if(status == google.maps.GeocoderStatus.OK)  
            {  
				console.log(results);
                callback (results,tipoDireccion);  
                return results;  
            }  
			callback (null);  
            return status;  
        });  
    }  
	
	//tipoDireccion = "laboral" o "particular"
	function direccionGoogle(data,tipoDireccion) {
		if(data != null) {
			
			var lat = data[0].geometry.location.lat();
			var lng = data[0].geometry.location.lng();
		
			var direccion = data[0].formatted_address;
			//alert("Encontre La direccion: " + direccion);
			var direccion_partida = direccion.split(',');
		
		
	//		$("#resultadoBusqueda").html("<b>" + direccion_partida[0] + "</b> lat: " + lat + " long: " + lng + 
	//		" <a href=http://maps.google.com/maps?t=m&q="+lat+","+ lng+" target='_blank'>Comprobar Coordenadas!</a>");
		
			if (tipoDireccion == 'Particular') {
				$('#PrimaryCityId').val($('#localidadesParticular option:selected').val());
				$('#PrimaryLatitud').val(lat);
				$('#PrimaryLongitud').val(lng);
				$('#PrimaryDireccion').val(direccion_partida[0]);
				$('#ControlCargoParticular').val('true');
			} else {
				$('#SecondaryCityId').val($('#localidadesLaboral option:selected').val());
				$('#SecondaryLatitud').val(lat);
				$('#SecondaryLongitud').val(lng);
				$('#SecondaryDireccion').val(direccion_partida[0]);
				$('#ControlCargoLaboral').val('true');		
			}
			alert("Direccion Encontrada");
			
		} else {
			if (tipoDireccion == 'Particular') {
				$('#ControlCargoParticular').val('false');
			} else {
				$('#ControlCargoLaboral').val('false');
			}
			alert('ERROR! Unable to geocode address');
		}
	}