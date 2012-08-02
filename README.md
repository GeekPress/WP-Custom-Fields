WP-Custom-Fields
================

WP-Custom-Fields est une class PHP qui permet d'ajouter de fa�on simple et intuitive de nouvelles meta box compos�es de champs personnalis�s (ou Custom Fields en anglais).

Cr�dits
-----------

* Auteur : Jonathan Buttigieg alia GeekPress
* Autheur URI : http://www.geekpress.fr

Installation
-----------

Apr�s avoir t�l�charger le dossier "wp-custom-fields", il peut �tre ins�r� � n'importe quel endroit de votre th�me. 
Il suffit de faire une inclusion de la class "meta-box.class.php" pr�sente � la racine du dossier "wp-custom-fields". 

Dans l'id�al, je vous conseille de placer le dossier "wp-custom-fields" � la racine de votre th�me
et d'inclure la class � partir du fichier functions.php comme ci-dessous :
	
	require_once( TEMPLATEPATH . '/wp-custom-fields/meta-box.class.php' );
	

Comment cr�er une meta box ?
-----------

L'ajout d'une meta box se fait � l'aide d'une nouvelle instance de la class MetaBox comme ci-dessous :

	$exMetaBox = new Metabox( $conf, $fields );

Les arguments `$conf` et `$fields` sont obligatoires lorsqu'on instancie la class. 
Une erreur fatale sera d�clench�e si l'un des deux arguments n'est pas pr�sent. 

### Configuration de la meta box

`$conf` est un tableau  associatif qui permet de configurer la meta box.

Le tableau contient les cl�s suivantes :

* id 
  * Attribut "id" de la div qui contient les champs de la meta box
  * (string) (requis)
  * D�faut : '_none'
* title 
  * Titre visible de la meta box
  * (string) (requis)
  * D�faut : null
* post_type
  * Liste des Custom Post Types o� la meta box doit �tre ins�r�e ('post', 'page', 'link', ou 'custom_post_type')
  * (string/array)
  * D�faut : 'post'
* context
	* La partie de la page o� la meta box doit �tre affich�e ('normal', 'advanced', ou 'side').
	* (string)
	* D�faut : 'normal'
* priority
	* La priorit� du contexte o� la meta box doivent �tre affich�e ('high', 'core', 'default' or 'low')
	* (string)
	* D�faut : 'high'

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

WP Custom Fields � la particularit� de proposer divers validateurs. 
Ils permettent de v�rifier la valeur d'un champ par rapport au masque d'une expression r�guli�re.

### Les validateurs par d�faut

Par d�faut, WP Custom Fields permet l'utilisation de 13 validateurs :

* text
* numreric 
* number 
* alpha 
* alphanum 
* email 
* phone 
* url 
* hexacolor 
* date_time 
* time 
* image 


Le code ci-dessous pr�sente chacun des validateurs avec son expression r�guli�re :

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