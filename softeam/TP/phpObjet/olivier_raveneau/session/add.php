<?php
function formAddLoginHtml() {
	$html = '';
	$html .= '<form action="add.php" method="post">';
	$html .= '	Login : <input type="text" name="login"><br />';
	$html .= '	Password : <input type="text" name="password"><br />';
	$html .= '	<input type="submit" name="ajouter" value="ajouter">';
	$html .= '</form>';

	return $html;
}

function loginExist($login, $passwordfile='password.txt') {
	$hPasswords = fopen($passwordfile, 'r');
	if ($hPasswords) {
		while ($line = fgets($hPasswords)) {
			$user = explode(';', $line);
			if ($user[0] == $login)
				return true;
		}

		fclose($hPasswords);
	}

	return false;
}

function addLogin($login, $password, $passwordfile='password.txt') {
	$hPasswords = fopen($passwordfile, 'a');
	if ($hPasswords) {
		if (!loginExist($login)) {
			$line = $login.';'.$password.";\n";
			fputs($hPasswords, $line);
			fclose($hPasswords);
			return true;
		}

		fclose($hPasswords);
	}

	return false;
}

session_start();
if (isset($_SESSION['login']))
{
	$login = $_SESSION['login'];
	$formAdd = formAddLoginHtml();

	$title = 'Bienvenue '.$login.' <a href="logout.php">LOGOUT</a>';
	$content = '<h3>Ajouter des logins</h3>';
	$content .= '<p>'.$formAdd.'</p>';

	if (!empty($_REQUEST['ajouter']))
	{
		$login = trim($_REQUEST['login']);
		$password = trim($_REQUEST['password']);
		if (!empty($login) && !empty($password)) {
			$content .= '<p>';
			$content .= addLogin($login, $password) ? 'Utilisateur ajouté !' : 'Cet utilisateur existe déjà.';
			$content .= '</p>';
		}
	}
	
	$content .= '<p><a href="welcome.php">retour</a></p>';
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
	<title>Cours PHP - Add</title>
	<meta charset="utf-8">
</head>
<body>
<h2><?php echo $title; ?></h2>
<div>
<?php echo $content; ?>
</div>
</body>
</html>