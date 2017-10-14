<?php
//autoload classes
include "register.php";

//Initialisation des messages de retour
$erreurMessage = "";
$messageConfirmation = "";
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
					$messageConfirmation = $etudiant->creerFichier();
				}
				else
				{
					$erreurMessage = "Veuillez saisir un diplôme.<br/>";
				}//fin typeAjout = $diplome
			}
			else
			{
				//traiter cas typeAjout = salaire
				$salaire = trim($_POST['salaire']);
				if(!empty($_POST['salaire']))
				{
					$enseignant = new Enseignant($nom, $age, $salaire);
					$messageConfirmation = $enseignant->creerFichier();
				}
				else
				{
					$erreurMessage = "Veuillez saisir un salaire.<br/>";
				}//fin typeAjout = $salaire
			}//fin typeAjout
		}//fin if !empty $age
		else
		{
			$erreurMessage = "Veuillez saisir l'âge.<br/>";
		}
	}//fin if !empty $nom
	else
	{
		$erreurMessage = "Veuillez saisir le nom.<br/>";
	}
}//fin isset $POST_['ajouter']



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter Personne</title>
</head>
<body>
	<h1>Ajouter une Personne</h1>
	<a href ="ajoutCours.php"><input type="button" value="Ajouter un cours"></a>
	<a href ="ajoutSalle.php"><input type="button" value="Ajouter une salle"></a>
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
			<?php echo $erreurMessage; ?>
			<?php echo $messageConfirmation; ?>
			<input type=submit name="ajouter" value="AJOUTER">
		</p>
	</form><a href ="modifierCours.php"><input type="button" value="Modifier un cours"></a>
</body>
</html>