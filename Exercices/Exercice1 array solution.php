<!-- 
        auteur : Joel Boudreau
        date :  2026
        but :
-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <title>Manipulation de tableaux</title>
</head>

<body>
    <h1>Manipulation de tableaux avec index</h1>
    <h2>Vous devez créer un tableau nommé $mois qui contiendra les 12 mois de l'année</h2>
    <?php


    $mois = [
        'Janvier',
        'Février',
        'Mars',
        'Avril',
        'Mai',
        'Juin',
        'Juillet',
        'Aout',
        'Septembre',
        'Octobre',
        'Novembre',
        'Decembre'
    ];


    echo '<h3>Affichage avec la fonction print_r</h3>';
    echo '<pre>';
    print_r($mois);
    echo '</pre>';

    echo '<h3>Afficher avec un for</h3>';
    echo "<div>";
    for ($i = 0; $i < count($mois); $i++) {
        echo $mois[$i] . '<br />';
    }
    echo "</div>";

    echo '<h3>Afficher avec un foreach dans une liste</h3>';

    echo "<ul>";
    foreach ($mois as $value) {
        echo "<li>$value</li>";
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