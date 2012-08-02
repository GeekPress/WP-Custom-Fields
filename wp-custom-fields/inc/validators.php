<?php

/*
 * function wpcf_get_allowed_validators
 *
 * Cette fonction permet de retourner la liste des validateurs autorisés
 * Il est possible d'ajouter de nouveaux validateurs à l'aide du filtre wpcf_allowed_validators
 *
*/

function wpcf_get_allowed_validators()
{
	$validators = array(
				'text' 		=> '/[a-z0-9àáâãäåòóôõöøèéêëçìíîïùúûüÿñ -!?]+$/i',
			    'numeric' 	=> '/[0-9]+$/i',
			    'number' 	=> '/^[\-+]?\d*\.?\d+$/i',
				'alpha' 	=> '/[a-z ._\-]+$/i',
				'alphanum' 	=> '/[a-z0-9 ._\-]+$/i',
				'email' 	=> '/[a-z0-9._%\-]+@[a-z0-9.\-]+\.[a-z]{2,4}$/i',
				'phone' 	=> '/^[0-9]{2}[\s]{0,1}[0-9]{2}[\s]{0,1}[0-9]{2}[\s]{0,1}[0-9]{2}[\s]{0,1}[0-9]{2}$/',
				'url' 		=> '/^(http|https):\/\/[a-z0-9\-\.\/_]+\.[a-z]{2,3}$/i',
				'hexacolor' => '/[0-9a-fA-F]{6}/',
				'date_time' => '/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}[\s][0-9]{2}:[0-9]{2}$/',
				'date'		=> '/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/',
				'time'		=> '/^([0-1]?[0-9]|2[0-4]):([0-5][0-9])$/',
				'image'		=> '/^(http|https):\/\/[a-z0-9\-\.\/]+\.(?:jpe?g|png|gif)$/i'
    		);

	return apply_filters( 'wpcf_validators' , $validators );
}

/*
 * function wpcf_add_regex_rules_validator
 *
 * On affiche dans le footer un une variable JavaScript contenant un objet composé des la liste des valideurs
 * La variable ruleReg permettra ensuite de faire un test de validation en JavaScript
 *
*/

add_action( 'admin_footer', 'wpcf_add_regex_rules_validator' );
function wpcf_add_regex_rules_validator()
{

	global $pagenow;
	if( $pagenow != 'post.php' && $pagenow != 'post-new.php' ) return;

	// On récupère la liste des validateurs
	$validators = wpcf_get_allowed_validators();
	?>
		<script>
			var ruleReg = {
			<?php
				foreach ( $validators as $k => $v )
					echo $k . ' : ' . $v. ','
			?>
			},
			TXT_UPLOAD_AJAX_ERROR = "Une erreur est survenue lors de l\'upload du fichier",
			TXT_SYNTAX_ERROR = "Synthaxe Incorrect";
		</script>
	<?php
}