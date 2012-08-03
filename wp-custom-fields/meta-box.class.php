<?php

if( !class_exists( 'MetaBox' ) && version_compare( PHP_VERSION, '5.3', '>=') ) {

	$fslashed_dir = trailingslashit(str_replace('\\','/',dirname(__FILE__)));
	$fslashed_abs = trailingslashit(str_replace('\\','/',ABSPATH));

	/*
    *
    * Path Root
    *
    */

	define( 'WPCF_DIR' , $fslashed_dir ); // Chemin Path Root vers le dossier contenant la class
	define( 'WPCF_INC_DIR', WPCF_DIR . '/inc' ); // Chemin Path Root vers les fichiers d'inclusion
	define( 'WPCF_FIELDS_DIR', WPCF_INC_DIR . '/fields' ); // Chemin Path Root vers les fichie


	/*
    *
    * Chemin absolu
    *
    */

	define( 'WPCF_URL', site_url(str_replace( $fslashed_abs, '', $fslashed_dir ))); // dossier de la class
	define( 'WPCF_CSS_URL', WPCF_URL . 'css' ); // dossier fichiers CSS
	define( 'WPCF_JS_URL', WPCF_URL . 'js' ); // dossier fichiers JS


	/*
    *
    * Inclusion des fichiers complémentaires requis
    *
    */

    require_once( WPCF_INC_DIR . '/enqueue.php' ); // Les fichiers CSS et JS
    require_once( WPCF_INC_DIR . '/media-library.php' ); // Configuration du gestionnaire de média
    require_once( WPCF_INC_DIR . '/validators.php' ); // Configuration des validateurs
    require_once( WPCF_INC_DIR . '/ajax-upload.php' ); // Gestion de l'upload par AJAX


	// Début de la class
	class MetaBox {

		const WPCF_VERSION = '0.11'; // Version de WP Custom Fields

		private $conf = array(
			'id'       => '',
			'title'    => '',
			'post_type'=> 'post',
			'context'  => 'advanced',
			'priority' => 'default',
	    );
		private $fields = array();

		/*
	    * function __construct
	    *
	    * @param array $conf
	    *
	    */

		function __construct( $conf, $fields )
		{
			// Si on ne trouve pas dans l'administration, pas besoin d'aller plus loin
			if ( !is_admin() ) return;

			// Initializes the configuration of the meta box and uses the method createMetaBox to add a new box
			$this->conf = array_merge( $this->conf, $conf );

			// Add fields
			if( is_array( $fields ) ) {

				foreach( $fields as $field ) {
					$this->add_field( $field );
				}

				$this->generate_output();
			}

			// Gestion des erreurs
			$this->admin_notices();
		}

		/*
		 * function add_field
		 *
		 * Permet d'ajouter un champ dans la liste des champs stockés dans la variable $fields de la class
		 *
		 * @param array $fields
		*/

		private function add_field( $fields )
		{
			// On met à jour les fields
			array_push( $this->fields,

						array_merge(
							array(

								'name'				  => NULL, // Attribut name du champ

								'label'				  => NULL, // Label du champ

								'type'                => 'text', // Type de champ

								'class'				  => NULL, // Liste des class CSS du champ

								'accesskey' 		  => NULL, // Raccourci clavier pour accéder à un élément

								'std'                 => NULL, // La valeur par défaut du champ

								'description'		  => NULL, // Description du champ

								'options'             => array(), // Liste des options pour un champ de type select ou checkbox

								'callback'			  => NULL, // Fonction de callback pour modifier le traitement de la valeur du champ

								'required'            => NULL, // Si la valeur est true, alors le champ est obligatoire

								'validator'           => NULL, // Le validateur que doit respecter le champ

								'media_type_mime'	  => 'image', // Type mime des médias.

								'allowed_mime_type'	  => array(), // Liste des formats autorisés pour un champ de type "file"

								'iphonecheck'         => NULL, // Si la valeur est true et que le type de champ est checkbox ou radio,
															   // alors il prendra la forme d'un check iPhone

								/************************************************
			                    /*
			                    /*  Gestion des input
			                    /*
			                    *************************************************/

								'size'                => NULL, // Attribut HTML "size"

								'maxlength'			  => NULL, // Attribut HTML "maxlength"

								'min_size'            => NULL, // Nombre de caractères minimum du champ

								'max_size'            => NULL, // Nombre de caractères maximum

								'placeholder'         => NULL, // Placeholder du champ

								/************************************************
			                    /*
			                    /*  Gestion des checkbox
			                    /*
			                    *************************************************/

								'label_checkbox'	  => '', // Label d'un checkbox unique

								'min_checked'         => NULL, // Nombre minimum d'options à cochés

								'max_checked'         => NULL, // Nombre maximum d'options à cochés

								/************************************************
			                    /*
			                    /*  Gestion des select
			                    /*
			                    *************************************************/

								'min_selected'        => NULL, // Nombre minimum d'options à sélectionnés

								'max_selected'        => NULL, // Nombre maximum d'options à sélectionnés

								'selected_list'		  => NULL, //

								'none_selected_text'  => NULL, // Texte de l'option de présentation qui est vide

								'multiple'            => NULL, // Si la valeur est true , alors le select se transforme en box

								'filter'			  => NULL, // Si la valeur est true,
															   // alors une recherche rapide sera ajouté à la box du select

								/************************************************
			                    /*
			                    /*  Gestion des textarea
			                    /*
			                    *************************************************/

								'cols'				  => 80, // Attribut HTML "cols"

								'rows'				  => 5, // Attribut HTML "rows"

								'tinyMCE'             => NULL, // Si la valeur est true, alors il sera doté du WYSIWYG TinyMCE

								/************************************************
			                    /*
			                    /*  Gestion des messages d'erreurs si JavaScript est désactivé
			                    /*
			                    *************************************************/

								'text_no_js_error_required'  => NULL, // champ requis

								'text_no_js_error_validator' => NULL, // champ avec un validateur

								'text_no_js_error_minSize'   => NULL, // champ avec un minimum de caractères

								'text_no_js_error_max_size'  => NULL  // champ avec un maximum de caractères
							)
,
							$fields
						)
					);
		}

		/*
		 * function generate_output
		 *
		 * Configuration et création du contenu présent dans la meta box à l'aide de fonction add_meta_box()
		 *
		 * Le hook "wpcf_before_generate_output" permet d'ajouter du contenu au début de la metabox.
		 * Le hook "wpcf_after_generate_output" permet d'ajouter du contenu à la fin de la metabox.
		 *
		 * La paramètre $id de ces deux hooks permet de récupérer l'identifiant unique de la metabox
		 *
		*/

		private function generate_output()
		{
			// On tranforme les valeurs du tableau en variables
			extract($this->conf);

			$post_types = (array)$post_type;
			$fields = $this->fields;

			add_action('admin_init',

					   function () use( $id, $title, $post_types, $context, $priority, $fields ) {

							// On ajoute la MetaBox pour les CPT que l'on a configuré
							foreach( $post_types as $post_type ) {

								add_meta_box( $id,
											  $title,
											  function () use( $id, $fields ) {

												  	do_action( 'wpcf_before_generate_output', $id );

												  	echo '<table class="form-table wpcf-metabox-' . esc_attr( $id ) . ' wpcf-metabox">';

												  	// On génère chaque champ
											        foreach( $fields as $field ) {

											            // On tranforme les valeurs du tableau en variables
											            extract( $field );

											            // Si l'attribut name n'est pas précisé, on passe l'itération suivante
											            if( !isset( $name ) || empty( $name ) ) {
												            echo '<p>Désolé, mais il faut préciser un attribut "name" à votre champ.</p>';
															continue;
											            }

											            /************************************************
									                    /*
									                    /* Gestion de la valeur du champ
									                    /*
									                    *************************************************/

									                    global $post;

											            // On récupère la valeur par défaut
											            $value = isset( $std ) ? $std : '';

											            $meta_value = get_post_meta( $post->ID, $name, !$options );
											            if ( $meta_value != "" ) $value = $meta_value;


											            /************************************************
									                    /*
									                    /* On construit la class CSS qui va permettre de faire les vérifications
									                    /* JS avec le plugin Validate Engin
									                    /*
									                    *************************************************/

											            ob_start();

											            $VErequired 	= $required ? 'required' : '';
											            $VEminSize  	= $min_size >= 1 ? ',minSize[' . intval( $min_size ) . ']' : '';
											            $VEmaxSize  	= $max_size >= 1 ? ',maxSize[' . intval( $max_size ) . ']': '';
											            $VEmin_checked	= $min_checked >= 1 ? ',minCheckbox[' . intval( $min_checked ) . ']' : '';
											            $VEmax_checked	= $max_checked >= 1 ? ',maxCheckbox[' . intval( $max_checked ) . ']' : '';

											           echo 'validate[' . $VErequired
											           					. $VEminSize
											           					. $VEmaxSize
											           					. $VEmin_checked
											           					. $VEmax_checked
											           					. ']';

											            $validate_js = ob_get_clean();


											            /************************************************
									                    /*
									                    /* On construit la class CSS qui va permettre de faire les vérifications
									                    /* JS sur un select avec le plugin MultiSelect Widget
									                    /*
									                    *************************************************/

											            ob_start();

											            $MSrequired = $required ? 'data-required="1"' : '';
											            $MSnone_selected_text = $none_selected_text ? ' data-none-selected-text="' . esc_attr( $none_selected_text ) . '"' : '';
											            $MSselected_list = $selected_list >= 1 ? ' data-selected-list="' . intval( $selected_list ) . '"' : '';
											            $MSmin_selected = $min_selected >= 1 ? ' data-min-selected="' . intval( $min_selected ) . '"' : '';
											            $MSmax_selected = $max_selected >= 1 ? ' data-max-selected="' . intval( $max_selected ) . '"' : '';

											            echo $MSrequired
											            	 . $MSnone_selected_text
											            	 . $MSselected_list
											            	 . $MSmin_selected
											            	 . $MSmax_selected;

											            $multiselect_js = ob_get_clean();


											            /************************************************
									                    /*
									                    /* Si le tableau allowed_mime_type n'est pas vide
									                    /* et que le champ est de type "file",
									                    /* alors on crée un transient avec la liste des mime autorisés
									                    /*
									                    *************************************************/

											            if( count( $allowed_mime_type ) >= 1 && $type == 'file' )
											            	set_transient( 'allowed_mime_type_' . $name, $allowed_mime_type, 0 );


											            /************************************************
									                    /*
									                    /* Si le fichier du type indiqué existe, on affiche son contenu
									                    /*
									                    *************************************************/

											            if( file_exists( WPCF_FIELDS_DIR . '/' . $type . '.php' ) )
											            	include( WPCF_FIELDS_DIR . '/' . $type . '.php' );
											            else
											            	echo '<tr class="wpcf-error-file-exists"><td>Le fichier ' . esc_html( $type ) . '.php n\'existe pas.</td></tr>';

											            // On détruit les variables de paramètre du champ
											            // pour ne pas avoir de conflit avec la prochaine itération
											            foreach( $field as $f )
											            	unset( $f );

											        }

													echo '</table>';
													echo '<input type="hidden" name="' . esc_attr( $id ). '_nonce" id="' . esc_attr( $id ) . '_nonce" value="' . wp_create_nonce( basename(__FILE__) ) . '" />';

													do_action( 'wpcf_after_generate_output', $id );
											  	}
,
											  $post_type,
											  $context,
											  $priority
										);
							}

					   }
			);

			$this->check_validator_fields(); // On check si les champs sont valides
			$this->save_fields(); // On sauvegarde les données
		}

		/*
		 * function check_validator_fields
		 *
		 * TO DO - DESCRIPTION
		 *
		*/

		private function check_validator_fields()
		{

			$errors 			= array();
			$conf		    	= $this->conf;
			$fields             = $this->fields;
			$allowed_validators = wpcf_get_allowed_validators();

			add_action('save_post',
	        		   function ( $post_id, $post ) use( $errors, $conf, $fields, $allowed_validators ) {

		        		  	if( !in_array( $post->post_type, (array)$conf['post_type'] ) ) return;

		        		  	foreach( $fields as $field ) {

		        		  		extract($field);

			        		  	$value = $_POST[$name]; // $value est la valeur du champ

			                    /************************************************
			                    /*
			                    /*  On vérifie si le champ est requis ou non
			                    /*  Si le champ est vide, on affiche un message d'erreur
			                    /*
			                    *************************************************/

			                	if( $required && ( empty( $value ) || $value == array() ) ) {

			                		if( $text_no_js_error_required )
			                			array_push( $errors, '<p>' . esc_html( $text_no_js_error_required ) . '</p>');
			                		else
			                			array_push( $errors, '<p>' . sprintf( __( 'Le champ <strong>%s</strong> ne peut pas être vide.'), $label ) . '</p>');
			                	}

			                	else {

				                	/************************************************
				                    /*
				                    /*  On vérifie si le champ à un validateur
				                    /*
				                    /*  Il faut que la validateur fasse partie de ceux que nous avons défini
				                    /*  et que la valeur ne soit pas stockée dans un tableau
				                    /*
				                    *************************************************/

			                		if( !is_array( $value )
			                			&& array_key_exists( $validator, $allowed_validators )
			                			&& !preg_match($allowed_validators[$validator], $value) && $value != ''
			                		  )

			                			if( $text_no_js_error_validator )
			                				array_push( $errors, '<p>' . esc_html( $text_no_js_error_validator ) . '</p>');
			                			else
			                				array_push( $errors, '<p>' . sprintf( __( 'Le champ <strong>%s</strong> doit être de type <strong>%s</strong>.'), $label, $validator ) . '</p>');


			                		/************************************************
				                    /*
				                    /*  On vérifie si le champ doit avoir une taille minimum de caractère
				                    /*
				                    *************************************************/

			                		if( isset( $min_size ) && strlen( $value ) < intval( $min_size ) ) {

				                		if( $text_no_js_error_min_size )
			                				array_push( $errors, '<p>' . esc_html( $text_no_js_error_min_size ) . '</p>');
			                			else
			                				array_push( $errors, '<p>' . sprintf( __( 'Le champ <strong>%s</strong> doit avoir une taille minimum de <strong>%d</strong> caractères.'), $label, $min_size ) . '</p>');
			                		}


			                		/************************************************
				                    /*
				                    /*  On vérifie si le champ doit avoir une taille maximum de caractère
				                    /*
				                    *************************************************/

			                		if( isset( $max_size ) && strlen( $value ) > $max_size ) {

				                		if( $text_no_js_error_max_size )
			                				array_push( $errors, '<p>' . esc_html( $text_no_js_error_max_size ) . '</p>');
			                			else
			                				array_push( $errors, '<p>' . sprintf( __( 'Le champ <strong>%s</strong> doit avoir une taille maximum de <strong>%d</strong> caractères.'), $label, $max_size ) . '</p>');
			                		}
			                	}

			                	/************************************************
			                    /*
			                    /*  En cas d'erreur, on stocke les erreurs dans un transient
			                    /*  Ensuite, on redirige l'utilisateur vers la même page en passant une variable "message" en GET
			                    /*  afin de savoir si on doit lui afficher les erreurs
			                    /*
			                    *************************************************/

			                	if( $errors ) {

				                	// On met à jour le transient avec les erreurs
				                	set_transient( 'error_metabox_post_' . $conf['id'] . '_' . $post_id, $errors );

				                	// On ajoute la variable message avec la valeur 99 lors de la redirection
									add_filter('redirect_post_location',
									  			function( $location ) {
													$location = add_query_arg('message', 99, $location);
													return $location;
									  			 }
									  );
			                	}
			                	else {
									// Si on n'a pas d'erreur, on supprime le transient
				                	set_transient( 'error_metabox_post_' . $conf['id'] . '_' . $post_id, $errors );
			                	}
		        		  }
						  return $data;
	        		   },
	        		   10,
	        		   2
	        	);
		}

		/*
		 * function admin_notices
		 *
		 * Gestion des messages d'erreurs à afficher en cas de désactivation du JavaScript par l'autilisateur
		 *
		 * Les erreurs sont affichés en haut de la page d'ajout ou d'édition à l'admin du hook "admin_notices"
		 *
		*/

		private function admin_notices() {

		    $conf = $this->conf;

		    add_action( 'admin_notices',
		    			function() use( $conf ) {

			    			global $typenow;

			    			if( isset( $_GET['message'] ) && $_GET['message'] == 99 && in_array( $typenow, (array)$conf['post_type'] ) ) {

				    			// On récupère les erreurs
				    			$errors = get_transient( 'error_metabox_post_' . $conf['id'] . '_' . $_GET['post'] );

				    			// Si on a des erreurs, on les affiche à l'utilisateur
				    			if( $errors ) {

									echo '<div id="notice" class="error wpcf-notice-errors"><h3>' . $conf['title'] . '</h3>';
								    	 foreach( $errors as $error )
									  		echo $error;
								    echo '</div>';

				    			}
							}

		    			}
		    );
		}

		/*
		 * function save_fields
		 *
		 * TO DO
		 *
		*/

		private function save_fields()
		{

		 	$conf 	= $this->conf;
		 	$fields = $this->fields;

		 	add_action('save_post',
		 			   function ( $post_id, $post ) use ( $conf, $fields ) {

							// On verifie que l'utilisateur a les droits d'édition sur le post traité
							if ( !current_user_can('edit_post', $post_id )

								 // On ne sauvegarde pas si on se trouve lors d'une autosave
								 || ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )

								 // On verifie que le nonce est correct
								 || !wp_verify_nonce( $_POST[$conf['id'] . '_nonce'], basename(__FILE__) )

							) return $post_id;

					        foreach( $fields as $field ) {

					            /************************************************
			                    /*
			                    /* Gestion de la fonction de callback du champ
			                    /* Si la fonction existe, on permet ajoute la valeur du champ
			                    /* comme argument de la fonction de l'utilisateur
			                    /*
			                    *************************************************/

					            $value = $_POST[$field['name']];
					            $value = is_callable( $field['callback'] ) ? call_user_func( $field['callback'] , $value ) : $value;

					            /************************************************
			                    /*
			                    /* On gère l'enregistrement de la valeur du champ
			                    /*
			                    *************************************************/

					            if ( isset( $field['name'] ) && !empty( $field['name'] ) ) {

					                 // Avant d'enregistrer la nouvelle valeur, on supprime tous les champs personnalisés du post actuel
					                 delete_post_meta( $post_id, $field['name'] );

					                 if( $field['options'] && is_array( $value )  ) {
					                 	 foreach( $value as $v ) {

					                 		add_post_meta( $post_id,
					                 					   $field['name'],
					                 					   $v
					                 					  );
					                 	}
					                 }
					                 else {

					                  	add_post_meta( $post_id,
					                  				   $field['name'],
					                  				   $value
					                  				 );
					                 }
					             }
					        }

		 			   },
		 			   10,
		 			   2
		 	);
		}

	} // Fin de la class
}