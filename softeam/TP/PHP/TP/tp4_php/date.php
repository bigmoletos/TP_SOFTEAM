<?php

	//$x=date("l m/Y hA:i:s");
	//echo $x;
	$x=date("Y-m-d");
	echo $x."<br :>";

function calculDiff($dateButoire, $dateDepart){
	//Récupération des dates et conversion en seconde
	$then=strtotime($dateButoire);
	$now=strtotime($dateDepart);
	//Calculer la différence en seconde
	$differenceSecondes=$then-$now;
	//echo "Il y a " . $differenceSecondes . " secondes d'écart entre les deux dates." . "<br :>";
	//
	$jours=floor($differenceSecondes/86400);
	$heures=floor(($differenceSecondes-($jours*86400))/3600);
	$minutes=floor(($differenceSecondes-($jours*86400)-($heures*3600))/60);
	$secondes=floor($differenceSecondes-($jours*86400)-($heures*3600)-($minutes*60));

	$reponse = "Il y a ";
	$reponse .= $jours ; 
	$reponse .= ($jours>=1) ? " jour " : " jours ";
	$reponse .= $heures ;
	$reponse .= ($jours>=1) ? " heure " : "heures ";
	$reponse .= $minutes;
	$reponse .= ($minutes >= 1) ? " minute et " : " minutes et ";
	$reponse .= $secondes;
	$reponse .= ($secondes >= 1) ? " seconde d'écart. " : "secondes d'écart.";
	$reponse .= "<br />" ;

	echo $reponse;
	}

	
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>TP01 : Date</title>
	</head>
	<body>
		<h2>Combien de temps d'ici le 21.06.2018?</h2>
		<?php calculDiff("2018-06-21","now"); ?>

		<h2>Temps écoulé depuis le 08-09-2017?</h2>
		<?php calculDiff("now","2017-09-08"); ?>

	</body>
</html>