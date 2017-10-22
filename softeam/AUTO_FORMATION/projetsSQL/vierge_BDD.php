<!DOCTYPE html>
<html>
	<head>
		<title>travail sur Base de données PDO MyAdmin MySQL suite</title>
		
		<meta charset="utf-8"/>
	</head>	
	<body>
		
<p><br><strong>Jointure entre 2 bases</strong><br><br></p>		
		
<?php

	$serveur="localhost";
		$login="root";
		$pass="";
		
		$bdd="mabddtest2";//nom dela base de données
		$table="inscrits";//"commentaires";//nom de la table
		$table2="commentaires";
// nom des colonnes		
		$col1="id";//"nb";
		$col2="prenom";//"id_inscrit";
		$col3="nom";
		$col4="email";//"mail";
		$col5="commentaires";//"sexe";//;
		$col6="id_inscrit";//"tel portable";"numero client";
		$col7="CP";//"rue";
		$col8="ville";
		$col9="pays";
		$col10="CP";
		$col11="";
		
		
			function _jointure_BDD(){
			
			
			global$serveur,$login,$pass,$bdd,$table,$table2,$col1,$col2,$col3,$col4,$col5,$col6,$col7,$col8,$col9,$col10;	
	
					try{
						$connexion=new PDO("mysql:host=$serveur;dbname=$bdd;charset=utf8",$login,$pass);
						$connexion->setattribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
						
						
						
						
						
						
						
			}
	
	catch(PDOException $e){
		echo'Echec de la requete: '.$e->getMessage.'<br/>';
	}
}

_jointure_BDD();


?>
</body>
</html>