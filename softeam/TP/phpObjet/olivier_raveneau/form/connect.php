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

$msg = ($isValid) ? 'Connexion réussi' : 'Echec de la connexion';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cours PHP - Connect</title>
	<meta charset="utf-8">
</head>
<body>
<p>
<?php echo $msg; ?>
</p>
</body>
</html>