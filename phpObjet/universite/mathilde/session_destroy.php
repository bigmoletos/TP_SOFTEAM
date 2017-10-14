<?php
	session_start();// Démarrage ou restauration de la session
	$_SESSION = array();// Réinitialisation du tableau de session
	session_destroy();// Destruction de la session
	unset($_SESSION);// Destruction du tableau de session

