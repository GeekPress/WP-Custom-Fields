WP-Custom-Fields 0.11
================

WP-Custom-Fields est une class PHP qui permet d'ajouter de fa�on simple et intuitive de nouvelles meta box compos�es de champs personnalis�s (ou Custom Fields en anglais).

ATTENTION : La classe requiert l'utilisation de PHP 5.3 ou sup�rieur.

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
  * D�faut : None
* title 
  * Titre visible de la meta box
  * (string) (requis)
  * D�faut : None
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
	
Dans l'exemple ci-dessous, on cr�e une meta box qui a comme lib�l� "Coordonn�es". Cette meta bos sera disponible pour les articles, les pages et le Custom Post Type "equipe" :
	
	$conf = array(
			'id'        => '_coordonnees'
			'title'     => 'Coordonn�es',
			'post_type' => array( 'post', 'page', 'equipe' )
	);

Les diff�rents types de champ
-----------

### Text

	$fields[] = array(
					'name' 	=> 'voiture',
					'label' => 'Voiture',
					'type' 	=> 'text',
	);

### Password
	
	$fields[] = array(
					'name' 	=> 'donnee_secrete',
					'label' => 'Mot de passe',
					'type' 	=> 'password',
	);
	
### DatePicker

	$fields[] = array(
					'name'      => 'date_reservation',
					'label'     => 'Date de la r�servation',
					'type'      => 'text',
					'validator' => 'date'
	);

### DateTimePicker

	$fields[] = array(
					'name'      => 'date_time_reservation',
					'label'     => 'Date et heure de la r�servation',
					'type'      => 'text',
					'validator' => 'date_time'
	);

### TimePicker

	$fields[] = array(
					'name'      => 'time_seance',
					'label'     => 'Heure de la s�ance',
					'type'      => 'text',
					'validator' => 'time'
	);

### ColorPicker
	
	$fields[] = array(
					'name'      => 'color_bg',
					'label'     => 'Couleur de fond',
					'type'      => 'text',
					'validator' => 'hexacolor'
	);
	
### Textarea
	
	$fields[] = array(
					'name'      => 'mission',
					'label'     => 'Mission',
					'type'      => 'textarea',
	);
	
### TinyMCE

	$fields[] = array(
					'name'      => 'mission',
					'label'     => 'Mission',
					'type'      => 'textarea',
					'tinyMCE'	=> true
	);

### Radio
	
	$fields[] = array(
					'name'      => 'cms',
					'label'     => 'CMS',
					'type'      => 'radio',
					'options'	=> array(
								   	  'wordpress'  => 'WordPress',
								   	  'drupal'     => 'Drupal',
								   	  'joomla'     => 'Joomla!',
								   	  'prestashop' => 'Prestashop',
								   )
	);
	
### Checkbox

	$fields[] = array(
					'name'           => 'payant',
					'label'          => 'Activit� payante ?',
					'type'           => 'checkbox',
					'label_checkbox' => 'Si coch�, cela signifie que l\'activit� est payante'
	);

### Multi-Checkbox

	$fields[] = array(
					'name'      => 'competences',
					'label'     => 'Comp�tences',
					'type'      => 'checkbox',
					'options'	=> array(
								   	  'html-css'   => 'HTML/CSS',
								   	  'php'        => 'PHP',
								   	  'javascript' => 'JavaScript',
								   	  'as3'        => 'Action Script 3',
								   )
	);

### Select

	$fields[] = array(
					'name'      => 'langue',
					'label'     => 'Langue',
					'type'      => 'select',
					'options'	=> array(
								   	  'fr' => 'France',
								   	  'en' => 'Anglais',
								   	  'de' => 'Allemand',
								   	  'es' => 'Espagnol',
								   	  'it' => 'Italien'
								   )
	);

### Multi-Select
	
	$fields[] = array(
					'name'      => 'langue',
					'label'     => 'Langue',
					'type'      => 'select',
					'options'	=> array(
								   	  'fr' => 'France',
								   	  'en' => 'Anglais',
								   	  'de' => 'Allemand',
								   	  'es' => 'Espagnol',
								   	  'it' => 'Italien'
								   ),
					'multiple'  => true
								
	);
	
### Media

	$fields[] = array(
					'name'      => 'couverture',
					'label'     => 'Photo de couverture',
					'type'      => 'media',
	);

### File

	$fields[] = array(
					'name'      		  => 'noir-blanc',
					'label'     		  => 'Photo en noir & blanc',
					'type'      		  => 'file',
					'allowed_mime_type'	  => array(
												'png'  => 'image/png',
												'jpg'  => 'image/jpg',
												'jpeg' => 'image/jpeg',
												'gif'  => 'image/gif'
											)
	);

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

### 0.11

* Optimisation du code la class MetaBox
* Ajout du param�tre de champ "callback" qui permet de faire appel � un fonction de callback 
pour manipuler la valeur du champ avant de l'enregistrer en BDD
* Ajout du type de champ "password"
* Ajout d'un nonce de s�curit� sur l'upload en AJAX
* Gestion du param�tre de champ "allowed_mime_type" 
qui permet de limiter les extensions de fichier autoris�s pour une upload en AJAX
* Ajout des param�tres de champ "class" et "accesskey" pour tous les types de champ
* Ajout d'un message d'erreur si l'attribut "name" du champ est vide
* Ajout du param�tre "maxlength" valable pour les champs de type "text"
* Ajout des param�tres de champ "cols" et "rows" pour g�rer les dimensions d'un textarea
* Ajout d'un wp_localize_script() dans le fichier enqueue.php pour la gestion des textes dans le fichier meta-box.js
* V�rification de la version de PHP (n�cessite PHP 5.3 minimum)
* modification du param�tre minSize par min_size
* modification du param�tre maxSize par max_size
* Correction de plusieurs conflits entre les champs
* Correction de s�curit� � divers endroits
* Correction d'un bug sur l'upload en AJAX
* Correction du lien mort vers l'image wpspin_light.gif lors d'un upload en AJAX

### 0.1

Version initiale