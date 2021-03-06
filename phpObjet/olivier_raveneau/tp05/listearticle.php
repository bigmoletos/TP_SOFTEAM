<?php
include 'include/nom.inc';

session_start();

function initsVarSession($path)
{
	if (empty($_SESSION['pagesvue'])) {
		$_SESSION['pagesvue'] = array();
		$dirs = glob($path, GLOB_ONLYDIR);
		foreach ($dirs as $keydir => $dirname) {
			$files = glob($path.'/*.*');
			foreach ($files as $keyfile => $filename) {
				$_SESSION['pagesvue'][$keydir][$keyfile] = 0;
			}
		}
	}
}

function listeFichiers($path, $pathkey)
{
	$files = glob($path);

	$list = '<ol type="1" start="0">';
	foreach ($files as $key => $filename) {
		if (empty($_SESSION['pagesvue']))
			$lu = ' - non lu';
		else {
			$mtime = filemtime($filename);
			$lu = $_SESSION['pagesvue'][$pathkey][$key] < $mtime ? ' - non lu' : '';
		}
		$list .= '<li><a href="tp02.php?dossier='.$pathkey.'&indice='.$key.'">'.nom($filename).'</a>'.$lu.'</li>';
	}
	$list .= '</ol>';
	
	return $list;
}

function listeRepertoires($path)
{
	$dirs = glob($path, GLOB_ONLYDIR);

	$list = '<ol type="1" start="0">';
	foreach ($dirs as $key => $dirname) {
		//$list .= '<li>'.substr($dirname, strrpos($dirname, '/')+1);
		$list .= '<li>'.nom($dirname);
		$list .= listeFichiers($dirname.'/*.*', $key);
		$list .= '</li>';
	}
	$list .= '</ol>';

	return $list;
}

initsVarSession('news/*');
$list = listeRepertoires('news/*');
$content = '<p>'.$list.'</p>';
$content .= '<p><a href="detruire_session.php">Détruire la session</a></p>';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cours PHP - Date</title>
	<meta charset="utf-8">
</head>
<body>
<?php echo $content; ?>
</body>
</html>