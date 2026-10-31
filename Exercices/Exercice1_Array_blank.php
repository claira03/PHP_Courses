<!--
        auteur :Joel Boudreau
        date : 2026
       
-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>template</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>



    </script>
</head>

<body>
    <div class="jumbotron text-center" style="margin-bottom:0">
        <h1><i class="bi bi-code"></i> PROG-1384 <i class="bi bi-code-slash"></i></h1>
        <p>Programmation Web côté serveur </p>
    </div>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="#">Exercice</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="https://www.w3schools.com/php/default.asp">W3Schools PHP
                        Références</a>
                </li>
            </ul>
        </div>
    </nav>
        <h1>Manipulation de tableaux avec index</h1>
    <h2>Vous devez créer un tableau nommé $mois qui contiendra les 12 mois de l'année</h2>
    <?php

    echo '<h3>Affichage avec la fonction print_r</h3>';

    $mois = ['janvier', 'fevrier', 'mars', 'avril', 'mai', 'juin', 'juillet', 'aout', 'septembre', 'octobre', 'novembre', 'decembre'];
    echo '<pre>';
    print_r($mois);
    echo '</pre>';


    echo '<h3>Afficher avec un for</h3>';
    $nbMois = count($mois);

    for ($i = 0; $i < $nbMois; $i++){
        echo $mois[$i]."<br>\n";
    }


    echo '<h3>Afficher avec un foreach dans une liste</h3>';
    echo "<ul>";
    foreach ($mois as $valeur) {
        echo "<li>". $valeur. "</li>";
    }
    echo "</ul>";


    echo '<h3>Trier  et ensuite afficher avec print_r</h3>';
    sort($mois);
    echo '<pre>';
    print_r($mois);
    echo '</pre>';


    echo '<h3>Mélanger et ensuite afficher avec print_r</h3>';
    shuffle($mois);
    echo '<pre>';
    print_r($mois);
    echo '</pre>';
    ?>
</body>

</html>