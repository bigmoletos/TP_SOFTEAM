<?php
session_start();

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

function userInfo($name, $inscritfile='inscrit.txt') {
	$hInscritfile = fopen($inscritfile, 'r');

	if ($hInscritfile) {
		while ($line = fgets($hInscritfile)) {
			$user = explode(';', $line);
			if ($user[0] == $name) {
				return $user;
			}
		}

		fclose($hInscritfile);
	}

	return array();
}


function userExist($nom, $inscritfile='inscrit.txt') {
	$hInscritfile = fopen($inscritfile, 'r');
	if ($hInscritfile) {
		while ($line = fgets($hInscritfile)) {
			$user = explode(';', $line);
			if ($user[0] == $nom)
				return true;
		}

		fclose($hInscritfile);
	}

	return false;
}

function addUser($data = array(), $inscritfile='inscrit.txt') {
	$hInscritfile = fopen($inscritfile, 'a');
	if ($hInscritfile) {
		if (!userExist($data[0])) {
			$line = implode(';', $data)."\n";
			fputs($hInscritfile, $line);
			fclose($hInscritfile);
			return true;
		}

		fclose($hInscritfile);
	}

	return false;
}

$isValid = false;
if (!empty($_REQUEST['connect']))
{
	$login = trim($_REQUEST['login']);
	$password = trim($_REQUEST['password']);
	if (!empty($login) && !empty($password)) {
		$isValid = passwordValidation($login, $password, 'inscrit.txt');
	}
}

if (!empty($_REQUEST['quit'])) {
	header('Location: logout.php');
	exit;
}

if (!empty($_REQUEST['precedent'])) {
	$cp = trim($_REQUEST['cp']);
	$ville = trim($_REQUEST['ville']);
	$pays = trim($_REQUEST['pays']);
	$_SESSION['cp'] = empty($cp) ? '' : $cp;
	$_SESSION['ville'] = empty($ville) ? '' : $ville;
	$_SESSION['pays'] = empty($pays) ? '' : $pays;
	header('Location: page2.php');
	exit;
}

if (!empty($_REQUEST['suivant'])) {
		$cp = trim($_REQUEST['cp']);
		$ville = trim($_REQUEST['ville']);
		$pays = trim($_REQUEST['pays']);
		if (!empty($cp) && !empty($ville) && !empty($pays)) {
			$_SESSION['cp'] = $cp;
			$_SESSION['ville'] = $ville;
			$_SESSION['pays'] = $pays;
			$_SESSION['login'] = $_SESSION['nom'];

			$data = array();
			$data[] = $_SESSION['nom'];
			$data[] = $_SESSION['prenom'];
			$data[] = $_SESSION['age'];
			$data[] = $_SESSION['cp'];
			$data[] = $_SESSION['ville'];
			$data[] = $_SESSION['pays'];

			if (!addUser($data)) {
				header('Location: page1.php');
				exit;
			}
		}
		else {
			header('Location: page3.php');
			exit;
		}
}

if ($isValid || isset($_SESSION['login'])) {
	
	if (isset($_SESSION['login']))
		$login = $_SESSION['login'];
	else
		$_SESSION['login'] = $login;
		
	$title = 'Bienvenue '.$login.' <a href="logout.php">LOGOUT</a>';
	$content = '<table>';
	$user = userInfo($login);
	foreach ($user as $key => $value) {
		$content .= '<tr><th>'.$key.'<th><td>'.$value.'</td></tr>';
	}
	$content .= '</table>';
}
else
{
	$title = 'Accès reffusé !';
	$content = '<p><a href="page1.php">CONNECTEZ-VOUS !</a></p>';
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