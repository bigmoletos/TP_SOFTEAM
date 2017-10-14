<!DOCTYPE html>
<html>
<head>
	<title>Cours PHP - Table de multiplication</title>
	<meta charset="utf-8">
</head>
<body>
<p>
<?php
function table($n)
{
	$table = "";
	for ($i=1; $i<=10; $i++)
	{
		//$table .= $n.' x '.$i.' = '.($n*$i).'<br />';
		$table .= sprintf("%02d x %02d = %02d<br />", $n, $i, $n*$i);
	}

	return $table;
}

function nTables($n)
{
	$tables = "";
	for ($i=1; $i<=$n; $i++)
	{
		$tables .= 'Table de '.$i.' : <br />';
		$tables .= table($i);
		$tables .= '<br />';
	}

	return $tables;
}

$out = nTables(5);

echo $out;
?>
</p>
</body>
</html>