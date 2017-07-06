<?php
/*
* Page contenant les fonctions utiles 
*
* Projet de Programmation Web
* ENSEIRB MATMECA // Telecom
* @ author Benjamin BONNOTTE & Abdoul GUISSET
*
*/

// Inclustion du fichier de config
include('config.php');

// Connexion à la Base de Données
try
{
	$connect = new PDO('mysql:host='.$host.';charset=utf8;dbname='.$database_name, $user, $pass);
}
catch (PDOException $e)
{
	echo 'Connexion échouée : ' . $e->getMessage();
}

?>