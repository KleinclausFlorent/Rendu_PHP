<!--Feuille gérant l'affichage du forum-->
<?php
	//On initialise la date
	date_default_timezone_set('Europe/Berlin');
	$jour = date ('d');
	$mois = date ('m');
	$annee = date('Y');
	$heure = date('H');
	$minute = date('i');
?>

<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Traitement formulaire</title>
		<link rel="stylesheet" href="style.css">
		<script src="script.js"></script>
	</head>
	<body>
	<!-- On initialise les fonctions et on intégre le header-->
	<?php include("FonctionsXML.php"); ?>
	<?php include("header.php")?>
	
	<div id="corps">
		
		<?php 
		//On appele les fonctions pour afficher les anciens messages et ajouter un nouveau message
			ShowMessages();
			addMessage();
		?>
	</div>
	<!--On intègre le formulaire qui lit les nouveaux messages-->
	<?php include("footer.php"); ?>
	
	</body>
	
</html>
