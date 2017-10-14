<?php
require_once 'Personne.php';

function chargerPersonnes($path='data')
{
    $out = array();
    $nomFichiers = glob($path.'/*.personne');
    foreach ($nomFichiers as $nom) {
        $nom = substr($nom, strrpos($nom, '/')+1, -strlen('.personne'));
        $personne = new Personne($nom);
        if ($personne->loadFromFile()) {
            $out[] = $personne;
        } else {
            return $out;
        }
    }
    return $out;
}
$formUpdate = '';

$load = filter_input(INPUT_POST, 'load');
if ($load) {
    $personnes = chargerPersonnes();
    $formUpdate .= '<form action="update.php" method="post">';
    $formUpdate .= '<select name="nom">';
    foreach ($personnes as $personne) {
        $formUpdate .= '<option value="'.$personne->nom().'">'.$personne->nom().'</option>';
    }
    $formUpdate .= '</select>';
    $formUpdate .= '<select name="attribut">';
    $refPersonne = new ReflectionClass('Personne');
    $properties = $refPersonne->getProperties();
    foreach ($properties as $property) {
        if ($property->getName() !== '_nom') {
            $nom = substr($property->getName(), 1);
            $formUpdate .= '<option value="'.$nom.'">'.$nom.'</option>';
        }
    }
    //$formUpdate .= '<option value="prenom">prenom</option>';
    //$formUpdate .= '<option value="age">age</option>';
    $formUpdate .= '</select>';
    $formUpdate .= '<input type="text" name="attributValue">';
    $formUpdate .= '<input type="submit" name="update" value="Modifier">';
    $formUpdate .= '<input type="submit" name="delete" value="Supprimer">';
    $formUpdate .= '</form>';
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cours PHP - POO - Form Load</title>
	<meta charset="utf-8">
</head>
<body>
<h2>Lire les personnes enregistrées</h2>
<div>
<p>
<form action="formLoad.php" method="post">
    <input type="submit" name="load" value="Charger">
</form>
</p>
<p>
<?php print $formUpdate; ?>
</p>
</div>
</body>
</html>
