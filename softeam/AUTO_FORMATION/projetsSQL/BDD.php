<!DOCTYPE html>
<html>
	<head>
		<title>Base de données PDO MyAdmin MySQL</title>
		
		<meta charset="utf-8"/>
	</head>	
	<body>
		
<p><br><strong>acces à une base de donnée existante </strong><br><br></p>		
		
<?php

		$serveur="localhost";
		$login="root";
		$pass="";
		
		try{
		
		$connexion=new PDO("mysql:host=$serveur;dbname=mabddtest",$login,$pass);
//!!!!    il y a bien un ;apres serveur, ne pas mettre d'espace dans le nom du serveur
// PDO(nom serveur;nom de la BDD,login,mot de passe)
//afin de verifier qu'il n'y a pas de probleme de connexion et evitera que des informations sensibles soient divlguées
// on va refaire une verification avec un TRY et CATCH de controle d'erreur
		$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		echo 'connexion à la base de données réussie';

		}

		catch(PDOException $e){
			
			echo'Echec de la connexion: '.$e->getMessage();
		}





?>
<p><br><strong>acces à une base de donnée existante </strong><br><br></p>	

<?php

$serveur="localhost";
		$login="root";
		$pass="";
		
		try{
		
		$connexion=new PDO("mysql:host=$serveur",$login,$pass);
		//pour creer un e nouvelle base on retire le nom de base 
//!!!!    il y a bien un ;apres serveur, ne pas mettre d'espace dans le nom du serveur
// PDO(nom serveur;nom de la BDD,login,mot de passe)
//afin de verifier qu'il n'y a pas de probleme de connexion et evitera que des informations sensibles soient divlguées
// on va refaire une verification avec un TRY et CATCH de controle d'erreur
		$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		//permet de lire les erreurs
		$connexion->exec("CREATE DATABASE MaBDDTest2");
		//ordre en SQL avec la methode exec qui permet d'envoyer des instructions en SQL au MySQL
		//par convention on ecrit en Maj dans SQL
		echo 'base de données créée ';

		}

		catch(PDOException $e){
			
			echo'Echec de la connexion: '.$e->getMessage();
		}


//////////////////////////////////////////////////////
				echo '<br/><strong>creation des tables dans notre nouvelle base de donnée</strong><br/>';
//////////////////////////////////////////////////////

		$serveur="localhost";
		$login="root";
		$pass="";
						
	try{
		
		$connexion=new PDO("mysql:host=$serveur;dbname=MaBDDTest2",$login,$pass);
		//pour creer un e nouvelle base on retire le nom de base 
//!!!!    il y a bien un ;apres serveur, ne pas mettre d'espace dans le nom du serveur
// PDO(nom serveur;nom de la BDD,login,mot de passe)
//afin de verifier qu'il n'y a pas de probleme de connexion et evitera que des informations sensibles soient divlguées
// on va refaire une verification avec un TRY et CATCH de controle d'erreur
		$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		//permet de lire les erreurs
		$codesql="CREATE TABLE Visiteurs(
		id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		nom VARCHAR(50),
		prenom VARCHAR(50),
		email VARCHAR(50)		
		)";
		//respecter l'ordre de la base de donnée pour les tables, pour cela on peut aller voir dans myAdmin pour verifier l'ordre
		//pour plus de lisibilité on passe par une variable pour inserer le code SQL.		
		$connexion->exec($codesql);
		//ordre en SQL avec la methode exec qui permet d'envoyer des instructions en SQL au MySQL
		//par convention on ecrit en Maj dans SQL
		echo 'table de la base de données créée ';

		}

		catch(PDOException $e){
			
			echo'Echec de la connexion: '.$e->getMessage();
		}


