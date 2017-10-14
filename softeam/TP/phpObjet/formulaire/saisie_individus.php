<?php
//appel la classe classeIndividu.php

require_once  'classeIndividu.php';


$individu = new individu('pagnol', 'marcel', '95');
$individu->setNom('macron');
$individu->setPrenom('manu');
$individu->setAge('46');

var_dump($individu);



?>

