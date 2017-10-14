<?php
function printFileContent($path)
{
	$hFile = fopen($path, "r");

	if ($hFile) {
		while ($line = fgets($hFile)) {
			$data = explode(';', $line);
			echo 'Bonjour '.($data[2]=='h'?'Mr ':'Mme ').$data[1].' '.$data[0].'<br />';
		}

		fclose($hFile);

		return true;
	}

	return false;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cours PHP - Fichiers</title>
	<meta charset="utf-8">
</head>
<body>
<h2>fichier.txt</h2>
<p>
<?php printFileContent('fichier.txt'); ?>
</p>
</body>
</html>