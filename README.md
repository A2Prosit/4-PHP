### Prosit 4 – PHP
 
## Mots clés
 
- SGBDR
- Tableau associatif multi-dimensionnel
- e-commerce
- Back-end
- Dynamique
- Orienté objet
- Procédural
- Structure d’émission/réception de données
- Conventions de nommage
- PHP
- AJAX
- JSON
 
 
## Contexte :
 
- Quoi :
Rendre le site dynamique
 
- Pourquoi :
  - Pour ne pas tout faire à la main
  - Pour rivaliser avec la concurrence
 
- Comment :
En utilisant du PHP
 
- Contraintes :
  - Tableau associatif au lieu d’un SGBDR
  - Utiliser une BDDR
 
## Problématique :
Comment rendre un site web dynamique avec PHP ?
 
## Généralisation :
- Amélioration
- Implement
- Reconception
 
## Hypothèses :
 
- Back-end = le code que l’utilisateur ne voit pas
- Front-end = ce que l’utilisateur voit
- PHP = gérer BDD
- PHP = langage côté serv qui permet d’interagir avec le client
- Tableau associatif = tableau couplant clé-valeur
- BDD est constamment MAJ par le site
- PHP génère une page web en fonction de la requête reçue
 
## Plan d’action :
 
### Études
- PHP (histoire, syntaxe, fonctionnement, implémentation)

install:  lance wamp, créé un virtual host avec wamp si on veut, on va sur le vhost et on lis le fichier php

#### syntaxe:

**tag** : quand PHP traite un fichier il cherche les balises d'ouverture et de fermeture <code><\?php et ?> sans l'\</code>  qui délimitent le code qu'il doit interpréter.
Ainsi PHP peut être intégré à toute sortes de documents puisqu'il igniore tout ce qu'il y a en dehors des balises.

``` PHP

1.  <?php echo 'Si vous voulez intégrez du code PHP dans des documents XHTML ou XML, utilisez ces balises'; ?>

2.  Vous pouvez utiliser la balise courte pour <?= 'écrire ce texte' ?>.
    C'est toujours autorisé en PHP 5.4.0 et supérieur, et est équivalent à 
    <?php echo 'print this string' ?>.

3.  <? echo 'ce code est entre des balises courtes'; ?>
    Le code suivant <?= 'du texte' ?> est un raccourci pour <? echo 'du texte' ?> 

4.  <script language="php">
        echo 'quelques éditeurs (comme FrontPage)
                 n\'aiment pas traiter des  d\'instructions à l\'intérieur de ces balises';
    </script>
    Cette syntaxe est retirée dans PHP 7.0.0

5.  <% echo 'Vous pouvez optionnellement utiliser les balises ASP-style'; %>
    Le code suivant <%= $variable; %> est un raccourci pour <% echo $variable; %> 
    Ces deux syntaxes sont retirées de PHP 7.0.0
```
note : ne pas utiliser <.? comme balise ouvrante car elle nécessite l'activation de short_open_tag 

Si un fichier est purement du code PHP, il est préférable de ne pas placer la balise de fermeture à la fin du fichier. Ceci permet d'éviter d'oublier un espace ou une nouvelle ligne après la balise de fermeture de PHP, ce qui causerait des effets non voulus car PHP commencera à afficher la sortie, ce qui n'est souvent pas ce qui est désiré.

	<?php
	echo "Bonjour le monde !";

	// ... encore du code

	echo "Dernière instruction";

	// le script se termine ici, sans la balise de fermeture PHP



**instructions :**  PHP requiert que les instructions soient terminées par un point-virgule à la fin de chaque instruction. La balise fermante d'un bloc de code PHP implique automatiquement un point-virgule ; vous n'avez donc pas besoin d'utiliser un point-virgule pour terminer la dernière ligne d'un bloc PHP. La balise fermante d'un bloc inclura immédiatement un caractère de nouvelle ligne si un est présent.

```PHP
	<?php
	    echo 'Ceci est un test';
	?>
	
	<?php echo 'Ceci est un test' ?>
	
	<?php echo 'Oubli de la balise fermante';
```

