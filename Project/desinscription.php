<?php
/*
* Page de desinscription 
*
* Projet de Programmation Web
* ENSEIRB MATMECA // Telecom
* @ author Benjamin BONNOTTE & Abdoul GUISSET
*
*/
require_once("src/fonctions.php");

// Nom de la page
$titre='Désinscription';

// Récupération de l'id utilisateur
$id = $_GET['id'];

include('src/entete.php');

//Déconnexion de l'utilisateur
setcookie('ID_utilisateur', NULL, -1);

if (isset($_COOKIE['ID_utilisateur'])) {
	
		echo "<meta http-equiv='refresh' content='0';URL=?refresh=1'>";
}
//Puis désinscription de l'utilisateur
	$desinscription = $connect->prepare("DELETE FROM utilisateur WHERE ID_utilisateur='$id'");
	$desinscription->execute() or die(print_r($desinscription->errorInfo(), true));
	echo "<section><article>Vous êtes désormais désinscrit. Toutes les informations vous concenrnant ont été détruites.</article></section>";
?>

<?php include('src/footer.php'); ?>