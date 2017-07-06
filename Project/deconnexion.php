<?php
/*
* Page de deconnexion 
*
* Projet de Programmation Web
* ENSEIRB MATMECA // Telecom
* @ author Benjamin BONNOTTE & Abdoul GUISSET
*
*/

// Nom de la page
$titre='Déconnexion';

require_once("src/fonctions.php");

include('src/entete.php');

// Déconnexion de l'utilisateur
setcookie('ID_utilisateur', NULL, -1);

// Rafraichissement de la page
if (isset($_COOKIE['ID_utilisateur'])) {
	
		echo "<meta http-equiv='refresh' content='0';URL=?refresh=1'>";
}

?>
<!-- Message de déconnexion -->
<section>
	<article>
		Vous êtes dorénavant déconnecté.
	</article>
</section>
<?php include('src/footer.php'); ?>