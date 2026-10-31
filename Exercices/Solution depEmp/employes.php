<?php
// Connexion à la base de données scott (PDO)
$host = 'localhost';
$dbname = 'scott';
$user = 'PROG1384';
$password = 'CCNB2026';

$valide = false;
$deptno = 0;
$employes = [];
$erreur = "";

// Partie 2 : récupérer et valider le numéro de département reçu par l'URL
if (isset($_GET['deptno']) && is_numeric($_GET['deptno'])) {
    $deptno = (int) $_GET['deptno'];
    $valide = true;
}

// Partie 3 : employés du département (requête préparée), salaire décroissant 
if ($valide) {
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare(
            "SELECT empno, ename, sal, job FROM emp WHERE deptno = ? ORDER BY sal DESC"
        );
        $stmt->execute([$deptno]);
        $employes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $erreur = "Erreur de base de données : " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Employés</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h1>Employés</h1>

        <?php if (!$valide): ?>
        <div class="alert alert-danger">Information invalide. Vous devez choisir un département.</div>

        <?php elseif ($erreur !== ""): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($erreur); ?></div>

        <?php else: ?>
        <!-- Partie 4 : une carte Bootstrap par employé -->
        <?php foreach ($employes as $emp): ?>
        <div class="card mb-3" style="width: 30rem;">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($emp['ename']); ?></h5>
                <h6 class="card-subtitle mb-2 text-muted">No : <?php echo htmlspecialchars($emp['empno']); ?></h6>
                <p class="card-text">
                    Salaire : $<?php echo number_format((float) $emp['sal'], 2, '.', ''); ?>
                    | Job : <?php echo htmlspecialchars(ucfirst(strtolower($emp['job']))); ?>
                </p>
            </div>
        </div>
        <?php endforeach; ?>

        <!-- Partie 5 : nombre d'employés -->
        <p>Il y a <?php echo count($employes); ?> employé(s) dans le département <?php echo $deptno; ?>.</p>
        <?php endif; ?>

        <p><a href="departements.php">&larr; Retour aux départements</a></p>
    </div>
</body>

</html>