<?php
session_start();

function initsVarSession($path)
{
	if (empty($_SESSION['pagesvue'])) {
		$_SESSION['pagesvue'] = array();
		$dirs = glob($path, GLOB_ONLYDIR);
		foreach ($dirs as $keydir => $dirname) {
			$files = glob($path.'/*.*');
			foreach ($files as $keyfile => $filename) {
				$_SESSION['pagesvue'][$keydir][$keyfile] = false;
			}
		}
	}
}

initsVarSession('news/*');

$dossier = !empty($_GET['dossier']) ? intval($_GET['dossier']) : 0;
$indice = !empty($_GET['indice']) ? intval($_GET['indice']) : 0;
$_SESSION['pagesvue'][$dossier][$indice] = true;

// Dossier
$dossiers = glob('news/*', GLOB_ONLYDIR);
$nbDossiers = count($dossiers);

if ($dossier >= 0 && $dossier < $nbDossiers)
{
	$nomDossierCourant = explode('/', $dossiers[$dossier]);
	$titreDossierCourant = $nomDossierCourant[count($nomDossierCourant)-1];

	$dossierSuivant = ($dossier + 1) % $nbDossiers;
	$nomDossierSuivant = explode('/', $dossiers[$dossierSuivant]);
	$titreDossierSuivant = $nomDossierSuivant[count($nomDossierSuivant)-1];

	$dossierPrecedent = ($dossier + $nbDossiers - 1) % $nbDossiers;
	$nomDossierPrecedent = explode('/', $dossiers[$dossierPrecedent]);
	$titreDossierPrecedent = $nomDossierPrecedent[count($nomDossierPrecedent)-1];
}
else
{
	$dossier = 0;
	$indice = -1;
	$titreDossierCourant = 'Dossier inexistant';

	$dossierSuivant = 0;
	$titreDossierSuivant = "retour";
	$dossierPrecedent = 0;
	$titreDossierPrecedent = "retour";
}

// Article
$fichiers = glob($dossiers[$dossier].'/*');
$nbFichiers = count($fichiers);

//$indice = !empty($_GET['indice']) ? intval($_GET['indice']) : 0;
if ($indice >= 0 && $indice < $nbFichiers)
{
	$content = file_get_contents($fichiers[$indice]);
	$nomCourant = explode('/', $fichiers[$indice]);
	$titreCourant = $nomCourant[count($nomCourant)-1];

	$indiceSuivant = ($indice + 1) % $nbFichiers;
	$nomSuivant = explode('/', $fichiers[$indiceSuivant]);
	$titreSuivant = $nomSuivant[count($nomSuivant)-1];

	$indicePrecedent = ($indice + $nbFichiers - 1) % $nbFichiers;
	$nomPrecedent = explode('/', $fichiers[$indicePrecedent]);
	$titrePrecedent = $nomPrecedent[count($nomPrecedent)-1];
}
else
{
	$content = 'Contenu inexistant';
	$indice = 0;
	$titreCourant = 'Article inexistant';

	$indiceSuivant = 0;
	$titreSuivant = "retour";
	$indicePrecedent = 0;
	$titrePrecedent = "retour";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cours PHP - tp02</title>
	<meta charset="utf-8">
</head>
<body>
<p><a href="listearticle.php">Retour à la liste d'article</a></p>
<h2><?php echo $titreDossierCourant?></h2>
<p>
	<ul>
		<li><a href="?dossier=<?php echo $dossierPrecedent; ?>&indice=0"><?php echo $titreDossierPrecedent; ?></a></li>
		<li><a href="?dossier=<?php echo $dossierSuivant; ?>&indice=0"><?php echo $titreDossierSuivant; ?></a></li>
	</ul>
</p>
<h2><?php echo $titreCourant?></h2>
<p>
<?php
echo $content;
?>
</p>
<p>
	<ul>
		<li><a href="?dossier=<?php echo $dossier; ?>&indice=<?php echo $indicePrecedent; ?>"><?php echo $titrePrecedent; ?></a></li>
		<li><a href="?dossier=<?php echo $dossier; ?>&indice=<?php echo $indiceSuivant; ?>"><?php echo $titreSuivant; ?></a></li>
	</ul>
</p>
</body>
</html>