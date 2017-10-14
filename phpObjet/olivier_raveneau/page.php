<!DOCTYPE html>
<html>
<head>
	<title>Cours PHP</title>
	<meta charset="utf-8">
</head>
<body>
<p>
<?php
$tableau = array(
	'prenom' => 'Cyril',
	'ville' => 'Paris',
	'poste' => 'Consultant informatique',
	'telephone' => array('0145012345', '0145321232')
);

$tableau[0] = array(2, 4, 6);
$tableau[1] = array(1, 3, 5);

$tab[0][] = 8;

echo '<br />';
echo 'Son premier numéro de téléphone est : ';
echo $tableau['telephone'][0];

echo '<br />';
echo 'Son premier numéro de téléphone est : ';
echo $tableau['telephone'][1];

echo '<br />';
echo "Nombres pairs : ";
echo $tableau[0][0]; echo ', ';
echo $tableau[0][1]; echo ', ';
echo $tableau[0][2];
?>
</p>
</body>
</html>