<?php
//appeler la classe Personne
require_once "classe/Personne.php";

//vérifier que le boutton load est activé
	if(isset($_POST['load'])) {

		$tableau = "<table>";
		$i=0;
		foreach (glob("fiches/*.txt") as $fichier){
			$contenu = file_get_contents($fichier);
			$ligne = explode("\n", $contenu);
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
