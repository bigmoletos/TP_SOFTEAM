<?php
function printFiles($path, $ext)
{
	$hdir = opendir($path);

	if ($hdir) {
		while ($filename = readdir($hdir)) {
			if ($filename != '.' && $filename != '..') {
				$addr = $path.'/'.$filename;
				if (is_dir($addr)) {
					printFiles($addr, $ext);
				}
				else
					if (substr($filename, -strlen($ext)) == $ext)
						echo $filename.'<br />';
			}
		}
		closedir($hdir);

		return true;
	}

	return false;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cours PHP - printFiles</title>
	<meta charset="utf-8">
</head>
<body>
<h2>news - .news</h2>
<p>
<?php printFiles('news', '.news'); ?>
</p>
<h2>.. - .php</h2>
<p>
<?php printFiles('..', '.php'); ?>
</p>
<h2>../.. - .php</h2>
<p>
<?php printFiles('../..', '.php'); ?>
</p>
</body>
</html>