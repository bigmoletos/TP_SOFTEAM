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
 
-- creation  table CLASSE


create database tp;

use tp;

create table classe( 
	num_classe INT,
	nom_classe VARCHAR(100),
	PRIMARY KEY (num_classe)
	) engine = innodb, charset=utf8;

create table etudiant(
	num_et INT, nom_et VARCHAR(100), 
	prenom_et VARCHAR(50), 
	date_naiss_et VARCHAR(50), 
	id_classe INT,
	PRIMARY KEY (num_et), 
	CONSTRAINT FK6 FOREIGN KEY (id_classe) REFERENCES classe(num_classe)
	) engine = innodb, charset=utf8;

create table matieres(
	num_mat INT,
	nom_mat VARCHAR(50),
	PRIMARY KEY (num_mat)
	) engine = innodb, charset=utf8;

create table obtenir(
	num_et INT, 
	num_mat INT,
	note INT,
	appreciation VARCHAR(100),
	PRIMARY KEY (num_et,num_mat),
	CONSTRAINT FK FOREIGN KEY (num_et) REFERENCES etudiant(num_et),
	CONSTRAINT FK2 FOREIGN KEY (num_mat) REFERENCES matieres(num_mat)
	) engine = innodb, charset=utf8;
create table comprendre(
	num_classe INT,
	num_mat INT,
	PRIMARY KEY (num_classe,num_mat),
	CONSTRAINT FK3 FOREIGN KEY (num_classe) REFERENCES classe(num_classe),
	CONSTRAINT FK4 FOREIGN KEY (num_mat) REFERENCES matieres(num_mat)
	) engine = innodb, charset=utf8;

show tables;
desc comprendre;