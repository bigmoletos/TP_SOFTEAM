<?php
//appeler la classe Personne
require_once "classe/Personne.php";

//le isset va vérifier que le boutton load est activé pour eviter une erreur ou pour afficher
//un autre menu une fois qu'il est activé.
	if(isset($_POST['load'])) {

		$i = 0;
		$tableau = "<table>";
                //recupere la liste des fichiers
                $liste=glob("fiches/*.txt");
		foreach ($liste as $fichier){
                    //recupere le contenu des fichiers
			$contenu = file_get_contents($fichier);
                        //à l'interieur du fichier va extraire toutes les données separées par un retour ligne
                        //une ligne correspondra donc à une ligne du fichier
			$ligne = explode("\n", $contenu);
                        //l'objet tableau $perso se cree à partir de la classe personne avec comme attribut 
                        //les indices du tableau $contenu des fichiers
			$perso[$i] = new Personne($ligne[0], $ligne[1], $ligne[2]);
                        
			$tableau .= "<tr><td style=\"border-style: solid;\">";
                        
			$tableau .= $perso[$i]->decrirePersonne();
			$tableau .= "</td></tr>";
			$i++;
		}
		$tableau .="</table>";//fin while $contenu = fopen
	}else{
			$messageSaisir = "Veuillez clicker sur load.<br />";
	}//fin if is_set($_POST['load'])

       

?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>load</title>
	</head>
	<body>
		<form action="load.php" method="POST">
			<?php echo $tableau = empty($tableau)? $messageSaisir : $tableau; ?>
			<input type=submit name="load" value="LOAD">
		</form>

	</body>

</html>
