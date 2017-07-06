<?php
/*
* Page de traitement de suppresion de brocantes
* 
* Projet de Programmation Web
* ENSEIRB MATMECA // Telecom
* @ author Benjamin BONNOTTE & Abdoul GUISSET
*
*/

// Pour chaque page du site on appel le fichier contenant les fonctions devant etre presente
require_once("src/fonctions.php");

// Définition du titre de la page
$titre = 'Mes Brocantes';

// On appel l'entete de la page
include('src/entete.php');

// Récupération de l'id de l'utilisateur
$id=$_COOKIE['ID_utilisateur'];

//Récupération des infos
$del = $connect->prepare("SELECT * FROM brocante WHERE ID_utilisateur='$id'");
$del->execute();

//Récupération de l'id de brocante à supprimer
$idsuprr=htmlspecialchars($_POST['idsuprr']);


?>

<section>
	<article>
		<?php
// Si l'id existe on supprime 
if (isset($idsuprr)) {

					//Suppresion des données dans notre table brocante 
					// L'utilisateur ne peut évidemment supprimer que ses propres brocantes
					$suppression= $connect->prepare("DELETE FROM brocante WHERE ID_Brocante =$idsuprr AND ID_utilisateur='$id'");
					$suppression->execute();


echo "Votre brocante a bien été supprimé ! <meta http-equiv=\"Refresh\" content=\"1; url=mesbrocantes.php\">";
}
// Sinon non
else {
echo "Erreur";
}

		?>
	</article>
</section>
<?php include('src/footer.php'); ?>