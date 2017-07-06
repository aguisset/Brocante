<?php
/*
* Page de connexion 
*
* Projet de Programmation Web
* ENSEIRB MATMECA // Telecom
* @ author Benjamin BONNOTTE & Abdoul GUISSET
*
*/

// Nom de la page
$titre='Connexion';

require_once("src/fonctions.php");

include('src/entete.php');
?>
<!-- Formulaire de connexion-->
<section>
	<article id="form">
		<form method="post" enctype="multipart/form-data" action="t_connexion.php">
			<fieldset><legend>Connexion</legend>
				<p><label for="email">E-mail : </label> <input type="email" id="email" name="email" tabindex="1" select required /></p>
				<p><label for="password">Mot de passe : </label> <input type="password" id="password" name="password" tabindex="2"  required /></p>
				<p id="submit"> <input type="submit" value="Envoyer" tabindex="10"> <a href="inscription.php"> S'inscrire..</a></p>
			</fieldset>
		</form>
	</article>
</section>
<?php include('src/footer.php'); ?>