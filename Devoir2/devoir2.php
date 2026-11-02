<!--
        auteur :Joel Boudreau
        date : 2026
       
-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <title>Devoir 2</title>
    <style type="text/css">
    body {
        margin: 25px;
    }

    input {
        font-size: 2em;
        margin-right: 15px;
    }

    input[type=submit] {
        background-color: orange;
        font-weight: bold;
    }
    </style>
</head>

<body>
    <h1>Devoir 2 Fonctions pour String</h1>
    <form action="devoir2_Claira.php" method="GET">
        <input type="text" name="txtChaine" value="<?php echo htmlspecialchars($chaine); ?>" />
        <input type="submit" value="Traiter" />
    </form>
    <hr />

    <?php

    $chaine = "";
    $valide = false;

    if (isset($_GET['txtChaine']) && str_replace(" ", "", $_GET['txtChaine']) !== "") {
        $chaine = $_GET['txtChaine'];
        $valide = true;
    }
    ?>

    <?php
    //on traite le formulaire sur la même page..!
    //changer la condition :)
    if ($valide) {

        $longueur = strlen($chaine);

        $mots = explode(" ", $chaine);
        $nbMots = count($mots);

        $nbE = substr_count($chaine, 'e');

        echo "La chaine est : " . htmlspecialchars($chaine) . "<br>\n";
        echo "La chaine est d'une longueur de $longueur caractère(s)<br>\n";
        echo "La chaine en majuscule est : " . htmlspecialchars(strtoupper($chaine)) . "<br>\n";
        echo "La chaine embellie avec des * sur 20 caractères totals :"
            . htmlspecialchars(str_pad($chaine, 20, "*", STR_PAD_BOTH)) . "<br>\n";
        echo "La chaine affichée à l'envers : " . htmlspecialchars(strrev($chaine)) . "<br>\n";
        echo "La chaine en initcap : " . htmlspecialchars(ucwords($chaine)) . "<br>\n";
        echo "La chaine possède $nbE 'e'<br>\n";
        echo "Les mots de la chaine tapée sont :\n";

        echo "<ul>\n";
        foreach ($mots as $mot) {
            echo "    <li>" . htmlspecialchars($mot) . "</li>\n";
        }
        echo "</ul>\n";

        echo "Il y a $nbMots mot(s) dans la phrase\n";
    ?>
</body>

</html>