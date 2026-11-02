<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <title>Tableau des employés</title>

    <style type="text/css">
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        table {
            border-collapse: collapse;
            width: auto;
            color: black;
            margin: 2rem 0;
        }

        th,
        td {
            border: 3px double black;
            padding: 8px;
            text-align: right;
            white-space: nowrap;
        }

        th {
            background-color: orange;
            text-align: center;
            text-transform: uppercase;
            font-size: 1.75rem;
        }
    </style>
</head>

<body>
    <h1>Tableau des employés</h1>

    <?php
    // Informations de connexion à MySQL
    $host = 'localhost';
    $dbname = 'scott';
    $user = 'PROG1384';
    $password = 'CCNB2026';

    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

    try {
        // Connexion avec PDO
        $conn = new PDO($dsn, $user, $password);


        $sql = 'SELECT * FROM emp ORDER BY job';
        $result = $conn->query($sql);

        /* echo '<table><tr>';

        // Afficher les noms des colonnes dans l'en-tête du tableau
        for ($i = 0; $i < $result->columnCount(); $i++) {
            $colonne = $result->getColumnMeta($i);
            echo "<th>{$colonne['name']}</th>";
        }

        echo '</tr>';*/

        echo "<table><tr>";

        echo "<th>EMPNO</th><th>ENAME</th><th>JOB</th><th>MGR</th><th>HIREDATE</th><th>SAL</th><th>COMM</th><th>DEPTNO</th>";
        echo "</tr>";


        // Lire un employé à la fois avec fetch()
        $nombreEmployes = 0;

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';

            // Chaque valeur correspond à une colonne du résultat SQL
            foreach ($row as $valeur) {
                echo "<td>$valeur</td>";
            }

            echo '</tr>';
            $nombreEmployes++;
        }

        echo '</table>';
        echo "<h2>Nous avons $nombreEmployes employés dans notre compagnie</h2>";

        // Fermeture de la connexion
        $conn = null;
    } catch (PDOException $e) {
        echo '<p>Erreur de base de données : ' . $e->getMessage() . '</p>';
    }
    ?>
</body>

</html>