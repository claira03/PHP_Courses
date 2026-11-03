<?php

// Informations de connexion
$host = 'localhost';
$dbname = 'world';
$user = 'PROG1384';
$password = 'CCNB2026';

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

// Récupération du paramètre code dans l'URL
$code = $_GET['code'] ?? '';

// Vérification du code : 3 lettres majuscules
if (strlen($code) != 3 || strtoupper($code) != $code) {

    header('Location: Pays.php');
    exit;

}

try {

    // Création de la connexion PDO
    $conn = new PDO($dsn, $user, $password);

    // Requête SQL
    $sql = "SELECT Code, Name, GovernmentForm, SurfaceArea, LifeExpectancy
            FROM country
            WHERE Code = :code";

    // Préparation de la requête
    $stmt = $conn->prepare($sql);

    // Exécution de la requête
    $stmt->execute([
        ':code' => $code
    ]);

    // Récupération du pays dans un tableau associatif
    $pays = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérification si le pays existe
    if (!$pays) {

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

    <meta charset="UTF-8">
    <title>Information du pays</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>

<body>

    <div class="container mt-5">

        <h1 class="text-center mb-4">Information du pays</h1>

        <div class="card">

            <div class="card-header">
                <?php echo $pays['Name']; ?>
            </div>

            <div class="card-body">

                <h5 class="card-title">
                    <?php echo $pays['Code'] . " - " . $pays['Name']; ?>
                </h5>

                <p class="card-text">
                    <strong>Superficie :</strong>
                    <?php echo number_format($pays['SurfaceArea'], 2, '.', ',') . " km2"; ?>
                </p>

                <p class="card-text">
                    <strong>Gouvernement :</strong>
                    <?php echo $pays['GovernmentForm']; ?>
                </p>

            </div>

            <div class="card-footer">

                <a href="Pays.php" class="btn btn-primary">
                    Retour aux pays
                </a>

            </div>

        </div>

    </div>

</body>

</html>