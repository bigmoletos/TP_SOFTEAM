<?php session_start();

session_register_shutdown ;

session_unset; //— Détruit toutes les variables d'une session
session_write_close; //— Écrit les données de session et ferme la session

?>