<!DOCTYPE html>
<html>
	<head>
		<title>travail sur Base de données PDO MyAdmin MySQL suite</title>
		
		<meta charset="utf-8"/>
	</head>	
	<body>
		
<p><br><strong>Integration de 3 fonctions crea, modi et supp</strong><br><br></p>		
		
<?php

$serveur="localhost";
		$login="root";
		$pass="";
		
		$bdd="mabddtest2";//nom dela base de données
		$table="test6";//nom de la table
		
// nom des colonnes		
		$col1="id";//"nb";
		$col2="prenom";//"id_inscrit";
		$col3="nom";
		$col4="email";//"mail";
		$col5="commentaires";//"sexe";//;
		$col6="age";//"tel portable";"numero client";
		$col7="CP";//"rue";
		$col8="ville";
		$col9="pays";
		$col10="CP";
		$col11="";

echo'</br><strong>lancement de la fonction creation base de données function_creation_BDD.php</strong><br></br>';

	//_creationBDD();

echo'</br><strong>lancement de la fonction modification de  base de données function_modif_BDD.php</strong><br></br>';
	//_modif_BDD();

echo'</br><strong>lancement de la fonction suppression base de données function_supp_BDD.php</strong><br></br>';

	// _supp_BDD();
	

?>

</body>

</html>