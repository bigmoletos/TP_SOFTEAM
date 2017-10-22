<!DOCTYPE html>
<html>
	<head>
		<title>function pour creer une base de données SQL</title>
		<meta charset="utf-8"/>
	</head>	
	<body>
		
<p><br><strong>creation base et données  </strong><br><br></p>		
		
<?php

		$serveur="localhost";
		$login="root";
		$pass="";
		
		$bdd="mabddtest2";//nom dela base de données
		$table="inscrits";//"commentaires";//nom de la table
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
		
		// define("serveur","localhost");
		// define("login","root");
		// define("pass","");
		
		// define("bdd","mabddtest2");//nom dela base de données
		// define("table","test3");//nom de la table
// nom des colonnes		
		// define("col1","id");//"nb";
		// define("col2","prenom");//"id_inscrit";
		// define("col3","nom");
		// define("col4","email");//"mail";
		// define("col5","commentaires");//"sexe";//;
		// define("col6","age");//"tel portable";"numero client";
		// define("col7","CP");//"rue";
		// define("col8","ville");
		// define("col8","pays");
		// define("col9","CP");
		// define("col10","");
		
		
		//define("NOMBRE1",4);
	// function _creationBDD($serveur,$login,$pass,$bdd,$table,$col1,$col2,$col3,$col4,$col5){
	// function _creationBDD($GLOBALS['serveur'],$GLOBALS['login'],$GLOBALS['pass'],$GLOBALS['bdd'],$GLOBALS['table'],$GLOBALS['col1'],$GLOBALS['col2'],$GLOBALS['col3'],$GLOBALS['col4'],$GLOBALS['col5']){
	 // $GLOBALS['b'] = $GLOBALS['a'] + $GLOBALS['b'];
	 
	 function _creationBDD(){
	global $serveur,$login,$pass,$bdd,$table,$col1,$col2,$col3,$col4,$col5,$col6,$col7,$col8,$col9,$col10;	
	//global permet d'utiliser des varialbles globales en local
	//echo $serveur,$login,$pass,$bdd,$table,$col1,$col2,$col3,$col4,$col5;
	
	
			try{
				$connexion=new PDO("mysql:host=$serveur;dbname=$bdd",$login,$pass);
				
					$connexion->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//permet de lire les erreurs
				
		///////////////////////////////////////////////////////////////////////
		// pour creer une nouvelle base on retire le nom de base 
		// !!!!    il y a bien un ;apres serveur, ne pas mettre d'espace dans le $col3 du serveur
		// PDO(nom serveur;nom de la BDD,login,mot de passe)
		// afin de verifier qu'il n'y a pas de probleme de connexion et evitera que des informations 
		// sensibles soient divlguées
		// on va refaire une verification avec un TRY et CATCH de controle d'erreur
			
		// ordre en SQL avec la methode exec qui permet d'envoyer des instructions en SQL au MySQL
		// par convention on ecrit en Maj dans SQL		
		// respecter l'ordre de la base de donnée pour les tables, pour cela on peut aller voir dans 
		// myAdmin pour verifier l'ordre
		// pour plus de lisibilité on passe par une variable pour inserer le code SQL.			

				
		///////////////////////////////			
			// echo'<strong>on commence par créer de la table  </strong>';		
		/////////////////////////	
		 echo'</br><strong>création table  avec 4 colonnes</strong></br>';		
		////////////////////////////	
				// $codesql="CREATE TABLE $table(
				// $col1 INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				// $col2 VARCHAR(50),
				// $col3 VARCHAR(50),
				// $col4 VARCHAR(50)
				// )";
				
				// $connexion->exec($codesql);
				
				// echo 'table de la base de données créée ';

		/////////////////////////	
		 echo'</br><strong>création  table  avec 5 colonnes</strong></br>';		
		////////////////////////////		
			
			$codesql="CREATE TABLE $table(
				$col1 INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				$col2 VARCHAR(50),
				$col3 VARCHAR(50),
				$col4 VARCHAR(50),
				$col5 TEXT
				)";
					
				$connexion->exec($codesql);
				echo 'table de la base de données créée ';
					
				
		///////////////////////////////			
			echo'</br><strong>création  table avec 10 entrées sur 3 colonnes </strong></br>';		
		///////////////////////////

				// $insertionSQL="INSERT INTO $table($col2,$col3,$col4)
				// VALUES
				// ('muriel','desmedt','muriel@free.fr'),
				// ('sebastian','Desmedt','seb@free.fr'),
				// ('henry','Gettot','gettot@free.fr'),
				// ('sylvie','henriet','henriet@free.fr'),
				// ('sylvie','henriet','henriet@free.fr'),
				// ('Francois','dechamps','deschamps@free.fr'),
				// ('lucille','Desmedt','lulu@free.fr'),
				// ('amelie','orpo','orpo@free.fr'),
				// ('fanfan','Tulip','futip@free.fr')
				 // ";
				 // $connexion->exec($insertionSQL);
				 // echo 'table de la base de données créée ';
		///////////////////
echo'</br><strong>création table avec 15 entrées sur 4 colonnes </strong></br>';	
		///////////////////////
				// $insertionSQL="INSERT INTO $table($col2,$col3,$col4,$col5)
				// VALUES
				// ('Desmedt','muriel','muriel@free.fr','à bientot'),
				// ('Desmedt','franck','telfd@free.fr','c\'est cool'),
				// ('Desmedt','sebastian','seb@free.fr','j\'ai pas compris les jonctions, c\'est quoi?'),
				// ('Desmedt','franck','telfd@free.fr','une incteraction entre 2 bases'),
				// ('Gettot','henry','gettot@free.fr','super cetait génial'),
				// ('Desmedt','franck','telfd@free.fr','de rien'),
				// ('henriet','sylvie','henriet@free.fr','je n\'ai pas aimé, mais on ne peux pas plaire à tout le monde'),
				// ('Desmedt','franck','telfd@free.fr','c\'est vrai'),
				// ('henriet','sylvie','henriet@free.fr','c\'est peut-etre moi qui ai un pb'),
				// ('Desmedt','franck','telfd@free.fr','sans rancune'),
				// ('dechamps','Francois' ,'deschamps@free.fr','vraiment c\'est top'),
				// ('Desmedt','franck','telfd@free.fr','merci pour ce retour'),
				// ('Desmedt','franck','telfd@free.fr','super ton pseudo'),
				// ('Desmedt','lucille','lulu@free.fr','j\'aime bien aussi le tuto2'),
				// ('Desmedt','franck','telfd@free.fr','au plaisir')
				// ";
				// $connexion->exec($insertionSQL);
				// echo 'table de la base de données créée ';
		///////////////////
echo'</br><strong>création  table avec 10 entrées sur 4 colonnes </strong></br>';	
		///////////////////////		///////////////////////
				// $insertionSQL="INSERT INTO $table($col2,$col3,$col4,$col5)
				// VALUES
				// ('muriel','Desmedt','muriel@free.fr','à bientot'),
				// ('franck','Desmedt','telfd@free.fr','c\'est cool'),
				// ('sebastian','Desmedt','seb@free.fr','j\'ai pas compris les jonctions, c\'est quoi?'),
				// ('franck','Desmedt','telfd@free.fr','une incteraction entre 2 bases'),
				// ('henry','Gettot','gettot@free.fr','super c\était génial'),
				// ('franck','Desmedt','telfd@free.fr','de rien'),
				// ('sylvie','henriet','henriet@free.fr','je n\'ai pas aimé, mais on ne peux pas plaire à tout le monde'),
				// ('franck','Desmedt','telfd@free.fr','c\'est vrai'),
				// ('sylvie','henriet','henriet@free.fr','c\'est peut-être moi qui ai un pb'),
				// ('franck','Desmedt','telfd@free.fr','sans rancune'),
				// ('Francois' ,'dechamps','deschamps@free.fr','vraiment c\'est top'),
				// ('franck','Desmedt','telfd@free.fr','merci pour ce retour'),
				// ('franck','Desmedt','telfd@free.fr','super ton pseudo'),
				// ('lucille','Desmedt','lulu@free.fr','j\'aime bien aussi le tuto2'),
				// ('franck','Desmedt','telfd@free.fr','au plaisir')
				// ";
				// $connexion->exec($insertionSQL);
				// echo 'table de la base de données créée ';
				
		///////////////////
echo'</br><strong>création  table avec 10 entrées sur 4 colonnes </strong></br>';	
		///////////////////////		///////////////////////
					
				
	// $insertionSQL="INSERT INTO $table($col2,$col3,$col4,$col5)
				// VALUES
				// ('Desmedt','muriel','muriel@free.fr','à bientot'),
				// ('Desmedt','franck','telfd@free.fr','c\'est cool'),
				// ('Desmedt','sebastian','seb@free.fr','j\'ai pas compris les jonctions, c\'est quoi?'),
				// ('Desmedt','franck','telfd@free.fr','une incteraction entre 2 bases'),
				// ('Gettot','henry','gettot@free.fr','super cetait génial'),
				// ('Desmedt','franck','telfd@free.fr','de rien'),
				// ('henriet','sylvie','henriet@free.fr','je n\'ai pas aimé, mais on ne peux pas plaire à tout le monde'),
				// ('Desmedt','franck','telfd@free.fr','c\'est vrai'),
				// ('henriet','sylvie','henriet@free.fr','c\'est peut-etre moi qui ai un pb'),
				// ('Desmedt','franck','telfd@free.fr','sans rancune'),
				// ('dechamps','Francois' ,'deschamps@free.fr','vraiment c\'est top'),
				// ('Desmedt','franck','telfd@free.fr','merci pour ce retour'),
				// ('Desmedt','franck','telfd@free.fr','super ton pseudo'),
				// ('Desmedt','lucille','lulu@free.fr','j\'aime bien aussi le tuto2'),
				// ('Desmedt','franck','telfd@free.fr','au plaisir')
				// ";
				
				$connexion->exec($insertionSQL);
				echo 'table de la base de données créée ';			
				
				
				echo '</br>valeurs multiples insérées dans la base de données créée </br>';
					
				
			
				// respecter l'ordre de la base de donnée pour les tables, pour cela on peut aller voir dans myAdmin pour verifier l'ordre
				// pour plus de lisibilité on passe par une variable pour inserer le code SQL.		
				// ordre en SQL avec la methode exec qui permet d'envoyer des instructions en SQL au MySQL
				// par convention on ecrit en Maj dans SQL
				
					
		////////////////////////////////////////			
				}

				catch(PDOException $e){
				echo'</br>Echec de la base de donnée </br>'.$e->$getMessage();
			
				}
	
	
	
}


			_creationBDD();
?>


</body>
