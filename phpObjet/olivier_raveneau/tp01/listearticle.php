<?php
function listeFichiers($path)
{
	$files = glob($path);

	$list = '<ol>';
	foreach ($files as $filename) {
		$list .= '<li><a href="'.$filename.'">'.substr($filename, strrpos($filename, '/')+1).'</a></li>';
	}
	$list .= '</ol>';
	
	return $list;
}
function listeRepertoires($path)
{
	$dirs = glob($path, GLOB_ONLYDIR);

	$list = '<ul>';
	foreach ($dirs as $dirname) {
		$list .= '<li>'.substr($dirname, strrpos($dirname, '/')+1);
		$list .= listeFichiers($dirname.'/*.*');
		$list .= '</li>';
	}
	$list .= '</ul>';

	return $list;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cours PHP - Date</title>
	<meta charset="utf-8">
</head>
<body>
<p>
<?php echo listeRepertoires('news/*'); //echo listeFichiers('news/politique/*.*'); ?>
</p>
</body>
</html>