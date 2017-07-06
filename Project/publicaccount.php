<?php
/*
* Page de profil PUBLIC
*
* Projet de Programmation Web
* ENSEIRB MATMECA // Telecom
* @ author Benjamin BONNOTTE & Abdoul GUISSET
*
*/

// Nom de la page
$titre='Profil du vendeur';

require_once("src/fonctions.php");

include('src/entete.php');

//On récupère l'ID
$iduser=$_GET['iduser'];

//A partir de cette ID on récupere les autres infos
$infos_utilisateur = $connect->prepare("SELECT * FROM utilisateur WHERE ID_utilisateur='$iduser'");
$infos_utilisateur->execute() or die(print_r($infos_utilisateur->errorInfo(), true));


$ligne = $infos_utilisateur->fetch();
$mail = $ligne['mail_utilisateur'];
$mdp = $ligne['mdp_utilisateur'];
$nom = $ligne['nom_utilisateur'];
$prenom = $ligne['prenom_utilisateur'];
$pseudo = $ligne['pseudo_utilisateur'];
$departement = $ligne['departement'];
$ville = $ligne['ville'];
$date = $ligne['date_inscription'];
$photo=$ligne['photo_profil'];

//A partir de cette ID on récupere les autres infos
$infos_brocantes = $connect->prepare("SELECT * FROM brocante WHERE ID_utilisateur='$iduser'");
$infos_brocantes->execute() or die(print_r($infos_brocantes->errorInfo(), true));

$ligne = $infos_brocantes->fetch();
$nom_brocante = $ligne['nom_brocante'];
$description = $ligne['description'];
$lieu = $ligne['lieu'];
$idbroc=$ligne['ID_Brocante'];

//Compte le nombre de brocante de l'utilisateur
$del = $connect->prepare("SELECT * FROM brocante WHERE ID_utilisateur='$iduser'");
$del->execute();
$count = $del->rowCount();

?>

<section>
	<article>
		<?php
// Affiche les informations concernant le vendeur
				echo
				"
					<table>
						<caption>Informations sur le Vendeur :</caption>
				";
				echo
				"
						<tr>
							<th>Nom :</th>
							<td>$nom</td>
						</tr>
						<tr>
							<th>Prénom :</th>
							<td>$prenom</td>
						</tr>
						<tr>
							<th>Pseudo :</th>
							<td>$pseudo</td>
						</tr>
						<tr>
							<th>Département :</th>
							<td>$departement</td>
						</tr>
						<tr>
							<th>Ville :</th>
							<td>$ville</td>
						</tr>
						<tr>
							<th>Date d'inscription :</th>
							<td>$date</td>
						</tr>						
						<tr>
							<th>Nombre de brocantes :</th>
							<td>$count</td>
						</tr>						
						</table>
			";

		?>
<?php
// Affiche la photo du profil de l'utilisateur
echo "
		<div class=\"roundedImageShadowProfil\">		
		<img src='src/$photo.'>
		</div>
		";
?>
<?php
include('src/footer.php');
?>