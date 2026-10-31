<?php
// Activité 17 - Rechercher des pays
// Le texte reste dans la zone après la recherche.
$recherche = '';

if (isset($_GET['txtPays'])) {
    $recherche = trim($_GET['txtPays']);
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recherche de pays</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6fa;
        }

        .contenu {
            max-width: 720px;
            margin: 60px auto;
        }

        .card {
            border: 0;
            border-radius: 14px;
            box-shadow: 0 5px 20px #1b284014;
        }

        .code-pays {
            font-size: .85rem;
        }
    </style>
</head>

<body>
    <main class="container contenu">
        <h1 class="text-center mb-2">Recherche de pays</h1>
        <p class="text-center text-secondary mb-4">Trouvez un pays à partir de son nom.</p>

        <!-- Le formulaire et son apparence sont déjà prêts. -->
        <div class="card p-4 mb-4">
            <form action="afficherPaysTextBox.php" method="get">
                <label for="txtPays" class="form-label fw-semibold">Nom du pays</label>
                <div class="row g-2">
                    <div class="col-sm">
                        <input type="text" class="form-control" id="txtPays" name="txtPays"
                            placeholder="Ex. : af, can, united"
                            value="<?php echo htmlspecialchars($recherche); ?>">
                    </div>
                    <div class="col-sm-auto">
                        <button type="submit" class="btn btn-primary w-100">Rechercher</button>
                    </div>
                </div>
            </form>
        </div>

        <?php
        if (!empty($recherche)) {
            // Paramètres de connexion (à adapter au besoin)
            $host = 'localhost';
            $dbname = 'world';
            $user = 'PROG1384';
            $password = 'CCNB2026';
            $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

            try {
                $conn = new PDO($dsn, $user, $password);

                // 1. Requête SQL à finaliser
                $sql = "SELECT name, code FROM country
                    WHERE name LIKE '%$recherche%'
                    ORDER BY name";

                // 2. Exécuter la requête.
                $result = $conn->query($sql);


                // 3. Afficher les résultats un pays à la fois avec fetch().
                $texte = htmlspecialchars($recherche);
                $nombrePays = 0;

                echo '<div class="card p-4">';
                echo '<h2 class="h5">Résultats pour « ' . $texte . ' »</h2>';
                echo '<ol class="list-group list-group-numbered mt-3">';

                while ($pays = $result->fetch(PDO::FETCH_ASSOC)) {
                    $nom = htmlspecialchars($pays['name']);
                    $code = htmlspecialchars($pays['code']);

                    echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
                    echo "<span>$nom</span>";
                    echo '<span class="badge text-bg-light border code-pays">'.$code.'</span>';
                    echo '</li>';
                }

                echo '</ol>';


                if ($nombrePays == 0) {
                    echo '<p class="text-secondary mt-3">Aucun pays trouvé.</p>';
                }

                echo '<p class="mt-3 mb-0">Pays trouvés : ';
                echo '<span class="badge text-bg-primary"></span></p>';
                echo '</div>';

                $conn = null;
            } catch (PDOException $e) {

                echo '<div class="alert alert-danger">Erreur lors de la recherche.</div>';
            }
        }
        ?>
    </main>
</body>

</html>