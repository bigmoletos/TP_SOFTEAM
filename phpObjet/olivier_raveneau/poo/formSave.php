<!DOCTYPE html>
<html>
<head>
	<title>Cours PHP - POO - Form Save</title>
	<meta charset="utf-8">
</head>
<body>
<h2>Enregistrer une personne</h2>
<p>
<form action="save.php" method="post">
    <label for="nom">Nom</label><input type="text" id="nom" name="nom"><br />
    <label for="prenom">Prenom</label><input type="text" id="prenom" name="prenom"><br />
    <label for="age">Age</label><input type="text" id="age" name="age"><br />
    <input type="submit" name="save" value="Enregistrer">
</form>
</p>
</body>
</html>
