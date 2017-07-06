<?php

/*
* Entete qui va etre appele sur toutes les pages de notre site 
*
* Projet de Programmation Web
* ENSEIRB MATMECA // Telecom
* @ author Benjamin BONNOTTE & Abdoul GUISSET
*
*/
echo 
'
	<!DOCTYPE html>
	<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<title>'.$titre.' | Brocante en ligne </title>

		<meta name="description" content="Site de Brocante en ligne"
		<meta name="author" content="Benjamin BONNOTTE & Abdoul GUISSET"
		<meta name="viewport" content="width=device-width">

		<link rel="stylesheet" type="text/css" href="src/style.css"
	</head>
	<body>
		<header>
			<a id="logo" href="index.php"><img src="src/images/logo.png" title="Accueil" alt="Accueil"/> </a>
			<h1>'.$titre.'</h1>
			<nav>
';
include('sitemap.php');	
echo
'
			</nav>
		</header>

';
?>