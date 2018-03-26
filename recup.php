<?php



//http://php/recup.php?nom=Dupont&prenom=Jean
if (isset($_GET['nom'])){
	echo $_GET['nom'];
	echo $_GET['prenom'];
}else{
	echo $_POST['pseudo'];
	echo $_POST['ville'];
}
?>