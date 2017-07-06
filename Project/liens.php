<?php
/*
* Page de liens utiles + MAPS
* Projet de Programmation Web
* ENSEIRB MATMECA // Telecom
* @ author Benjamin BONNOTTE & Abdoul GUISSET
*
*/

require_once("src/fonctions.php");

// Nom de la page
$titre='Liens Utiles';

include('src/entete.php');
?>
<!-- GOOGLE MAPS -->
	<head>
    <title>Simple click event</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
          <style>
      #map-canvas {
        height: 500px;
        margin: 0px;
        padding: 0px
      }
    </style>
    <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBP4h-O7t98Wap4dSCKld8o8brOFrJEq_w&sensor=false"></script>
    <script>
function initialize() {
  var mapOptions = {
    zoom: 8,
    center: new google.maps.LatLng(44.806275, -0.6066080000000511)
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

  var marker = new google.maps.Marker({
    position: map.getCenter(),
    map: map,
    title: 'Click to zoom'
  });

  google.maps.event.addListener(map, 'center_changed', function() {
    // 3 seconds after the center of the map has changed, pan back to the
    // marker.
    window.setTimeout(function() {
      map.panTo(marker.getPosition());
    }, 3000);
  });

  google.maps.event.addListener(marker, 'click', function() {
    map.setZoom(18);
    map.setCenter(marker.getPosition());
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  </head>
<!-- Liens utiles -->
<section>
	<article>
   		<h2>Voici la liste des liens utiles  : </h2> 
			<ul>
				<li >Tarifs de la poste : <a href="http://www.laposte.fr/particulier/produits/article/tarifs-consulter-le-catalogue-integral"> ICI</a> </li>
				<li>Si Vous souhaitez faire une bonne école d'ingénieurs : <a href="http://www.enseirb-matmeca.fr/"> ICI</a></li>
			</ul>
		<h2>Nous trouver  : </h2> 
		<div id="map-canvas"></div>
	</article>
</section>
<?php include('src/footer.php'); ?>
