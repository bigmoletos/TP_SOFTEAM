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



INSERT INTO CLASSE(num_classe,nom_classe) values (1,"classe1");
INSERT INTO CLASSE(num_classe,nom_classe) values (2,"classe2");
INSERT INTO CLASSE(num_classe,nom_classe) values (3,"classe3");
INSERT INTO CLASSE(num_classe,nom_classe) values (4,"classe4");
INSERT INTO CLASSE(num_classe,nom_classe) values (5,"classe5");
INSERT INTO CLASSE(num_classe,nom_classe) values (6,"classe6");
INSERT INTO CLASSE(num_classe,nom_classe) values (7,"classe7");
INSERT INTO CLASSE(num_classe,nom_classe) values (8,"classe8");
INSERT INTO CLASSE(num_classe,nom_classe) values (9,"classe9");
INSERT INTO CLASSE(num_classe,nom_classe) values (10,"BTS SIO A");
INSERT INTO CLASSE(num_classe,nom_classe) values (11,"BTS SIO B");
INSERT INTO CLASSE(num_classe,nom_classe) values (12,"BTS IG");

INSERT INTO ETUDIANT(num_et,nom_et,prenom_et,date_naiss_et,id_classe) values (1,"nom1","prenom1","1990-04-20",8);
INSERT INTO ETUDIANT(num_et,nom_et,prenom_et,date_naiss_et,id_classe) values (2,"nom2","prenom2","1990-01-01",8);
INSERT INTO ETUDIANT(num_et,nom_et,prenom_et,date_naiss_et,id_classe) values (3,"nom3","prenom3","1997-01-01",3);
INSERT INTO ETUDIANT(num_et,nom_et,prenom_et,date_naiss_et,id_classe) values (4,"nom4","prenom2","1990-02-21",5);
INSERT INTO ETUDIANT(num_et,nom_et,prenom_et,date_naiss_et,id_classe) values (4,"nom5","prenom5","1990-03-23",4);
INSERT INTO ETUDIANT(num_et,nom_et,prenom_et,date_naiss_et,id_classe) values (5,"nom6","prenom6","1990-04-21",5);
INSERT INTO ETUDIANT(num_et,nom_et,prenom_et,date_naiss_et,id_classe) values (6,"nom7","prenom7","1990-08-04",5);
INSERT INTO ETUDIANT(num_et,nom_et,prenom_et,date_naiss_et,id_classe) values (7,"nom8","prenom7","1990-04-02",2);
INSERT INTO ETUDIANT(num_et,nom_et,prenom_et,date_naiss_et,id_classe) values (8,"nom2","prenom8","1995-01-15",2);
INSERT INTO ETUDIANT(num_et,nom_et,prenom_et,date_naiss_et,id_classe) values (9,"nom7","prenom7","1990-01-05",9);
INSERT INTO ETUDIANT(num_et,nom_et,prenom_et,date_naiss_et,id_classe) values (10,"nom8","prenom7","1998-03-04",9);
INSERT INTO ETUDIANT(num_et,nom_et,prenom_et,date_naiss_et,id_classe) values (11,"nom9","prenom7","1999-02-03",9);
INSERT INTO ETUDIANT(num_et,nom_et,prenom_et,date_naiss_et,id_classe) values (12,"nom10","prenom7","1993-10-02",9);
INSERT INTO ETUDIANT(num_et,nom_et,prenom_et,date_naiss_et,id_classe) values (13,"TRADER","Basile","1993-10-02",9);



INSERT INTO MATIERES (num_mat,nom_mat) values(1,"Français");
INSERT INTO MATIERES (num_mat,nom_mat) values(2,"Mathématiques");
INSERT INTO MATIERES (num_mat,nom_mat) values(3,"SVT");
INSERT INTO MATIERES (num_mat,nom_mat) values(4,"Sport");
INSERT INTO MATIERES (num_mat,nom_mat) values(5,"Espagnol");
INSERT INTO MATIERES (num_mat,nom_mat) values(6,"Physique");
INSERT INTO MATIERES (num_mat,nom_mat) values(7,"Chimie");

INSERT INTO OBTENIR (num_et,num_mat,note) values(1,1,15);
INSERT INTO OBTENIR (num_et,num_mat,note,apreciation) values(1,2,15,"wahou");
INSERT INTO OBTENIR (num_et,num_mat,note,apreciation) values(2,2,13,"bien");
INSERT INTO OBTENIR (num_et,num_mat,note) values(2,1,15);
INSERT INTO OBTENIR (num_et,num_mat,note) values(2,3,14);
INSERT INTO OBTENIR (num_et,num_mat,note) values(2,4,11);
INSERT INTO OBTENIR (num_et,num_mat,note) values(2,1,11);


INSERT INTO COMPRENDRE (num_classe,num_mat) values(1,1);
INSERT INTO COMPRENDRE (num_classe,num_mat) values(1,2);
INSERT INTO COMPRENDRE (num_classe,num_mat) values(1,3);
INSERT INTO COMPRENDRE (num_classe,num_mat) values(2,4);
INSERT INTO COMPRENDRE (num_classe,num_mat) values(3,1);


