<?php
function compute($fichier, $nom, $prenom, $sex)
{
	$hFile = fopen($fichier, "r");

	$out = false;
	if ($hFile) {
		while ($line = fgets($hFile)) {
			$data = explode(';', $line);
			if ($data[0] == $nom && $data[1] == $prenom && $data[2] == $sex) {
				$out = true;
				break;
			}
		}

		fclose($hFile);
	}

	return $out;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cours PHP - compute</title>
	<meta charset="utf-8">
</head>
<body>
<h2>fichier.txt, eeee, aaa, f -> true</h2>
<p>
<?php echo compute('fichier.txt', 'eeee', 'aaa', 'h') ? 'true' : 'false'; ?>
</p>
<h2>fichier.txt, boom, aaa, f -> false</h2>
<p>
<?php echo compute('fichier.txt', 'boom', 'aaa', 'h') ? 'true' : 'false'; ?>
</p>
</body>
</html>