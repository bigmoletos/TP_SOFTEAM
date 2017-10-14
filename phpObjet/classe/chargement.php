<?php

//Chargement.php
//include ’personne.php’;
//$perso = new Personne("John",12);
//$perso->decrirePersonne();
//Chargement.php
function chargerClass($classe) {
    require personne.php;  //On inclut la classe correspondante au paramètre passé.
    require $classe.'.php';
}

spl_autoload_register(’chargerClass’);// 

$perso = new Personne("John", 12);
$perso->decrirePersonne();

//Chargement.php
spl_autoload_register(function ($class) {
   // include ’Classes/’ . $class . ’.php’;
});

$perso = new Personne("John", 12);
$perso->decrirePersonne();



function chargerClasse($classe)
{
  require $classe . '.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

$perso = new Personnage;



?>
