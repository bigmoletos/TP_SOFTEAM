<?php
function diff_dates($date1,$date2,$aujourdhui){
////////////corrigé/////////
/* Affichage de la date actuelle */
date_default_timezone_set("Europe/Paris");
$now = date("d/m/Y");//donne la date actuelle
$hnow = date("h:i:s"); //donne l'heure actuelle

/* Calcul de la date future */
//$date_future = strtotime("2018-06-21");
$date_future = strtotime($date2);//affiche le nombre de seconde entre $date2 et le 01/01/1970
$date_actuelle = strtotime("now");

$date_passee = strtotime($date1);

/* Calcul du nombre de secondes de différence */
$diff = abs($date_future - $date_actuelle);//prend la valeur absolue des secondes entre la date2 et aujourd'hui

$diffpassee = abs($date_passee - $date_future);//prend la valeur absolue des secondes entre la date2 et aujourd'hui

/* Calcul du nombre de jours de différence */
$resteJ = floor($diff / ( 60 * 60 * 24));//floor prend l'entier d'une fraction
$diff = $diff - $resteJ * ( 60 * 60 * 24);//redonne en secondes la différence pour convertir nos jours en
//// heures puis en min puis en s

$resteJ2 = floor($diffpassee / ( 60 * 60 * 24));
$diffpassee = $diffpassee - $resteJ * ( 60 * 60 * 24);

/* Calcul du nombre d'heures de différence restant */
$resteH = floor($diff / ( 60 * 60 ));
$diff = $diff - $resteH * ( 60 * 60 );

$resteH2 = floor($diffpassee / ( 60 * 60 ));
$diffpassee = $diffpassee - $resteH2 * ( 60 * 60 );
/** calcul du nombre de minutes et de secondes   * */
$resteM = floor($diff / 60);

$resteM2 = floor($diffpassee / 60);
/** calcul du nombre de minutes et de secondes   * */
$resteS = $diff - $resteM2 * 60;

$resteS2 = $diffpassee - $resteM2 * 60;
/* Affichage du temps restant */
$futur = date("d/m/Y", $date_future);
$aujourdhui=date("d/m/Y");
$datepassee=date("d/m/Y", strtotime($date2));
$tempsRestant = 'Il reste ' . $resteJ . ' jours, ' . $resteH . ' heures, ' . $resteM . ' minutes et ' . $resteS . ' secondes avant le ' . $futur .'et aujourd\'hui le '.$aujourdhui.' </p>';

$futur2 = date("d/m/Y", $date_passee);
$tempsRestant2 = 'Il reste ' . $resteJ2 . ' jours, ' . $resteH2 . ' heures, ' . $resteM2 . ' minutes et ' . $resteS2 . ' secondes entre  le ' . $futur2 . ' et le '.$datepassee.'</p>';
//$diffentredates=
//echo $tempsRestant2;
//echo $tempsRestant;

$tabDate=array($tempsRestant,$tempsRestant2);
return $tabDate;

//manque le traitement des accents à terminer
}

date_default_timezone_set('Europe/Paris');
$date1="2018-06-21"; //bien respecter le format AAAA-MM-JJ
$date2="2017-06-21";
$aujourdhui=strtotime("now"); 

diff_dates($date1, $date2,$aujourdhui);
//echo $tempsRestant2;
//echo $tempsRestant;

