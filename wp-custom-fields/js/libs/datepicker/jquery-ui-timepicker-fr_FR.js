jQuery(function() {

	jQuery.datepicker.setDefaults( jQuery.datepicker.regional[ "fr" ] );
		
	jQuery.timepicker.regional['fr'] = {
		timeOnlyTitle: 'Choisir une heure',
		timeText: 'Temps',
		hourText: 'Heure',
		minuteText: 'Minute',
		secondText: 'Seconde',
		currentText: 'Maintenant',
		closeText: 'Fermer',
		ampm: false
	};
	
	jQuery.timepicker.setDefaults(jQuery.timepicker.regional['fr']);
});