<?php

$login = $_POST['login'];
$password = $_POST['password'];

$file = fopen("connexion.txt","r");

$i=0;
while(($ligne=fgets($file)) && $val=="false")
	{
		$tab[$i]=explode(";",$ligne);
		$i++;
	}

$nbr_login = count($tab);

$i=0;
$val="false";
while($i<$nbr_login-1 && $val=="false")
{
	(($login==$tab[$i][0]) && ($password==$tab[$i][1]))?$val="true":$val="false";
	$i++;
}

echo (($val=="true")?"vous etes connecté":"il y a une erreur");



?>