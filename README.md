WP-Custom-Fields 0.2
================

WP-Custom-Fields est une class PHP qui permet d'ajouter de façon simple et intuitive de nouvelles meta box composées de champs personnalisés (ou Custom Fields en anglais).

ATTENTION : La classe requiert l'utilisation de PHP 5.3 ou supérieur.

Crédits
-----------

* Auteur : Jonathan Buttigieg alia GeekPress
* Autheur URI : http://www.geekpress.fr

Donation
-----------

[![Donate to WP Custom Fields](https://www.paypalobjects.com/en_GB/i/btn/btn_donate_SM.gif "Donate to WP Custom Fields")](https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=jonathan%2ebuttigieg%40yahoo%2efr&lc=FR&item_name=WP%20Custom%20Fields&no_note=0&currency_code=EUR&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHostedGuest)


Installation
-----------

Après avoir télécharger le dossier "wp-custom-fields", il peut être inséré à n'importe quel endroit de votre thème. 
Il suffit de faire une inclusion de la class "meta-box.class.php" présente à la racine du dossier "wp-custom-fields". 

Dans l'idéal, je vous conseille de placer le dossier "wp-custom-fields" à la racine de votre thème
et d'inclure la class à partir du fichier functions.php comme ci-dessous :
	
	require_once( TEMPLATEPATH . '/wp-custom-fields/meta-box.class.php' );