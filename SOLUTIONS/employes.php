<!-- 
        auteur : Joel Boudreau
        date :  2026
        but :
-->
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

    <style type="text/css">
        h1,
        h2 {
            text-align: center;
        }

        body {
            margin: 100px;
            background-color: silver;
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

        div {
            margin: 0 auto;
        }
    </style>
    <title>Employés</title>
</head>

<body>
    <h1>Système des ressources humaines</h1>
    <br />
    <?php
    if (isset($_GET['deptno']) && is_numeric($_GET['deptno'])) {

        // Informations de connexion
        $host = 'localhost';
        $dbname = 'scott';
        $user = 'PROG1384';
        $password = 'CCNB2026';
        try {
            // DSN = Data Source Name
            $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
            $conn = new PDO($dsn, $user, $password);

            $deptnoProtect = htmlspecialchars($_GET['deptno']);
            $deptno = $_GET['deptno'];
            echo "<h2>Employés du département $deptnoProtect </h2>";





            $sql = "SELECT * FROM emp  WHERE deptno= :deptno ORDER BY sal DESC";

            $result = $conn->prepare($sql);
            $result->execute(['deptno' => $deptno]);



            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    ?>

                <div class="card" style="width: 30rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['ename']; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">No : <?= $row['empno']; ?></h6>
                        <p class="card-text"><strong>Salaire:</strong>$<?= $row['sal']; ?>.00 <strong>job:</strong> <?= ucwords(strtolower($row['job'])); ?></p>
                    </div>
                </div>

                <br />

    <?php
            }



            echo '<p class="important">Il y a ' . $result->rowCount() . ' employé(s) dans le département ' . $deptnoProtect . '</p>';
            // Fermeture de la connexion
            $conn = null;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    } else {
        echo '<h2>Problème au niveau du transfert</h2>';
    }
    ?>


</html>