<?php
// si la session n'est pas déjà initialisée (auto-start), on l'initialise
spl_autoload_register(function ($class) {
		include $class.'.php';
	});
include 'entete.php';

/**
 * Simple affichage de la liste des étudiants
 */
$tabEtudiants = Etudiant::lireTousEtudiants();
?>
<h1>Liste des étudiants</h1>
<table class="table table-sm table-bordered table-condensed table-responsive">
	<thead>
		<tr>
			<th>Nom</th>
			<th>Prénom</th>
			<th>Age</th>
			<th>Diplome</th>
		</tr>
	</thead>
	<tbody>
<?php
foreach ($tabEtudiants as $unEtudiant) {
	echo ('<tr>'
		.'<td>'.$unEtudiant->nom().'</td>'
		.'<td>'.$unEtudiant->prenom().'</td>'
		.'<td>'.$unEtudiant->age().'</td>'
		.'<td>'.$unEtudiant->diplome().'</td>'
		.'</tr>');
}
?>
</table>
<?php include 'pieddepage.php';?>

