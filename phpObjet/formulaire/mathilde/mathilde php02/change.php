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

//traitement
if(isset($_POST['modifier'])) {
	$nom = $_POST['name'];
	$attribut = $_POST['attribut'];
	
	$saisie = $_POST['saisie'];

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

			?>
		</form>

	</body>

</html>
