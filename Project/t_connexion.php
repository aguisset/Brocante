<?php
/*
* Page de traitement de la connexion
* 
* Projet de Programmation Web
* ENSEIRB MATMECA // Telecom
* @ author Benjamin BONNOTTE & Abdoul GUISSET
*
*/

// Pour chaque page du site on appel le fichier contenant les fonctions devant etre presente
require_once("src/fonctions.php");

// Définition du titre de la page
$titre = 'Connexion';

// On récupère les données de l'utilisateur
$email = htmlspecialchars($_POST['email']);
$password = md5(htmlspecialchars($_POST['password']));

// Correspondance avec notre BDD
$connexion=$connect->prepare("SELECT ID_utilisateur, mdp_utilisateur FROM utilisateur WHERE mail_utilisateur=:email");
$connexion->bindValue(':email',$email, PDO::PARAM_STR);
$connexion->execute() or die (print_r($connect->errorInfo(), true));

$ligne=$connexion->fetch();

$id=$ligne['ID_utilisateur'];
$mdp=$ligne['mdp_utilisateur'];

// Définition du cookie
if ($ligne != 0)
{
	if ($password == $mdp)
	{
		setcookie("ID_utilisateur", $id);
	}

}
// On appel l'entete de la page
include('src/entete.php');
?>

<section>
	<article>
		<?php
		// Si les mots de passes ne correspondent pas: message d'erreur et retour au formulaire
			if ($password !== $mdp) {
				echo "Erreur dans les champs tapez, Veuillez vérifier.  <a href=\"\" onClick=\"javascript:window.history.go(-1)\">Retour</a>";
			}
		// Sinon connexion et redirection vers la page de profil
			else {
					$infos = $connect->prepare("SELECT prenom_utilisateur, nom_utilisateur FROM utilisateur WHERE ID_utilisateur='$id'");
					$infos->execute() or die(print_r($infos->errorInfo(), true));
					$info = $infos->fetch();

					$nom = $info['nom_utilisateur'];
					$prenom = $info['prenom_utilisateur'];

					echo 'Bonjour '.$prenom.' '.$nom.'. Vous êtes dorénavant connecté.	<meta http-equiv="Refresh" content="1; url=account.php">';
			}
		?>
	</article>
</section>

<?php include('src/footer.php'); ?>