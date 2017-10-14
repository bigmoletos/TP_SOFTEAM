<?php

// chargement automatique de toutes les classes du repertoire classes
//evite de faire un require ou include à chaque fois que l'on veut appeller la classe'
////function loadClass($classe){
//require 'classes/'. $classe.'.php';
//}
//spl_autoload_register('loadClass');

spl_autoload_register(function($class) {
    include 'classes/' . $class . '.php';
});
?>