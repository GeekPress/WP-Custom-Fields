<?php

/*
 * function wpcf_add_css_in_head
 *
 * On insère les fichiers CSS de jQuery UI, Farbastic et tous les autres fichiers que nécessite le plugin
 *
 * Pour ne pas surcharger l'administration de fichiers inutilisés,
 * les fichiers sont ajoutés uniquement sur la page d'un ajout (post-new.php) ou d'édition (post.php) d'un post
 *
*/

add_action('admin_print_styles-post.php', 'wpcf_add_css_in_head' );
add_action('admin_print_styles-post-new.php', 'wpcf_add_css_in_head' );

function wpcf_add_css_in_head()
{
	/* jQuery UI  */
	wp_enqueue_style(' jquery-ui', WPCF_CSS_URL . '/jquery-ui/jquery-ui-1.8.22.custom.css' );

	/* Farbtastic  */
	wp_enqueue_style( 'farbtastic' );

	/* MetaBox */
	wp_register_style( 'admin-framework', WPCF_CSS_URL. '/style.css' );
	wp_enqueue_style( 'admin-framework' );
}


/*
 * function wpcf_add_js_in_footer
 *
 * On insère les fichiers JavaScript de jQuery UI, Farbastic et tous les autres fichiers que nécessite le plugin
 *
 * Pour ne pas surcharger l'administration de fichiers inutilisés,
 * les fichiers sont ajoutés uniquement sur la page d'un ajout (post-new.php) ou d'édition (post.php) d'un post
 *
*/

add_action('admin_print_scripts-post.php', 'wpcf_add_js_in_footer' );
add_action('admin_print_scripts-post-new.php', 'wpcf_add_js_in_footer' );

function wpcf_add_js_in_footer()
{
	/* jQuery UI */
	wp_enqueue_script('jquery-ui');
	wp_enqueue_script('jquery-ui-datepicker');
	wp_enqueue_script('jquery-ui-slider');

	/* Farbtastic  */
	wp_enqueue_script( 'farbtastic' );


	/* jQuery Datepicker Translation */
	wp_register_script( 'jquery-ui-datepicker-translation', WPCF_JS_URL .'/libs/datepicker/jquery-ui-datepicker-' . WPLANG . '.js',
						'jquery-ui-datepicker',
						'',
						true
					);
	wp_enqueue_script( 'jquery-ui-datepicker-translation' );

	/* jQuery DateTime Picker */
	wp_register_script( 'jquery-ui-timepicker', WPCF_JS_URL .'/libs/datepicker/jquery-ui-timepicker.min.js',
						'jquery-ui-datepicker',
						'',
						true
					);
	wp_enqueue_script( 'jquery-ui-timepicker' );

	/* Translation jQuery DateTime Picker */
	wp_register_script( 'jquery-ui-datetimepicker-translation', WPCF_JS_URL .'/libs/datepicker/jquery-ui-timepicker-' . WPLANG . '.js',
						'jquery-ui-timepicker',
						'',
						true
					);
	wp_enqueue_script( 'jquery-ui-datetimepicker-translation' );

	/* Form Validation Translation Plugin */
	wp_register_script( 'jquery-validationEngine-translation', WPCF_JS_URL .'/libs/form/languages/jquery.validationEngine-' . substr(WPLANG, 0, 2) . '.js',
						'jquery',
						'',
						true
					);
	wp_enqueue_script( 'jquery-validationEngine-translation' );

	/* Form Validation Plugin */
	wp_register_script( 'jquery-validationEngine', WPCF_JS_URL .'/libs/form/jquery.validationEngine.min.js',
						'jquery-validationEngine-translation',
						'',
						true
					);
	wp_enqueue_script( 'jquery-validationEngine' );

	/* Uniform Plugin */
	wp_register_script( 'jquery-uniform', WPCF_JS_URL .'/libs/form/jquery.uniform.min.js',
						'jquery',
						'',
						true
					);
	wp_enqueue_script( 'jquery-uniform' );

	/* MultiSelect + Filter Plugin */
	wp_register_script( 'jquery-multiselect', WPCF_JS_URL .'/libs/multiselect/jquery.multiselect.min.js',
						'jquery',
						'',
						true
					);
	wp_register_script( 'jquery-multiselect-filter', WPCF_JS_URL .'/libs/multiselect/jquery.multiselect.filter.min.js',
						'jquery-multiselect',
						'',
						true
					);

	wp_enqueue_script( 'jquery-multiselect' );
	wp_enqueue_script( 'jquery-multiselect-filter' );


	/* MultiSelect + Filter Translation Plugin */
	wp_register_script( 'jquery-multiselect-translation', WPCF_JS_URL .'/libs/multiselect/i18n/jquery.multiselect.' . substr(WPLANG, 0, 2) . '.js',
						'jquery-multiselect',
						'',
						true
					);
	wp_register_script( 'jquery-multiselect-filter-translation', WPCF_JS_URL .'/libs/multiselect/i18n/jquery.multiselect.filter.' . substr(WPLANG, 0, 2) . '.js',
						'jquery-multiselect-filter',
						'',
						true
					);

	wp_enqueue_script( 'jquery-multiselect-translation' );
	wp_enqueue_script( 'jquery-multiselect-filter-translation' );


	/*  AJAX Upload Plugin */
	wp_register_script( 'jquery-ajaxupload', WPCF_JS_URL .'/libs/upload/ajaxupload.js',
						'jquery',
						'',
						true
					);
	wp_enqueue_script( 'jquery-ajaxupload' );
	
	/*  Modernizr Plugin */
	wp_register_script( 'jquery-modernizr', WPCF_JS_URL .'/libs/modernizr.min.js',
						'jquery',
						'',
						true
					);
	wp_enqueue_script( 'jquery-modernizr' );
	
	/* MetaBox JS File  */
	wp_register_script( 'wpcf-js',  WPCF_JS_URL . '/meta-box.js',
						'jquery',
						'',
						true
					);
	wp_enqueue_script( 'wpcf-js' );
	
	
	/* WP Localize Script  */
	wp_localize_script(
				'wpcf-js',
				'wpcf_text_js',
				array(
					'spinner_url' 		=> admin_url( "/images/wpspin_light.gif" ),
					'upload_ajax_error' => 'Une erreur est survenue lors de l\'upload du fichier',
					'syntax_error' 	 	=> 'Syntaxe Incorrect'
				)
	);
}