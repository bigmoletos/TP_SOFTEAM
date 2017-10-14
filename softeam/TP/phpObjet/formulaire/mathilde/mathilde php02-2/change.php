<?php
require_once "classe/Personne.php";

//verifier que change est cliqué
if(isset($_POST['change'])) {
//affiche le choix des modifications
	$select = "<select name=\"nom\">";

	foreach (glob("fiches/*.txt") as $fichier){
			$contenu = file_get_contents($fichier);
			$ligne = explode("\n", $contenu);
			$nom = $ligne[0];
			$select .= "<option value=\"" . $nom . "\">";
			$select .= $nom;
			$select .= "</option>";
		}
	$select .= "</select>";

}

//traitement d'une modification d'attribut
if(isset($_POST['modifier'])) {
	$nom = $_POST['nom'];
	//verifier l'attribut modifié
	$saisie = trim($_POST['saisie']);
	if (!empty($saisie)){
		$attribut = $_POST['attribut'];
		//verifier quel attribut mofdifier
		$contenu = file_get_contents("fiches/". $nom .".txt");
			$ligne = explode("\n", $contenu);
			$prenom = $ligne[1];
			$age = $ligne[2];
		if ($attribut=='prenom') {
			$prenom = $saisie;
		}else{
			$age = $saisie;
		}// fin if else 
		//modification de l'attribut concerné dans le fichier
		$newContenu = $nom . "\n" . $prenom . "\n" . $age . "\n";
		file_put_contents("fiches/". $nom . ".txt", $newContenu);
		echo "Le fichier " . $nom . " contient désormais " . $prenom ." " .$age;

	}else{
		echo "Vous n'avez rien saisi.";
	}	
}//fin if isset $_POST['modifier']

//traiment d'une suppression
if(isset($_POST['supprime'])){
	$nom = $_POST['nom'];
	unlink("fiches/" . $nom . ".txt");
	echo "Le fichier " . $nom . ".txt à bien été effacé.";
}


?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>change</title>
	</head>
	<body>
		<form action="change.php" method="POST">

			
			<?php 
				echo $change = empty($select) ? "<input type=submit name=\"change\" value=\"CHANGE\">" : "";

				echo $select = empty($select)? "" : $select; 

				echo $choix = empty($select)? "" : "<select name=\"attribut\"><option value=\"prenom\">Prénom</option><option value=\"age\">Âge</option></select>"; 

				echo $modif = empty($select)? "" : "<input type=\"text\" name=\"saisie\" required><br />";
				echo $changeModif = empty($select)? "" : "<input type=submit name=\"modifier\" value=\"MODIFIER\">";
				echo $supprime = empty($select)? "" : "<input type=submit name=\"supprime\" value=\"SUPPRIME\" >";

			?>
		</form>

	</body>

</html>
