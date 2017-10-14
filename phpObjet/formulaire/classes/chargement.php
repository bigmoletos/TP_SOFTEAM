<?php

////Chargement.php
include ’classeIndividu.php’;
//$perso = new Personne("John",12);
//$perso->decrirePersonne();

//Chargement.php
function loadClass($classe){
//include ’Classes/’. $classe .’.php’;
}

spl_autoload_register(’loadClass’);
$perso = new Personne("John",12);
$perso->decrirePersonne();

//Chargement.php
spl_autoload_register(function ($class) {
//require ’Classes/’ . $class . ’.php’;
});
$perso = new Personne("John",12);
$perso->decrirePersonne();



?>
