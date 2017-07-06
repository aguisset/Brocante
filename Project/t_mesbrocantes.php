<?php
/*
* Page de traitement de la photo n°1
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
?>

<section>
	<article>
		<?php

// On récupère l'ID de la brocante
$ID_Brocante=htmlspecialchars($_POST['ID_Brocante']);

// Photo n°1
$_FILES['fichier1']['name'];     //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).
$_FILES['fichier1']['type'];     //Le type du fichier. Par exemple, cela peut être « image/png ».
$_FILES['fichier1']['size'];     //La taille du fichier en octets.
$_FILES['fichier1']['tmp_name'];//L'adresse vers le fichier uploadé dans le répertoire temporaire.
$_FILES['fichier1']['error'];    //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.

// Extensions
$extensions_valides = array( 'jpg' , 'jpeg' ,'png' );
$extension_upload = strtolower(  substr(  strrchr($_FILES['fichier1']['name'], '.')  ,1)  ); //1. strrchr renvoie l'extension avec le point (« . »). //2. substr(chaine,1) ignore le premier caractère de chaine.//3. strtolower met l'extension en minuscules.
// Si les conditions sont vérifiées(extensions et taille en octets) on upload la photo n°1 et on met à jour la BDD
if ( in_array($extension_upload,$extensions_valides) AND $_FILES['fichier1']['size'] < 2097152)  {

	echo "Extension correcte<br>";
	$chemin = "images/brocantes/";
	$image = $chemin.$_FILES['fichier1']['name'];
	$img = "src/".$image;
	move_uploaded_file($_FILES['fichier1']['tmp_name'], $img);
	$new_img = $connect->prepare("UPDATE brocante SET photo1=:img WHERE ID_Brocante='$ID_Brocante'");
	$new_img->bindValue(':img', $image, PDO::PARAM_STR);
	$new_img->execute() or die(print_r($new_img->errorInfo(), true));
	if ($img) echo "Transfert réussi <meta http-equiv=\"Refresh\" content=\"1; url=mesbrocantes.php\">";
}

else {
	echo "Extension incorrecte / Fichier trop gros <meta http-equiv=\"Refresh\" content=\"1; url=mesbrocantes.php\">";
}

?>
	</article>
</section>
<?php include('src/footer.php'); ?>