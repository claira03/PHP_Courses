<?php

$recherche = "";

if (isset($_GET["txtPays"])) {
    $recherche = trim($_GET["txtPays"]);
}

if ($recherche == "") {
    exit();
}

$host = "localhost";
$dbname = "world";
$user = "PROG1384";
$password = "CCNB2026";

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try {

    $conn = new PDO($dsn, $user, $password);

    $sql = "
        SELECT name, code
        FROM country
        WHERE LOWER(name) LIKE LOWER(?)
        ORDER BY name
    ";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        "%" . $recherche . "%"
    ]);

    $nombrePays = 0;

    echo '<div class="card p-4">';

    echo '<h2 class="h5">Résultats pour « ' .
        htmlspecialchars($recherche) .
        ' »</h2>';

    echo '<ol class="list-group list-group-numbered mt-3">';

    while ($pays = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $nom = htmlspecialchars($pays["name"]);
        $code = htmlspecialchars($pays["code"]);

        echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
        echo '<span>' . $nom . '</span>';
        echo '<span class="badge text-bg-light border code-pays">' . $code . '</span>';
        echo '</li>';

        $nombrePays++;
    }

    echo '</ol>';

    if ($nombrePays == 0) {

        echo '<p class="text-secondary mt-3">';
        echo 'Aucun pays trouvé.';
        echo '</p>';
    }

    echo '<p class="mt-3 mb-0">';
    echo 'Pays trouvés : ';
    echo '<span class="badge text-bg-primary">';
    echo $nombrePays;
    echo '</span>';
    echo '</p>';

    echo '</div>';

    $conn = null;
} catch (PDOException $e) {

    echo '<div class="alert alert-danger">';
    echo 'Erreur lors de la recherche.';
    echo '</div>';
}
