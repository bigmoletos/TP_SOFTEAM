<?php
function formDeleteLoginHtml() {
	$html = '';
	$html .= '<form action="delete.php" method="post">';
	$html .= '	Login : <input type="text" name="login"><br />';
	$html .= '	<input type="submit" name="effacer" value="effacer">';
	$html .= '</form>';

	return $html;
}

function deleteLogin($login, $passwordfile='password.txt') {
	$fileContent = file_get_contents($passwordfile);
	if ($fileContent !== false) {
		$userList = explode("\n", $fileContent);
		for ($i=0; $i<count($userList); $i++) {
			$user = explode(';', $userList[$i]);
			if ($user[0] == $login) {
				unset($userList[$i]);
				$newFileContent = implode("\n", $userList);
				if (file_put_contents($passwordfile, $newFileContent) !== false) {
					return true;
				}
				else
					return false;
			}
		}
	}

	return false;
}

session_start();
if (isset($_SESSION['login']))
{
	$login = $_SESSION['login'];
	$formDelete = formDeleteLoginHtml();

	$title = 'Bienvenue '.$login.' <a href="logout.php">LOGOUT</a>';
	$content = '<h3>Suppression des logins</h3>';
	$content .= '<p>'.$formDelete.'</p>';

	if (!empty($_REQUEST['effacer']))
	{
		$loginToDelete = trim($_REQUEST['login']);
		if (!empty($loginToDelete)) {
			$content .= '<p>';
			$content .= $loginToDelete != $login && deleteLogin($loginToDelete) ? 'Utilisateur effacé !' : 'Cet utilisateur existe déjà.';
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
	<title>Cours PHP - Delete</title>
	<meta charset="utf-8">
</head>
<body>
<h2><?php echo $title; ?></h2>
<div>
<?php echo $content; ?>
</div>
</body>
</html>