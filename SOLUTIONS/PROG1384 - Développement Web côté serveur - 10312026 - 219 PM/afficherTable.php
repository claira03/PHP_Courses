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
    <style>
        table {
            margin: 0 auto;
            width: 15%;
        }

        table,
        td,
        th {
            border: 1px solid black;
        }

        td,
        th {
            padding: 10px;

        }

        th {
            text-align: center;
            font-weight: bold;
            background-color: silver;
        }

        h1,
        p {
            text-align: center;
        }

        .droite {
            text-align: right;
        }
    </style>
    <?php

    $ages = [
        'Joel' => 50,
        'Paul' => 26,
        'Dave' => 42,
        'Ghislain' => 35,
        'Serge' => 36
    ];

    function creerTableAges(array $tableau)
    {
        echo "<table>";
        echo "<tr><th>Nom</th><th>Age</th></tr>";

        foreach ($tableau as $key => $value) {
            echo "<tr><td>$key</td><td class=\"droite\">$value</td></tr>";
        }

        echo "</table>";
        echo "<p>La somme des ages est : " . array_sum($tableau) . "</p>";
    }


    function creerTableAgesDefi(array $tableau, string $entete1 = "Nom", string $entete2 = "Age")
    {
        echo "<table>";
        echo "<tr><th>$entete1</th><th>$entete2</th></tr>";

        foreach ($tableau as $key => $value) {
            echo "<tr><td>$key</td><td class=\"droite\">$value</td></tr>";
        }

        echo "</table>";
        echo "<p>La somme des ages est : " . array_sum($tableau) . "</p>";
    }
    ?>
</head>

<body>


    <div>
        <h1>Affichage des ages</h1>

        <?php
        //appel de la fonction
        creerTableAges($ages);
        ?>
    </div>
</body>

</html>