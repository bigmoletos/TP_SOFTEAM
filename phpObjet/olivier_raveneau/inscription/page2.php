<?php
session_start();

if (isset($_SESSION['login'])) {
	header('Location: welcome.php');
	exit;
}
else
{
	$title = 'Inscription';

	$nom = empty($_SESSION['nom']) ? '' : $_SESSION['nom'];
	$prenom = empty($_SESSION['prenom']) ? '' : $_SESSION['prenom'];
	$age = empty($_SESSION['age']) ? '' : $_SESSION['age'];

	$formLogin = '<form action="page3.php" method="post">';
	$formLogin .= 'Nom : <input type="text" name="nom" value="'.$nom.'"><br />';
	$formLogin .= 'Prénom : <input type="text" name="prenom" value="'.$prenom.'"><br />';
	$formLogin .= 'Age : <input type="text" name="age" value="'.$age.'"><br />';
	$formLogin .= '<input type="submit" name="quit" value="quitter">';
	$formLogin .= '<input type="submit" name="suivant" value="suivant">';
	$formLogin .= '</form>';

	$content = '<p>'.$formLogin.'</p>';
	$content .= '<p><a href="logout.php">Quitter</a></p>';
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cours PHP - Page2</title>
	<meta charset="utf-8">
</head>
<body>
<h2><?php echo $title; ?></h2>
<div>
<?php echo $content; ?>
</div>
</body>
</html>