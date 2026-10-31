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
    <?php
    const MAX = 1000;
    const FACT = 8;
    $facto = 1;

    // Afficher les nombres impairs
    echo "\n<h2>Tous les nombres impaires de 1 a " .MAX. " sont :</h2> "; 
    for ($i = 1; $i <= 1000; $i++){
        if($i % 2 != 0)
            echo "\n$i"; 
    }

    // Calcul du factoriel de 8
    echo "<br> <br><h2>Factoriel de 8 : </h2>";
    for ($i=1; $i <= FACT; $i++) { 
         $facto = $facto*$i;
    }
         echo $facto

    //
    ?>
</body>

</html>