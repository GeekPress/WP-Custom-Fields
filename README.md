WP-Custom-Fields
================

WP-Custom-Fields est une class PHP qui permet d'ajouter de fa�on simple et intuitive de nouvelles meta box compos�s de champs personnalis�s ( ou Custom Fields).

Cr�dits
-----------

* [Auteur : Jonathan Buttigieg alia GeekPress
* [Autheur URI : http://www.geekpress.fr(http://www.geekpress.fr)

Installation
-----------

Le dossier "wp-custom-fields" pour �tre ins�rer � n'importe quel endroit de votre th�me. Il suffit de faire une inclusion de la class � partir du chemin o� elle se trouve. Dans l'id�al, je vous conseille de placer le dossier "wp-custom-fields" � la racine de votre th�me et de faire d'inclure la class � partir du fichier functions.php comme ci-dessous :
	
	require_once( TEMPLATEPATH . '/wp-custom-fields/meta-box.class.php' );
	
	
