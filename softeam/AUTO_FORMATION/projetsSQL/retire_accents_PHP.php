﻿<!DOCTYPE html>
<html>
	<head>
		<title>travail sur les filtres </title>
		
		<meta charset="utf-8"/>
	</head>	
	<body>
		
<p><br><strong>retire les accents</strong><br><br></p>		
		
<?php


/////////////////////////
// fonction a enregistrer en ISO-8859-1
echo'<br><strong>gestion des accents</strong><br>'; 
///////////////////////////

		function removeaccent($string)
		{
		// $string="http//fr�nck./d�sme@(�dt.com";	
		$string = utf8_decode($string);
		$string = strtr($string,    '���������������������������������������������������',
			'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
		$string = utf8_encode($string);                 
		return $string;
		echo $string;
		};
		
		removeaccent();
		$string="http//fr�nck./d�sme@(�dt.com";		
		removeaccent($string);
		echo $string;
		
/////////////////////////////
// resultat pas terrible: http//fr?nck./d?sme@(?dt.com






?>
</body>
</html>