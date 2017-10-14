<?php ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Menu Déroulant</title>
    </head>
    <body>
        <!--faire un tableau avec une liste déroulante http://www.liensfavoris.com/programmation/exemple-p123.html-->
        <form method='POST' action=''>
            <!--on rajoute dans le name de select les [] pour typer
            les données en tableau- et multiple apres le name
            size permet d'indiquer le nombre d'elements à afficher par
            defaut
            Il est également possible d'établir des catégories spécifiques
            au sein d'une liste déroulante à l'aide de la 
            balise <optgroup>. -->
            nom
            <select name='tableauderoulant' size=10 multiple>
                <option value='1'> deser</option>
                <option value='2'> chirs</option>
                <option value='3'>erfi</option>

            </select>
            choix
            <select name='choix'>
                <option value='1'>prenom</option>
                <option value='2'>age</option>
            </select>

            champs texte
            <input type='text' name='entrer nouvelle valeur' size="50">

            zone de saisie texte
            <!--            le "wrap=physical" permet d'aller à la ligne 
            automatiquement dans la zone desaisie-->
            <textarea rows="5" cols="20" wrap="physical"></textarea>

            bouton envoyer
            <input type='submit' name='modifier entrée' > 

            bouton effacer
            <input type="reset" value="Effacer">

            bouton avec onclick
            <input type="button" value="Coucou" onclick="alert('Coucou...')">

            bouton chexbox
            <input type="checkbox"> voitures
            <input type="checkbox"> avions
            <input type="checkbox"> trains


            liste deroulante avec optgroup
            <select> 
                <optgroup label="Boissons sans alcool"> 
                    <option>Eaux minérales</option> 
                    <option>Eaux gazeuses</option> 
                    <option>Sodas</option> 
                </optgroup> 
                <optgroup label="Boissons alcolisées"> 
                    <option>Bières</option> 
                    <option>Vins rouges</option> 
                    <option>Vins rosés</option> 
                    <option>Vins blancs</option> 
                    <option>Saké</option> 
                </optgroup> 
            </select> 

        </select>

    </form>


</body>
</html>
