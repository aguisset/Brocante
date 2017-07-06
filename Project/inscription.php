<?php
/*
* Page d'inscription 
*
* Projet de Programmation Web
* ENSEIRB MATMECA // Telecom
* @ author Benjamin BONNOTTE & Abdoul GUISSET
*
*/

//Nom de la page
$titre= 'Inscription';

require_once("src/fonctions.php");

include('src/entete.php');

?>
<!-- Formulaire d'inscription -->
<section>
	<article id="form">
		<form method="post" enctype="multipart/form-data" action="t_inscription.php">
			<fieldset><legend>Inscription</legend>
				<p><label for="email">E-mail :</label><input type="email" id="email" name="email" tabindex="1" selected required/></p>
				<p><label for="password">Mot de passe :</label><input type="password" id="password" name="password" tabindex="2"  required/></p>
				<p><label for="passwordbis">Retapez :</label><input type="password" id="passwordbis" name="passwordbis" tabindex="3"  required/></p>
				<p><label for="nom">Nom :</label><input type="text" id="nom" name="nom" tabindex="4"  required/></p>
				<p><label for="prenom">Prénom :</label><input type="text" id="prenom" name="prenom" tabindex="5"  required/></p>
				<p><label for="pseudo">Pseudo :</label><input type="text" id="pseudo" name="pseudo" tabindex="6"  required/></p>				
				<p><label for="departement">Département (XX) :</label><input type="text" id="departement" name="departement" tabindex="7" maxlength="2"  required/></p>
				<p><label for="ville">Ville :</label><input type="text" id="ville" name="ville" tabindex="8"  required/></p>

				<p><label for="captcha">Combien font 3x3 ? (anti-bot) :</label><input type="text" id="captcha" name="captcha" tabindex="10" size="2" maxlength="2" required/></p>

				<p id="submit"><input type="submit" value="Envoyer" tabindex="11"></p>
			</fieldset>
		</form>
	</article>
</section>
<?php include('src/footer.php'); ?>