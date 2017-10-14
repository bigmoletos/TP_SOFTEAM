-- modif fd ;
-- source C:/wamp64/www/TP_SOFTEAM/softeam/TP/SQL/TP2/script_location.sql;

-- efface la base si elle existe;
drop database if exists location2;
drop database if exists location;

CREATE DATABASE IF NOT EXISTS LOCATION DEFAULT CHARACTER SET latin1
COLLATE latin1_swedish_ci;

-- impose le moteur innodb pendant la duree de la session
-- set storage_engine=innodb;
-- si ne marche pas il faut mettre pour chaque table;
-- alter table nomtable engine=innodb; 
-- create database LOCATION;

-- fin modif fd;


use LOCATION;


create table HABITATION(
Codeh int primary key,
Typeh char(10) check(Typeh in ('TYPE1', 'TYPE2', 'TYPE3', 'TYPE4', 'TYPE5', 'VILLA')),
Adresse char(32),
Ville char(32), 
LoyerM real);

create table CLIENT(
Nom char(32) primary key,
VilleResid char(32),
Profession char(32));

create table LOCATION(
Codeh int,
Nom char(32),
NombMois int,
primary key (Codeh,Nom));

alter table LOCATION
add constraint FK_NOM foreign key (Nom) references CLIENT(Nom);

alter table LOCATION
add constraint FK_HAB foreign key (Codeh) references HABITATION(Codeh);

-- **********debut fd;
--fd changer le moteur;

alter table CLIENT engine='innodb';
alter table HABITATION engine='innodb';
alter table LOCATION engine=innodb;

--fd Changement de charset:;

ALTER TABLE CLIENT CONVERT TO CHARACTER SET 'latin1'
COLLATE 'latin1_swedish_ci';

ALTER TABLE HABITATION CONVERT TO CHARACTER SET 'latin1'
COLLATE 'latin1_swedish_ci';

ALTER TABLE LOCATION CONVERT TO CHARACTER SET 'latin1'
COLLATE 'latin1_swedish_ci';

-- **********fin fd;

insert into HABITATION values ( 120,	'TYPE3',	'Bd. Charles de Gaulle 1',	'Avignon',	750);
insert into HABITATION values ( 123,	'TYPE1',	'Bd. Charles de Gaulle 89',	'Lyon',		650);
insert into HABITATION values ( 112,	'TYPE1',	'Av. de la Foret 26',		'Grenoble',	400.00 );
insert into HABITATION values ( 513,	'TYPE2',	'R. d Espagne 24',		'Marseille',	600);
insert into HABITATION values ( 618,	'TYPE2',	'R. Flaubert 24',		'Toulouse',	400);
insert into HABITATION values ( 184,	'TYPE2',	'Rue de Paris 118',		'Toulouse',	600);
insert into HABITATION values ( 113,	'TYPE3',	'Av. de la Foret 26',		'Grenoble',	800);
insert into HABITATION values ( 456, 	'TYPE3',	'RUE MARTIGUES'	,		'Lyon'	,	1200);
insert into HABITATION values ( 678,	'TYPE3',	'R. de la Republique 45',	'Nice'	,	1000.00);
insert into HABITATION values ( 694,	'TYPE3',	'R. Cassis 67'	,		'Marseille',	900 );
insert into HABITATION values ( 812,	'TYPE3',	'Bd. Des Platans 134',		'Paris'	,	1000.00 );
insert into HABITATION values ( 331,	'TYPE3',	'R. d Italie 11',		'Nancy'	,	500.00 );
insert into HABITATION values ( 392,	'TYPE3',	'Bd. de la Bastille 63',	'Nantes',	700.00 );
insert into HABITATION values ( 675,	'TYPE4',	'Av de la Poste 43',		'Avignon',	800.00 );
insert into HABITATION values ( 517,	'TYPE4',	'R. d Espagne 24',		'Marseille',	900.00 );
insert into HABITATION values ( 752,	'TYPE4',	'Bd. Des Platans 78',		'Paris'	,	1200.00 );
insert into HABITATION values ( 667,	'TYPE4',	'Av de la Poste 89',		'Avignon',	700.00 );
insert into HABITATION values ( 332,	'TYPE5',	'R. d Italie 11',		'Nancy'	,	1000.00 );
insert into HABITATION values ( 679,	'TYPE5',	'Bd de la Poste 43',		'Lyon',		1100.00 );
insert into HABITATION values ( 789,	'TYPE5',	'R. Cassis 130',		'Marseille',	1400.00 );
insert into HABITATION values ( 561,	'TYPE5',	'Rue Mandeville 34',		'Nantes',	1100.00 );
insert into HABITATION values (912,	 'VILLA',	   'R. de la Republique 13',	'Nice'	,	1700.00 );
insert into HABITATION values ( 169,	'VILLA',	'Rue de Paris 118',		'Toulouse',	1300.00 );
insert into HABITATION values ( 699,	'VILLA',	'R. Cassis 71',			'Marseille',	1500.00 );
insert into HABITATION values ( 276,	'VILLA',	'Av. de la Republique 54',	'Paris'	,	1400.00 );
insert into HABITATION values ( 964,	'VILLA',	'Rue Verlain 40',		'Chambery',	2000.00 );
insert into HABITATION values ( 900,	'TYPE4',	'St Marguerite 9',		'Marseille',	1200.00 );




