/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  PC107
 * Created: 5 oct. 2017
 */


-- C:\UwAmp\www\projetPHP1\SQL\

--source C:/UwAmp/www/projetPHP1/SQL/tp1.sql;
--  C:\UwAmp\www\projetPHP1\SQL\tp2
-- creation  table CLASSE
-- $table="classe";
-- $col1="num_classe";
-- $col3="nom";
-- $col4="";--//email";//"mail";
-- $col5="";--//sexe";//"commentaires";
-- $col6="";--//age";//"tel portable";"numero client";
-- $col7="";--//"CP";
-- $col8="";
-- $col8="";
-- $col9="";
-- $col10="";
create database 


CREATE TABLE $table(
		 $col1 INT UNSIGNED PRIMARY KEY,
		 $col2 VARCHAR(50)
		 );


-- -- creation table ETUDIANT
$table="etudiant";
$col1="num_et";
$col3="nom_et";
$col4="prenom_et";--//email";//"mail";
$col5="date_naiss_et";--//sexe";//"commentaires";
$col6="id_classe";--//age";//"tel portable";"numero client";
$col7="";--//"CP";
$col8="";
$col8="";
$col9="";
$col10="";

CREATE TABLE $table(
		 $col1 INT UNSIGNED PRIMARY KEY,
		 $col2 VARCHAR(50),
                $col3 VARCHAR(50),
                $col4 VARCHAR(50),
                $col5 INT,
                $col6  INT UNSIGNED AUTO_INCREMENT
		 );
