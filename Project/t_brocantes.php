<?php
/*
* Page de traitement de création de brocante
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

//Compte le nombre de brocante de l'utilisateur
$del = $connect->prepare("SELECT * FROM brocante WHERE ID_utilisateur='$id'");
$del->execute();
$count = $del->rowCount();

?>

<section>
	<article>
		<?php
// Si l'utilisateur a moins de 3 broncates il peut en créer une 
if ($count < 3) {

		// On récupère les donneés en POST	
		$nom_brocante=htmlspecialchars($_POST['nom_brocante']);
		$description=htmlspecialchars($_POST['description']);
		$lieu=htmlspecialchars($_POST['lieu']);

					//Insertion des données dans notre table brocante
					$inscription= $connect->prepare("INSERT INTO brocante(nom_brocante,description,lieu,ID_utilisateur) 
						VALUES (:nom_brocante, :description, :lieu, :id)");


					$inscription->bindValue(':nom_brocante', $nom_brocante, PDO::PARAM_STR);
					$inscription->bindValue(':description', $description, PDO::PARAM_STR);
					$inscription->bindValue(':lieu', $lieu, PDO::PARAM_STR);				
					$inscription->bindValue(':id', $id, PDO::PARAM_INT);

					$inscription->execute() or die(print_r($connect->errorInfo(), true));



echo "Votre brocante a bien été enregistrée ! <meta http-equiv=\"Refresh\" content=\"1; url=mesbrocantes.php\">";
}
// Sinon non
else {
echo "Vous ne pouvez pas créer plus de 3 brocantes désolé.";
}

		?>
	</article>
</section>
<?php include('src/footer.php'); ?>