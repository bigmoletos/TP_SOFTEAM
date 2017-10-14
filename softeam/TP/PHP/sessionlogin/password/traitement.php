<?php session_start();

$login = $_POST['login'];
$password = $_POST['password'];

$file = fopen("connexion.txt","r");

$i=0;
$val="false";
while(($ligne=fgets($file))&& $val=="false")
	{
		$tab=explode(";",$ligne);
		(($login==$tab[0]) && ($password==$tab[1]))?$val="true":$val="false";
		$i++;
	}

$_SESSION["login"]=$tab[0];	

echo (($val=="true")?header("location: accueil.php"):header("Refresh: 3; index.php"));

closedir($file);

?>