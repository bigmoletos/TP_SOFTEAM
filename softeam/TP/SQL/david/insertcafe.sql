TRUNCATE COMPREND;
TRUNCATE FACTURE;
TRUNCATE CONSOMMATION;
TRUNCATE SERVEUR;
TRUNCATE LESTABLES;


insert into CONSOMMATION values (100, 'Café', 0.90);
insert into CONSOMMATION values (101, 'Café double', 1.30);
insert into CONSOMMATION values (102, 'Café créme', 1.00);
insert into CONSOMMATION values (105, 'Chocolat', 1.50);
insert into CONSOMMATION values (106, 'Biére pression', 1.80);
insert into CONSOMMATION values (107, 'Biére 25cl', 2.00);
insert into CONSOMMATION values (108, 'Biére 33cl', 2.20);
insert into CONSOMMATION values (110, 'Biére 50cl', 2.50);
insert into CONSOMMATION values (120, 'Jus de fruits', 1.70);
insert into CONSOMMATION values (121, 'Jus de fruits pressé', 2.60);
insert into CONSOMMATION values (122, 'Perrier', 1.60);
insert into CONSOMMATION values (124, 'Orangina', 1.40);
insert into CONSOMMATION values (130, 'Coca Cola', 1.70);

insert into LESTABLES values (1, 'entree-gche', 6);
insert into LESTABLES values (2, 'entree-dte', 10);
insert into LESTABLES values (3, 'fenetre1', 3);
insert into LESTABLES values (4, 'fenetre2', 8);
insert into LESTABLES values (5, 'fenetre3', 4);
insert into LESTABLES values (6, 'fond-gche', 4);
insert into LESTABLES values (7, 'fond-dte', 2);

insert into SERVEUR values (50, 'Pizzi', '3, rue des lilas', 90000, 'BELFORT', '76/12/01');
insert into SERVEUR values (51, 'Cathy', '25, av Roosevelt', 90100, 'DELLE', '78/05/04');
insert into SERVEUR values (52, 'Totof', '46, grande rue', 90500, 'BAVILLIERS', '84/09/30');
insert into SERVEUR values (53, 'Pilou', '5, impasse Martin', 90000, 'BELFORT', '86/08/17');

insert into FACTURE values (1200, 1, 53, '10/02/01');
insert into FACTURE values (1201, 5, 53, '10/02/01');
insert into FACTURE values (1202, 3, 52, '10/02/01');
insert into FACTURE values (1203, 5, 50, '10/02/01');
insert into FACTURE values (1204, 4, 52, '10/02/02');
insert into FACTURE values (1205, 1, 53, '10/02/02');
insert into FACTURE values (1206, 3, 52, '10/02/02');
insert into FACTURE values (1207, 5, 53, '10/02/02');
insert into FACTURE values (1208, 7, 53, '10/02/02');

insert into COMPREND values (1200, 101, 3);
insert into COMPREND values (1200, 106, 1);
insert into COMPREND values (1200, 120, 1);
insert into COMPREND values (1201, 105, 2);
insert into COMPREND values (1201, 106, 2);
insert into COMPREND values (1202, 100, 2);
insert into COMPREND values (1202, 122, 1);
insert into COMPREND values (1203, 102, 1);
insert into COMPREND values (1203, 108, 1);
insert into COMPREND values (1203, 121, 1);
insert into COMPREND values (1203, 130, 1);
insert into COMPREND values (1204, 122, 4);
insert into COMPREND values (1204, 124, 2);
insert into COMPREND values (1205, 100, 2);
insert into COMPREND values (1206, 108, 3);
insert into COMPREND values (1207, 108, 1);
insert into COMPREND values (1207, 110, 2);
insert into COMPREND values (1208, 108, 2);
