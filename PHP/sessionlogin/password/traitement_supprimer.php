<?php
session_start();
//$login=$_POST["login"];
//$password=$_POST["password"];
//$ch=$login.";".$password.";\n";

//$file = "connexion.txt";
//fseek($file, SEEK_END); vmet le curseur à la fin
//$fopen($file);
//file_put_contents($file, $ch, FILE_APPEND);
//file_get_contents($file,$ch);
//////////////////
//echo"<table border=\"2\"><tbody>";
//$i=0;
//
//$tab=$file;
//
//lecture de $tab
//for($i=0;$i<count($file);$i++)
//{
//$ligne= explode (";",$file[$i]);
////print_r($ligne);
// 
//echo"<tr><td>$ligne[0]</td></tr>" ;
//}
//echo"</tbody></table>";
////////////////////
///////////////////
$filesecret = "connexion.txt";
$ArrayFile = file_get_contents($filesecret); //qui te met le fichier dans un tableau (1 ligne du fichier par entrée dans le tableau) 
var_dump($ArrayFile);
//
//foreach ($ArrayFile as $key => $value) {
//    echo $value;
//}
//foreach ($ArrayFile as $value) {
//    echo $value;
//}
////unset($ArrayFile[$numLigneASupprimer]); 
//$File = implode("\n", $ArrayFile); 
$filesecret = "connexion.txt";
$descFic = fopen($filesecret, "r");
while ($ligne = fread($descFic, filesize($filesecret))) {
    $data = $ligne;
    echo $data . "<br />";
}
fclose($file);  
/////////////

$file = fopen("connexion.txt","r");
$i=0;
$val="false";

while(($ligne=fgets($file))&& $val=="false")
	{
		$tab=explode(";",$ligne);
		(($login==$tab[0]) && ($password==$tab[1]))?$val="true":$val="false";
		$i++;
	}


?>
