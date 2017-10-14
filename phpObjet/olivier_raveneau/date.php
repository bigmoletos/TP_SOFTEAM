<!DOCTYPE html>
<html>
<head>
	<title>Cours PHP - Date</title>
	<meta charset="utf-8">
</head>
<body>
<p>
<?php
setlocale(LC_ALL, 'fr_FR');

echo date("d m Y h i s");
echo '<br />';

echo date('l jS \of F Y h:i:s A');
echo '<br />';
?>
</p>
</body>
</html>