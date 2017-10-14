<?php
function nom($path)
{
	$pathTab= explode('/', $path);

	return $pathTab[count($pathTab)-1];
}
