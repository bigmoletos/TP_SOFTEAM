<?php
function searchInFile($fichier, $column, $value)
{
	$hFile = fopen($fichier, "r");

	$out = false;
	if ($hFile) {
		while ($line = fgets($hFile)) {
			$data = explode(';', $line);
			if (isset($data[$column]))
			{
				if ($data[$column] == $value) {
					$out = true;
					break;
				}
			}
			else
				break;
		}

		fclose($hFile);
	}

	return $out;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cours PHP - searchInFile</title>
	<meta charset="utf-8">
</head>
<body>
<h2>fichier.txt, 0, cc -> true</h2>
<p>
<?php echo searchInFile('fichier.txt', 0, 'cc') ? 'true' : 'false'; ?>
</p>
<h2>fichier.txt, 1, boom -> false</h2>
<p>
<?php echo searchInFile('fichier.txt', 1, 'boom') ? 'true' : 'false'; ?>
</p>
<h2>fichier.txt, 5, h -> false</h2>
<p>
<?php echo searchInFile('fichier.txt', 5, 'h') ? 'true' : 'false'; ?>
</p>
</body>
</html>