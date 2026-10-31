<!--
        auteur :Joel Boudreau
        date : 2026
       
-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <title></title>
</head>

<body>
    <?php
    
    foreach ($_GET as $key => $value) {
        echo "$key : $value <br />";
    }

    ?>

</body>

</html>