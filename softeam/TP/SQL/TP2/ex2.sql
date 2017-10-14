/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  PC107
 * Created: 6 oct. 2017
 */
-- En considérant la base de données Location
-- CLIENT(Nom, VilleResid, Profession)
-- HABITATION(Codeh, Typeh, Adresse, Ville, LoyerM)
-- LOCATION(Codeh, Nom, NombMois)
-- formuler les requêtes SQL suivantes 


-- source C:/wamp64/www/TP_SOFTEAM/softeam/TP/SQL/TP2/script_location.sql;

-- remplacer changer les accents pour les professions, remplacer les ├® par un  é:
-- UPDATE table
-- SET nom_colonne = REPLACE(nom_colonne, 'ancien texte', 'texte de remplacement')

UPDATE client SET profession = REPLACE(profession, '├®', 'é');

UPDATE client SET profession = REPLACE(profession, 'Ã©', 'ç');
UPDATE client SET profession = REPLACE(profession, 'iné', 'ingé');
update client set profession=replace (profession,'crç', 'cré');
-- 1. Pour chaque habitation, afficher son code, son type, la ville où elle se trouve les noms des
-- locataires et leur profession.

select H.codeh, H.typeh, H.ville, C.nom, C.profession  
from  HABITATION H, LOCATION L, CLIENT C 
where C.nom=L.nom 
and H.codeh=L.codeh;

-- ou
select h.codeh, typeh, c.nom, ville, profession
from (habitation h 
join location l 
on l.codeh = h.codeh) 
join client c on c.nom = l.nom;


-- 2. La même que la requête précédente mais afficher aussi les habitations qui n’ont jamais été
-- prises en location

select H.codeh, H.typeh, H.ville, C.nom, C.profession  
from  HABITATION H, LOCATION L, CLIENT C 
where C.nom=L.nom 
and H.codeh=L.codeh
union 
select H.codeh, H.typeh, H.ville, C.nom, C.profession  
from  HABITATION H, LOCATION L, CLIENT C 
where C.nom=L.nom 
and H.codeh=L.codeh
where H.codeh  not in (select codeh from location);


-- idem vec des left join

select H.codeh, H.typeh, H.ville, C.nom, C.profession  
from  HABITATION H
left join LOCATION L 
on H.codeh=L.codeh
left join CLIENT C 
on C.nom=L.nom ;



-- 3. Déterminer le loyer minimum, maximum et moyen des habitations pour chaque type et chaque
-- ville (dans une seule requête

select typeh, ville, min(loyerm) as 'loyer min',max(loyerm) as 'loyer max' ,avg(loyerm) as 'loyer-moyen' 
from habitation
group by typeh, ville
order by ville, typeh;

-- 4. Pour chaque type d’habitation, déterminer le nombre d’habitations de ce type qui ont été
-- prises en location.

select H.typeh, count(L.codeh)
from habitation H, location L
 where H.codeh=L.codeh
group by H.typeh;

-- 5. Même que la requête précédente, mais montrer seulement les types dont au moins 3 habitations
-- (pas forcement différentes) ont été louées.

select H.typeh, count(L.codeh)
from habitation H, location L
 where H.codeh=L.codeh
group by H.typeh
having count(*)>=3;

-- 6. Pour chaque habitation déterminer le nombre total des mois qui a été louée. Afficher code
-- et type. Facultatif : pour celles qui n’ont été jamais louées ; afficher la valeur 0 (utiliser la
-- fonction isnull(valeurCalculé, 0)).

-- ifnull(sum(nombmois),0) as 'mois loues' si la somme est nulle renvoie 0

select H.codeh, typeh, 
ifnull(sum(nombmois),0) as 'mois loues'
from habitation H
left join location L
on l.codeh=H.codeh
group by h.codeh, typeh;

-- 7. Pour chaque client calculer ses frais totales de loyer.

select C.nom, sum(H.loyer*L.nombmois) as 'frais'
from habitation H, client C, location L
where H.codeh=L.codeh
and C.nom=L.nom
group by C.nom;


-- 8. Trouver les clients qui n’ont jamais loué aucune habitation.
select nom 
from client 
where nom
not in (select nom from location);

-- ou autre possibilité

select nom 
from client 
where 
NOT exists (select nom from location);


-- 9. Trouver les clients qui ont loué à la fois des appartements de type 1 et de type 3, c’est-à dire
-- qui ont loué (au moins) un appartement de type 1 et (au moins) un appartement de type 3.
-- (Utiliser exists).
select C.nom
from client C, habitation, H location L
where H.codeh=L.codeh
and C.nom=L.nom
and typeh='type1'

and C.nom in (select C.nom
from client C, habitation, H location L
where H.codeh=L.codeh)
and C.nom=L.nom
and typeh='type3';


-- 10. Trouver les clients qui n’ont loué que des villas (toutes les habitations qui ont louées sont des
-- villas). Le résultat ne doit pas afficher les clients qui n’ont pas loué aucune habitation.


-- join ou inner join c'est idem

select distinct C.nom 
from client C, 
join location L
on C.nom=L.nom
join habitation H
on L.codeh=H.codeh
where typeH='villa' 
and C.nom not in (select distinct C.nom 
from client C, 
join location L
on C.nom=L.nom
join habitation H
on L.codeh=H.codeh where typeh <>'villa')
;

-- 11. Trouver les clients qui ont dépensé le maximum en loyer (afficher Nom de client et montant).

-- ne marche pas
select C.nom, sum(H.loyerm*L.nombmois) as 'total'
from habitation H, client C, location L
where H.codeh=L.codeh
and C.nom=L.nom
group by C.nom
having sum(H.loyerm*L.nombmois) =max(select sum(H.loyerm*L.nombmois) as 'montant'
from habitation H, client C, location L
where H.codeh=L.codeh
and C.nom=L.nom);

-- essayer le code suivant
select C.nom, sum(loyerm*nombmois) as 'total'
from habitation H, client C, location L
where H.codeh=L.codeh
and C.nom=L.nom
group by C.nom
order by 'total' DESC
limit 5;


-- autre possiblité avec vue

create view sumMontant
as 
select C.nom, sum(H.loyerM*L.nombmois) as 'total'
from habitation H, client C, location L
where H.codeh=L.codeh
and C.nom=L.nom
group by C.nom;

max(sumMontant) as 'montant'
from habitation H, client C, location L
where H.codeh=L.codeh
and C.nom=L.nom);

