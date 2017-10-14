<?php
require_once "classes/classeIndividu.php";
$i=0;
$liste=glob("fichiers/*.txt");
//var_dump($liste);
foreach ($liste as $fichiers){
$contenu=file_get_contents($fichiers);
//var_dump($contenu);
$ligne=explode("\n",$contenu);
//var_dump($ligne);
$perso[$i]=new Individu($ligne[0],$ligne[1],$ligne[2]);
//echo $ligne[0].'<br/>';
//echo $ligne[1].'<br/>';
//echo $ligne[2].'<br/>';
//echo $perso[$i];
//var_dump($perso[$i]);
$tableau= $perso[$i] ->faire_tableau_php();
//var_dump($tableau);

$i++;

}





?>