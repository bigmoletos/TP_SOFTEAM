<?php
session_start();

if (isset($_SESSION['login'])) {
	header('Location: welcome.php');
	exit;
}
else
{
	if (!empty($_REQUEST['quit'])) {
		header('Location: logout.php');
		exit;
	}

	if (!empty($_REQUEST['suivant']))
	{
		$nom = trim($_REQUEST['nom']);
		$prenom = trim($_REQUEST['prenom']);
		$age = intval($_REQUEST['age']);
		if (!empty($nom) && !empty($prenom) && !empty($age)) {
			$_SESSION['nom'] = $nom;
			$_SESSION['prenom'] = $prenom;
			$_SESSION['age'] = $age;
		}
		else {
			header('Location: page2.php');
			exit;
		}
	}

	if (!empty($_REQUEST['suivant']) || !empty($_SESSION['nom']))
	{
		$title = 'Inscription Suite';

		$cp = empty($_SESSION['cp']) ? '' : $_SESSION['cp'];
		$ville = empty($_SESSION['ville']) ? '' : $_SESSION['ville'];
		$pays = empty($_SESSION['pays']) ? '' : $_SESSION['pays'];

		$formLogin = '<form action="welcome.php" method="post">';
		$formLogin .= 'CP : <input type="text" name="cp" value="'.$cp.'"><br />';
		$formLogin .= 'Ville : <input type="text" name="ville" value="'.$ville.'"><br />';
		$formLogin .= 'Pays : <input type="text" name="pays" value="'.$pays.'"><br />';
		$formLogin .= '<input type="submit" name="precedent" value="précédent">';
		$formLogin .= '<input type="submit" name="quit" value="quitter">';
		$formLogin .= '<input type="submit" name="suivant" value="suivant">';
		$formLogin .= '</form>';

		$content = '<p>'.$formLogin.'</p>';
		$content .= '<p><a href="page2.php">Précédent</a></p>';
		$content .= '<p><a href="logout.php">Quitter</a></p>';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cours PHP - Page3</title>
	<meta charset="utf-8">
</head>
<body>
<h2><?php echo $title; ?></h2>
<div>
<?php echo $content; ?>
</div>
</body>
</html>