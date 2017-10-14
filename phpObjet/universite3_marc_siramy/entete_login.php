<?php

if (!isset($_SESSION)) {
	session_start();
}
$erreur_message = "";// Variable To Store erreur_message Message
if (isset($_POST['valider'])) {
	if ($_POST['enseignant'] == -1 || empty($_POST['motDePasse'])) {
		$erreur_message = "Vous devez entrer un login (votre nom) et votre mot de passe";
	} else {
		// Define $login and $motDePasse
		$login      = htmlspecialchars($_POST['enseignant']);
		$motDePasse = htmlspecialchars($_POST['motDePasse']);
		$enseignant = Enseignant::lireAvecNomPrenom($login, "Enseignant");
		// lire dans un fichier si le login et le mot de passe sont exacts (et si oui, sotcker le login en session et rediriger
		// l'utilisateur vers la page principale)
		if ($_POST['enseignant'] == -1) {
			$erreur_message = "Vous devez entrer un login (votre nom)";
		} else if ($motDePasse == $enseignant->motDePasse()) {
			$_SESSION['utilisateur_authentifie'] = $login;// Initializing Session
			header("location: AfficheCours.php");// Redirecting To Other Page
		} else {
			$erreur_message = "Le mot de passe est invalide";
		}
	}
}

$tabEnseignants = Enseignant::lireTousEnseignants();

// pretty output html
function tidyHTML($buffer) {
	// load our document into a DOM object
	$dom = new DOMDocument();
	// we want nice output
	$dom->preserveWhiteSpace = false;
	$dom->loadHTML($buffer);
	$dom->formatOutput = true;
	return ($dom->saveXML());
}

// start output buffering, using our nice
// callback function to format the output.
//ob_start("tidyHTML");
?>
<!DOCTYPE html>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="css/main.css" />
	<link rel="shortcut icon" href="http://formvalidator.net/img/favicon.ico" type="image-x/icon"/>
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
	  <script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js"></script>
	<![endif]-->
	<script src="vendor/bower_components/jquery/dist/jquery.js"></script>
	<script src="vendor/bower_components/bootstrap/dist/js/bootstrap.js"></script>
	<title>Portail universitaire</title>
</head>
<body class="bg-info">