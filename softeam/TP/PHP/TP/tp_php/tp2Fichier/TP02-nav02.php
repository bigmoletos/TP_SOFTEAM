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

// $fichiers contient la liste des fichiers sous forme de tableau
// on affiche l'article courant

if (($indice >= 0) && ($indice < $nbFichiers)) 
	{
	$article = "<div class='article'>".file_get_contents($fichiers[$indice])."</div>";
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

echo $article;

?>
	
</body>
</html>