<?php
session_start();

if (! isset($_SESSION["pagesvues"])) $_SESSION["pagesvues"] = array();


/** seconde partie : liste de toutes les dossiers **/
$dossiers = glob("news/*", GLOB_ONLYDIR);
// $dossiers contient la liste des dossiers sous forme de tableau
$tousDossiers = "";
// parcours du tableau / liste
foreach($dossiers as $indice_dossier => $d)
	{
	// on cree un titre par dossier
	$tousDossiers = $tousDossiers. "<h2>$d</h2>";
	
	// creation si necessaire de la variable de session
	if (! isset($_SESSION["pagesvues"][$indice_dossier])) 
		{
		$_SESSION["pagesvues"][$indice_dossier] = array();
		}
	
	// pour chaque dossier, on recupere la liste des fichiers
	// $d contient le chemin
	$fichiers = glob("$d/*.*");
	// on cree une liste item (li) par fichier
	$tousDossiers = $tousDossiers . "<ul>";
	foreach($fichiers as $indice_nouvelle => $f)
		{
		// texte gras ou pas
		$texte = $f;
		// fin de phrase, vide par defaut
		$fin = "";
		
		// variable de session
		if (! isset($_SESSION["pagesvues"][$indice_dossier][$indice_nouvelle])) 
			{
			$_SESSION["pagesvues"][$indice_dossier][$indice_nouvelle] = false;
			}
		
		if (! $_SESSION["pagesvues"][$indice_dossier][$indice_nouvelle])
			{
			// si ce n'est pas lue
			$fin = " (nouvelle non lue)";
			$texte = "<strong>$texte</strong>";
			}
		
		// on cree une liste item (li) par fichier
		$tousDossiers = $tousDossiers . "<li><a href='tp02.php?indice=$indice_nouvelle&dossier=$indice_dossier'>$texte</a>$fin</li>";
		}
	$tousDossiers = $tousDossiers . "</ul>";
	}


?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
    <title>liste des nouvelles</title>
</head>
<body>

<?php

echo $tousDossiers;

?>

<div>
<a href="detruire.php">Remise à zéro.</a>
</div>
	
</body>
</html>