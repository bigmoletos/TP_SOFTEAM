<?php
session_start();

if (isset($_SESSION['login'])) {
	header('Location: welcome.php');
	exit;
}
else
{
	$title = 'Connection';

	$formLogin = '<form action="welcome.php" method="post">';
	$formLogin .= 'Login : <input type="text" name="login"><br />';
	$formLogin .= 'Password : <input type="password" name="password"><br />';
	$formLogin .= '<input type="submit" name="connect" value="connect">';
	$formLogin .= '</form>';

	$content = '<p>'.$formLogin.'</p>';
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cours PHP - Auth</title>
	<meta charset="utf-8">
</head>
<body>
<h2><?php echo $title; ?></h2>
<div>
<?php echo $content; ?>
</div>
</body>
</html>