<?php

function __autoload($class)
{
    require_once($class . '.php');
}

$nom=$_POST['nom'];
$age=$_POST['age'];
$fonction=$_POST['fonction'];
$dipsal=$_POST['dipsal'];

if($fonction==0)
{
	$etudiant= new Etudiant($nom,$age,$dipsal);
	$etudiant->Save("etudiant");
}
else
{
	$enseignant= new Enseignant($nom,$age,$dipsal);
	$enseignant->Save("enseignant");
}

header('Location: index.php');
?>