<?php
		session_start();
		import_request_variables('p', 'p_'); 
function connection(){
	$file=fopen("texte.txt", "r");
	$ok = false;
	while($line=fgets($file)){
		//echo $line;
		//for($i=0;$i<str_word_count($line);$i++){
			$tab= explode(";",$line);
			if ($tab[0] == $_POST["username"] && $tab[1] == $_POST["password"] )
				$ok = true;
		//}	
		echo  "<br/>";
	}
	fclose($file);
	if ($ok){
		echo "Bonjour Monsieur " . $p_username . " " . $_POST["password"] . " <br/> ";
		session_name($_POST["username"]);
		session_id($_POST["username"]);
		$_SESSION['username'] = $_POST["username"];
		$_SESSION['password'] = $_POST["password"];

		echo '<a href="page.php">ajout d\'un nouvel utilisateur</a>';


	}
	else
		echo "nom ou mot de passe erroné(s)";
}
?>


<html>

<head>
	<meta charset="utf-8">     
    <title>authentification</title>
</head>
<body>

<?php
	connection();
	
?>
	
</body>
</html>