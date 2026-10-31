<?php
// Connexion à la base de données scott (PDO)
$host = 'localhost';
$dbname = 'scott';
$user = 'PROG1384';
$password = 'CCNB2026';

$departements = [];
$erreur = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Partie 1 : tous les départements, triés par emplacement croissant
    $stmt = $pdo->prepare("SELECT deptno, dname, loc FROM dept ORDER BY loc ASC");
    $stmt->execute();
    $departements = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $erreur = "Erreur de connexion : " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Départements</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h1>Départements</h1>

        <?php if ($erreur !== ""): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($erreur); ?></div>
        <?php endif; ?>

        <div class="row">
            <?php foreach ($departements as $dept): ?>
                <?php
                // Le lien est généré automatiquement pour chaque département
                $url = "employes.php?" . http_build_query(["deptno" => $dept['deptno']]);
                ?>
                <div class="col-auto mb-3">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($dept['dname']); ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted">No : <?php echo htmlspecialchars($dept['deptno']); ?></h6>
                            <p class="card-text">Emplacement : <?php echo htmlspecialchars($dept['loc']); ?></p>
                            <a href="<?php echo htmlspecialchars($url); ?>" class="card-link"> Employés </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>
