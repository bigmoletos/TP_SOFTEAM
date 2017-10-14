<?php

//autoload le chargement des fichiers des classes
spl_autoload_register(function($class){
	include $class . '.php';
});

$per1 = new Personne('toto','blublu');
var_dump($per1);
$list = get_object_vars($per1);

foreach ($list as $detail => $value) {
	echo $detail . " " . $value;
} /;'affiche rien, le tableau est vide


$per2 = new Etudiant('Pareikl','juju', 'Diplome1');
$per2->setAge('22');
$per2->changeEtudiant('baba','22','Diplome2');
var_dump($per2);


$per3 = new Enseignant('Persil','Jack', '5400');
var_dump($per3);
$decrire  = $per3->decrireEnseignant();
echo $decrire;

$cours = new Cours('PHP', '3', 'MMM', $per2);
var_dump($cours);
?>