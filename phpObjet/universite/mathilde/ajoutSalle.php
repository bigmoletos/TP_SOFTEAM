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
	$numero = trim($_POST['numero']);
	if(!empty($numero))
	{	
		$capacite = trim($_POST['capacite']);
		if(!empty($capacite))
		{

			$salle = new Salle($numero, $capacite);
			$messageConfirmation = $salle->creerFichier($salle);
		}
		else
		{
			$erreurMessage = "Veuillez saisir la Capacité de la salle.<br/>";
		}	
	}
	else
	{
		$erreurMessage = "Veuillez saisir le numéro de la salle.<br/>";
	}
}//fin isset $POST_['ajouter']

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter Salle</title>
</head>
<body>
	<h1>Ajouter une Salle</h1>
	<a href ="ajoutCours.php"><input type="button" value="Ajouter un cours"></a>
	<a href ="ajoutPersonne.php"><input type="button" value="Ajouter une Personne"></a>
	<form action="ajoutSalle.php" method="POST">
		<p>Numéro de la salle<br / >
			<input type="text" name="numero">
		</p>
		<p>Capacité de la salle<br / >
			<input type="text" name="capacite">
		</p>
		<p>
			<?php echo $erreurMessage; ?>
			<?php echo $messageConfirmation; ?>
			<input type=submit name="ajouter" value="AJOUTER">
		</p>
	</form><a href ="modifierCours.php"><input type="button" value="Modifier un cours"></a>
</body>
</html>