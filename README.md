WP-Custom-Fields
================

WP-Custom-Fields est une class PHP qui permet d'ajouter de fa�on simple et intuitive de nouvelles meta box compos�es de champs personnalis�s (ou Custom Fields en anglais).

Cr�dits
-----------

* Auteur : Jonathan Buttigieg alia GeekPress
* Autheur URI : http://www.geekpress.fr

Installation
-----------

Apr�s avoir t�l�charger le dossier "wp-custom-fields", il peut �tre ins�rer � n'importe quel endroit de votre th�me. 
Il suffit de faire une inclusion de la class "meta-box.class.php" pr�sente � la racine du dossier "wp-custom-fields". 

Dans l'id�al, je vous conseille de placer le dossier "wp-custom-fields" � la racine de votre th�me
et d'inclure la class � partir du fichier functions.php comme ci-dessous :
	
	require_once( TEMPLATEPATH . '/wp-custom-fields/meta-box.class.php' );
	

Comment cr�er une meta box ?
-----------

L'ajout d'une meta box se fait � l'aide d'une nouvelle instance de la class MetaBox.


Les diff�rents types de champ
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

Les param�tres d'un champ
-----------

Les validateurs
-----------

### Les validateurs disponibles par d�faut

La liste ci-dessous pr�sente la liste des validateurs disponibles par d�faut :

	'text' 		=> '/[a-z0-9��������������������������� -!?]+$/i',
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

### Est-ce je peux ajouter mes propres validateurs ?

Oui, cela est possible en modifiant la variable de retour du filtre "wpcf_validators". Les validateurs par d�faut sont disponibles dans le premier argument de la fonction de callback.

L'exemple ci-dessous montre la d�marche � suivre pour ajouter un nouveau validateur :

	add_filter( 'wpcf_validators', 'my_validators' );
	
	function my_validators( $validtors ) {
		$validators['myregex'] => '/^myregex$/';
		return $validators;
	}


Changelog
-----------

### 0.1

Version initiale