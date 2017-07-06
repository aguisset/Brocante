<?php
/*
* Page de brocante détaillé 
*
* Projet de Programmation Web
* ENSEIRB MATMECA // Telecom
* @ author Benjamin BONNOTTE & Abdoul GUISSET
*
*/
//Nom de la page
$titre= 'La Brocante en détails';

require_once("src/fonctions.php");

include('src/entete.php');

//On récupère l'ID de la brocante sur lequel l'utilisateur à cliqué
$idbroc=$_GET['idbroc'];

//A partir de cette ID on récupere les infos brocantes
$infos_brocante = $connect->prepare("SELECT * FROM brocante WHERE ID_Brocante='$idbroc'");
$infos_brocante->execute() or die(print_r($infos_brocante->errorInfo(), true));

$ligne = $infos_brocante->fetch();
$nom_brocante = $ligne['nom_brocante'];
$ID_utilisateur = $ligne['ID_utilisateur'];
$description = $ligne['description'];
$lieu = $ligne['lieu'];
$photo1=$ligne['photo1'];
$photo2=$ligne['photo2'];

//A partir de cette ID on récupere les infos utilisateur
$infos_utilisateur = $connect->prepare("SELECT * FROM utilisateur WHERE ID_utilisateur='$ID_utilisateur'");
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
// On affiche la brocante 
if (isset($idbroc)) {

echo "
		<h2><b>Nom de la brocante :</b> $nom_brocante</h2>
		<p><b>Lieu de la brocante :</b> $lieu</p>
		<p><b>Description de la brocante :</b> $description</p>
		<b>Le vendeur :</b> <a href=\"publicaccount.php?iduser=$ID_utilisateur\"> $nom</a><br></br>
		<img  class='imgdtls1' src='src/$photo1'>
		<img  class='imgdtls2' src='src/$photo2'>

";
// Pour contacter le vendeur
echo
'
		<p>Pour contacter le vendeur : </p> 
		<form method="post">
			<textarea name="contenu" id="contenu" rows="10" cols="50" maxlength="250">Votre message au vendeur (250 caractères max)...</textarea>
			<br>
			<input type="submit" name="Contacter" value="Contacter le vendeur" />
		</form>
';
// Si il clic on envoie le mail au vendeur
if (isset($_POST['Contacter'])) {

$objet="Contact pour votre brocante \"$nom_brocante\""; // Objet du mail

						// Contenu de notre message HTML
						$msg =
							"
								<div style=\"max-width: 100%;\">
								<a href=\"http://".$adresse_site."\"><img title=\"Brocant'eirb\" src=\"".$image."\" alt=\"Brocant'eirb\" border=\"0\" /></a><br>
								<h1 style=\"font-family: Century Gothic; font-size: 16px; font-weight: lighter; height: 25px; line-height: 25px; background: #34495e; padding-left: 8px; color: #f1c40f;max-width: 100%;\">Vous avez &eacute;t&eacute; contact&eacute; pour une de vos brocantes  !</h1>
								<div style=\"background-color: #f0e5da; padding-left: 8px; max-width: 100%; text-align:center;\">
								<div>Bonjour, <strong>".$nom."</strong> <strong> ".$prenom."</strong> </div>
								<div>Pour votre brocante : <strong>".$nom_brocante."</strong> </div>
								<div>Le message est : <strong>".$_POST['contenu']."</strong> </div>
								<div> A bientôt sur le site de Brocant'eirb! </div>
								</div>
								<div style=\"margin-top: 10px; max-width: 100%;padding-top: 5px; border-top: 1px solid #666; text-align: center; font-size: 11px;\"><a href=\"http://".$adresse_site."\">Le site de Brocant'eirb</a> pens&eacute et r&eacute;alis&eacute; par Benjamin BONNOTTE et Abdoul GUISSET</div>
							";

						// Insere les retours à la ligne 
						$msg = nl2br($msg);
						
						// Headers du mail
						$headers = 'From: Brocant\'eirb <no-reply@blabla.fr'."\r\n";
						$headers .= 'Mime-Version: 1.0'."\r\n";
						$headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
						$headers .= "\r\n";

						// Fonction d'envoi du mail

						$envoi=mail($mail, utf8_decode($objet), $msg, utf8_decode($headers));

						if ($envoi == true)
						{
							echo "Votre mail a été envoyé au vendeur.";
						}
						else
						{
							echo "L'envoi de l'e-mail a échoué.";
						}}

}
//Sinon...
else {
	echo "Pas encore de brocantes désolé..";
}
?>
	</article>
</section>
<?php include('src/footer.php'); ?>