<?php
include 'include/nom.inc';

session_start();

function initsVarSession($path)
{
	if (empty($_SESSION['pagesvue'])) {
		$_SESSION['pagesvue'] = array();
		$dirs = glob($path, GLOB_ONLYDIR);
		foreach ($dirs as $keydir => $dirname) {
			$files = glob($path.'/*.*');
			foreach ($files as $keyfile => $filename) {
				$_SESSION['pagesvue'][$keydir][$keyfile] = 0;
			}
		}
	}
}

initsVarSession('news/*');

$dossier = !empty($_GET['dossier']) ? intval($_GET['dossier']) : 0;
$indice = !empty($_GET['indice']) ? intval($_GET['indice']) : 0;
$_SESSION['pagesvue'][$dossier][$indice] = strtotime('now');

// Dossier
$dossiers = glob('news/*', GLOB_ONLYDIR);
$nbDossiers = count($dossiers);

if ($dossier >= 0 && $dossier < $nbDossiers)
{
	$titreDossierCourant = nom($dossiers[$dossier]);

	$dossierSuivant = ($dossier + 1) % $nbDossiers;
	$titreDossierSuivant = nom($dossiers[$dossierSuivant]);

	$dossierPrecedent = ($dossier + $nbDossiers - 1) % $nbDossiers;
	$titreDossierPrecedent = nom($dossiers[$dossierPrecedent]);
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

if ($indice >= 0 && $indice < $nbFichiers)
{
	$article = '';
	$data = file($fichiers[$indice]);
	foreach ($data as $key => $value) {
		if ($key == 0)
			$titre = $value;
		if ($key == 1)
			$auteur = $value;
		if ($key >= 2)
			$article .= $value;
	}
	$content = '<h2>'.$titre.'</h2>';
	$content .= '<h4>'.$auteur.'</h4>';
	$content .= $article;

	$titreCourant = nom($fichiers[$indice]);

	$indiceSuivant = ($indice + 1) % $nbFichiers;
	$titreSuivant = nom($fichiers[$indiceSuivant]);

	$indicePrecedent = ($indice + $nbFichiers - 1) % $nbFichiers;
	$titrePrecedent = nom($fichiers[$indicePrecedent]);
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
<div>
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
	<ul>
		<li><a href="?dossier=<?php echo $dossier; ?>&indice=<?php echo $indicePrecedent; ?>"><?php echo $titrePrecedent; ?></a></li>
		<li><a href="?dossier=<?php echo $dossier; ?>&indice=<?php echo $indiceSuivant; ?>"><?php echo $titreSuivant; ?></a></li>
	</ul>
</p>
</div>
<div>
<?php
echo $content;
?>
</div>
</body>
</html>