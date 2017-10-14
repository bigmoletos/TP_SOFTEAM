<?php

// pretty output html
function tidyHTML($buffer) {
	// load our document into a DOM object
	$dom = new DOMDocument();
	// we want nice output
	$dom->preserveWhiteSpace = false;
	$dom->loadHTML($buffer);
	$dom->formatOutput = true;
	return ($dom->saveXML());
}
	$authentifie = false;
	$enseignant = null;
	if(isset($_SESSION['utilisateur_authentifie'])){
		$authentifie = true;
		$enseignant = Enseignant::lireAvecNomPrenom($_SESSION['utilisateur_authentifie'], "Enseignant");
	}
	
?>
<!DOCTYPE html>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="css/main.css" />
	<link rel="shortcut icon" href="http://formvalidator.net/img/favicon.ico" type="image-x/icon"/>
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
	  <script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js"></script>
	<![endif]-->
	<script src="vendor/bower_components/jquery/dist/jquery.js"></script>
	<script src="vendor/bower_components/bootstrap/dist/js/bootstrap.js"></script>
	<title>Portail universitaire</title>
</head>
<body>
	<header class="row panel">
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				 <!-- Title -->
		        <div class="navbar-header pull-left">
		          <a href="." class="navbar-brand">UNIVERSITE du TEMPS LIBRE</a>
		        </div>
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed"
						data-toggle="collapse" data-target=".bs-js-navbar-scrollspy">
						<span class="icon-bar"> <span class="sr-only">Toggle navigation</span>
						</span> <span class="icon-bar"></span> <span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse bs-js-navbar-scrollspy" id="menu_bar" role="navigation">
					<div class="nav navbar-nav">
						<ul class="nav pull-right">			            
				            <li class="nav pull-left"><a href="AfficheCours.php">Cours</a></li>
				            <li class="nav pull-left"><a href="AfficheEnseignants.php">Enseignants</a></li>
				            <li class="nav pull-left"><a href="AfficheEtudiants.php">Etudiants</a></li>
				        </ul>
			       </div>
			       <div class="nav navbar-nav pull-right">
						<ul class="nav">
				            <?php if($authentifie){ ?>
				            <li class="navbar-text">
				            	<strong><?php echo "Bonjour " . $enseignant->prenom() . " " . $enseignant->nom() ?></strong></li>
				            <?php } ?>
				            <li class="dropdown pull-right">
				              <a href="#" data-toggle="dropdown" style="color:#777; margin-top: 5px;" class="dropdown-toggle"><span class="glyphicon glyphicon-user"></span><b class="caret"></b></a>
				              <ul class="dropdown-menu">
				                <!--li>
				                  <a href="/users/id" title="Profil">Profil</a>
				                </li-->
				                <li>
				                	<?php 
				                		if($authentifie){
				                			echo('<a href="logout.php" title="Déconnexion">Déconnexion</a>');
				                		}
				                		else {
				                			echo('<a href="login.php" title="Connexion">Connexion</a>');
				                		}
				                	?>
				                </li>
				              </ul>
				            </li>
				         </ul>
				     </div>
				</div>
			</div>
		</nav>
	</header>