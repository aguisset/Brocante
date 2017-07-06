<?php
/*
* Page d'acceuil du site 
* 
* Projet de Programmation Web
* ENSEIRB MATMECA // Telecom
* @ author Benjamin BONNOTTE & Abdoul GUISSET
*
*/

// Pour chaque page du site on appel le fichier contenant les fonctions devant etre presente
require_once("src/fonctions.php");

// Définition du titre de la page
$titre = 'Acceuil';

// On appel l'entete de la page
include('src/entete.php');
?>

<section>
	<article>
		<h2>
			<p>
				Bonjour et bienvenue sur votre site de Brocante en ligne ! 
			</p>
		</h2>
			<p>
				Le principe est simple : 
					<ul>
						<li >Vous êtes dans le cas n°1 : Vous rechercher l'objet de vos rêves sur nos brocantes en lignes </li>
						<li>Vous êtes dans le cas n°2 : Vous souhaiter créer votre propre brocante et vendre vos objets</li>
						<p align ="center">Dans tous les cas, nous vous souhaitons une bonne visite sur <b>Brocant'eirb !</b></p>

					</ul>
			</p>

															<!-- Konami Code : -->
															<script type="text/javascript">
															if ( window.addEventListener ) {
															var kkeys = [], konami = "38,38,40,40,37,39,37,39,66,65";
															window.addEventListener("keydown", function(e){
															kkeys.push( e.keyCode );
															if ( kkeys.toString().indexOf( konami ) >= 0 ) {
															alert('Cliquez-ici :');
															window.location = "http://enseirb-matmeca.fr";
															}
															}, true);
															}

</script>
	</article>
</section>
<?php include('src/footer.php'); ?>
