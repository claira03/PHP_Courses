<!--
        auteur :Joel Boudreau
        date : 2026
       
-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <title>Commpresse</title>

</head>

<body>
    <h1>Liste des communiqués</h1>
    <ul>
        <?php
        require_once('DateHelper.inc.php');

        //Vous devez utiliser la connection suivante 
        //Attention : Ne pas être connecté sur ProgWifi
        $dsnCollegeDev = "mysql:host=college-dev.com;dbname=profti_enclasse;charset=utf8";

        try {
            $conn = new PDO($dsnCollegeDev, 'proft_simpleuser', 'Prog*2021');


            $sql = "SELECT recid,titlefr,diffdate FROM releases";

            $result = $conn->query($sql);


            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                // echo "<li>{$row['recid']} {$row['titlefr']} {$row['diffdate']}</li>";
                echo "<li>" . dateEnMots($row['diffdate'], 'fr') . " : <a href='detail.php?recid={$row['recid']}'>{$row['titlefr']}</a></li>";
            }
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
        ?>


    </ul>
</body>

</html>