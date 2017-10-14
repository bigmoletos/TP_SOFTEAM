<?php
function passwordValidation($login, $password, $passwordfile='password.txt') {
	$hPasswords = fopen($passwordfile, 'r');

	if ($hPasswords) {
		while ($line = fgets($hPasswords)) {
			$user = explode(';', $line);
			if ($user[0] == $login && $user[1] == $password) {
				return true;
			}
		}

		fclose($hPasswords);
	}

	return false;
}

$isValid = false;
if (!empty($_REQUEST['connect']))
{
	$login = trim($_REQUEST['login']);
	$password = trim($_REQUEST['password']);
	if (!empty($login) && !empty($password)) {
		$isValid = passwordValidation($login, $password);
	}
}

session_start();
if ($isValid || isset($_SESSION['login'])) {
	
	if (isset($_SESSION['login']))
		$login = $_SESSION['login'];
	else
		$_SESSION['login'] = $login;
		
	$title = 'Bienvenue '.$login.' <a href="logout.php">LOGOUT</a>';
	$content = '<p><ul>';
	$content .= '<li><a href="read.php">Consulter</a></li>';
	$content .= '<li><a href="add.php">Ajouter</a></li>';
	$content .= '<li><a href="delete.php">Supprimer</a></li>';
	$content .= '</ul></p>';
}
else
{
	$title = 'Accès reffusé !';
	$content = '<p><a href="auth.php">CONNECTEZ-VOUS !</a></p>';
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cours PHP - Welcome</title>
	<meta charset="utf-8">
</head>
<body>
<h2><?php echo $title; ?></h2>
<div>
<?php echo $content; ?>
</div>
</body>
</html>