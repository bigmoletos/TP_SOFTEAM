<?php

//vérifier que le formulaire a été rempli
	if(!empty($_POST['enregistrer'])) {
//retirer les espaces
		$nom = trim($_POST['nom']);
			if(!empty($nom)) {
				$prenom = trim($_POST['prenom']);
				if(!empty($prenom)) {
					$age = trim($_POST['age']);
					if(!empty($age)) {
						$dossier = fopen("fiches/".$nom.".txt","w");
						$ecrire = $nom . "\n" . $prenom . "\n" . $age . "\n"; 
						fwrite($dossier, $ecrire);
						fclose($dossier);
						echo "le fichier " . $nom . " a bien été créé.";
					} //fin if(!empty($age))
				}//fin if(!empty($prenom))
			}//if(!empty($nom))
	}// fin if(!empty($_POST['enregistrer']))

?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>formulaire PHP POO</title>
	</head>
	<body>
		<form action="formulaire.php" method="POST">
			<p>NOM : 
				<input type="text" name="nom">
			</p>
			<p>PRENOM : 
				<input type="text" name="prenom">
			</p>
			<p>AGE : 
				<input type="text" name="age">
			</p>
			<p>
				<input type=submit name="enregistrer" value="ENREGISTRER">
			</p>
		</form>
		<a href="load.php"><input type="button" value="LOAD"></a>
	</body>

</html>
