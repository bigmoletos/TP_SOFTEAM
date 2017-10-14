<?php
require_once 'register.php';

$perso = new Personne();
$perso->setNom('John');
$perso->setAge(18);
$perso->decrirePersonne();
// affiche nom John age 18
$perso->__destruct();
// affiche l'objet n'existera plus désormais.
$perso2 = new Personne('xx', 40);

echo '<br />';

$adr = new Adresse('13003', 'Marseille', 'France');
$perso3 = new Personne('Raveneau', 'Olivier', $adr);
$perso3->decrirePersonne();

echo '<br />';

$perso4 = new Personne('Raveneau', 'Olivier', new Adresse('13003', 'Marseille', 'France'));
echo $perso4;

echo '<br />';
print_r($perso4);
