<?php

function __autoload($class)
{
    require_once($class . '.php');
}

session_start();

$salle=$_POST['sallelibre'];

$indices=substr($salle,-1);
$nom=substr($salle,0,strlen($salle)-1);

$tab4=$_SESSION['tabcours'];
$tab3=$_SESSION['tabsalle'];

//$tab3[$indices]->setEtat("true"); // place la salle en indispo
//$tab3[$indices]->Sauvegarde($tab3[$indices]->Nom());// enregistre sur le fichier le nouvel état de la salle

/*foreach ($tab4 as $objet) 
{
	echo $objet->Nom();	
}
*/
var_dump($tab3);
//header('Location: index.php');

?>