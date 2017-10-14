<?php
function generateLoginForm($try = 0)
{
	$form = '';
	$form .= '<form action="login.php" method="post">';
	$form .= '<input type="hidden" name="try" value="'.$try.'">';
	$form .= 'Login : <input type="text" name="login"><br />';
	$form .= 'Password : <input type="password" name="password"><br />';
	$form .= '<input type="submit" name="connect" value="connect">';
	$form .= '</form>';

	return $form;
}

function passwordValidation($login, $password, $passwordfile='password.txt') {
	$hPasswords = fopen($passwordfile, 'r');

	if ($hPasswords) {
		while ($line = fgets($hPasswords)) {
			$user = explode(';', $line);
			if ($user[0] == $login && $user[1] == $password) {
				return true;
			}
		}
	}

	return false;
}

$isValid = false;
if (!empty($_REQUEST['connect']))
{
	$try = intval($_REQUEST['try']);
	$login = trim($_REQUEST['login']);
	$password = trim($_REQUEST['password']);
	if (!empty($login) && !empty($password)) {
		$isValid = passwordValidation($login, $password);
	}
}

if (empty($_REQUEST['connect']))
	$form = '<p>'.generateLoginForm().'</p>';
else
	if (!$isValid) {
		$form = '<p>'.generateLoginForm(++$try).'</p>';
	}

$msg = ($isValid) ? 'Connexion réussi.' : 'Echec de la connexion.';
if (isset($try) && $try < 3) {
	$msg .= ' Il vous reste encore '.(3-$try).'essai(s).';
}
$msg = '<p>'.$msg.'</p>';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cours PHP - Login</title>
	<meta charset="utf-8">
</head>
<body>
<?php echo $form; ?>
<?php echo $msg; ?>
</body>
</html>