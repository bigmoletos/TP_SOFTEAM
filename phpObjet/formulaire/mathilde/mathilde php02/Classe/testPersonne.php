<?php
require_once "Personne.php";

$per = new Personne ('Mr', 'Patou', '86');
echo $per->decrirePersonne();

$per-> change('Perle', 'Bond', '007');
echo $per->decrirePersonne();
?>