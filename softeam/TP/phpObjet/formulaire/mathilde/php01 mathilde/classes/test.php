<?php
require_once 'Personne.php';

$adresse = new Adresse('13600', 'Paris', 'France');

//Declaration d'un objet Patrick
$perso2 = new Personne('Patrick', '54', $adresse);
$perso2->setPrenom('Jean');
$perso2->setAge('54');
$perso2->decrirePersonne();

// declaration d'un objet Fafa
$perso3 = new Personne('Fafa', 'Bla', $adresse);
$perso3->decrirePersonne();

//var_dump($perso3);