<?php

function __autoload($class)
{
    require_once($class . '.php');
}

session_start();


$titre=$_POST['titre'];
$duree=$_POST['duree'];
$tabetudiant=$_POST['etudiant'];
$enseignant=$_POST['enseignant'];
$salle=$_POST['salle'];

$tab1=$_SESSION['tabclasse1'];
$tab2=$_SESSION['tabclasse2'];
$tab3=$_SESSION['tabsalle'];


$tabe=array();
$indice=substr($enseignant,-1);
$indices=substr($salle,-1);


$i=0;
foreach($tabetudiant as $value)
{
	$tabe[$i]= $tab1[$value];
	$i++;
}

if(count($tabetudiant)>$tab3[$indices]->Place())
{
	echo "il n'y a pas assez de places!!!";
	header('Refresh:3;index.php');
}
else
{
	$cours=new cours($titre,$duree,$tab2[$indice],$tabe,$tab3[$indices]); 
	$_SESSION['test']=$cours;

	$cours->savecours();
	$tab3[$indices]->setEtat("false"); // place la salle en indispo
	$tab3[$indices]->Sauvegarde($tab3[$indices]->Nom());// enregistre sur le fichier le nouvel état de la salle
}

header('Location: index.php');
?>
