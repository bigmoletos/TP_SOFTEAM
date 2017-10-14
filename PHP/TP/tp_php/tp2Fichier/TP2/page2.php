<?php session_start();

$login = $_POST['login'];
$password = $_POST['password'];

$file = fopen("inscrits.txt","r");

$i=0;
$val="false";
while(($ligne=fgets($file))&& $val=="false")
	{
		$tab=explode(";",$ligne);
		(($login==$tab[0]) && ($password==$tab[1]))?$val="true":$val="false";
		$i++;
	}

$_SESSION["login"]=$tab[0];	

echo (($val=="true")?header("location: page4.php"):header("Refresh: 3; inscription1.php"));

closedir($file);










?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
