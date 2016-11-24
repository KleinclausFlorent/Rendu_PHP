<!-- 
BUT : Vérifier la correspondance entre l'identifiant et le mot de passe entrés par l'utilisateur et ceux enregistrés dans le fichier Identifiants.xml
			afin d'autoriser ou non l'accès au forum
-->
<?php 
	
	if((isset($_POST['identifiant'])) && (isset($_POST['password'])))
	{
		$id = htmlspecialchars($_POST['identifiant']);
		$password = htmlspecialchars($_POST['password']);
		
		$xml = new DOMDocument();
		
		$xml->load('Identifiants.xml');
		
		$xml_identifiants = $xml->getElementsByTagName('identifiants');
		
		$xml_identifiants = $xml_identifiants[0];
		
		$xml_utilisateur = $xml_identifiants->getElementsByTagName('utilisateur');
		
		$Nbrutilisateur = $xml_utilisateur->length;
		
		for ($i = 0 ; $i < $Nbrutilisateur ; $i++ )
		{
			if ((( $xml_utilisateur[$i]->getElementsBytagName('id')[0]->nodeValue) == $id ) && (( $xml_utilisateur[$i]->getElementsByTagName('mdp')[0]->nodeValue) == $password))
			{
				$_SESSION['id'] = $id;
				$_SESSION['mdp'] = $password;
				header('Location: forum.php');
				exit();
			} else {
				if ($i == ($Nbrutilisateur - 1) )
				{
					echo "<p>Cet identifiant ou ce mot de passe n'existe pas.</p>";
				}
			}			
		}
	}
?>