<?php
//autoload le chargement des fichiers des classes
spl_autoload_register(function($class){
	include $class . '.php';
});

