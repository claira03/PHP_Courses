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
    <title>Départements</title>
</head>

<body>
    <h1>Système des ressources humaines</h1>
    <br />
    <h2>Liste des départements</h2>
    <br />
    <div>
        <?php



        // Informations de connexion
        $host = 'localhost';
        $dbname = 'scott';
        $user = 'PROG1384';
        $password = 'CCNB2026';

        // DSN = Data Source Name
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

        try {


            // Création de la connexion PDO
            $conn = new PDO($dsn, $user, $password);


            $sql = 'SELECT * FROM dept ORDER BY loc';

            $result = $conn->query($sql);


            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        ?>

                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['dname']; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">No : <?= $row['deptno']; ?></h6>
                        <p class="card-text">Emplacement : <?= $row['loc']; ?> </p>
                        <a href="employes.php?deptno=<?= $row['deptno']; ?>" class="card-link">Employés</a>
                    </div>
                </div>
                <br>

        <?php
            }
            echo '<p class="important">Il y a ' . $result->rowCount() . ' département(s)</p>';

            // Fermeture de la connexion
            $conn = null;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
        ?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>