<?php
function listeFichiers($path)
{
	$hfiles = opendir($path);

	$list = '<ol>';
	while ($filename  = readdir($hfiles)) {
		if ($filename != '.' && $filename != '..')
			$list .= '<li><a href="'.$path.'/'.$filename.'">'.substr($filename, strrpos($filename, '/')+1).'</a></li>';
	}
	$list .= '</ol>';
	
	closedir($hfiles);

	return $list;
}
function listeRepertoires($path)
{
	$hdirs = opendir($path);

	$list = '<ul>';
	while ($dirname = readdir($hdirs)) {
		if ($dirname != '.' && $dirname != '..')
		{
			$list .= '<li>'.$dirname;
		$list .= listeFichiers($path.'/'.$dirname);
		$list .= '</li>';		
		}

	}
	$list .= '</ul>';
	
	closedir($hdirs);

	return $list;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cours PHP - Liste Article Opendir</title>
	<meta charset="utf-8">
</head>
<body>
<p>
<?php echo listeRepertoires('news'); ?>
</p>
</body>
</html>