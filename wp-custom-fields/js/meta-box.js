jQuery(function($) {
	
	/* Date Picker */
	$('.date').datepicker();
	
	/* DateTime Picker */
	$('.date_time').datetimepicker({hourGrid: 4,minuteGrid: 10});
	
	/* Time Picker */
	$('.time').timepicker({ hourGrid: 4, minuteGrid: 10 });
	
	/* Color Picker */
	$('.hexacolor').each(function() {	
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
    
    /* tinyMCE */
    $(".tinyMCE").each(function() {
	    $(this).addClass("mceEditor");
		if ( typeof( tinyMCE ) == "object" && typeof( tinyMCE.execCommand ) == "function" ) {
			tinyMCE.execCommand("mceAddControl", false, this.id);
		}    
    });

	/* Uniform JS */	
	$(".iphonecheck").uniform();
	
	/* Media Library */
	$('.wpcf-upload-media-image-button').click(function() {
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
						post_id	   			: $('#post_ID').val(),
						_wpcf_nonce 		: $(this).siblings('.update-ajax-nonce').data( 'nonce' )
				},
				autoSubmit: true,
				responseType: false,
				onChange: function(file, extension){},
				onSubmit: function(file, extension){
					$previewUpload.html( '<img src="/wp-admin/images/wpspin_light.gif" alt="" />' );
				},
				onComplete: function(file, response) {
					if( response == 'error' ) {
						$previewUpload.html( '<span class="description wpcf-ajax-error">'+TXT_UPLOAD_AJAX_ERROR+'</span>' );
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
   $('.wpcf-metabox input:text').blur( function() {
		
		// On récupère la class validator du champ
		// Il s'agit de la 2ème class présente dans l'attribut class
		var type = $(this).attr('class')
						  .split(' ')
						  .slice(1, 2);
		
		// On stocke la valeur du champ
		var value = $(this).val();
		
		// On check si la valeur n'est pas vide
 		if( value != '' ) {
			
			// On fait le test par rapport au regex du validator
			if( !testReg( value, type ) ) {
				$(this).next('.wpcf-syntax-error').remove();
				$(this).after('<span class="wpcf-syntax-error">'+TXT_SYNTAX_ERROR+'</span>');
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
					$(this).after('<span class="wpcf-syntax-error">'+TXT_SYNTAX_ERROR+'</span>');
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