<?php
/*
* Page de gestion des brocantes de l'utilisateur 
*
* Projet de Programmation Web
* ENSEIRB MATMECA // Telecom
* @ author Benjamin BONNOTTE & Abdoul GUISSET
*
*/

//Nom de la page
$titre= 'Mes Brocantes';

require_once("src/fonctions.php");

include('src/entete.php');

//On récupère l'ID
$id=$_COOKIE['ID_utilisateur'];

//A partir de cette ID on récupere les autres infos
$infos_brocante = $connect->prepare("SELECT * FROM brocante WHERE ID_utilisateur='$id'");
$infos_brocante->execute() or die(print_r($infos_brocante->errorInfo(), true));

?>

<section>
	<article>
<?php
// Affiche l'ensemble des brocantes de l'utilisateur si des brocantes existent avec une boucle
	while ($ligne = $infos_brocante->fetch()) {
		$ID_Brocante = $ligne['ID_Brocante'];
		$nom_brocante = $ligne['nom_brocante'];
		$lieu = $ligne['lieu'];
		$description = $ligne['description'];
// Upload des photos des brocantes
		echo "
		<h2>Votre Brocante ID:$ID_Brocante </h2>
		<p><b>Nom de la brocante :</b> $nom_brocante</p>
		<p><b>Lieu de la brocante :</b> $lieu</p>
		<p><b>Description de la brocante :</b> $description</p>

				<h3>Uploader une photo pour votre brocante (celle-ci sera affichée en aperçu sur le site)</h3>
			<form method=\"post\" action=\"t_mesbrocantes.php\" enctype=\"multipart/form-data\" class=\"center\">
			<input type=\"file\" name=\"fichier1\" /><br></br>
			<label for=\"fichier1\">Fichier (Format : jpg/png | max. 2 Mo | 350px*350px Min Recommandé)</label><br/>
			<input type=\"hidden\" name=\"size\" value=\"2097152\" /> 
			<input type=\"hidden\" name=\"ID_Brocante\" value=\"$ID_Brocante\" /> 
			<input type=\"submit\" name=\"submit\" value=\"Envoyer\" />
			</form>

			<h3>Uploader une seconde photo pour votre brocante</h3>
			<form class=\"center\" method=\"post\" action=\"t_mesbrocantes2.php\" enctype=\"multipart/form-data\" class=\"right\">
			<input type=\"file\" name=\"fichier2\" /><br></br>
			<label for=\"fichier2\">Fichier (Format : jpg/png | max. 2 Mo | 350px*350px Min Recommandé)</label><br/>
			<input type=\"hidden\" name=\"size\" value=\"2097152\" /> 
			<input type=\"hidden\" name=\"ID_Brocante\" value=\"$ID_Brocante\" /> 
			<input type=\"submit\" name=\"submit\" value=\"Envoyer\" />
			</form>
		";
	}
// Suppresion d'une brocante
		echo "		
				<form method=\"post\" enctype=\"multipart/form-data\" action=\"s_brocantes.php\">
				<fieldset><legend>Suppresion d'une Brocante</legend>
				<p><label for=\"idsuprr\">ID de la Brocante à supprimer :</label><input type=\"text\" id=\"idsuprr\" name=\"idsuprr\" tabindex=\"5\"  required/></p>
				<p id=\"submit\"><input type=\"submit\" value=\"Supprimer\" tabindex=\"11\"></p>
				</fieldset>
				</form>"
		;
// Sinon on affiche un message
if(!isset($ID_Brocante)) 
{
 echo "Vous n'avez pas encore de brocantes !";
}?>
	</article>
</section>
<?php include('src/footer.php'); ?>