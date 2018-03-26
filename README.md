
### Prosit 4 – PHP
 
## Mots clés
 
- SGBDR : Système de Gestion de Base de Données
- Tableau associatif multi-dimensionnel :  Tableau qui a plusieurs clés et plusieurs associations.
- e-commerce : /
- Back-end : Partie traitement des données dans un code
- Dynamique
- Orienté objet
- Procédural : série d'étapes à réaliser, n'importe quelle procédure peut-être appelée à n'importe quel moment.
- Structure d’émission/réception de données 
- Conventions de nommage : Convention pour nommer ses variables ou ses fichiers. (Pas d'espaces, pas de majuscules pour les fonctions, MAJ classes...)
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
- Interaction PHP-BDD
- Liaison PHP-JSON
- Front-end/Back-end
- Tableaux associatifs
- Lien PHP et POO
- Voir le TODO du prosit NodeJS
 
### Réalisation :
- Corbeille


# 1 - PHP

- Dernière version : 7.1.15
- Créer des sites dynamiques
- Sur une base de HTML et CSS
- Langage exécuté par le serveur. 
- Permet de générer une page
- Compléter par du MySQL (SGBD)
- Permet de personnaliser la page en fonction du visiteurn de traiter ses messages, d'effectuer des calculs... et génère une page HTML.

Concurents :
- ASP.NET : Par microsoft, basé sur du C# 
- Ruby on Rails : Basé sur du Ruby
- Django : Basé sur du Python
- JEE : Demande une rigeur, très utilisé par le monde professionel. Ex : impôts français.

 **Pour utiliser du PHP**, il faut un serveur WEB :
 - Apache : Chargé de délivrer les pages au visiteurs. 
 - PHP : Plug-in pour Apache qui le rend capable de traiter des pages **dynamiques**
 - MySQL : SGBD.
 
 => Logiciel WAMP sous Windows 
 => MAMP : Mac OSX
 => XAMMP sous Linux (même si on peut faire un serveur Apache sois même)


**Utiliser du PHP**
Dans un .html :
`<? [code PHP] ?>`

- Instruction echo
- fichier avec extension.php
- On peut mettre des commentaires avec // & /* 

# 2 - BDD

```
$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
```

```
$reponse = $bdd->query('SELECT * FROM jeux_video');
```

```
while ($donnees = $reponse->fetch()) // Quand plusieurs réponses
```

```
$reponse->closeCursor(); // Termine le traitement de la requête
```

# 3 - JSON - PHP

[mixed](http://php.net/manual/fr/language.pseudo-types.php#language.types.mixed) **json_decode** ( string `$json` \[, bool `$assoc` = false \[, int `$depth` = 512 \[, int `$options` = 0 \]\]\] )

Récupère une chaîne encodée JSON et la convertit en une variable PHP.


# 4 - Front End / Back End

Front End : Aspect visuel pour l'utilisateur. En PHP on peu faire des echo sur du HTML.

Back End : La partie de traitement des données.

# 5 - Tableau associatifs : 

````
$voitures = array(
    1 => array('marque' => 'Audi', 'modèle' => 'A1', 'type' => 'Citadine'),
    2 => array('marque' => 'Volkswagen', 'modèle' => 'Passat', 'type' => 'Berline'),
    3 => array('marque' => 'Volkswagen', 'modèle' => 'Golf', 'type' => 'Compact'),
    4 => array('marque' => 'Mazda', 'modèle' => 'CX-5', 'type' => 'SUV')
);
````



