<?php session_start();

//$pagesvues($_SESSION['pagesvues']);
//il nous faut 3 conditions: lue/ non lue/ modification en comparant la date
$lue="";
$nonlue="";
$modifie="";
//$fichier="C:\UwAmp\www\projetPHP1\tp\tp_php\tp2Fichier\tp4_php\news\monde\01.news.txt";

$fichier="tp02.php";
//affiche la date de modification d'un fichier
//$fichier = 'somefile.txt';
$modifie=date("d F Y",filemtime($fichier));
    var_dump($modifie); 

 // $modifie=filemtime($fichier);
 //   var_dump($modifie);
    
    if (file_exists($fichier)) {
    echo "$fichier a été modifié le : " . date ("F d Y H:i:s.", filemtime($fichier));
    $modifie=date("d F Y",filemtime($fichier));
    var_dump($modifie);
    }       
    
    ?>
