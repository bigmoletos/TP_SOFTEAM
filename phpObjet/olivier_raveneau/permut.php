<!DOCTYPE html>
<html>
<head>
	<title>Cours PHP - permut</title>
	<meta charset="utf-8">
</head>
<body>
<p>
<?php
function permut(&$x, &$y)
{
	$tmp = $x;
	$x = $y;
	$y = $tmp;
}

$x = 2;
$y = 3;

permut($x, $y);

echo "x=$x, y=$y";
?>
</p>
</body>
</html>