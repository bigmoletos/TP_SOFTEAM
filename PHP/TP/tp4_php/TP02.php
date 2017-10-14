<?php session_start();
//$pages_vues="";
//$pages_vues="";


//s'il n'existe pas on crée le tableau $_SESSION['pagesvues']
if(!isset($_SESSION['pagesvues'])) $_SESSION['pagesvues']=array(); 

//on va maintenant remplir par le nombre de dossier en bouclant avec un foreach sur chaque dossier pour recuperer son indice
//ici de 0 à 2
    //le glob donne le nom des fichiers, le glob_onlydir le nom des dossiers seulement
    //donc $dossier nous donne le nom des dossiers
    $dossiers = glob("news/*", GLOB_ONLYDIR);
    //foreach ($dossiers as $value) {
    //   echo "hello"; 
    //}      
foreach($dossiers as $indice_dossier=>$nomdossier) {
    if(!isset($_SESSION['pagesvues'][$indice_dossier])) $_SESSION['pagesvues'][$indice_dossier]=array();
    //on commence par assigner 0 à toutes les valeurs du tableau $_SESSION avec le =false
    $_SESSION['pagesvues'][$indice_dossier]=false;
    //echo'nom du dossier'.$nomdossier.'<br/>';
  // echo 'nomdossier: '. var_dump($nomdossier).'<br/>';
  //  echo 'dossier: '.var_dump($dossiers);
}
var_dump($_SESSION['pagesvues'][$indice_dossier]);


//$_SESSION['pagesvues'][$indice_dossier][$indice_fichier]=false
//$_SESSION["pagesvues"][numero/indice de dossier][numero/indice de nouvelle (fichier) dans le dossier].
//
//
//
//
//il nous faut 3 conditions: lue/ non lue/ modification en comparant la date

$non_lue="";
$modifie="";
$fichier="";
//affiche la date de modification d'un fichier
    //$fichier = 'somefile.txt';
    if (file_exists($fichier)) {
    echo "$fichier a été modifié le : " . date ("F d Y H:i:s.", filemtime($fichier));
    $modifie=filemtime($fichier);
   // var_dump($modifie);
    }
    //getlastmod() - Retourne la date de dernière modification de la page

//var_dump($_SESSION);
/** seconde partie : changement de dossier **/

//initialisation des variables d'affichages
$nav_dossier = "";
$article ="";
$suivant = "";
$precedent = "";
	
// dossier courant
$dossiers = glob("news/*", GLOB_ONLYDIR); 
$indice_dossier = 2;
$nbDossiers = count($dossiers);
//var_dump($nbDossiers);
// recuperation s'il y a un dossier en cours
if (isset($_GET["dossier"])) {
	$indice_dossier = intval($_GET["dossier"]);
}

if (($indice_dossier >= 0) && ($indice_dossier < $nbDossiers))
{
	$dossier = $dossiers[$indice_dossier];
	$complementDossier = "&dossier=$indice_dossier";
	
	// navigation dans les dossiers 
	$nav_dossier = "<div class='dossiercourant'>$dossier</div>";
	if ($nbDossiers > 2)
		{
		$dprec = ($indice_dossier -1)%$nbDossiers;
		if ($dprec <  0) $dprec += $nbDossiers;
		$nav_dossier = "<div class='dossierprecedent'><a href='?dossier=$dprec'>&lt;- {$dossiers[$dprec]}</a></div>".$nav_dossier;
		}
		
	if ($nbDossiers > 1)
		{
		$dsuiv = ($indice_dossier + 1)%$nbDossiers;
		$nav_dossier = "<div class='dossiersuivant'><a href='?dossier=$dsuiv'>{$dossiers[$dsuiv]} -&gt;</a></div>".$nav_dossier;
		} 

	$fichiers = glob("$dossier/*.*");
	// indice courant
	$indice = 0;

	// nombre de fichier
	$nbFichiers = count($fichiers);

	// recuperation s'il y a de l'article en cours
	if (isset($_GET["indice"])) {
		$indice = intval($_GET["indice"]);
	}

	// message en cas d'absence de fichier
	$article = "<div class='article'>il n'y a pas d'article</div>";

	// $fichiers contient la liste des fichiers sous forme de tableau
	// on affiche l'article courant

	if (($indice >= 0) && ($indice < $nbFichiers)) 
		{
		$nomarticle = explode("/",$fichiers[$indice]);
		$nomarticle = $nomarticle[count($nomarticle)-1];
		
		$article = "<div class='article'><h2>$nomarticle</h2>".file_get_contents($fichiers[$indice])."</div>";
		
		// peut-il y avoir un article suivant ? 
		if ($nbFichiers > 1)
			{
			// on reboucle au debut...
			$indice_suivant = ($indice + 1) % $nbFichiers;
			
			// nom du lien = nom du fichier
			// on verra plus tard avec la fonction file...
			$nomarticle = explode("/",$fichiers[$indice_suivant]);
			$nomarticle = $nomarticle[count($nomarticle)-1];
			
			$suivant = "<div class=\"suivant\"><a href=\"?indice=$indice_suivant$complementDossier\">$nomarticle</a></div>";
			}
			
		// peut-il y avoir aussi un article precedent
		if ($nbFichiers > 2)
			{
			// on reboucle a la fin...
			$indice_precedent = ($indice - 1 ) % $nbFichiers;
			// le resultat du % peut etre < 0... securite necessaire
			if ($indice_precedent < 0) $indice_precedent += $nbFichiers;
			
			// nom du lien = nom du fichier
			// on verra plus tard avec la fonction file...
			$nomarticle = explode("/",$fichiers[$indice_precedent]);
			$nomarticle = $nomarticle[count($nomarticle)-1];
			
			$precedent = "<div class=\"precedent\"><a href=\"?indice=$indice_precedent$complementDossier\">$nomarticle</a></div>";
			}
		}
	else {
		$article = "<div class='article'>article inexistant</div>"; 
	}

}
else
{
	// il n'y a pas de dossier
	$nav_dossier = "<div class='pasdedossier'>Ce dossier n'existe pas</div>";
}
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";

var_dump($_GET);
var_dump($_POST);
var_dump($_SESSION);
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">     
	<title>navigation entre article...</title>

	<link media="screen" type="text/css" rel="stylesheet" href="TP02-style.css" />

</head>
<body>

<?php

echo $nav_dossier;
echo $suivant;
echo $precedent;
echo $article;

?>
	
</body>
</html>