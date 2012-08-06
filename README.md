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

<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="ZZRYQ9MLXSU7Y">
<input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - la solution de paiement en ligne la plus simple et la plus sécurisée !">
<img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
</form>


Installation
-----------

Après avoir télécharger le dossier "wp-custom-fields", il peut être inséré à n'importe quel endroit de votre thème. 
Il suffit de faire une inclusion de la class "meta-box.class.php" présente à la racine du dossier "wp-custom-fields". 

Dans l'idéal, je vous conseille de placer le dossier "wp-custom-fields" à la racine de votre thème
et d'inclure la class à partir du fichier functions.php comme ci-dessous :
	
	require_once( TEMPLATEPATH . '/wp-custom-fields/meta-box.class.php' );