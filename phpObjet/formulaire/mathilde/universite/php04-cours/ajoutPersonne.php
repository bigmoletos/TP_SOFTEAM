<?php
//autoload classes
include "register.php";
session_start();

$erreurMessage = "";
//echo '<pre>'.print_r($_POST, true).'</pre>'; 
//A l'ajout
if(isset($_POST['ajouter']))
{
	$nom = trim($_POST['nom']);
	if(!empty($nom))
	{
		$age = trim($_POST['age']);
		if(!empty($age))
		{
			if($_POST['typeAjout']=='Etudiant')
			{
				//traiter cas typeAjout = diplome
				$diplome = trim($_POST['diplome']);
				if(!empty($diplome))
				{
					$etudiant = new Etudiant($nom, $age, $diplome);
					$contenu = $nom . "\n" . $age . "\n" .$diplome . "\n" ;
					$fichier = fopen("fiches/etudiant/" . $nom . ".txt","w+");
					fwrite($fichier, $contenu);
					fclose($fichier);
				}
				else
				{
					$erreurMessage = "Veuillez saisir un diplôme.";
				}//fin typeAjout = $diplome
			}
			else
			{
				//traiter cas typeAjout = salaire
				$salaire = trim($_POST['salaire']);
				if(!empty($_POST['salaire']))
				{
					$enseignant = new Enseignant($nom, $age, $salaire);
					$contenu = $nom . "\n" . $age . "\n" .$salaire . "\n" ;
					$fichier = fopen("fiches/enseignant/" . $nom . ".txt", "w+");
					fwrite($fichier, $contenu);
					fclose($fichier);
				}
				else
				{
					$erreurMessage = "Veuillez saisir un salaire.";
				}//fin typeAjout = $salaire
			}//fin typeAjout
		}//fin if !empty $age
		else
		{
			$erreurMessage = "Veuillez saisir l'âge.";
		}
	}//fin if !empty $nom
	else
	{
		$erreurMessage = "Veuillez saisir le Nom.";
	}
}//fin isset $POST_['ajouter']



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter</title>
</head>
<body>
	<form action="ajoutPersonne.php" method="POST">
		<p>Ajouter : 
			<select name="typeAjout">
				<option value="Etudiant" selected="">Etudiant</option>
				<option value="Enseignant" selected="">Enseignant</option>
			</select>
		</p>
		<p>Nom<br / >
			<input type="text" name="nom">
		</p>
		<p>Age<br / >
			<input type="text" name="age">
		</p>
		<p>Diplôme (uniquement pour les étudiants)<br / >
			<input type="text" name="diplome">
		</p>
		<p>Salaire (uniquement pour les enseignants)<br / >
			<input type="text" name="salaire">
		</p>
		<p>
			<input type=submit name="ajouter" ajouter="AJOUTER">
			<?php echo $erreurMessage; ?>
		</p>
	</form>

</body>
</html>