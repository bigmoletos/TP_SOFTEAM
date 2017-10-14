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

create database UNIVERSITE;

-- ensuite pour l'utiliser on fait:
use nomBDR;

--  version plus complete 

CREATE DATABASE IF NOT EXISTS CAFE DEFAULT CHARACTER SET utf8
COLLATE utf8_unicode_ci;

-- ou

CREATE DATABASE IF NOT EXISTS UNIVERSITE DEFAULT CHARSET=utf8
COLLATE utf8_unicode_ci;
-- ensuite dans la console mysql pour utiliser la base il faut faire:
USE CAFE;

-- pour voir les diffentes bases créées:
show database;

-- pour voir les diffentes tables créées:
show tables;


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


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  fd
 * Created: 8 oct. 2017
 */

