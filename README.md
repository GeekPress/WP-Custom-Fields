WP-Custom-Fields
================

WP-Custom-Fields est une class PHP qui permet d'ajouter de façon simple et intuitive de nouvelles meta box composées de champs personnalisés (ou Custom Fields en anglais).

Crédits
-----------

* Auteur : Jonathan Buttigieg alia GeekPress
* Autheur URI : http://www.geekpress.fr

Installation
-----------

Après avoir télécharger le dossier "wp-custom-fields", il peut être inséré à n'importe quel endroit de votre thème. 
Il suffit de faire une inclusion de la class "meta-box.class.php" présente à la racine du dossier "wp-custom-fields". 

Dans l'idéal, je vous conseille de placer le dossier "wp-custom-fields" à la racine de votre thème
et d'inclure la class à partir du fichier functions.php comme ci-dessous :
	
	require_once( TEMPLATEPATH . '/wp-custom-fields/meta-box.class.php' );
	

Comment créer une meta box ?
-----------

L'ajout d'une meta box se fait à l'aide d'une nouvelle instance de la class MetaBox comme ci-dessous :

	$exMetaBox = new Metabox( $conf, $fields );

Les arguments `$conf` et `$fields` sont obligatoires lorsqu'on instancie la class. 
Une erreur fatale sera déclenchée si l'un des deux arguments n'est pas présent. 

### Configuration de la meta box

`$conf` est un tableau  associatif qui permet de configurer la meta box.

Le tableau contient les clés suivantes :

* id 
  * Attribut "id" de la div qui contient les champs de la meta box
  * (string) (requis)
  * Défaut : '_none'
* title 
  * Titre visible de la meta box
  * (string) (requis)
  * Défaut : null
* post_type
  * Liste des Custom Post Types où la meta box doit être insérée ('post', 'page', 'link', ou 'custom_post_type')
  * (string/array)
  * Défaut : 'post'
* context
	* La partie de la page où la meta box doit être affichée ('normal', 'advanced', ou 'side').
	* (string)
	* Défaut : 'normal'
* priority
	* La priorité du contexte où la meta box doivent être affichée ('high', 'core', 'default' or 'low')
	* (string)
	* Défaut : 'high'

Les différents types de champ
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

WP Custom Fields à la particularité de proposer divers validateurs. 
Ils permettent de vérifier la valeur d'un champ par rapport au masque d'une expression régulière.

### Les validateurs par défaut

Par défaut, WP Custom Fields permet l'utilisation de 13 validateurs :

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


Le code ci-dessous présente chacun des validateurs avec son expression régulière :

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

### Est-ce je peux ajouter mes propres validateurs ?

Oui, cela est possible en modifiant la variable de retour du filtre "wpcf_validators". Les validateurs par défaut sont disponibles dans le premier argument de la fonction de callback.

L'exemple ci-dessous montre la démarche à suivre pour ajouter un nouveau validateur :

	add_filter( 'wpcf_validators', 'my_validators' );
	
	function my_validators( $validtors ) {
		$validators['myregex'] => '/^myregex$/';
		return $validators;
	}


Changelog
-----------

### 0.1

Version initiale