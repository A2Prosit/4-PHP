<?php
echo 'Current PHP version: '. Phpversion(); //Connaître sa version PHP
echo "<br/>";
echo "Informations sur le serveur: ".php_uname();
echo "<br/>";
echo "Informations sur l'OS: ".PHP_OS;
echo "<br/>";

$language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
$language = $language{0}.$language{1};
echo "Langue du navigateur: ".$language;

echo "<br/>";
echo "EXERCICE 2 - MANIPULATION DE CHAINE DE CARACTERES";
echo "<br/>";
$machaine = "coucou, je suis un test de chaîne de caractère !";
echo ucfirst($machaine); //Majuscule
echo "<br/>";
echo ucwords($machaine); //Première lettre dans chaque mot en MAJ
echo "<br/>";
echo str_replace(' ', '_', $machaine); //Remplace les espaces par des _
echo "<br/>";
echo "Nombre de mots: ", str_word_count($machaine);//Nb mots
echo "<br/>";
echo "EXERCICE 3 - MANIPULATION DE CHAINE DE CARACTERES";
echo "<br/>";

$voitures = array(
    1 => array('marque' => 'Audi', 'modèle' => 'A1', 'type' => 'Citadine'),
    2 => array('marque' => 'Volkswagen', 'modèle' => 'Passat', 'type' => 'Berline'),
    3 => array('marque' => 'Volkswagen', 'modèle' => 'Golf', 'type' => 'Compact'),
    4 => array('marque' => 'Mazda', 'modèle' => 'CX-5', 'type' => 'SUV')
);
//echo $voitures[1]['marque']; //Sélectionner un élement

foreach($voitures as $cle1 => $valeur1)
{
    echo "personne n°:" . $cle1 . "<br />";

    foreach ($valeur1 as $cle2=>$valeur2)

    {
        echo "Clé : ".$cle2 .", Valeur: " . $valeur2 . "<br />\n";
    }
}
echo "<br/>";
echo "EXERCICE 3 - POO";
echo "<br/>";


class Voiture

{
    private $_marque;
    private $_modèle;
    private $_type;

    public function __construct($marque, $modèle, $type) // Constructeur demandant 2 paramètres
    {
        //Création des attributs
        $this->setMarque($marque);
        $this->setModèle($modèle);
        $this->setType($type);

    }

    public function setMarque($marque)
    {
        if (!is_string($marque)) // Vérification d'un string
        {
            trigger_error('Veuillez rentrer un string', E_USER_WARNING);
            return;
        }
        $this->_marque = $marque;
    }

    public function setModèle($modèle)
    {
        if (!is_string($modèle)) // Vérification d'un string
        {
            trigger_error('Veuillez rentrer un string', E_USER_WARNING);
            return;
        }
        $this->_modèle = $modèle;
    }

    public function setType($type)
    {
        if (!is_string($type)) // Vérification d'un string
        {
            trigger_error('Veuillez rentrer un string', E_USER_WARNING);
            return;
        }
        $this->_type = $type;
    }

    public function getMarque(){
        return $this->_marque;
    }
    public function getModèle(){
        return $this->_modèle;
    }
    public function getType(){
        return $this->_type;
    }
}

echo "<br/>";
$audi = new Voiture("Audi", "A1","Citadine");
echo "<br/>";
//echo $audi->getMarque();

//Pour chaque voiture, on crée un objet
for ($i = 1; $i < sizeof($voitures); $i++){
    ${'car'.$i} = new Voiture("", "","");
    ${'car'.$i}->setMarque($voitures[$i]['marque']);
    ${'car'.$i}->setModèle($voitures[$i]['modèle']);
    ${'car'.$i}->setType($voitures[$i]['type']);
}

echo $car2->getModèle();



echo "<html>";
echo "<head><title>PAGE EXO</title></head>";
?>
<body>
<h1>Bienvenue sur le site de toto </h1>
<h2>Commencez-donc par vous inscrire :</h2>
<form name="inscription" method="post" action="recup.php">
    Entrez votre pseudo : <input type="text" name="pseudo"/> <br/>
    Entrez votre ville : <input type="text" name="ville"/><br/>
    <input type="submit" name="valider" value="OK"/>
    <a href="recup.php?nom=Dupont&amp;prenom=Jean">Dis-moi bonjour !</a>
</form>
</body>
</html>
