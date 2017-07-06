<?php
/*
* Page de traitement de l'inscription
* 
* Projet de Programmation Web
* ENSEIRB MATMECA // Telecom
* @ author Benjamin BONNOTTE & Abdoul GUISSET
*
*/

// Pour chaque page du site on appel le fichier contenant les fonctions devant etre presente
require_once("src/fonctions.php");

// Définition du titre de la page
$titre = 'Inscription';

// On appel l'entete de la page
include('src/entete.php');
?>

<section>
	<article>
		<?php
		// On récupère les donneés en POST
		
		$email=htmlspecialchars($_POST['email']);
		$password=md5(htmlspecialchars($_POST['password'])); // md5 est utilisé pour le hachage
		$passwordbis=md5(htmlspecialchars($_POST['passwordbis'])); 
		$nom=strtoupper(htmlspecialchars($_POST['nom'])); // strtoupper pour passer la chaine en majuscules
		$prenom=ucfirst(htmlspecialchars($_POST['prenom'])); //ucfirst pour mettre le premier caractère en majuscule
		$pseudo=htmlspecialchars($_POST['pseudo']);
		$departement=htmlspecialchars($_POST['departement']);
		$ville=ucfirst(htmlspecialchars($_POST['ville']));
		$captcha=htmlspecialchars($_POST['captcha']);

		//Définition des regex pour la vérification des données
		$regex_email="/.+[@].+[.].+/";
		$regex_departement="/[0-9]{2}/";

		// Si les regex correspondent --> Selection dans notre BDD
		if (preg_match($regex_email,$email) && preg_match($regex_departement, $departement)) {
			$verif = $connect->prepare("SELECT nom_utilisateur FROM utilisateur WHERE mail_utilisateur=:email");
			$verif-> bindValue(':email',$email, PDO::PARAM_STR);
			$verif->execute() or die(print_r($verif->errorInfo(), true));
			$res = $verif->rowCount();

			if ($res == 0) {
			// Si les deux mots de passes sont les memes	
			if ($password == $passwordbis) {

				// Si le Captcha est ok			
				if ($captcha == 9) {
					// Date actuelle avec le format y/m/d pour enregister la date d'inscription
					$date = strftime('%Y-%m-%d');

					//Insertion des données dans notre table utilisateur
					$inscription= $connect->prepare("INSERT INTO utilisateur(nom_utilisateur,prenom_utilisateur,mail_utilisateur,mdp_utilisateur,pseudo_utilisateur,departement,ville,date_inscription) 
						VALUES (:nom, :prenom, :email, :password, :pseudo, :departement, :ville, :date)");


					$inscription->bindValue(':nom', $nom, PDO::PARAM_STR);
					$inscription->bindValue(':prenom', $prenom, PDO::PARAM_STR);
					$inscription->bindValue(':email', $email, PDO::PARAM_STR);
					$inscription->bindValue(':password', $password, PDO::PARAM_STR);
					$inscription->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
					$inscription->bindValue(':departement', $departement, PDO::PARAM_INT);
					$inscription->bindValue(':ville', $ville, PDO::PARAM_STR);
					$inscription->bindValue(':date', $date, PDO::PARAM_STR);

					$inscription->execute() or die(print_r($connect->errorInfo(), true));

				// MAIL
						$objet="Bienvenue sur Brocant'eirb"; // Objet du mail

						// Contenu de notre message HTML
						$msg =
							"
								<div style=\"max-width: 100%;\">
								<a href=\"http://".$adresse_site."\"><img title=\"Brocant'eirb\" src=\"".$image."\" alt=\"Brocant'eirb\" border=\"0\" /></a><br>
								<h1 style=\"font-family: Century Gothic; font-size: 16px; font-weight: lighter; height: 25px; line-height: 25px; background: #34495e; padding-left: 8px; color: #f1c40f;max-width: 100%;\">Votre inscription sur notre site a bien &eacute;t&eacute; effectu&eacute;e !</h1>
								<div style=\"background-color: #f0e5da; padding-left: 8px; max-width: 100%; text-align:center;\">
								<div>Bonjour, <strong>".$nom."</strong> <strong> ".$prenom."</strong> </div>
								<div>Votre identifiant de connexion est : <strong>".$email."</strong> </div>
								<div>Votre mot de passe est : <strong>".$_POST['password']."</strong> </div>
								<div> A bientôt sur le site de Brocant'eirb! </div>
								</div>
								<div style=\"margin-top: 10px; max-width: 100%;padding-top: 5px; border-top: 1px solid #666; text-align: center; font-size: 11px;\"><a href=\"http://".$adresse_site."\">Le site de Brocant'eirb</a> pens&eacute et r&eacute;alis&eacute; par Benjamin BONNOTTE et Abdoul GUISSET</div>
							";

						// Insere les retours à la ligne 
						$msg = nl2br($msg);
						
						// Headers du mail
						$headers = 'From: Brocant\'eirb <no-reply@blabla.fr'."\r\n";
						$headers .= 'Mime-Version: 1.0'."\r\n";
						$headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
						$headers .= "\r\n";

						// Fonction d'envoi du mail

						$envoi=mail($email, utf8_decode($objet), $msg, utf8_decode($headers));

						if ($envoi == true)
						{
							echo "Votre inscription a bien été prise en compte. Un e-mail contenant votre identifiant et votre mot de passe vous a été envoyé.";
						}
						else
						{
							echo "Votre inscription a bien été prise en compte mais l'envoi de l'e-mail récapitulatif a échoué.";
						}
				}

				else // Si le captcha est mal rempli on affiche un message d'erreur avec renvoie au formulaire
				{
					echo "Vous avez mal répondu à la question anti bot. Veuillez <a href=\"\" onClick=\"javascript:window.history.go(-1)\">réessayer</a> s'il vous plait.";
				}
			}
			// Sinon si les mots dd passes sont differents
			else if($password !== $passwordbis)
					{
						echo "Les mots de passe ne correspondent pas, Veuillez vérifier.  <a href=\"\" onClick=\"javascript:window.history.go(-1)\">Retour</a>";
					}

			}
						else // Si l'adresse mail existe deja
			{
				echo "Cette adresse e-mail est déjà inscrite.  <a href=\"\" onClick=\"javascript:window.history.go(-1)\">Retour</a>";
			}
		}

		else // Si les champs sont mal remplies
		{
			echo "Veuillez remplir les champs correctement. <a href=\"\" onClick=\"javascript:window.history.go(-1)\">Retour</a>";
		}


		?>
	</article>
</section>
<?php include('src/footer.php'); ?>