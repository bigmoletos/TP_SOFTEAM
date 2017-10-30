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
 //on n epeut pas mettre 2 return de suite car le premier arrete le traitement
//pour eviter cela on fait un tableau integrant les returns que l'on veut 
//puis on fait un return du tableau
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

//d	Jour du mois, sur deux chiffres (avec un zéro initial)	01 à 31
//D	Jour de la semaine, en trois lettres (et en anglais - par défaut : en anglais, ou sinon, dans la langue locale du serveur)	Mon à Sun
//j	Jour du mois sans les zéros initiaux	1 à 31
//l ('L' minuscule)	Jour de la semaine, textuel, version longue, en anglais	Sunday à Saturday
//N	Représentation numérique ISO-8601 du jour de la semaine (ajouté en PHP 5.1.0)	1 (pour Lundi) à 7 (pour Dimanche)
//S	Suffixe ordinal d'un nombre pour le jour du mois, en anglais, sur deux lettres	st, nd, rd ou th. Fonctionne bien avec j
//w	Jour de la semaine au format numérique	0 (pour dimanche) à 6 (pour samedi)
//z	Jour de l'année	0 à 365
//Semaine	---	---
//W	Numéro de semaine dans l'année ISO-8601, les semaines commencent le lundi (ajouté en PHP 4.1.0)	Exemple : 42 (la 42ème semaine de l'année)
//Mois	---	---
//F	Mois, textuel, version longue; en anglais, comme January ou December	January à December
//m	Mois au format numérique, avec zéros initiaux	01 à 12
//M	Mois, en trois lettres, en anglais	Jan à Dec
//n	Mois sans les zéros initiaux	1 à 12
//t	Nombre de jours dans le mois	28 à 31
//Année	---	---
//L	Est ce que l'année est bissextile	1 si bissextile, 0 sinon.
//o	L'année ISO-8601. C'est la même valeur que Y, excepté si le numéro de la semaine ISO (W) appartient à l'année précédente ou suivante, cette année sera utilisé à la place. (ajouté en PHP 5.1.0)	Exemples : 1999 ou 2003
//Y	Année sur 4 chiffres	Exemples : 1999 ou 2003
//y	Année sur 2 chiffres	Exemples : 99 ou 03
//Heure	---	---
//a	Ante meridiem et Post meridiem en minuscules	am ou pm
//A	Ante meridiem et Post meridiem en majuscules	AM ou PM
//B	Heure Internet Swatch	000 à 999
//g	Heure, au format 12h, sans les zéros initiaux	1 à 12
//G	Heure, au format 24h, sans les zéros initiaux	0 à 23
//h	Heure, au format 12h, avec les zéros initiaux	01 à 12
//H	Heure, au format 24h, avec les zéros initiaux	00 à 23
//i	Minutes avec les zéros initiaux	00 à 59
//s	Secondes, avec zéros initiaux	00 à 59
//u	Microsecondes (ajouté en PHP 5.2.2). Notez que la fonction date() génèrera toujours 000000 vu qu'elle prend un paramètre de type entier, alors que la méthode DateTime::format() supporte les microsecondes si DateTime a été créée avec des microsecondes.	Exemple : 654321
//Fuseau horaire	---	---
//e	L'identifiant du fuseau horaire (ajouté en PHP 5.1.0)	Exemples : UTC, GMT, Atlantic/Azores
//I (i majuscule)	L'heure d'été est activée ou pas	1 si oui, 0 sinon.
//O	Différence d'heures avec l'heure de Greenwich (GMT), exprimée en heures	Exemple : +0200
//P	Différence avec l'heure Greenwich (GMT) avec un deux-points entre les heures et les minutes (ajouté dans PHP 5.1.3)	Exemple : +02:00
//T	Abréviation du fuseau horaire	Exemples : EST, MDT ...
//Z	Décalage horaire en secondes. Le décalage des zones à l'ouest de la zone UTC est négative, et à l'est, il est positif.	-43200 à 50400
//Date et Heure complète	---	---
//c	Date au format ISO 8601 (ajouté en PHP 5)	2004-02-12T15:19:21+00:00
//r	Format de date » RFC 2822	Exemple : Thu, 21 Dec 2000 16:01:07 +0200
//U	Secondes depuis l'époque Unix (1er Janvier 1970, 0h00 00s GMT)	Voir aussi time()