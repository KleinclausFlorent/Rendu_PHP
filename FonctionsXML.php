<?php
	//Feuille de php gérant le xml
	//Function pour ajouter un nouveau message
	function addMessage() 
	{
				//On vérifie que le post n'est pas vide
				
		if((isset($_POST['pseudo'])) && (isset($_POST['titre'])) && (isset($_POST['texte']))) 
		{
					
			//On récupère les valeurs dans des variables en veillant à ne pas récupérer du code.
			$pseudo   = htmlspecialchars($_POST['pseudo']);
			$titre    = htmlspecialchars($_POST['titre']);
			$date     = date("j/m/Y") . " à " . date("G:i");
			$texte  = htmlspecialchars($_POST['texte']);
					
								
			//On instancie un objet DOMDocument
			$xml = new DOMDocument();
					
					
			//On vérifie si le xml est existant.
			if (file_exists('history.xml')){
				$xml->load('history.xml');
				//On récupère le chemin vers la racine
				$xml_forum = $xml->getElementsByTagName('forum');
				//Si elle existe pas on la crée
				if ($xml_forum == NULL) {	
					$xml_forum = $xml->createElement('forum');
					$xml->appendChild($xml_forum);
				} else {
					//On sélectionne la racine
					$xml_forum = $xml_forum[0];
				}					
			} else {
				//On crée la racine
				$xml_forum = $xml->createElement('forum');
				$xml->appendChild($xml_forum);
			}
					
			//On crée un nouveau noeud message
			$xml_message = $xml->createElement('message');
					
			//Puis les noeuds contenant.
			$xml_pseudo   = $xml->createElement('pseudo', $pseudo);
			$xml_titre    = $xml->createElement('titre', $titre);
			$xml_date     = $xml->createElement('date', $date);
			$xml_texte = $xml->createElement('texte', $texte);
					
			//On ajoute les nouveaux noeuds dans le noeud message
			$xml_message->appendChild($xml_pseudo);
			$xml_message->appendChild($xml_titre);
			$xml_message->appendChild($xml_texte);
			$xml_message->appendChild($xml_date);
					
			//On ajoute le noeud message dans la racine
			$xml_forum->appendChild($xml_message);
															
															
			//Puis on sauvegarde les modifications
			$xml->save('history.xml');
		}
	}
	//Function pour afficher les anciens message.
	function ShowMessages() {
				
		//On instancie DOMDocument.
		$xml = new DOMDocument();
				
				
		//On vérifie que l'historique existe.
		if (file_exists('history.xml')) {
			//On charge le xml
			$xml->load('history.xml');
			//On récupère le chemin racine
			$xml_forum = $xml->getElementsByTagName('forum');
			//Si le noeud racine n'existe pas on arrète la fonction
			if ($xml_forum == NULL) {	
				return;
			} else {
				//Sinon on se positionne sur la racine
				$xml_forum = $xml_forum[0];
			}					
		} else {
			//On arrète la fonction
			return;
		}
				
		//On récupère le premier message
		$xml_messages = $xml_forum->getElementsByTagName('message');
		
		//Obtenir le nombre de message
		$NbrMessage = $xml_messages->length;
		
		
		echo "<form id=\"pagination\" action=\"forum.php\" method=\"GET\"><select name=\"page\">";
		//On propose un nombre de page correspondant au nombre de message disponible
		for ($i = 1 ; $i <= (floor($NbrMessage/4)+1); $i++)
		{
			echo "<option>".$i."<option>";
		}
		echo "</select><input type=\"submit\" value=\"Ok\" /></form>";
		//On affiche la page demandé
		if (isset($_GET['page']))
		{
			for ($i = (($_GET['page']-1)*4) ; ($i < ($_GET['page']*4) && ($i < $NbrMessage)) ; $i++)
			{
				echo "<div class=\"message\">";
				echo "<h2>". $xml_messages[$i]->getElementsByTagName('titre')[0]->nodeValue ."</h2>";
					
				echo "<p>". $xml_messages[$i]->getElementsByTagName('date')[0]->nodeValue . " de ".  $xml_messages[$i]->getElementsByTagName('pseudo')[0]->nodeValue ."</p>";
									
				echo "<p>" .$xml_messages[$i]->getElementsByTagName('texte')[0]->nodeValue . "</p>" ;							
				
				echo "</div>";
			}				
		} else {
		//On affiche la première page par défault
			for ($i = 0 ; (($i < 4) && ($i < $NbrMessage)) ; $i++)
			{
				
				echo "<div class=\"message\">";
				echo "<h2>". $xml_messages[$i]->getElementsByTagName('titre')[0]->nodeValue ."</h2>";
					
				echo "<p>". $xml_messages[$i]->getElementsByTagName('date')[0]->nodeValue . " de ".  $xml_messages[$i]->getElementsByTagName('pseudo')[0]->nodeValue ."</p>";
								
				echo "<p>" .$xml_messages[$i]->getElementsByTagName('texte')[0]->nodeValue . "</p>" ;							
				
				echo "</div>";
			}
				
		}
	}
?>