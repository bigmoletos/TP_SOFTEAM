<?php session_start();


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
	<form name="ajout" action="traitement_ajout.php" method="post">
		login
		<input name="login" type="text" ><br/><br/>
		Password :
		<input name="password" type="password"><br/><br/>
	
		<input type="submit" value="ajouter"><br/>
	</form>
</body>
</html>