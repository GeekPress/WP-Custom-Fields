WP-Custom-Fields
================

WP-Custom-Fields est une class PHP qui permet d'ajouter de façon simple et intuitive de nouvelles meta box composés de champs personnalisés ( ou Custom Fields).

Crédits
-----------

* [Auteur : Jonathan Buttigieg alia GeekPress
* [Autheur URI : http://www.geekpress.fr(http://www.geekpress.fr)

Installation
-----------

Le dossier "wp-custom-fields" pour être insérer à n'importe quel endroit de votre thème. Il suffit de faire une inclusion de la class à partir du chemin où elle se trouve. Dans l'idéal, je vous conseille de placer le dossier "wp-custom-fields" à la racine de votre thème et de faire d'inclure la class à partir du fichier functions.php comme ci-dessous :
	
	require_once( TEMPLATEPATH . '/wp-custom-fields/meta-box.class.php' );
	
	
