<?php
require_once 'Personne.php';

$delete = filter_input(INPUT_POST, 'delete');
$update = filter_input(INPUT_POST, 'update');
$nom = filter_input(INPUT_POST, 'nom');
$attribut = filter_input(INPUT_POST, 'attribut');
$attributValue = filter_input(INPUT_POST, 'attributValue');

if ($delete) {
    $filename = "data/$nom.personne";
    unlink($filename);
    $msg = "$nom est effacé !";
} else {
    $personne = new Personne($nom);
    if ($personne->loadFromFile()) {
        if ($attribut == 'prenom') {
            $attributValue = trim($attributValue);
            $personne->setPrenom($attributValue);
        } else {
             $attributValue = intval($attributValue);
             $personne->setAge($attributValue);
        }

        if ($personne->saveInFile()) {
            $msg = $personne;
        } else {
            $msg = 'Erreur !!!<br />';
        }
    } else {
        $msg = 'Erreur !!!<br />';
    }
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Cours PHP - POO - Update</title>
	<meta charset="utf-8">
</head>
<body>
<h2>Personne mis à jour</h2>
<p>
<?php print $msg; ?>
</p>
</body>
</html>
