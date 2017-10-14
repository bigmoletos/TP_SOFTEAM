<?php
require_once 'Personne.php';

$nom = trim(filter_input(INPUT_POST, 'nom'));
$prenom = trim(filter_input(INPUT_POST, 'prenom'));
$age = intval(filter_input(INPUT_POST, 'age'));

if (empty($nom)) {
    $nom = "pas de nom";
}

if (empty($prenom)) {
    $prenom = "pas de prenom";
}

if (empty($age)) {
    $nom = 0;
}

$personne = new Personne($nom, $prenom, $age);
if ($personne->saveInFile()) {
        $msg = $personne;
} else {
    $msg = 'Erreur !!!<br />';
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cours PHP - POO - Save</title>
	<meta charset="utf-8">
</head>
<body>
<h2>Personne enregistrée</h2>
<p>
<?php print $msg; ?>
</p>
</body>
</html>
