/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  PC107
 * Created: 5 oct. 2017
 */
-- *********************TP1*************************
-- CLASSE (num classe, nom classe)
-- ETUDIANT (num et, nom et, prenom et, date naiss et, id classe)
-- Cl´e ´etrang`ere : id classe faisant r´ef´erences `a CLASSE(num classe)
-- MATIERES (num mat, nom mat)
-- OBTENIR (num et, num mat, note, apreciation)
-- Cl´e ´etrang`ere : num et faisant r´ef´erences `a ETUDIANT(num et)
-- Cl´e etrang`ere : num mat faisant r´ef´erences `a MATIERES(num mat)
-- COMPRENDRE (num classe, num mat)
-- Cl´e ´etrang`ere : num classe faisant r´ef´erences `a CLASSE(num classe)
-- Cl´e etrang`ere : num mat faisant r´ef´erences `a MATIERES(num mat)
-- ******************************************************

-- C:\UwAmp\www\projetPHP1\SQL\

-- ******************************************************
-- POUR INSERER LE FICHIER DANS LA CONSOLE DE MYSQL:
--source C:/UwAmp/www/projetPHP1/SQL/tp1.sql;
 -- ******************************************************



-- creation  table CLASSE
CREATE TABLE classe(
		num_classe INT UNSIGNED PRIMARY KEY,
		nom_classe VARCHAR(50),
		 )
                CHARSET set utf8
                COLLATE utf_bin
                ENGINE InnoDB;


-- -- creation table ETUDIANT
CREATE TABLE etudiant(
		num_et INT UNSIGNED PRIMARY KEY,
		nom_et VARCHAR(50),
                prenom_et VARCHAR(50),
                date_naiss_et DATE,
                id_classe INT UNSIGNED,
                CONSTRAINT fk_classe_num_classe INT FOREIGN KEY (id_classe) REFERENCES classe(num_classe)
		 )
                CHARSET set utf8
                COLLATE utf_bin
                ENGINE InnoDB;


-- -- creation table MATIERES
CREATE TABLE matiere(
		 num_mat INT UNSIGNED PRIMARY KEY,
		 nom_mat VARCHAR(50),
		 )
                CHARSET set utf8
                COLLATE utf_bin
                ENGINE InnoDB;




-- creation table Obtenir
CREATE TABLE obtenir(
                num_et INT UNSIGNED PRIMARY KEY,
                note INT,
                appreciation VARCHAR(50)


);
                CHARSET set utf8
                COLLATE utf_bin
                ENGINE InnoDB;


-- creation table COMPRENDRE
CREATE TABLE comprendre(
fk_comprendre FOREIGN KEY     REFERENCE  classe(num_classe)
mum_mat


);
                CHARSET set utf8
                COLLATE utf_bin
                ENGINE InnoDB;

