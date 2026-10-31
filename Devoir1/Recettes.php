<!--
        auteur :Claira Cyntiche Nguemete
        date : 25/09/2026
       
-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Devoir 1 - Recettes</title>
</head>

<body>
    <h1>Affichage des recettes</h1>
    <h2>Voici la liste des recettes disponibles</h2>
    <?php
    // Lecture du contenu du fichier
    $tabRecettes = scandir('xmlRecettes');
    //print_r($tabRecettes);

    //Creation du nouveau tableau 
    $newTabRecettes = [];

    //Afficher les recettes dans la liste
    echo "<ul>";
    foreach ($tabRecettes as $key => $recette) {
        if($recette != "." && $recette != ".."){
            if(str_ends_with($recette, ".xml")){
                $nomAffichage = substr($recette, 0, -4) . " " ;
                $nomAffichage = str_replace("_", " ", $nomAffichage);

                // ajouter les recettes dans le nouveau tableau et attribuer la nouvelle variable 
                 $newTabRecettes[$recette] = $nomAffichage;

                echo "<li>
                $nomAffichage <br>
                </li>";
            }   
        }           
        
    }
    "</ul>";
    ?>   

        <!--Afficher les recettes dans le select-->
        <h3>Selectionner une recette afin d'afficher les ingredients</h3>
        <select name= Recettes>Choisir une recette
            <?php
                    foreach ($newTabRecettes as $key => $value) {
                        echo "<option value='$key'>$value</option>";
                    }   
            ?>
        </select>
</body>

</html>