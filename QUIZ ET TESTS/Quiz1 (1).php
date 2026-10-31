<!-- 
        auteur : 
        date :  2026
        
-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />

    <title></title>
    <style type="text/css">
        table,
        td,
        th {
            border-style: solid;
            border-color: black;
            border-width: 1px;

        }

        th {
            background-color: silver;
            font-weight: bold;
            text-align: center;

        }

        td,
        th {
            padding: 5px;
        }

        table {
            text-align: center;
            margin-left: auto;
            margin-right: auto;
        }

        h1,
        h2,
        p {
            text-align: center
        }

        table.center {
            margin-left: auto;
            margin-right: auto;
        }

        form {
            text-align: center
        }

        img {
            margin-left: auto;
            margin-right: auto;
            display: block;
            padding: 20px;
            border: 2px solid black;
        }

        td.provinces {
            font-weight: bold;
        }

        td.populations {
            text-align: right;
        }

        td.populations:hover {
            background-color: green;
        }
    </style>
    <?php
    $aPopulations = [
        'AB' => 4569000,
        'BC' => 5343000,
        'MB' => 1403000,
        'NB' => 834000,
        'NL' => 523000,
        'NS' => 1030000,
        'ON' => 14950000,
        'PE' => 173000,
        'QC' => 8870000,
        'SK' => 1182000,
        'NT' => 45000,
        'NU' => 40000,
        'YT' => 44000
    ];




    ?>

</head>

<body>
    <h2>Statistiques Populations par province</h2>

    <?php 
    $nbProvinces = count($aPopulations);

    function createPopulationsTable(array $aPopulations){
        
        asort($aPopulations);
        $sum = 0;

        echo "<table>";
        echo "<tr>";
        echo "<th> Provinces </th>";
        echo "<th> Populations </th>";
        echo "</tr>";

        foreach ($aPopulations as $key => $value) {
           echo "<tr>";
            echo "<td>$key</td>";
            echo "<td>" . number_format($value, 0, ',', ',') . "</td>";
            echo "</tr>";
            $sum += $value;
        }
        echo "</table>";

        return $sum;

        }
        ?>
        <?php
        $nbProvinces = count($aPopulations);
        $total = createPopulationsTable($aPopulations);
        ?>

    <p>
        <?php echo "$nbProvinces province et " . number_format($total, 0, ',', ',') . " de population"; ?>
    </p>
        



</body>

</html>