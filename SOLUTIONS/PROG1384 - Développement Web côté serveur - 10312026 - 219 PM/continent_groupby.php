<!--
        auteur :Joel Boudreau
        date : 2026

-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <title>Pays Continent</title>
</head>

<body>
    <h1>Affichage des Pays et Continents</h1>

    <?php

    // Informations de connexion
    $host = 'localhost';
    $dbname = 'world';
    $user = 'PROG1384';
    $password = 'CCNB2026';

    // DSN = Data Source Name
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";


    //DSN pour college-dev.com au besoin
    //$dsnCollegeDev = "mysql:host=college-dev.com;dbname=profti_enclasse;charset=utf8";

    try {
        //Connection pour college-dev.com au besoin
        //$conn = new PDO($dsnCollegeDev, 'proft_simpleuser', 'Prog*2021');


        // Création de la connexion PDO
        $conn = new PDO($dsn, $user, $password);


        $sql = 'SELECT continent, count(*)  nombre
                FROM country 
                GROUP BY continent 
                ORDER BY nombre DESC';

        // Exécution de la requête
        $result = $conn->query($sql);
        echo "<ol>";
        // Lecture des résultats
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            echo "<li><strong>{$row['continent']}</strong> nombre de pays : {$row['nombre']}</li>";
        }

        echo "</ol>";
        // Nombre de lignes retournées
        // echo $result->rowCount();

        // Fermeture de la connexion
        $conn = null;
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
    }

    ?>
</body>

</html>