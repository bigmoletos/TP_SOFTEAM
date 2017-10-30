/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  fd
 * Created: 7 oct. 2017
 */
-- version simple

create database LOCATION;
--  version plus complete 

CREATE DATABASE IF NOT EXISTS LOCATION DEFAULT CHARACTER SET latin1
COLLATE latin1_swedish_ci;
engine=innodb;
-- changer le charset
ALTER TABLE {tablename} CONVERT TO CHARACTER SET latin1
COLLATE latin1_swedish_ci;

-- changer le moteur
alter table nomtable engine=innobd;

-- ou

CREATE DATABASE IF NOT EXISTS LOCATION DEFAULT CHARSET='utf8'
COLLATE 'utf8_unicode_ci';
-- ensuite dans la console mysql pour utiliser la base il faut faire:
USE LOCATION;

-- pour voir les diffentes bases créées:
show database;

-- pour voir les diffentes tables créées:
show tables;


-- Afficher le schéma d’une table (la description)
desc[ribe] nom_table;
-- ou
explain nom_table;
-- ou aussi
show columns from nom_table;

-- SHOW objets;
-- Cette commande permet d'afficher une liste des objets, ainsi que certaines caractéristiques de ces objets.
-- Exemple : liste des tables et des vues.
-- SHOW TABLES;
-- Pour pouvoir utiliser SHOW TABLES, il faut avoir sélectionné une base de données.
-- 
-- -- SHOW CHARACTER SET
-- -- Montre les sets de caractères (encodages) disponibles.
-- -- SHOW [FULL] COLUMNS FROM nom_table [FROM nom_bdd]
-- -- Liste les colonnes de la table précisée, ainsi que diverses informations (type, contraintes,…). Il est possible de préciser également le nom de la base de données. En ajoutant le mot-clé FULL, les informations affichées pour chaque colonne sont plus nombreuses.
-- -- SHOW DATABASES
-- -- Montre les bases de données sur lesquelles on possède des privilèges (ou toutes si l'on possède le privilège global SHOW DATABASES).

-- SHOW GRANTS [FOR utilisateur]
-- Liste les privilèges de l'utilisateur courant, ou de l'utilisateur précisé par la clause FOR optionnelle.
-- SHOW INDEX FROM nom_table [FROM nom_bdd]
-- Liste les index de la table désignée. Il est possible de préciser également le nom de la base de données.
-- SHOW PRIVILEGES
-- Liste les privilèges acceptés par le serveur MySQL (dépend de la version de MySQL).
-- SHOW PROCEDURE STATUS
-- Liste les procédures stockées.
-- SHOW [FULL] TABLES [FROM nom_bdd]
-- Liste les tables de la base de données courante, ou de la base de données désignée par la clause FROM. Si FULL est utilisé, une colonne apparaîtra en plus, précisant s'il s'agit d'une vraie table ou d'une vue.
-- SHOW TRIGGERS [FROM nom_bdd]
-- Liste les triggers de la base de données courante, ou de la base de données précisée grâce à la clause FROM.
-- SHOW [GLOBAL | SESSION] VARIABLES
-- Liste les variables système de MySQL. Si GLOBAL est précisé, les valeurs des variables seront celles utilisées lors d'une nouvelle connexion au serveur. Si SESSION est utilisé (ou si l'on ne précise ni GLOBAL ni SESSION), les valeurs seront celles de la session courante. Plus d'informations sur les variables système seront données dans le prochain chapitre.
-- SHOW WARNINGS
-- Liste les avertissements générés par la dernière requête effectuée.

-- pour choisir le moteur de la table:
 engine= innobd;
-- changer le moteur
alter table nomtable engine=innobd;
-- pour voir les moteurs
show engines;

-- pour imposer un moteur pendant la durée d'un session
SET storage_engine=NomDuMoteur;


-- pour imposer un moteur de maniére permanente dans mysql
[mysqld]
default-storage-engine = NomDuMoteur

-- probleme de charset
<?php $bdd = new PDO(
    'mysql:host='.$dbhost.';dbname='.$dbname,
    $dbuser,
    $dbpass,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    ); ?>

effacer une base
drop database if exists nomBD ;

 drop nomtable;

