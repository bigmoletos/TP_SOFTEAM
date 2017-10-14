<?php

function afficherListe($path, $extension){
	$dossier = opendir($path);
	while ($f = readdir($dossier)){
		$testExtension = substr($f, strrpos($f,'.'));
		if ($testExtension == $extension){
		echo $f . "<br />";	
		}
		$newpath = $path . "/" . $f;
		// faire if pour sauter les dossier . et ..
		if ((is_dir($newpath)==true) && ($f != ".") && ($f != "..")){
			afficherListe($newpath, $extension);
		}
	}
	closedir($dossier);
	echo "<br />";

}

?>


<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>T01 Liste d'Articles</title>
	</head>

	<body>
		<h2>liste des articles</h2>
		<?php 
			//echo afficherFichier("news/sports/*.*");
			//echo afficherFichier("news/politique/*.*"); 
			//echo afficherListe("../..",".php"); 
                        echo afficherListe("news/..",".txt");
                        echo afficherListe("news/..","*");
		?>
	</body>

</html>
