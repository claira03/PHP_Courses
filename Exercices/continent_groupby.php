<!--
        auteur :Joel Boudreau
        date : 2026
       
-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>template</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>



    </script>
</head>

<body>
    <div class="jumbotron text-center" style="margin-bottom:0">
        <h1><i class="bi bi-code"></i> PROG-1384 <i class="bi bi-code-slash"></i></h1>
        <p>Programmation Web côté serveur </p>
    </div>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="#">Exercice</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="https://www.w3schools.com/php/default.asp">W3Schools PHP
                        Références</a>
                </li>
            </ul>
        </div>
    </nav>
    <h1>Continent groupe By</h1>
    <?php
    $host = 'localhost';
    $dbname = 'world';
    $user = 'PROG1384';
    $password = 'CCNB2026';

    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

    try {
        $conn = new PDO($dsn, $user, $password);

        $sql = 'SELECT continent, count(*) nombre
                FROM country
                GROUP BY continent
                ORDER BY 2 DESC';

    $result = $conn->query($sql);
        echo "<ol>";
        // Lecture des résultats
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            echo "<li><b>{$row['continent']}</b> nombre de pays :  {$row['nombre']}</li>";
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