insert into CLIENT values ('Bonnard',	 	'Marseille',	'Cadre');
insert into CLIENT values ('Canat',	 	'Aubagne',	'Secretaire');
insert into CLIENT values ( 'Damien',	 	'Aix',	        'Enseignant');
insert into CLIENT values ( 'Dupont',	 	'Arles',	'Commercant');
insert into CLIENT values ( 'Durand',	 	'Marseille',	'Commercant');
insert into CLIENT values ( 'Flaubert', 	'Aubagne',	'Enseignant');
insert into CLIENT values ( 'Florant',		'Marseille',	'Cadre');
insert into CLIENT values ( 'Florentin', 	'Grenoble',	'Commercant');
insert into CLIENT values ( 'Leonard',		'Arles',	'Entrepreneur');
insert into CLIENT values ( 'Martini',		'Aubagne',	'Secretaire');
insert into CLIENT values ( 'Siegel',		'Gardanne',	'Cadre');
insert into CLIENT values ( 'Torres',		'Aix',		'Ingenieur');
insert into CLIENT values ( 'Valdes',		'Aix',		'Ingenieur');
insert into CLIENT values ( 'Smith',		'Aubagne',	'Enseignant');
insert into CLIENT values ( 'Laurent',		'Aix',		'Cadre');



insert into LOCATION values (113,	'Durand',	8);
insert into LOCATION values (561,	'Florant',	12);
insert into LOCATION values (123,	'Flaubert',	7);
insert into LOCATION values (123,	'Siegel',	5);
insert into LOCATION values (123,	'Valdes',	7);
insert into LOCATION values (517,	'Dupont',	4);
insert into LOCATION values (678,	'Leonard',	9);
insert into LOCATION values (618,	'Leonard',	15);
insert into LOCATION values (184,	'Bonnard',	10);
insert into LOCATION values (184,	'Florant',	11);
insert into LOCATION values (392,	'Canat',	16);
insert into LOCATION values (392,	'Flaubert',	20);
insert into LOCATION values (699,	'Torres',	19);
insert into LOCATION values (112,	'Florentin',	7);
insert into LOCATION values (112,	'Martini',	4);
insert into LOCATION values (332,	'Canat',	5);
insert into LOCATION values (812,	'Martini',	7);
insert into LOCATION values (276,	'Siegel',	5);
insert into LOCATION values (169,	'Valdes',	3);
insert into LOCATION values (169,	'Smith',	5);
