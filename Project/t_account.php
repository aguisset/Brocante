<?php
/*
* Page de traitement du profil
* 
* Projet de Programmation Web
* ENSEIRB MATMECA // Telecom
* @ author Benjamin BONNOTTE & Abdoul GUISSET
*
*/

// Pour chaque page du site on appel le fichier contenant les fonctions devant etre presente
require_once("src/fonctions.php");

// Définition du titre de la page
$titre = 'Photo';

// On appel l'entete de la page
include('src/entete.php');
?>

<section>
	<article>
		<?php
//On récupère l'ID
$id=$_COOKIE['ID_utilisateur'];

// On récupère le fichier
$_FILES['fichier']['name'];     //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).
$_FILES['fichier']['type'];     //Le type du fichier. Par exemple, cela peut être « image/png ».
$_FILES['fichier']['size'];     //La taille du fichier en octets.
$_FILES['fichier']['tmp_name'];//L'adresse vers le fichier uploadé dans le répertoire temporaire.
$_FILES['fichier']['error'];    //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.

// Conditions à vérifier pour l'Upload
if ($_FILES['fichier']['error'] > 0) $erreur = "Erreur lors du transfert";
if ($_FILES['fichier']['size'] > 2097152) $erreur = "Le fichier est trop gros";

// Exstension
$extensions_valides = array( 'jpg' , 'jpeg' ,'png' );
$extension_upload = strtolower(  substr(  strrchr($_FILES['fichier']['name'], '.')  ,1)  );

// Si les conditions sont vérifées on upload le fichier dans le dossier
if ( in_array($extension_upload,$extensions_valides) ) {

	echo "Extension correcte<br>";
	$chemin = "images/profil/";
	$image = $chemin.$_FILES['fichier']['name'];
	$img = "src/".$image;
	move_uploaded_file($_FILES['fichier']['tmp_name'], $img);

	// Puis on insère ce chemin dans la BDD
	$new_img = $connect->prepare("UPDATE utilisateur SET photo_profil=:img WHERE ID_utilisateur='$id'");
	$new_img->bindValue(':img', $image, PDO::PARAM_STR);
	$new_img->execute() or die(print_r($new_img->errorInfo(), true));
	if ($img) echo "Transfert réussi <meta http-equiv=\"Refresh\" content=\"1; url=account.php\">";
}
else {
	echo "Extension incorrecte / Fichier trop gros <meta http-equiv=\"Refresh\" content=\"1; url=account.php\">";
}

?>
	</article>
</section>
<?php include('src/footer.php'); ?>