<?php
function tree($path)
{
	$tree = '';
	$hdir = opendir($path);

	if ($hdir) {
		$tree .= '<ul>';
		while ($filename = readdir($hdir)) {
			if ($filename != '.' && $filename != '..') {
				$addr = $path.'/'.$filename;
				if (is_dir($addr)) {
					$tree .= '<li>'.$filename;
					$tree .= tree($addr);
					$tree .= '</li>';
				}
				else
					$tree .= '<li><a href="'.$addr.'">'.$filename.'</a></li>';
			}
		}
		$tree .= '</ul>';
		
		closedir($hdir);
	}

	return $tree;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cours PHP - Tree</title>
	<meta charset="utf-8">
</head>
<body>
<h2>news</h2>
<p>
<?php echo tree('news'); ?>
</p>
<h2>..</h2>
<p>
<?php echo tree('..'); ?>
</p>
</body>
</html>