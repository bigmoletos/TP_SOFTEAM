<?php
// si la session n'est pas déjà initialisée (auto-start), on l'initialise
spl_autoload_register(function ($class) {
		include $class.'.php';
	});
include 'entete.php';

/**
 * Simple affichage de la liste des enseignants
 */
$tabEnseignants = Enseignant::lireTousEnseignants();
?>
<h1>Liste des enseignants</h1>
<table class="table table-sm table-bordered table-condensed table-responsive">
	<thead>
		<tr>
			<th>Nom</th>
			<th>Prénom</th>
			<th>Age</th>
			<th>Salaire</th>
		</tr>
	</thead>
	<tbody>
<?php
foreach ($tabEnseignants as $unEnseignant) {
	echo ('<tr><td>'.$unEnseignant->nom().'</td>'.'<td>'.$unEnseignant->prenom().'</td><td>'.$unEnseignant->age().'</td><td>'.$unEnseignant->salaire().'</td></tr>');
}
?>
</tbody>
</table>
<?php include 'pieddepage.php';?>

