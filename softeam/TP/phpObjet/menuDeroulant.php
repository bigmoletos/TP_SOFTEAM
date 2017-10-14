
<?php 

$baiose="code html"



?>



<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <!--faire un tableau avec une liste déroulante http://www.liensfavoris.com/programmation/exemple-p123.html-->
<h2>menu deroulant avec selection simple</h2>


        <form method='POST' action=''>
            nom
            <select name=''>
                <option value='1'> deser</option>
                <option value='2'> chirs</option>
                <option value='3'>erfi</option>

            </select>
            choix
            <select name='choix'>
                <option value='1'>prenom</option>
                <option value='2'>age</option>

            </select>
            <input type='text' name='entrer nouvelle valeur'>
            <input type='submit' name='modifier entrée' >             


        </form>
<h2>menu deroulant avec selection multiple</h2>
 <form method='POST' action=''>
            nom
            <select multiple name=''>
                <option value='1'> deser</option>
                <option value='2'> chirs</option>
                <option value='3'>erfi</option>

            </select>
            choix
            <select name='choix'>
                <option value='1'>prenom</option>
                <option value='2'>age</option>

            </select>
            <input type='text' name='entrer nouvelle valeur'>
            <input type='submit' name='modifier entrée' >             


        </form>



    </body>
</html>
