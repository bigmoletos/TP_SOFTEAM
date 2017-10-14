<?php session_start();
//$login=$_POST["login"];
//$password=$_POST["password"];
//
//$ch=$login.";".$password.";$nom.";".$prenom.";".$age.";".$cp.";".$ville.";".$adresse.";$pays.";\n";
//    
////$ch=$login.";".$password.";\n";
//    
//$file="inscrits.txt";
//file_put_contents($file, $ch, FILE_APPEND);

//if(!empty $precedent){
//    ?header("location: inscription1.php"):header("Refresh: 3; page1.php"));
//}
//echo (($val=="true")?"vous etes connecté":"il y a une erreur");
//echo (($_POST['precedent']=="true")?"vous etes connecté":"il y a une erreur");
//
var_dump($_POST['precedent']); 

//echo (($_POST['precedent']=="true")?header("location: inscription1.php"):header("location: page1.php"));

if (!empty($_POST['precedent'])) {
	header("location: inscription1.php");
}


$login=$_POST['login'];
$password=$_POST['password'];
$age=$_POST['age'];
$cp=$_POST['cp'];
$ville=$_POST['ville'];
$adresse=$_POST['adresse'];
$pays=$_POST['pays'];

var_dump($login); 

$ch=$login.";".$password.";$nom.";".$prenom.";".$age.";".$cp.";".$ville.";".$adresse.";$pays.";\n";
var_dump($ch)  ;
//$ch=$login.";".$password.";\n";
 //rajoute les valeurs saisies dans le fichier inscrits.txt   
$file="inscrits.txt";
file_put_contents($file, $ch, FILE_APPEND);

?>
