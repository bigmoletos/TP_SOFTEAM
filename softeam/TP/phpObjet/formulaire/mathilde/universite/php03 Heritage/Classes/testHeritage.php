<?php

spl_autoload_register(function($classe){
	include $classe . ".php";
});

$enfant = new Enfant('toto', 'titi' , '12');
var_dump($enfant);

$parent = new Porent('Pilou', 'Parent');

echo $enfant->nbrPersonneStatic();

?>