<!--Feuille php gérant le footer-->
<footer>
	<h1>Nouveau Message</h1>
		<form id="newmessage" action="forum.php" method="POST">
			<p>
			<label for="pseudo">Pseudo : </label><input type="text" name="pseudo" />
			<br/>
			<br/>
			<label for="titre">Titre : </label><input type="text" name="titre" />
			<br/>		
			<br/>
			<label for="texte">Message : </label><textarea name="texte" form="newmessage" placeholder="Entrez votre message ici"></textarea>
			<br/>
			<br/>		
			<input type="submit" value="Envoyer" />
			</p>
		</form>
</footer>