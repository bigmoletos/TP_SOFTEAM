<?php
function passwordFileToArray($passwordfile='password.txt') {
	$tab = array();

	$hPasswords = fopen($passwordfile, 'r');
	if ($hPasswords) {
		while ($line = fgets($hPasswords)) {
			$user = explode(';', $line);
			$tab[] = $user;
		}
		
		fclose($hPasswords);
	}

	return $tab;
}

function arrayToHtmlTab($tab, $head) {
	$html = '';
	$html .= '<table>';
	$html .= '<tr>';
	foreach ($head as $th) {
		$html .= '<th>'.$th.'</th>';
	}
	$html .= '</tr>';
	foreach ($tab as $row) {
		$html .= '<tr>';
		foreach ($row as $th) {
			$html .= '<td>'.$th.'</td>';
		}
	}
	$html .= '</table>';

	return $html;
}

session_start();
if (isset($_SESSION['login']))
{
	$login = $_SESSION['login'];
	$tab = passwordFileToArray();
	$head = array('login', 'password');
	$tabHtml = arrayToHtmlTab($tab, $head);

	$title = 'Bienvenue '.$login.' <a href="logout.php">LOGOUT</a>';
	$content = '<h3>Liste des logins</h3>';
	$content .= '<p>'.$tabHtml.'</p>';
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
	<title>Cours PHP - Read</title>
	<meta charset="utf-8">
</head>
<body>
<h2><?php echo $title; ?></h2>
<div>
<?php echo $content; ?>
</div>
</body>
</html>