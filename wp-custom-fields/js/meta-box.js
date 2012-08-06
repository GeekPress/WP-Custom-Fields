jQuery(function($) {
	
	/* Date Picker */
	if (!Modernizr.inputtypes.date ) { $inputDate = "input.date" }
	else { $inputDate = "input[type=text].date" }
	
	$($inputDate).each( function() {
	  	$(this).datepicker({
		  	minDate : $(this).attr('min'),
			maxDate : $(this).attr('max'),
			dateFormat : $(this).attr('data-date-format'),
			changeMonth : $(this).attr('data-change-month'),
			changeYear : $(this).attr('data-change-year'),
			numberOfMonths : parseInt($(this).attr('data-number-of-months')),
	  	});
	});
	
	/* DateTime Picker */
	if (!Modernizr.inputtypes.datetime ) { $inputDateTime = "input.datetime" }
	else { $inputDateTime = "input[type=text].datetime" }
	
	$($inputDateTime).each( function() {
	  	$(this).datetimepicker({
		  	minDate : $(this).attr('min'),
			maxDate : $(this).attr('max'),
			dateFormat : $(this).attr('data-date-format'),
			changeMonth : $(this).attr('data-change-month'),
			changeYear : $(this).attr('data-change-year'),
			numberOfMonths : parseInt($(this).attr('data-number-of-months')),
			timeFormat : $(this).attr('data-time-format'),
			showSecond : $(this).attr('data-show-second'),
			hourGrid: parseInt($(this).attr('data-hour-grid')),
			minuteGrid: parseInt($(this).attr('data-minute-grid')),
			secondeGrid: parseInt($(this).attr('data-second-grid'))
	  	});
	});
	
	/* Time Picker */
	if (!Modernizr.inputtypes.time ) { $inputTime = "input.time" }
	else { $inputTime = "input[type=text].time" }
	
	$($inputTime).each( function() {
		$(this).timepicker({ 
			timeFormat : $(this).attr('data-time-format'),
			showSecond : $(this).attr('data-show-second'),
			hourGrid: parseInt($(this).attr('data-hour-grid')),
			minuteGrid: parseInt($(this).attr('data-minute-grid')),
			secondeGrid: parseInt($(this).attr('data-second-grid'))
		});
	});
	
	/* Color Picker */
	if (!Modernizr.inputtypes.color ) { $inputColor = "input.hexacolor" }
	else { $inputColor = "input[type=text].hexacolor" }
	
	$($inputColor).each(function() {	
		
		// On ajoute la div necessaire à Farbastic
		$(this).after('<div id="farbtastic-'+this.id+'" class="farbtastic hide-if-no-js"></div>');
		
		var current = $('#farbtastic-'+this.id);
    	current.hide();
    	current.farbtastic(this);
    	$(this).click(function(){
    		current.fadeIn();
    		if($(this).val() == '' ) $(this).val('#');
    	});
    });
    
    $(document).mousedown(function() {
        $('.farbtastic').each(function() {
            var input = $(this).prev('input');
            if ( $('#'+this.id).css('display') == 'block' ) $('#'+this.id).fadeOut();
            if( input.val() == '#' ) input.val('');  
        });
    });
    
	/* Uniform JS */	
	$(".iphonecheck").uniform();
	
	/* Media Library */
	$('.wpcf-upload-media-button').click(function() {
		var inputUpload = $(this).siblings('input:text').attr('id'),
			$previewUpload 	= $(this).siblings('.wpcf-preview');
											 
		window.send_to_editor = function(html) {
			imgurl = $('img',html).attr('src');
			$('#'+inputUpload).val(imgurl);
			$previewUpload.html( '<img src="'+imgurl+'" alt="" />' );
			tb_remove();

		}
		tb_show('', 'media-upload.php?option_upload=1&amp;type=image&amp;TB_iframe=true');
		return false;
	});
	
	/* Remove value of a media file */
	$('.wpcf-remove-media-button').click( function() {
		$(this).siblings('input:text').val(''); // On vide l'atrribut src du Custom Field
		$(this).next('.wpcf-preview').find('img').remove(); // On supprime l'image
		return false;
	} );
	
	/* AJAX Upload */
	$('.wpcf-upload-ajax-button').each(function() {

		var $previewUpload 		= $(this).siblings('.wpcf-preview'),
			$inputUpload 		= $(this).siblings( 'input:text' ); 
		
		new AjaxUpload( this.id, {
				action: ajaxurl,
				name: this.id,
				data: { // Additional data to send
						action	   			: 'wpcf_ajax_upload_action',
						data	   			: this.id,
						post_ID	   			: $('#post_ID').val(),
						_wpcf_nonce 		: $(this).siblings('input[name='+this.id+']').val()
				},
				autoSubmit: true,
				responseType: false,
				onChange: function(file, extension){},
				onSubmit: function(file, extension){
					$previewUpload.html( '<img src="'+wpcf_text_js.spinner_url+'" alt="" />' );
				},
				onComplete: function(file, response) {
					if( response == 'error' ) {
						$previewUpload.html( '<span class="description wpcf-ajax-error">'+wpcf_text_js.upload_ajax_error+'</span>' );
					}
					else {
						$inputUpload.val(response);
						$previewUpload.html( '<img src="'+response+'" alt="" />' );
					}
				}
			});
		
	});
	
	/* MultiSelect + Filter Plugin */
	$("select.multiple:not(.filter)").each( function() {
			
			var $minSelected = $(this).attr('data-min-selected'),
				$maxSelected = $(this).attr('data-max-selected'),
				$noneSelectedText = $(this).attr('data-none-selected-text'),
				$selectedList = $(this).attr('data-selected-list'),
				$obj = $(this);
			
			$(this).multiselect({
			
					noneSelectedText: $noneSelectedText,
					selectedList: $selectedList,
					
					click: function(e){
						       
						        if( $(this).multiselect("widget").find("input:checked").length > $maxSelected ) {
						           return false;
						        }
						   },
					close: function(){
					}
		   });
		
	});
   
   $("select.multiple.filter").multiselect().multiselectfilter( { header: false } );
	
   /* Form Validation */
   $('form#post').validationEngine('attach');
    
   /*  Validator Check  */
   $('.wpcf-metabox input').blur( function() {
		
		// On récupère la class validator du champ
		// Il s'agit de la 2ème class présente dans l'attribut class
		var type = $(this).attr('class')
						  .split(' ')
						  .slice(0, 1);
		
		// On stocke la valeur du champ
		var value = $(this).val();
		
		// On check si la valeur n'est pas vide
 		if( value != '' ) {
			
			// On fait le test par rapport au regex du validator
			if( !testReg( value, type ) ) {
				$(this).next('.wpcf-syntax-error').remove();
				$(this).after('<span class="wpcf-syntax-error">'+wpcf_text_js.syntax_error+'</span>');
			 } else {
			 	$(this).next('.wpcf-syntax-error').remove();
			 	
			}
		 }
	});
    
    /* Submit Validator Check */
    $('#submitdiv input:submit').live('click', function() {
		
		var error;
		
		// On détruit tous les messages d'erreur
		$('.wpcf-syntax-error').remove();
		
		// On fait le check sur tous les champs
		$('.wpcf-metabox input:text').each( function() {
			
			// On récupère la class validator du champ
			// Il s'agit de la 2ème class présente dans l'attribut class
			var type = $(this).attr('class')
						  .split(' ')
						  .slice(1, 2);
			
			// On stocke la valeur du champ
			var	value = $(this).val();
			
			// On check si la valeur n'est pas vide
	 		if( value != '' ) {
	 			
	 			// On fait le test par rapport au regex du validator
				if( !testReg( value, type ) ) {
					$(this).after('<span class="wpcf-syntax-error">'+wpcf_text_js.syntax_error+'</span>');
					error = true;
				 } else {
				 	$(this).next('.wpcf-syntax-error').remove();
				}
			 }			
		});
		
		// Si on a une lors de la soumission, on renvoie l'utilisateur vers la 1ère erreur et on annule la soumission du formulaire
		if( error ) {
			jQuery('html,body').animate( { scrollTop: $( '.wpcf-syntax-error:first' ).offset().top-40 } , 'slow' );
			return false;
		}
	});
});

function testReg(value, type) {
	var reg = new RegExp(ruleReg[type]);
	return reg.test(value);
}

/*
var stringRule, key = '';
for( key in ruleReg ) {
	stringRule += key + ' ';
}
*/