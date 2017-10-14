
<?php    ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>formulaire tp2</title>
    </head>
    <body>
        <?php
        // put your code here
        ?>

        <form name="vin" action="15.php" method="GET">

            NOM <input type=text name="nom"><br>
            PRENOM <input type=text name="prenom"><br>


            <br>
            <TD ALIGN="right">Sexe</TD>
            <TD>
                <INPUT NAME="sexe" TYPE="radio" VALUE="M" CHECKED>M
                <INPUT NAME="sexe" TYPE="radio" VALUE="F">F
                <br>
                <input type="checkbox"  name="vin[]" value="loire"/>
                <select name="choix">
                    <option value="bordeaux">bordeaux</option>
                    <option value="beaujolais">beaujolais</option>
                    <option value="loire">loire</option>
                    <option value="provence">provence</option>
                </select>
                <!--<br>  <br>-->
                <INPUT type=submit  value="cliquez ici">
        </form> 

        <!--        <form>  
        
                    <input type="radio" name="frites" value="masculin" id="oui" checked="checked" /> <label for="oui">Oui</label>
                    <input type="radio" name="frites" value="feminin" id="non" /> <label for="non">Non</label>
                </form>-->

            <!--<input type="checkbox" name="masculin"  /><br>-->

            <!--<input type="checkbox" name="feminin"  /><br>-->
        <!--            <input type="radio" name="frites" value="masculin" id="oui" checked="checked" /> <label for="oui">Oui</label>
            <input type="radio" name="frites" value="feminin" id="non" /> <label for="non">Non</label>-->

    </body>
</html>
