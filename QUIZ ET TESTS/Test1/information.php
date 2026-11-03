<?php
/*
 * Auteur : Claira Cyntiche Nguemete
 * Date : 2026
 */

$code = $_GET['code'] ?? '';

// Vérification du code : 3 caractères et majuscules
if (strlen($code) != 3 || strtoupper($code) != $code) {
    header('Location: Pays.php');
    exit;
}

// Informations de connexion
$host = 'localhost';
$dbname = 'world';
$user = 'PROG1384';
$password = 'CCNB2026';

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

try {

    // Création de la connexion PDO
    $conn = new PDO($dsn, $user, $password);

    // Requête préparée
    $sql = "SELECT Code, Name, GovernmentForm, SurfaceArea, LifeExpectancy
            FROM country
            WHERE Code = :code";

    // Préparation de la requête
    $result = $conn->prepare($sql);

    // Exécution de la requête
    $result->execute([
        ':code' => $code
    ]);

    // Récupération du pays dans un tableau associatif
    $row = $result->fetch(PDO::FETCH_ASSOC);

    // Vérification si le pays existe
    if (!$row) {
        header('Location: Pays.php');
        exit;
    }

    // Fermeture de la connexion
    $conn = null;
} catch (PDOException $e) {

    echo 'Erreur : ' . $e->getMessage();
    exit;
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8" />
    <title>Informations</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <style type="text/css">
    h1 {
        color: white;
    }

    h5,
    h6 {
        text-align: center;
        color: black;
    }

    body {
        margin: 100px;
        background-color: black;
    }

    p {
        text-align: center;
    }

    hr {
        width: 50%;
    }

    .important {
        font-weight: bold;
    }
    </style>

</head>

<body>

    <h1>Informations</h1>
    <br />

    <div class="card" style="width: 30rem;">

        <div class="card-body">

            <h5 class="card-title">
                <?= $row['Code'] . "  " . $row['Name']; ?>
            </h5>

            <h6 class="card-subtitle mb-2 text-muted">
                Superficie :
                <?= number_format($row['SurfaceArea'], 2, '.') . " km2"; ?>
            </h6>
            <h6 class="card-subtitle mb-2 text-muted">
                Esperance de vie :
                <?= number_format($row['LifeExpectancy'], 2, '.') . ""; ?>
            </h6>

            <h6 class="card-text">
                Gouvernement : <?= $row['GovernmentForm']; ?>
            </h6>

            <a href="Pays.php">
                Retour a la page principale
            </a>
        </div>



    </div>


    <br />

</body>

</html>