<?php
include "register.php";

//Initialisation des messages de retour
$erreurMessage = "";
$messageConfirmation = "";

//chargement de la liste des enseignants enregistrés
$dossierEnseignant = glob("fiches/enseignant/*.txt");
if (!empty($dossierEnseignant))
{
	foreach ($dossierEnseignant as $value) 
	{
		$nomEnseignant = substr($value, 18, -4);
		$listeEnseignant[] = $nomEnseignant;
                
	}
}
else
{
	$erreurMessage = "ATTENTION Pas d'enseignant enregistré.<br/>";
}


//chargement la liste des etudiants enregistrés
$dossierEtudiant = glob("fiches/etudiant/*.txt");
if(!empty($dossierEtudiant))
{
	foreach ($dossierEtudiant as $value) 
	{
		$nomEtudiant = substr($value, 16, -4);
		$listeEtudiant[] = $nomEtudiant;
	}
}
else
{
	$erreurMessage = "ATTENTION Pas d'étudiant enregistré.<br/>";
}

//chargement de la liste des salles enregistrées
$dossierSalle = glob("fiches/salle/*.txt");
if(!empty($dossierSalle))
{
	foreach ($dossierSalle as $value) {
		//récupération du numéro de la salle
		$numeroSalle = substr($value, 13, -4);
		//récupération de l'état de disponibilité de la salle
		$contenu = file_get_contents("fiches/salle/" . $numeroSalle . ".txt");
		$attribut = explode("\n", $contenu);
		//Liste des salles disponibles
		if ($attribut[2] == 'oui')
		{
			$listeSalle[] = $numeroSalle;		
		}
	}
}
else
{
	$erreurMessage = "ATTENTION Pas de salle enregistrée.<br/>";
}

//traitement l'ajout d'un cours
if(isset($_POST['ajouter']))
{
	//récupération du titre du cours
	$titre = trim($_POST['titre']);
	if(!empty($titre))
	{
		//recuperation du nombre d'heure
		$nbrHeure = trim($_POST['nbrHeure']);
		if(!empty($nbrHeure))
		{
			$cours = new Cours($titre, $nbrHeure, $_POST['selectionEnseignant'], $_POST['selectionSalle'], $_POST['selectionEtudiant']);
			//creation du fichier du cours ajouté
			$messageConfirmation = $cours->creerFichier();
			$messageConfirmation .= "La salle " . $_POST['selectionSalle'] . " lui a bien été affecté.<br/>";
			//récupération des informations enregistrées
			$fichier = file_get_contents("../fiches/salle/" . $_POST['selectionSalle'] . ".txt");
			$attribut = explode("\n", $fichier);
			$salle = new Salle($attribut[0],$attribut[1]);
			$etatDispo = "non";
			$salle->setEtatDispo($etatDispo);
			$salle->creerFichier();
			header("location: ajoutCours.php");

		}
		else
		{
			$erreurMessage = "Veuillez saisir un nombre d'heure.<br/>";
		}
	}
	else
	{
		$erreurMessage = "Veuillez saisir un intitulé de cours.<br/>";
	}
	
}
//var_dump($listeEnseignant);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Ajout Cours</title>
	</head>
	<body>
		<h1>Ajouter Cours</h1>
		<a href ="ajoutPersonne.php"><input type="button" value="Ajouter une Personne"></a>
		<a href ="ajoutSalle.php"><input type="button" value="Ajouter une salle"></a>
		<form action="ajoutCours.php" method="POST">
			<p>Intitulé du cours<br />
				<input type="text" name="titre"><br />
			</p>
			<p>Nombre d'heure par semaine<br />
				<input type="text" name="nbrHeure"><br />

			</p>
			<p>Enseignant<br />
				<select name="selectionEnseignant">
					<?php 
						//initialiser les options du select Enseignants
						var_dump($listeEnseignant);
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
				<select name="selectionEtudiant[]"  multiple>
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
			<p>Affecter une salle<br />
				<select name="selectionSalle">
					<?php 
						//afficher la liste de salle
						$optionSalle = "";
						foreach ($listeSalle as $value) 
						{
							$optionSalle .= "<option value=\"". $value."\">". $value ."</option>";
						}
						echo $optionSalle;
					?>
				</select>
			</p>
			<p>
			<?php echo $erreurMessage; ?>
			<?php echo $messageConfirmation; ?>
				<input type=submit name="ajouter" value="AJOUTER">
			</p>
		</form>
		<a href ="modifierCours.php"><input type="button" value="Modifier un cours"></a>
	</body>
</html>