///////////////////////////////////////////////
echo '<br/><strong>inserer des données dans notre nouvelle base de donnée</strong><br/>';
/////////////////////////////////////////////



		$serveur="localhost";
		$login="root";
		$pass="";
						
	try{
		
		$connexion=new PDO("mysql:host=$serveur;dbname=MaBDDTest2",$login,$pass);
		//pour creer un e nouvelle base on retire le nom de base 
//!!!!    il y a bien un ;apres serveur, ne pas mettre d'espace dans le nom du serveur
// PDO(nom serveur;nom de la BDD,login,mot de passe)
//afin de verifier qu'il n'y a pas de probleme de connexion et evitera que des informations sensibles soient divlguées
// on va refaire une verification avec un TRY et CATCH de controle d'erreur
		$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//permet de lire les erreurs
		
		$insertionSQL="INSERT INTO Visiteurs(nom, prenom,email)
		VALUES('Desmedt','muriel','muriel@free.fr'),
		('Desmedt','franck','telfd@free.fr'),
		('Desmedt','sebastian','seb@free.fr'),
		('Desmedt','lucille','lulu@free.fr')
		";
		
			//	VALUES('Desmedt','sebastian','seb@free.fr')
		
		//respecter l'ordre de la base de donnée pour les tables, pour cela on peut aller voir dans myAdmin pour verifier l'ordre
		//pour plus de lisibilité on passe par une variable pour inserer le code SQL.		
		$connexion->exec($insertionSQL);
		//ordre en SQL avec la methode exec qui permet d'envoyer des instructions en SQL au MySQL
		//par convention on ecrit en Maj dans SQL
		echo 'valeurs multiples insérées dans la base de données créée ';

		}

		catch(PDOException $e){
			
			echo'Echec de la connexion à la base de donnée : '.$e->getMessage();
		}


//////////////////////////////////////////////////////////////
echo '<br/><strong>inserer des données dans notre nouvelle base de donnée de maniére automatique avec des variables</strong><br/>';
//////////////////////////////////////////////////////////////


//ne jamais faire confiance aux données entrées par les utilisateurs, pour cela il faut faire un 
// controle des informations

		$serveur="localhost";
		$login="root";
		$pass="";
		
		$nom="bim',bam','boum'),('pif','paf','pouf'),('a";//si un utilisateur entre ce type de code il 
// va forcer la base à inserer 3 nouvelles lignes avec comme entrées 
								// ('bim',bam','boum'),
								// ('pif','paf','pouf'),
								// ('a','ddd','eee')
		$prenom="ddd";
		$email="eee";
		
		
		// $nom="";
		// $prenom="";
		// $email="";
						
	try{
		
		$connexion=new PDO("mysql:host=$serveur;dbname=MaBDDTest2",$login,$pass);
		//pour creer un e nouvelle base on retire le nom de base 
//!!!!    il y a bien un ;apres serveur, ne pas mettre d'espace dans le nom du serveur
// PDO(nom serveur;nom de la BDD,login,mot de passe)
//afin de verifier qu'il n'y a pas de probleme de connexion et evitera que des informations sensibles soient divlguées
// on va refaire une verification avec un TRY et CATCH de controle d'erreur
		$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//permet de lire les erreurs
		
		$insertionSQL="INSERT INTO Visiteurs(nom, prenom,email)
		VALUES('$nom','$prenom','$email')
		";
		
			//	VALUES('Desmedt','sebastian','seb@free.fr')
		
		//respecter l'ordre de la base de donnée pour les tables, pour cela on peut aller voir dans myAdmin pour verifier l'ordre
		//pour plus de lisibilité on passe par une variable pour inserer le code SQL.		
		
		$connexion->exec($insertionSQL);
		//ordre en SQL avec la methode exec qui permet d'envoyer des instructions en SQL au MySQL
		//par convention on ecrit en Maj dans SQL
		echo 'insertion de valeurs automatiquement avec des variables dans  la base de données créée ';

		}

		catch(PDOException $e){
			
			echo'Echec de la connexion à la base de donnée : '.$e->getMessage();

		}

		
		
		
		
//afin d'éviter que quelqu'un de mal intentioné ne fasse une injection de code SQL qui pourrait 
// voler les données, mot de passe, login, voir supprimer la base de données, il faut faire une 
// requete afin d'etre certain que les données entrées par un utilisateur ne sont pas malignes

//on va preformater les requétes évitant une grande partie des problémes d'injection,
 // permet aussi d'avoir des requetes beaucoup plus rapides. 
// Cela se fait en 3 phases:
		// la preparation, 
				// avec un template, qui est comme un maquette de la requete SQL, 
				// en laissant certains paramétres sans valeur.
		// la compilation
					// la base  donnée va analyser, compiler et optimiser le template de  requete SQL
					// elle va ensuite stocker des valeurs sans les executer.
		// l'execution
					// on va donner des valeurs aux parametres et enfin d'executer la requete.
					
// avec PDO on va utiliser "bindParam" pour lier une variable PHP à un marqeur nommé
// efin pour preparer et executer on va utiliser PREPARE ET EXCECUTE à la place de notre EXEC




////////////////////////////////////////
echo '<br/><strong>preparation de la requete</strong><br/>';
///////////////////////////////////////////


