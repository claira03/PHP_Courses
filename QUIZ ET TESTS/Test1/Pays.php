<?php
/*
 * Auteur : Claira Cyntiche Nguemete
 * Date : 2026
 */

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <title>Afrique</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style type="text/css">
        table {
            width: 70%;
            border-radius: 12px;
            overflow: hidden;
        }

        body {
            background-color: black;
        }

        table,
        td,
        th {
            border: 3px solid black;
            text-align: right;
            margin: 0 auto;
            background-color: white;
        }

        th {
            background-color: Silver;
            font-weight: bold;
            text-align: center;
            font-size: 1.3em;
            padding: 5px;
        }

        td {
            padding: 5px;
            font-size: 1.2em;
            font-weight: bold;
        }

        h1,
        h2,
        p {
            text-align: center;
            color: white;
        }

        p {
            font-size: 1.5em;
            font-weight: bold;
        }
    </style>


</head>

<body>

    <h1>Pays d'Afrique</h1>
    <h2>avec moins de 16 millions d'habitants</h2>

    <?php

    // Informations de connexion
    $host = 'localhost';
    $dbname = 'world';
    $user = 'PROG1384';
    $password = 'CCNB2026';

    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";



    try {
        // Création de la connexion PDO
        $conn = new PDO($dsn, $user, $password);


        $sql = "SELECT Code, Name, Continent, Population, Region
                FROM country
                WHERE Continent = :continent
                AND Population < :population
                ORDER BY Population DESC";


        //Execution de la requete preparee
        $result = $conn->prepare($sql);

        $result->execute([
            ':continent' => 'Africa',
            ':population' => 16000000
        ]);

        $totalPays = 0;

        //TABLEAU
        echo "<table>";

        echo "<tr>
                <th>Code</th>
                <th>Nom</th>
                <th>Continent</th>
                <th>Population</th>
                <th>Région</th>
                <th>Détails</th>
              </tr>";
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            echo "<tr>";

            echo "<td>" . $row['Code'] . "</td>";

            echo "<td>" . $row['Name'] . "</td>";

            echo "<td>" . $row['Continent'] . "</td>";

            echo "<td>" . number_format($row['Population'], 0, '.') . "</td>";

            echo "<td>" . $row['Region'] . "</td>";

            echo "<td><a href='information.php?code=" . $row['Code'] . "'>Détails</a></td>";

            echo "</tr>";

            $totalPays++;
        }

        echo "</table>";

        echo "<p>Nombre total de pays : " . $totalPays . "</p>";

        // Fermeture de la connexion
        $conn = null;
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
    }

    ?>



</body>

</html>