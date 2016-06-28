var miciudad;
// Ciudad actual con la que estoy buscando una direccion

var tituloinfo = "Información";

var modosilencioso = false;

$(document).ready(function() {

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
function buscar(tipoDireccion, silencioso) {

	modosilencioso = silencioso;

	var provincia = $('#provincias' + tipoDireccion + ' option:selected').text();
	var localidad = $('#localidades' + tipoDireccion + ' option:selected').text();
	var calle = $('#calle' + tipoDireccion).val();
	var altura = $('#altura' + tipoDireccion).val();

	var altura_redondeada = Math.round(altura / 100) * 100;

	if (altura_redondeada == 0) {
		altura_redondeada = 1;
	}

	if (isNaN(altura_redondeada)) {
		altura_redondeada = 0;
	}

	if ((calle != "" && altura != "") && (isNaN(altura) == false)) {
		miciudad = localidad;
		var address = calle + ' ' + altura_redondeada + ', ' + provincia + ', ' + localidad + ', Argentina';
		processGeocoding(address, direccionGoogle, tipoDireccion);
	} else {
		//alert("Ingresa bien la direccion!");
		jAlert("Debe ingresar una direcci&oacute;n correcta.", "Errores de Geolocalización");
	}
}

//tipoDireccion = "laboral" o "particular"
function processGeocoding(location, callback, tipoDireccion) {
	// Propiedades de la georreferenciaci󮠠
	var request = {
		address : location
	}

	var geocoder = new google.maps.Geocoder();

	// Invocaci󮠡 la georreferenciaci󮠨proceso asrono)
	geocoder.geocode(request, function(results, status) {
		/*
		 * OK
		 * ZERO_RESULTS
		 * OVER_QUERY_LIMIT
		 * REQUEST_DENIED
		 * INVALID_REQUEST
		 */

		if (status == google.maps.GeocoderStatus.OK) {
			//console.log(results);
			callback(results, tipoDireccion);
			return results;
		}
		callback(null);
		return status;
	});
}

//tipoDireccion = "laboral" o "particular"
function direccionGoogle(data, tipoDireccion) {
	if (data != null) {

		var cantidad = data[0].formatted_address.split(",");

		if ((cantidad.length > 3) && ($.trim(cantidad[1]).includes(miciudad))) {// Resultado "valido"... si es menor o igual a 3... me mando a cualquier lugar

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

			if (!modosilencioso) {
				jAlert("Direcci&oacute;n encontrada.", "Geolocalización");
			}

			$('#imgmapa' + tipoDireccion).remove();
			// Remuevo la imagen por si ya existe

			$("#comprobar" + tipoDireccion).after('<img id="imgmapa' + tipoDireccion + '" src="/geocan/img/map.png" style="vertical-align: middle;" />');

			// Le asocio el evento para que muestre el mapa al pasar sobre la imagen del mapita...
			$('#imgmapa' + tipoDireccion).hover(function() {

				var tool = $('<div id="mapita' + tipoDireccion + '" class="tip' + tipoDireccion + '" style="width:250px; height:250px"></div>').appendTo('body');
				minimap(lat, lng, tipoDireccion);
				tool.fadeIn('slow');

			}, function() {
				// Hover out code
				$('.tip' + tipoDireccion).remove();
			}).mousemove(function(e) {
				var mousex = e.pageX + 20;
				//Get X coordinates
				var mousey = e.pageY - 125;
				//Get Y coordinates
				$('.tip' + tipoDireccion).css({
					top : mousey,
					left : mousex
				})
			});

		} else {

			if (tipoDireccion == 'Particular') {
				$('#ControlCargoParticular').val('false');
				$('#imgmapaParticular').remove();
			} else {
				$('#ControlCargoLaboral').val('false');
				$('#imgmapaLaboral').remove();
			}
			//alert('ERROR! Unable to geocode address');
			jError("No se pudo geolocalizar la direcci&oacute;n solicitada.", "Errores de Geolocalización");

		}

	} else {
		if (tipoDireccion == 'Particular') {
			$('#ControlCargoParticular').val('false');
			$('#imgmapaParticular').remove();
		} else {
			$('#ControlCargoLaboral').val('false');
			$('#imgmapaLaboral').remove();
		}
		//alert('ERROR! Unable to geocode address');
		jError("No se pudo geolocalizar la direcci&oacute;n solicitada.", "Errores de Geolocalización");
	}
}

function minimap(latitud, longitud, cual) {

	var p = new google.maps.LatLng(latitud, longitud);

	var map = new google.maps.Map(document.getElementById('mapita' + cual), {
		zoom : 16,
		center : p,
		mapTypeId : google.maps.MapTypeId.ROADMAP
	});

	var marker = new google.maps.Marker({
		position : p,
		map : map
	});

}
