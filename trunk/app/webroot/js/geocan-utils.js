
$(document).ready(function(){
	
	/* Run clearTextField function on all selected text fields */
	clearTextField( jQuery(".clear-text-field") );

});

/**
 * Clears the default value on the text input field when the user clicks on it.
 * Also restores the default value if the field is left blank.
*/
function clearTextField( field ){

	field.focus( function(){
		jQuery(this).addClass('active');

		if ( this.value == this.defaultValue ){
			this.value = '';
		}
	});

	field.blur( function(){
		jQuery(this).removeClass('active');
		if( this.value == '' ){
			this.value = this.defaultValue;
		}
	});
}

var datepicker_config = { dateFormat: "dd/mm/yy", 
	changeMonth: true, changeYear: true, constrainInput: true, 
	showOn: "button", buttonImage: "../img/calendar.png", buttonImageOnly: true,
	yearRange: "1930:2020", monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
	'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	monthNamesShort: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
	'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
	dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
	dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
	showOtherMonths: true,
	selectOtherMonths: true
	}