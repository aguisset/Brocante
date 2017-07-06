<?php
/*
* Page de profil privee de l'utilisateur
*
* Projet de Programmation Web
* ENSEIRB MATMECA // Telecom
* @ author Benjamin BONNOTTE & Abdoul GUISSET
*
*/

// Nom de la page
$titre='Mon Profil';

require_once("src/fonctions.php");

include('src/entete.php');

//On récupère l'ID
$id=$_COOKIE['ID_utilisateur'];

//A partir de cette ID on récupere les autres infos
$infos_utilisateur = $connect->prepare("SELECT * FROM utilisateur WHERE ID_utilisateur='$id'");
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

?>

<section>
	<article>
		<?php

// Affichage des infos concernant l'utilisateur
				echo
				"
					<table>
						<caption>Informations personnelles</caption>
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
							<th>E-Mail :</th>
							<td>$mail</td>
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
							<th>Désinscription :</th>
							<td><a href=\"desinscription.php?id=$id\"> Je veux me désinscrire !</a></td>
						</tr>
						</table>
			";

		?>
<!-- Upload de la photo de profil -->
		<h2 class="center">Uploader votre photo de profil</h2>
		<form method="post" action="t_account.php" enctype="multipart/form-data" class="profil">
			<input type="file" name="fichier" /><br></br>
			<label for="fichier">Fichier (Format : jpg/png | max. 2 Mo)</label><br/>
			<input type="hidden" name="size" value="2097152" /> 
			<input type="submit" name="submit" value="Envoyer" />
		</form>
<?php
// Affichage de la photo de profil
echo "
		<div class=\"roundedImageShadowProfil\">		
		<img src='src/$photo.'>
		</div>
		";
?>
<!-- Formulaire de création d'une brocante-->
<h2>Gestion de mes Brocantes</h2>
		<form method="post" enctype="multipart/form-data" action="t_brocantes.php">
			<fieldset><legend>Création d'une Brocante (3 Max)</legend>
				<p><label for="nom_brocante">Nom de la Brocante :</label><input type="text" id="nom_brocante" name="nom_brocante" tabindex="5"  required/></p>
		        <p><label for="description">Description : </label><br></br>
		        <textarea name="description" id="description" rows="10" cols="50" maxlength="250">Entrez la description de votre brocante (250 caractères max)...</textarea>   			
		        <p><label for="lieu">Lieu (Format XX): </label><input type="text" id="lieu" name="lieu" tabindex="7" maxlength="2"  required/></p>
				<p id="submit"><input type="submit" value="Créer" tabindex="11"></p>
			</fieldset>
		</form>
	</article>
</section>
<?php
include('src/footer.php');
?>