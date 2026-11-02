<?php
if (!isset($_GET['recid']) || !is_numeric($_GET['recid'])) {
    header("Location: commpresse.php");
    exit;
}
require_once('DateHelper.inc.php');

//Vous devez utiliser la connection suivante 
//Attention : Ne pas être connecté sur ProgWifi
$dsnCollegeDev = "mysql:host=college-dev.com;dbname=profti_enclasse;charset=utf8";

try {
    $conn = new PDO($dsnCollegeDev, 'proft_simpleuser', 'Prog*2021');


    $sql = $query = "SELECT titlefr, bodyfr, diffdate, sourcefr " .
        "FROM releases " .
        "WHERE recid= :recid";

    $result = $conn->prepare($sql);
    $result->execute([':recid' => $_GET['recid']]);

    //Vu que recid est la PK la requete retourne seulement un enregistrement
    //Si la requete ne retourne rien, $row va être égale a false
    $row = $result->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}
?>
<!doctype html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <title>Pouce Vert: Communiqué de presse</title>

</head>

<body>

    <h1>Communiqué de presse</h1>

    <p><a href="commpresse.php">Retour à la liste</a></p>

    <?php if ($row == false) { ?>
        Ce communiqué n'est pas disponible.
    <?php } else {
    ?>

        <h2><?= $row['titlefr']; ?></h2>

        <p>
            <strong>
                <?php
                $thedate = $row['diffdate'];
                echo dateEnMots($thedate, 'fr') . " --";
                ?>
            </strong>
            <?php
            $body = $row['bodyfr'];
            echo nl2br($body);
            //echo $body;
            //nl2br est une fonction qui traduit les /n en <br>
            ?>
        </p>

        <p>Source: <?= $row['sourcefr']; ?></p>

    <?php
    }

    ?>
</body>

</html>