<?php
$nom = !empty($_REQUEST['nom']) ? $_REQUEST['nom'] : "pas de nom";
$prenom = !empty($_REQUEST['prenom']) ? $_REQUEST['prenom'] : "pas de prenom";
$adresse = !empty($_REQUEST['adresse']) ? $_REQUEST['adresse'] : "pas de adresse";
print_r($_REQUEST);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cours PHP - action exemple form</title>
	<meta charset="utf-8">
</head>
<body>
<h2>Fiche</h2>
<p>
Nom : <?php echo $nom ?><br />
Prénom : <?php echo $prenom ?><br />
Adresse : <?php echo $adresse ?><br />
</p>
</body>
</html>