<?php
// 1. On vérifie si le formulaire a été soumis avec une vraie chaîne.
//    str_replace(" ", "", ...) enlève tous les espaces :
//    s'il ne reste rien, la chaîne est considérée comme vide.
$chaine = "";
$valide = false;

if (isset($_GET['chaine']) && str_replace(" ", "", $_GET['chaine']) !== "") {
    $chaine = $_GET['chaine'];
    $valide = true;
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Devoir 2 - Fonctions pour String</title>
    <style>
        input[type="text"] {
            width: 400px;
            font-size: 24px;
            padding: 5px;
        }

        input[type="submit"] {
            font-size: 24px;
            font-weight: bold;
            background-color: orange;
            padding: 5px 10px;
        }
    </style>
</head>

<body>
    <h1>Devoir 2 Fonctions pour String</h1>

    <form method="GET" action="devoir2.php">
        <input type="text" name="chaine" value="<?php echo htmlspecialchars($chaine); ?>">
        <input type="submit" value="Traiter">
    </form>

    <hr>

    <?php
    // 2. On affiche les résultats seulement si la chaîne est valide.
    if ($valide) {

        // Longueur de la chaîne
        $longueur = strlen($chaine);

        // Mots : explode() coupe la chaîne à chaque espace
        $mots = explode(" ", $chaine);
        $nbMots = count($mots);

        // Nombre de lettres 'e'
        $nbE = substr_count($chaine, 'e');

        echo "La chaine est : " . htmlspecialchars($chaine) . "<br>\n";
        echo "La chaine est d'une longueur de $longueur caractère(s)<br>\n";
        echo "La chaine en majuscule est : " . htmlspecialchars(strtoupper($chaine)) . "<br>\n";
        echo "La chaine embellie avec des * sur 20 caractères totals :"
            . htmlspecialchars(str_pad($chaine, 20, "*", STR_PAD_BOTH)) . "<br>\n";
        echo "La chaine affichée à l'envers : " . htmlspecialchars(strrev($chaine)) . "<br>\n";
        echo "La chaine en initcap : " . htmlspecialchars(ucwords($chaine)) . "<br>\n";
        echo "La chaine possède $nbE 'e'<br>\n";
        echo "Les mots de la chaine tapée sont :\n";

        echo "<ul>\n";
        foreach ($mots as $mot) {
            echo "    <li>" . htmlspecialchars($mot) . "</li>\n";
        }
        echo "</ul>\n";

        echo "Il y a $nbMots mot(s) dans la phrase\n";
    }
    ?>
</body>

</html>
