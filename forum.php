<!--Feuille gérant l'affichage du forum-->
<?php
	//On démarra la session pour accèder aux variables de session
	session_start();
	//On initialise la date
	date_default_timezone_set('Europe/Berlin');
	$jour = date ('d');
	$mois = date ('m');
	$annee = date('Y');
	$heure = date('H');
	$minute = date('i');
?>
<!-- 
BUT : Vérification de l'existence d'une session sinon renvoi à la page d'identification 
BUT : Vérification de la variable de temps  de la session si elle existe on vérifie qu'elle n'a pas dépasser 30 minutes sinon on la crée
-->
<?php
			if (isset($_SESSION['id']))
			{
				if (isset($_SESSION['Time']))
				{
					if ( time() > $_SESSION['Time']+1800)
					{
						session_destroy();
					}
				} else {
					$_SESSION['Time'] = time();
				}
			} else {
				header('Location: Connexion.php');
				exit();
			}
		?>

<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Kleinclaus Blog</title>
		<link rel="stylesheet" href="style.css">
		<script src="script.js"></script>
	</head>
	<body>
	<!-- On initialise les fonctions et on intégre le header-->
	<?php include("FonctionsXML.php")?>
	<?php include("header.php")?>
	
	<div id="corps">
		<!-- Bouton de déconnexion qui renvoie à la page d'identification -->
		<form id="deco" action="Connexion.php" method="POST">
			<input name="deco" type="submit" value="Déconnexion" />
		</form>";
		
		
		<?php 
		//On appelle les fonctions pour afficher les anciens messages et ajouter un nouveau message
			ShowMessages();
			addMessage();
		?>
	</div>
	<!--On intègre le formulaire qui lit les nouveaux messages-->
	<?php include("footer.php"); ?>
	
	</body>
	
</html>
