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
	//check_ajax_referer( 'upload-' . $_POST['post_id'] . $POST['field_id'], '_wpcf_nonce' );

	// On récupére le fichier
	$filename = $_FILES[$_POST['data']];
	
	// Si on upload bien un fichier non vide
	if( isset( $filename ) && $filename['error'] == 0 ) {

		// On se sert de la fonction de WordPress pour upload l'image
		$handle = wp_handle_upload( $filename,
									array(
										'test_form' => false,
										'mimes' => array(
													'png' => 'image/png',
													'jpg' => 'image/jpg',
													'jpeg' => 'image/jpeg',
													'gif' => 'image/gif'
												)
									)
					);

		// En cas d'erreur, on envoie l'erreur pour pouvoir l'afficher à l'utilisateur
		if( !empty( $handle['error'] ) ) {
			echo 'error';
		}
		else {
			// On sauvegarde l'url dans un Custom Field
			update_post_meta( $_POST['post_id'], str_replace( 'upload_ajax_image_button_', '', $_POST['data'] ) , $handle['url'] );

			// On envoie le chemin de l'image en réponse
			echo $handle['url'];
		}
	}

	die();
}