<!--Feuille php gérant le formulaire d'envoi de message-->
<footer>
	<h1>Nouveau Message</h1>
		<form id="newmessage" action="forum.php" method="POST">
				<label for="pseudo">Pseudo : </label><input type="text" name="pseudo" required/><br/>
				<label for="titre">Titre : </label><input type="text" name="titre" required/><br/>
				<label for="texte">Message : </label><textarea name="texte" form="newmessage" placeholder="Entrez votre message ici" required ></textarea><br/>
				<input type="submit" value="Envoyer" />
		</form>
</footer>