//ON VA RENTRER via des marqeurs qui feront tampon entre les variables et la requete.
// on met toute la requete dans le bloc try

		$serveur = 'localhost';
		$serveur="localhost";
		$login="root";
		$pass="";
		
		
		$nom="conrad";
		$prenom="bertrand";
		$email="conrad@free.fr";
						
	try{
		
		$connexion=new PDO("mysql:host=$serveur;dbname=MaBDDTest2",$login,$pass);
		//pour creer un e nouvelle base on retire le nom de base 
//!!!!    il y a bien un ;apres serveur, ne pas mettre d'espace dans le nom du serveur
// PDO(nom serveur;nom de la BDD,login,mot de passe)
//afin de verifier qu'il n'y a pas de probleme de connexion et evitera que des informations sensibles soient divlguées
// on va refaire une verification avec un TRY et CATCH de controle d'erreur

	
		$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//permet de lire les erreurs
		
		$requete=$connexion->prepare(	
		"INSERT INTO Visiteurs(nom, prenom,email) 
		VALUES(:nom,:prenom,:email)");
		//ici on utilise des marqeurs à la place des variables, pour cela il suffit de mettre:devant le nom de la donnée
	
		$requete->bindParam(':nom',$nom);//bindParam permet de lier un marquer à une vairable
		$requete->bindParam(':prenom',$prenom);
		$requete->bindParam(':email',$email);	
		// nos marqeursr sont maintenant lié à nos variables
		$requete->execute();
		
				
		//respecter l'ordre de la base de donnée pour les tables, pour cela on peut aller voir dans myAdmin pour verifier l'ordre
		//pour plus de lisibilité on passe par une variable pour inserer le code SQL.		
		
		// $connexion->exec($insertionSQL);
		//ordre en SQL avec la methode exec qui permet d'envoyer des instructions en SQL au MySQL
		//par convention on ecrit en Maj dans SQL
		echo 'preparation de la requete ';

		}

		catch(PDOException $e){
			
			echo'Echec de la connexion à la base de donnée : '.$e->getMessage();

		}

///////////////////////////////////
echo '<br/><strong>recuperation de données sans tri dans une base de donnée</strong><br/>';
//////////////////////////////////

// on va utliser une requete de type select

$serveur = 'localhost';
		$serveur="localhost";
		$login="root";
		$pass="";
		
		
		// $nom="conrad";
		// $prenom="bertrand";
		// $email="conrad@free.fr";
						
	try{
		
		$connexion=new PDO("mysql:host=$serveur;dbname=MaBDDTest2",$login,$pass);
		//pour creer un e nouvelle base on retire le nom de base 
//!!!!    il y a bien un ;apres serveur, ne pas mettre d'espace dans le nom du serveur
// PDO(nom serveur;nom de la BDD,login,mot de passe)
//afin de verifier qu'il n'y a pas de probleme de connexion et evitera que des informations sensibles soient divlguées
// on va refaire une verification avec un TRY et CATCH de controle d'erreur

	
		$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//permet de lire les erreurs
		
		$requete=$connexion->prepare("	
		SELECT*FROM Visiteurs");
		//ici on utilise des marqeurs à la place des variables, pour cela il suffit de mettre:devant le nom de la donnée
	
			
		// nos marqeursr sont maintenant lié à nos variables
		$requete->execute();
		//pour afficher les resultats o le fait en 2 temps avec fetchall puis avec
		
		$resultat=$requete->fetchall();
		echo'<pre>';
		print_r($resultat);
		echo'</pre>';
		//respecter l'ordre de la base de donnée pour les tables, pour cela on peut aller voir dans myAdmin pour verifier l'ordre
		//pour plus de lisibilité on passe par une variable pour inserer le code SQL.		
		
		// $connexion->exec($insertionSQL);
		//ordre en SQL avec la methode exec qui permet d'envoyer des instructions en SQL au MySQL
		//par convention on ecrit en Maj dans SQL
		echo 'importation de la base ';

		}

		catch(PDOException $e){
			
			echo'Echec de la connexion à la base de donnée : '.$e->getMessage();

		}


//on peut aussi choisir des critere de selectin pour ne pas importer forcement toutes les infos.
// les critéres de selections  sont: where or and limit underbit
// on va creer 2 nouvelles colonnes dans notre base de donnée, on peut le faire via mySQL ou vai le PHP
		
////////////////////////////////////		
echo '<br/><strong>insertion de 2 nouvelles colonnes dans la base de données</strong><br/>';
/////////////////////////////////////



////////////////////////////////
// essai 1 pour savoir si un e colonne existe
		// $serveur = 'localhost';
		// $serveur="localhost";
		// $login="root";
		// $pass="";
		
		
						
	// try{
		
		// $connexion=new PDO("mysql:host=$serveur;dbname=MaBDDTest2",$login,$pass);
		// $connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

				// $requete="CREATE OR REPLACE PROCEDURE PR_ADD_COL(v_table_name in varchar2, v_col_name in varchar2, v_type in varchar2, v_type_size in number default null)
				// IS
				   // v_count   NUMBER;
				   // v_order   varchar2(255);
				// BEGIN
				   // SELECT	 COUNT ( * )
				   // INTO	 v_count
				   // FROM	 user_tab_columns
				   // WHERE	 table_name = upper(v_table_name) AND column_name = upper(v_col_name);
				 
				  // IF v_count = 0 THEN
					  // v_order := 'ALTER TABLE ' || v_table_name || ' ADD ' || v_col_name || ' ' || v_type;
					  // IF v_type_size is not null then
						  // v_order := v_order || '(' || v_type_size || ')';
					  // END IF;
					  // DBMS_OUTPUT.put_line ('Exécution :' || v_order);
					  // EXECUTE IMMEDIATE v_order;
				  // ELSE
					  // DBMS_OUTPUT.put_line ('Colonne existe déja');
				  // END IF;
				// END;
				// /
				 // "
		// $connexion->execute pr_add_col('MA_TABLE', 'MA_COLONNE', 'char', 1);


//////////////////////////////////
// essai2 pour savoir si une colonne existe

					// DECLARE @table varchar(128) , @column varchar(128)
					 
					// SET @table='TOTO'
					// SET @column='NEWCOLUMN'
					 
					 
					// IF EXISTS (SELECT NULL FROM INFORMATION_SCHEMA.COLUMNS
											// WHERE COLUMN_NAME=@column
											// AND TABLE_NAME=@table)
					// BEGIN
						// SELECT 'THE COLUMN '+@column+' EXISTS IN THE TABLE '+@table
					// END

///////////////////////////////////


//////////////////////////////////////
// essai3 pour savoir si une colonne existe

					// if exists(select * from sys.columns 
						// where Name = N'$colonne1' and Object_ID = Object_ID(N'Visiteurs'))
						// begin
						// -- La colonne existe
						// end
// Une autre solution plus courte consiste à utiliser la fonction COL_LENGTH. Cette fonction 
// retourne la longueur d'une colonne. Si la colonne n'existe pas ou que vous ne pouvez pas 
// voir la table contenant la colonne, cette méthode retournera le résultat NULL.
				
				// IF COL_LENGTH('Visiteurs','$colonne1') IS NULL
				// BEGIN
				// /*La colonne n'existe pas ou vous ne possédez pas les droits pour voir la table*/
				// END

////////////////////////////////////////
		$serveur = 'localhost';
		$serveur="localhost";
		$login="root";
		$pass="";
		$colonne1="ll";
		$colonne2="nnnn";
		$colonne3="ssss";
						
	try{
		
		$connexion=new PDO("mysql:host=$serveur;dbname=MaBDDTest2",$login,$pass);

	
		$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//permet de lire les erreurs
		//IF COL_LENGTH('Visiteurs',$colonne1) IS NOT NULL
								
		$requete="ALTER TABLE Visiteurs ADD cp INT(100) NULL";
		// $requete="ALTER TABLE Visiteurs ADD (
		// $colonne1 TEXT(1000),
		// $colonne2 DATE,
		// $colonne3 INT(10)
		// ) ";
		//pour inserer plusieurs colonnes en meme temps
		$requete="ALTER TABLE Visiteurs ADD $colonne1 VARCHAR(10) ";
		//on insere dans la table Visiteurs la colonne sexe de type VARCHAR,(texte court) et de longeur 10
		
		//ici on utilise des marqeurs à la place des variables, pour cela il suffit de mettre:devant le nom de la donnée
	// END
		$connexion->exec($requete);
		// nos marqeursr sont maintenant lié à nos variables
		// $requete->execute();
		//pour afficher les resultats o le fait en 2 temps avec fetchall puis avec
		
		// $resultat=$requete->fetchall();
		// echo'<pre>';
		// print_r($resultat);
		// echo'</pre>';
		//respecter l'ordre de la base de donnée pour les tables, pour cela on peut aller voir dans myAdmin pour verifier l'ordre
		//pour plus de lisibilité on passe par une variable pour inserer le code SQL.		
		
		// $connexion->exec($insertionSQL);
		//ordre en SQL avec la methode exec qui permet d'envoyer des instructions en SQL au MySQL
		//par convention on ecrit en Maj dans SQL
		echo 'insertion de nouvelles colonnes dans la base de donnée';
		}

		catch(PDOException $e){
			
			echo'Echec de la connexion à la base de donnée : '.$e->getMessage();

		}


///////////////////////////////////////
echo '<br/><strong>selection de données dans une table</strong><br/>';

//////////////////////////////////////
	
		$serveur="localhost";
		$login="root";
		$pass="";
		
		
						
	try{
		
		$connexion=new PDO("mysql:host=$serveur;dbname=MaBDDTest2",$login,$pass);
		// PDO(nom serveur;nom de la BDD,login,mot de passe)
		//afin de verifier qu'il n'y a pas de probleme de connexion et evitera que des informations sensibles soient divlguées
		// on va refaire une verification avec un TRY et CATCH de controle d'erreur
		$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//permet de lire les erreurs
		
		$requete1=$connexion->prepare(
		// "SELECT prenom FROM Visiteurs "
		// "SELECT prenom FROM Visiteurs WHERE sexe='H' AND age<25"
		// "SELECT prenom FROM Visiteurs ORDER BY age"
		//dans l'ordre croissant par age
		// "SELECT prenom FROM Visiteurs ORDER BY age DESC"
		//dans l'ordre decroissant par age
		// "SELECT prenom FROM Visiteurs LIMIT 0,3"
		//ne sort que 3 entrées à partir du début
		// "SELECT prenom FROM Visiteurs LIMIT 2,5"
		//ne sort que 5 entrées à partir de la ligne 2
		"SELECT prenom FROM Visiteurs ORDER BY age DESC LIMIT 1,3"
		//va chercher dans la colonne des prenoms de la table visiteurs trié par age et on ne prend que 3 entrées à partie de la premiere
		);
		$requete1->execute();
		$resultat=$requete1->fetchall();
		
		echo'<pre>';
		print_r($resultat);
		echo'</pre>';
		
		
		$connexion->exec($requete);
		
		// $requete->execute();
	
		// $connexion->exec($insertionSQL);
	echo'	insertion de nouvelles colonnes dans la base de donnée';
		}

		catch(PDOException $e){
			
			echo'Echec de la connexion à la base de donnée : '.$e->getMessage();

		}


//////////////////////////
echo'	<br/><strong>recuperation de données d\'une base de donnée<br/></strong>';
//////////////////////////


	
		$serveur="localhost";
		$login="root";
		$pass="";
		
		
						
	try{
		
		$connexion=new PDO("mysql:host=$serveur;dbname=MaBDDTest2",$login,$pass);
		// PDO(nom serveur;nom de la BDD,login,mot de passe)
		//afin de verifier qu'il n'y a pas de probleme de connexion et evitera que des informations sensibles soient divlguées
		// on va refaire une verification avec un TRY et CATCH de controle d'erreur
		$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//permet de lire les erreurs
		
		$requete1=$connexion->prepare("
		SELECT * FROM Visiteurs"
		);
		//va tout selectionner dans la table visiteurs avec* FROM
		$requete1->execute();
		$resultat=$requete1->fetchall();
		//on stocke les données cahrgée par fetchall dans la varialbe tableau $resultat
		echo'<pre>';
		print_r($resultat);
		echo'</pre>';
		
		
		$connexion->exec($requete);
		
		// $requete->execute();
	
		// $connexion->exec($insertionSQL);
	echo'	insertion de nouvelles colonnes dans la base de donnée';
		}

		catch(PDOException $e){
			
			echo'Echec de la connexion à la base de donnée : '.$e->getMessage();

		}

//////////////////////////
echo'	<br/><strong>mettre a jour et supprimer des données dans une base de données<br/></strong>';
//////////////////////////

		$serveur="localhost";
		$login="root";
		$pass="";
		
		
		try{
			$connexion=new PDO("mysql:host=$serveur;dbname=MaBDDTest2",$login,$pass);
			$connexion->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$modif="UPDATE Visiteurs SET age=50 WHERE id=1";		
			
			$requete=$connexion->prepare($modif);
			$requete->execute();
			
			echo'Information de la BDD mis a jour';
		}

		catch(PDOException $e){
		echo'Echec de la base de donnée '.$e->$getMessage();
	
		}





































?>
	
	</body>	
	</html>	
	