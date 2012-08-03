<?php

/*
 * function
 *
 * TO DO // DESCRIPTION
 *
*/

add_action( 'wp_ajax_wpcf_ajax_upload_action', 'wpcf_ajax_upload_callback' );
function wpcf_ajax_upload_callback() {

	// On check la sécurité à l'aide du nonce
	check_ajax_referer( 'upload-' . $_POST['post_ID'] . str_replace( 'upload_ajax_', '', $_POST['data'] ), '_wpcf_nonce' );

	// On récupére le fichier
	$filename = $_FILES[$_POST['data']];
	
	// Si on upload bien un fichier non vide
	if( isset( $filename ) && $filename['error'] == 0 ) {
		
		/************************************************
        /*
        /* Upload du fichier sur le serveur
        /* On se sert de la fonction wp_handle_upload() de WordPress pour upload
        /*
        *************************************************/
        
        // On récupère le transient avec la liste des mime type autorisés
        $allowed_mime_type = get_transient( 'allowed_mime_type_' . str_replace( 'upload_ajax_', '', $_POST['data'] ) );
        
		$handle = wp_handle_upload( $filename,
									array(
										'test_form' => false,
										'mimes' => $allowed_mime_type ? $allowed_mime_type : array()
									)
					);

		// En cas d'erreur, on envoie l'erreur pour pouvoir l'afficher à l'utilisateur
		if( !empty( $handle['error'] ) ) {
			echo 'error';
		}
		else {
			// On envoie le chemin de l'image en réponse
			echo $handle['url'];
		}
	}

	die();
}