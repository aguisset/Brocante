<?php
/*
* Page contenant le Sitemap du site 
*
* Projet de Programmation Web
* ENSEIRB MATMECA // Telecom
* @ author Benjamin BONNOTTE & Abdoul GUISSET
*
*/

echo
'
			<ul><li><a href="brocantes.php">Les Brocantes</a></li>
';

// Si l'utilisateur n'est pas connecté
if (!isset($_COOKIE['ID_utilisateur']))
{
	echo '<li><a href="connexion.php">Connexion</a></li>';
}
// Sinon si il est connecté..
else
{
	echo
	'
			<li><a href="#">Mon compte</a>
				<ul>
					<li><a href="account.php">Mon Profil</a></li>
					<li><a href="mesbrocantes.php">Mes Brocantes</a></li>					
					<li><a href="deconnexion.php">Déconnexion</a></li>

				</ul>
			</li>
	';
}
echo
'
			<li><a href="inscription.php">Inscription</a></li>
';

echo 
'
<li><a href="liens.php"> Liens Utiles </a></li>
';

echo '</ul>';
?>