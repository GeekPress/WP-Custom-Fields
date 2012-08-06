WP-Custom-Fields 0.2
================

WP-Custom-Fields est une class PHP qui permet d'ajouter de fa�on simple et intuitive de nouvelles meta box compos�es de champs personnalis�s (ou Custom Fields en anglais).

ATTENTION : La classe requiert l'utilisation de PHP 5.3 ou sup�rieur.

Cr�dits
-----------

* Auteur : Jonathan Buttigieg alia GeekPress
* Autheur URI : http://www.geekpress.fr

Donation
-----------

[![Donate to WP Custom Fields](https://www.paypalobjects.com/en_GB/i/btn/btn_donate_SM.gif "Donate to WP Custom Fields")](https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=jonathan%2ebuttigieg%40yahoo%2efr&lc=FR&item_name=WP%20Custom%20Fields&no_note=0&currency_code=EUR&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHostedGuest)


Installation
-----------

Apr�s avoir t�l�charger le dossier "wp-custom-fields", il peut �tre ins�r� � n'importe quel endroit de votre th�me. 
Il suffit de faire une inclusion de la class "meta-box.class.php" pr�sente � la racine du dossier "wp-custom-fields". 

Dans l'id�al, je vous conseille de placer le dossier "wp-custom-fields" � la racine de votre th�me
et d'inclure la class � partir du fichier functions.php comme ci-dessous :
	
	require_once( TEMPLATEPATH . '/wp-custom-fields/meta-box.class.php' );