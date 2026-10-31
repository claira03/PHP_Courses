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
    $sum;

    //code de la fonction
    sort($ages);
    //print_r($ages);
    function creerTableAges(array $ages){
        echo "<table>";
        echo "<tr>";
        echo "<th> Nom </th>";
        echo "<th> Age </th>";
        echo "</tr>";

        foreach ($ages as $key => $value) {
            echo "<tr>";
            echo "<td>$key </td>";
            echo "<td class = 'droite'> $value </td>";
            echo "</tr>";
            $sum = + $value;
        }
        echo "</table>";

        echo "La sommes des elements est : $sum";
    }



    ?>
</head>

<body>
    <div>
        <h1>Affichage des ages</h1>

        <?php
        creerTableAges($ages);
        
        ?>
    </div>
</body>

</html>