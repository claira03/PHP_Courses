<!-- 
        auteur : Joel Boudreau
        date :  2026
        but :
-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <title>Exercice Fonction</title>
    <?php

    $provinces = [
        'NB' => 'Nouveau-Brunswick',
        'QC' => 'Québec',
        'NE' => 'Nouvelle-Écosse',
        'TN' => 'Terre-Neuve',
        'AL' => 'Alberta'
    ];

    $saisons = ['été', 'automne', 'hiver', 'printemps'];

    //code de la fonction...
    function creerSelect(array $tab, string $attNameValeur)
    {

        echo "\n\t<select name=\"$attNameValeur\">\n\t";

        foreach ($tab as $key => $value) {
            echo "\t<option value=\"$key\">$value</option>\n\t";
        }
        echo "</select>\n\t";
    }


    ?>
</head>

<body>
    <h1>Test des fonctions</h1>

    <form>
        <?php
        creerSelect($provinces, "provinces");
        echo '<br /><br />';
        creerSelect($saisons, "saisons");
        ?>
    </form>

</body>

</html>