Note:

La balise fermante d'un bloc PHP à la fin d'un fichier est optionnelle, et parfois, il est utile de l'omettre lors de l'utilisation de la fonction include ou de la fonction require, car les espaces non désirés n'apparaîtront pas à la fin des fichiers, et ainsi, vous pourrez toujours ajouter des en-têtes à la réponse plus tard.  (mais uniquement si il n'y a plus rien après 

**commentaires :** /* */ , // ou #

**variables :** 
$variable, case sensitive, nom doit commencer par lette ou _ puis lettres( ASCII) ou chiffres 

passage de valeur: <code>$v1 =$v2 </code> copie la valeur v1 dans v2

passage par référencement :
```PHP
<?php
$foo = 'truc';              // Assigne la valeur 'truc' à $foo
$bar = &$foo; 				//bar pointe vers foo

$foo2 = 25;
$bar2 = &$foo2;      // assignation valide
$bar2 = &(24 * 7);  // assignation invalide : référence une expression sans nom
function test() {
   return 25;
}
$bar = &test();    // assignation invalide.
?>
```

il n'est pas nécessaire d'assigner des valeurs aux variables en php:
 par défaut false pour booleen, 0 pour int et float et chaîne vide pour les strings 

PHP fournit également un grand nombre de variables pré-définies, elles dépendent du serveur sur lequel elles tournent, de la version et de la configuration du serveur ou encore d'autres facteurs. il y a des variables externes, des variables d'environement, des messages d'erreur, des en-têtes, etc
liste des variables :
http://php.net/manual/fr/reserved.variables.php

note : Depuis la version PHP 4.2.0, la valeur par défaut de la directive PHP register_globals est off. Ceci est une évolution majeure de PHP. Avoir la directive register_globals à off affecte les variables pré-définies du contexte global. Par exemple, pour lire DOCUMENT_ROOT vous devez utiliser \$_SERVER['DOCUMENT_ROOT'] au lieu de \$DOCUMENT_ROOT ou bien, il faut lire \$_GET['id'] dans l'URL http://www.example.com/test.php?id=3 au lieu de \$id ou encore \$_ENV['HOME'] au lieu de \$HOME.

**portée**

* globale :

		global $a, $b;

permet de passer la portée d'une variable en global

ou une deuxième méthode pour accéder aux variables globales est d'utiliser le tableau associatif pré-défini \$GLOBALS

	$GLOBALS['b']

super gloable :
```PHP
$GLOBALS
$_SERVER
$_GET
$_POST
$_FILES
$_COOKIE
$_SESSION
$_REQUEST
$_ENV
```
* statique : Une variable statique a une portée locale uniquement, mais elle ne perd pas sa valeur lorsque le script appelle la fonction. 

```PHP
<?php
function test()
{
    static $a = 0;
    echo $a;
    $a++;
}
?>
```
permet de faire des compteurs par exemple (tout ce qui est recursif)


variables dynamiques :
avec \$$ on peut assigner une variable dont le nom dépends de la valeur d'ue autre variable

```PHP
<?php
$$a = 'monde';
?>
```

Afin de pouvoir utiliser les variables dynamiques avec les tableaux, vous avez à résoudre un problème ambigu. Si vous écrivez $$a[1], l'analyseur a besoin de savoir si vous parler de la variable qui a pour nom $a[1] ou bien si vous voulez l'index [1] de la variable $$a. La syntaxe pour résoudre cette ambiguïté est la suivante : ${$a[1]} pour le premier cas et ${$a}[1] pour le deuxième.


**tableaux ** :

Un tableau en PHP est en fait une carte ordonnée. Une carte est un type qui associe des valeurs à des clés. Ce type est optimisé pour différentes utilisations ; il peut être considéré comme un tableau, une liste, une table de hashage, un dictionnaire, une collection, une pile, une file d'attente et probablement plus. On peut avoir, comme valeur d'un tableau, d'autres tableaux, multidimensionnels ou non.

