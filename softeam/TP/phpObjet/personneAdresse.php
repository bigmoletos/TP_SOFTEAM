<?php

include 'classe/personne_1.php';
//include 'classe/adressse.php';

$adresse = new Adresse('13600', 'Paris', 'France');
var_dump($adresse);


//Declaration d'un objet Patrick
$perso2 = new Personne('jean', '54', $adresse);
$perso2->setPrenom('franck');
$perso2->setAge('54');

var_dump($perso2);

$perso2->decrirePersonne();

// declaration d'un objet Fafa
//$perso3 = new Personne('henri', '56', $adresse);
//$perso3->decrirePersonne();

//var_dump($perso2);



/////////////////




?>