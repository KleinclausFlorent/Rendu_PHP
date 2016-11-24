<!--
BUT : Page qui gère le formulaire de connexion et la suppression des variables de session suite à l'appui sur le bouton de déconnexion
-->
<?php
	//Initialisation de la session pour avoir accès aux variables de session
	session_start();
?>
<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Kleinclaus Connexion</title>
		<link rel="stylesheet" href="style.css">
		<script src="script.js"></script>
	</head>
	<body>
	<!-- on intégre le header-->
	<?php include("header.php")?>
	<!-- On vérifier si une demande de déconnexion est présente-->
	<?php 
		if (isset($_POST['deco']))
		{
			session_destroy();
		}
	?>
	<!-- Formulaire de connexion -->
	<div id="corps">
		<form id="login" action="Connexion.php" method="POST">
			<div>
				<p><label for="id">Identifiant : </label><input type="text" name="identifiant"  required /></p>
				<p><label for="password">Mot de passe : </label><input type="text" name="password" required /></p>
				<p><input type="submit" value="login" /></p>				
			</div>
		</form>		
	</div>
	<!-- Appel de la page de vérification des identifiants-->
	 <?php include("Verification.php") ?>
	</body>	
</html>