--toujours En considérant la base de données Location
-- CLIENT(Nom, VilleResid, Profession)
-- HABITATION(Codeh, Typeh, Adresse, Ville, LoyerM)
-- LOCATION(Codeh, Nom, NombMois)

-- Exercice 2 :

-- Formulez des requêtes SQL qui permettent de réaliser les opérations suivantes :

-- 1. Répondre à la question 7 de l’exercice 1 de TP 2 en utilisant les vues

            -- 7. Pour chaque client calculer ses frais totales de loyer

            -- select C.nom, sum(H.loyer*L.nombmois) as 'frais'
            -- from habitation H, client C, location L
            -- where H.codeh=L.codeh
            -- and C.nom=L.nom
            -- group by C.nom;

create view LoyerMois
as
select C.nom, loyerM, Nombmois, sum(loyerM*Nombmois) as 'total'
from  client C, habitation H, location L
where H.codeh=L.codeh
and C.nom=L.nom
group by C.nom;

select nom, 'total' 
from loyerMois;


-- 2. La personne qui a le maximum des frais de loyer (avec les vues)
create view LoyerMois (col1,col2,clo3,col4)
as
select C.nom, loyerM, Nombmois, sum(loyerM*Nombmois) as 'total'
from  client C, habitation H, location L
where H.codeh=L.codeh
and C.nom=L.nom
group by C.nom;

select col1, col4
from loyerMois
where col4=(select max(col4) from loyerMois);

-- 3. Créer une vue Marseille contenant que les habitations qui se trouvent à Marseille
create view vueMarseille
as
select codeh, typeh, adress, loyerM
from habitation
where ville='marseille';


-- 4. Ajouter une nouvelle habitation à la vue Marseille ayant les attributs suivants : (950, ’TYPE3,’St Marguerite 6’, 1000.00)
insert into vueMarseille values (950, 'TYPE3','St Marguerite', '6', 1000.00);

-- 5. Vérifier que l’habitation ayant comme code 950 a été ajoutée à la table Habitation. Que
-- remarquez vous ?

-- elle n'est pas dans la vue pour la rajouter il faut remettre un trigger
-- le trigger c'est le declencheur






-- 6. Comment peut-on résoudre ce genre du problème.






-- 7. Créer une vue Loc Marseille contenant les locations des Habitations de Marseille






-- 8. Insérer dans Loc Marseille les attributs suivants (964, ’Siegel’, 6), Que remarquez vous ?