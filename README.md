WP-Custom-Fields
================

WP-Custom-Fields est une class PHP qui permet d'ajouter de façon simple et intuitive de nouvelles meta box composés de champs personnalisés ( ou Custom Fields).

Crédits
-----------

* [Auteur : Jonathan Buttigieg alia GeekPress
* [Autheur URI : http://www.geekpress.fr(http://www.geekpress.fr)

Installation
-----------

Le dossier "wp-custom-fields" pour être insérer à n'importe quel endroit de votre thème. Il suffit de faire une inclusion de la class à partir du chemin où elle se trouve. Dans l'idéal, je vous conseille de placer le dossier "wp-custom-fields" à la racine de votre thème et d'inclure la class à partir du fichier functions.php comme ci-dessous :
	
	require_once( TEMPLATEPATH . '/wp-custom-fields/meta-box.class.php' );
	

Comment créer une meta box ?
-----------

Comment créer un nouveau champ ?
-----------

### Text

### DatePicker

### DateTimePicker

### TimePicker

### ColorPicker

### Textarea

### TinyMCE

### Radio

### Checkbox

### Multi-Checkbox

### Select

### Multi-Select

### Media

### File

Les paramètres d'un champ
-----------

Les validateurs
-----------

### Les validateurs disponibles par défaut

Par défaut, la classe propose un peu plus de 10 validateurs.

La liste ci-dessous présente la liste des validateurs disponibles :

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

### Comment ajouter un nouveau filtre ?