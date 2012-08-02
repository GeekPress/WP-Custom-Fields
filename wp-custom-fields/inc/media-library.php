<?php

/************************************************
/*
/*  Configuration du gestionnaire de média
/*
*************************************************/

if( isset( $_GET['option_upload'] ) || isset($_POST['option_upload'] ) ) {
    add_filter('media_upload_tabs', 'wpcf_disable_media_tabs');
    add_filter('attachment_fields_to_edit', 'wpcf_delete_media_fields', 999);
}


/*
 * function wpcf_disable_media_tabs
 *
 * Suppression des onglets "Depuis le Web" et "Galerie" du gestionnaire de média
 * On laisse volontairement que l'onglet "Bibliothèque" accessible à l'utilisateur
 *
*/

function wpcf_disable_media_tabs( $tabs ) {
    unset( $tabs['type_url'], $tabs['gallery'] );
    return $tabs;
}


/*
 * function wpcf_delete_media_fields
 *
 * Suppression des champs inutiles dans le gestionnaire de média
 *
*/

function wpcf_delete_media_fields( $fields ) {
	unset( $fields['post_content'], $fields['image_alt'], $fields['post_excerpt'], $fields['align'], $fields['image-size'] );
	return $fields;
}