```PHP
<?php
$array = array(
    "foo" => "bar",
    "bar" => "foo",
);

// depuis PHP 5.4
$array = [
    "foo" => "bar",
    "bar" => "foo",
];
?>
```
La clé key peut être soit un integer, soit une chaîne de caractères. La valeur value peut être de n'importe quel type. Les clés étant une chaine de caractère ou un float seront converites en entiers (tronqué pour float), les bool convetits en 0 ou 1, les null en la chaine vide "" et les tableaux ou objets retourneront une erreur car ils ne peuvent être convetits. Si plusieurs éléments utilisent la même clé la dernière valeur écrasera les autres 

si aucune clé n'est spécifié php utilisera un incrément de la dernière clé utilisée, on peut donc faire des tableaux classiques qui auront des indexes de 0 a x 
```php
<?php
$array = array(
         "a",
         "b",
    6 => "c",
         "d",
);
var_dump($array);
?>
```
L'exemple ci-dessus va afficher :
```php
array(4) {
  [0]=>
  string(1) "a"
  [1]=>
  string(1) "b"
  [6]=>
  string(1) "c"
  [7]=>
  string(1) "d"
} 
```

pour lire une valeur on fait simplement <code>tableau[clé]</code>	


depuis php 5.4 on peut référencer un tableau de sortie de fonction 
```php
<?php
function getArray() {
    return array(1, 2, 3);
}

// Depuis PHP 5.4
$secondElement = getArray()[1];

// Avant PHP 5.4
$tmp = getArray();
$secondElement = $tmp[1];

// ou
list(, $secondElement) = getArray();
?>
```

strings: on les mets entre simple quote et si on les mets entre double quotes on peut utiliser les carac suivants
* \n	Fin de ligne (LF ou 0x0A (10) en ASCII)
* \r	Retour à la ligne (CR ou 0x0D (13) en ASCII)
* \t	Tabulation horizontale (HT or 0x09 (9) en ASCII)
* \v	Tabulation verticale (VT ou 0x0B (11) en ASCII) (depuis PHP 5.2.5)
* \e	échappement (ESC or 0x1B (27) en ASCII) (depuis PHP 5.4.4)
* \f	Saut de page (FF ou 0x0C (12) en ASCII) (depuis PHP 5.2.5)
* \\	Antislash
* \$	Signe dollar
* \"	Guillemet double
* \[0-7]{1,3}	La séquence de caractères correspondant à cette expression rationnelle est un caractère, en notation octale, qui débordera silencieusement pour s'adapter à un octet (e.g. "\400" === "\000")
* \x[0-9A-Fa-f]{1,2}	La séquence de caractères correspondant à cette expression rationnelle est un caractère, en notation hexadécimale
* \u{[0-9A-Fa-f]+}	la séquence de caractères correspondant à l'expression régulière est un codepoint Unicode, qui sera la sortie de la chaîne de caractères représentant le codepoint UTF-8 (ajouté dans PHP 7.0.0)

**opérateurs**

* = affectation 
* +\$a	Identité	Conversion de \$a vers int ou float, selon le plus approprié.
* -\$a	Négation	Opposé de \$a.
* \$a + \$b	Addition	Somme de \$a et \$b.
* \$a - \$b	Soustraction	Différence de \$a et \$b.
* \$a * \$b	Multiplication	Produit de \$a et \$b.
* \$a / \$b	Division	Quotient de \$a et \$b.
* \$a % \$b	Modulus	Reste de \$a divisé par \$b.
* \$a ** \$b	Exponentielle	Résultat de l'élévation de \$a à la puissance \$b. Introduit en PHP 5.6.
* . concaténation 
* &var référence, note new retourne une référence automatiquement 
* \$a & \$b et logique
* \$a | \$b ou logique
* \$a ^ \$b xor
* 


- Interaction PHP-BDD
prosit suivant

- Liaison PHP-JSON


- Front-end/Back-end


- Tableaux associatifs

cf partie tableau dans php

- Lien PHP et POO
on peut créer des classes en php comme en java
prosit suivant

- Voir le TODO du prosit NodeJS
 
### Réalisation :
- Corbeille
 
 
