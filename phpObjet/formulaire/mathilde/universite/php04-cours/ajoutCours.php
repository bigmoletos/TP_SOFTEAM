<?php
include "register.php";

//charger la liste des enseignants
	$dossierEnseignant = glob("fiches/enseignant/*.txt");
// AFAIRE test if empty
	foreach ($dossierEnseignant as $value) 
	{
		$nomEnseignant = substr($value, 18, -4);
		$listeEnseignant[]=$nomEnseignant;
	}

//charger la liste des etudiants
$dossierEtudiant = glob("fiches/etudiant/*.txt");
// AFAIRE test if empty
foreach ($dossierEtudiant as $value) 
{
	$nomEtudiant = substr($value, 16, -4);
	$listeEtudiant[]=$nomEtudiant;
}

//traitement l'ajout d'un cours
if(isset($_POST['ajouter']))
{
	$titre = trim($_POST['titre']);
	if(!empty($titre))
	{
		$nbrHeure = trim($_POST['nbrHeure']);
		if(!empty($nbrHeure))
		{
			
		}
	}
	
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Ajout Cours</title>
	</head>
	<body>
		<h1>Ajouter un cours</h1>
		<form>
			<p>Intitulé du cours<br />
				<input type="text" name="titre"><br />
			</p>
			<p>Nombre d'heure par semaine<br />
				<input type="text" name="nbrHeure"><br />

			</p>
			<p>Enseignant<br />
				<select>
					<?php 
						//initialiser les options du select Enseignants
						$optionEnseignant = "";
						foreach ($listeEnseignant as $value) 
						{
							$optionEnseignant .= "<option value=\"". $value."\">". $value ."</option>";
						}
						echo $optionEnseignant;
					?>
				</select>
			</p>
			<p>Etudiants. Saisie multiple : "ctrl" + clicks.<br />
				<select multiple>
					<?php 
					//initialiser les options du select Etudiant
						$optionEtudiant = "";
						foreach ($listeEtudiant as $value) 
						{
							$optionEtudiant .= "<option value=\"". $value."\">". $value ."</option>";
						}
						echo $optionEtudiant;
					?>
				</select>
			</p>
			<p>
				<input type=submit name="enregistrer" value="ENREGISTRER">
			</p>
		</form>
	</body>
</html>