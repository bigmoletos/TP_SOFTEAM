<?php
include "register.php";

//Initialisation des messages de retour
$erreurMessage = "";
$messageConfirmation = "";

//affichage formulaire - recupération liste des cours enregistrés
$dossierCours = glob("fiches/cours/*.txt");
if (!empty($dossierCours))
{
	foreach ($dossierCours as $value) 
	{
		$nomCours = substr($value, 13, -4);
		$listeCours[] = $nomCours;
	}
}
else
{
	$erreurMessage = "ATTENTION Pas de cours enregistré.<br/>";
}

//affichage formulaire - récupération liste des enseignants enregistrés
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

//affichage formulaire - recupération liste des etudiants enregistrés
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

//affichage formulaire - récupération liste des salles enregistrées
$dossierSalle = glob("fiches/salle/*.txt");
if(!empty($dossierSalle))
{
	foreach ($dossierSalle as $value) {
		$numeroSalle = substr($value, 13, -4);
		$listeSalle[] = $numeroSalle;
	}
}
else
{
	$erreurMessage = "ATTENTION Pas de salle enregistrée.<br/>";
}

//traitement modification d'un cours
if(isset($_POST['modifier']))
{
	/\nom du cours à modifier
	$titre = $_POST['selectionCours'];
	//récupération des informations enregistrées dans cours
	$fichier = file_get_contents("fiches/cours/" . $titre . ".txt");
	$informations = explode("\n", $fichier);

	//affectation du nombre d'heure
	$nbrHeure = trim($_POST['nbrHeure']);
	if(empty($nbrHeure))
	{
		$nbrHeure = $informations[1];
	}

	//affectation de l'enseignant
	if(isset($_POST['selectionEnseignant']))
	{
		$enseignant = $_POST['selectionEnseignant'];
	}
	else
	{
		$enseignant = $informations[2];	
	}

	//affectation de la salle
	if(isset($_POST['selectionSalle']))
	{
		$salle = $_POST['selectionSalle'];
	}
	else
	{
		$salle = $informations[3];
	}

	//récupération de la liste des étudiants du fichier
	$taille = count($informations);
	//indice de la premiere information de la liste etudiant
	$i = 4;
	$infoEtudiant = array();
	while($i<$taille)
	{
		$infoEtudiant = $informations[$i];
		$i++;
	}
	//affectation de la liste des étudiants
	if(isset($_POST['selectionEtudiant']))
	{
		$etudiant[] = $_POST['selectionEtudiant'];
	}
	else
	{
		$etudiant[] = $infoEtudiant;
	}

	//instanciation d'un objet cours
	$cours = new Cours($titre, $nbrHeure, $enseignant, $salle, $etudiant);
	//sauvegarde des modifications dans le fichier
	$messageConfirmation = $cours->creerFichier();
	$messageConfirmation = substr_replace($messageConfirmation, 'mis à jour. <br/>', -13);

	
	
	
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Modifier Cours</title>
	</head>
	<body>
		<h1>Modifier un Cours</h1>
		<a href ="ajoutCours.php"><input type="button" value="Ajouter un cours"></a>
		<a href ="ajoutPersonne.php"><input type="button" value="Ajouter une Personne"></a>
		<a href ="ajoutSalle.php"><input type="button" value="Ajouter une salle"></a>
		<form action="modifierCours.php" method="POST">
			<p>Intitulé du cours à modifier<br />
				<select name='selectionCours'>
					<?php 
						//initialiser les options de choix du cours
						$optionCours = "";
						foreach ($listeCours as $value) 
						{
							$optionCours .= "<option value=\"". $value."\">". $value ."</option>";
						}
						echo $optionCours;
					?>					
				</select>
			</p>
			<p>Nombre d'heure par semaine<br />
				<input type="text" name="nbrHeure"><br />

			</p>
			<p>Enseignant<br />
				<select name="selectionEnseignant">
					<?php 
						//initialiser les options du choix de l'Enseignant
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
				<input type=submit name="modifier" value="MODIFIER">
			</p>
		</form>

	</body>
</html>