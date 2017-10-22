<!DOCTYPE html>
<html>
	<head>
		<title>Suppression de données Base de données PDO MyAdmin MySQL suite</title>
		
		<meta charset="utf-8"/>
	</head>	
	<body>
		
<p><br><strong>Suppression de données dans une base de donnée existante </strong><br><br></p>		
		
<?php
		$serveur="localhost";
		$login="root";
		$pass="";
		
		$bdd="mabddtest2";//nom dela base de données
		$table="inscrits";//"commentaires";//"inscrits";//nom de la table
		
// nom des colonnes		
		$col1="id";//"nb";
		$col2="prenom";//"id_inscrit";
		$col3="nom";
		$col4="email";//"mail";
		$col5="sexe";//"commentaires";
		$col6="age";//"tel portable";"numero client";
		$col7="rue";//"CP";
		$col8="ville";
		$col8="pays";
		$col9="CP";
		$col10="";
		
 function _supp_BDD(){
	global $serveur,$login,$pass,$bdd,$table,$col1,$col2,$col3,$col4,$col5,$col6,$col7,$col8,$col9,$col10;			
		
		try{
			$connexion=new PDO("mysql:host=$serveur;dbname=$bdd",$login,$pass);
			$connexion->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
			
		
///////////////////////////////			
	echo'<strong>suppression d\'une ligne </strong>';		
///////////////////////////////
// delete FROM va effacer des données de maniére définitive
// va supprimer un seule ligne ou donnée
			
			// $suppr="DELETE FROM $table WHERE $col1=1";
			// $requete=$connexion->prepare($suppr);
			// $requete->execute();
			
	///////////////////////////////			
	echo'<strong>suppression d\'une colonne </strong>';		
///////////////////////////////		
// pour supprimer la colonne CP

			// $suppr="ALTER TABLE $table DROP $col4 ";
			// $requete=$connexion->prepare($suppr);
			// $requete->execute();
			
///////////////////////////////			
	echo'<strong>suppression d\'une table entiere </strong>';		
///////////////////////////////		
	// pour supprimer la table complete
	
			$suppr="DROP TABLE $table";
			
			$requete=$connexion->prepare($suppr);
			$requete->execute();
			
			echo'Information de la BDD mis a jour';
		}

		catch(PDOException $e){
		echo'Echec de la base de donnée '.$e->$getMessage();
	
		}

 }	
	_supp_BDD();	
		?>
		
		
		
		
		
		
		</body>
		</html>
		