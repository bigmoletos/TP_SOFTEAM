<?php


/** permiere partie : liste des fichiers dans le dossier politique **/
$fichiers = glob("news/politique/*.*");

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
$suivant = "";
$precedent = "";
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
		
		$suivant = "<div class=\"suivant\"><a href=\"?indice=$indice_suivant\">$nomarticle</a></div>";
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
		
		$precedent = "<div class=\"precedent\"><a href=\"?indice=$indice_precedent\">$nomarticle</a></div>";
		}
	}
else {
	$article = "<div class='article'>article inexistant</div>"; 
}



echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>"
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

echo $suivant;
echo $precedent;
echo $article;

?>
	
</body>
</html>