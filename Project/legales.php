<?php
/*
* Page contenant les mentions légales 
*
* Projet de Programmation Web
* ENSEIRB MATMECA // Telecom
* @ author Benjamin BONNOTTE & Abdoul GUISSET
*
*/

//Nom de la page
$titre= 'Mentions Légles';

include('src/entete.php');

?>
<!-- On affiche les mentions légales du site -->
<section>
	<article>
		<h2>Brocant'eirb</h2>
		<p>Brocant'eirb est conçu dans le cadre d'un projet informatique à l'ENSEIRB-MATMECA par Benjamin BONNOTTE et Abdoul GUISSET</p>

		<h2>Base de données</h2>
		<p>	Les données personnelles collectées ne sont en aucun cas utilisées de façon commerciale et ne sont évidemment pas vendues ou divulguées à qui que ce soit. Toute information relative à un utilisateur peut être supprimée par le biais de la désinscription de cet utilisateur.</p>

		<h2>Cookies</h2>
		<p>
			Le système de sessions de ce site est basé sur l'utilisation des cookies et nécessite donc que votre navigateur accepte ces derniers.
		</p>
	</article>
</section>


<?php include('src/footer.php'); ?>