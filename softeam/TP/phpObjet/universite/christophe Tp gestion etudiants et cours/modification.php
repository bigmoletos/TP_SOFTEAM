<?php

function __autoload($class)
{
    require_once($class . '.php');
}

session_start();

$tabcours=$_SESSION['tabcours'];

$modification=$_POST['modification'];

echo $modification;

var_dump($tabcours);

?>

<html>
	<head>
	</head>
	<body>
		<form method="post" action="modif.php">
			

		</form>
	</body>
</html>
