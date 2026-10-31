<!--
        auteur :Joel Boudreau
        date : 2026
       
-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Array Associatif</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>


    <style>
        #provincesFrm {
            margin: 50px;
        }

        select,
        option {
            font-size: 25px;
        }
    </style>
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
    <div id="provincesFrm">
        <?php
        $provinces = [
            'YT' => 'Yukon',
            'NT' => 'Territoires du Nord-Ouest',
            'NU' => 'Nunavut',
            'BC' => 'Colombie-Britannique',
            'AB' => 'Alberta',
            'SK' => 'Saskatchewan',
            'MB' => 'Manitoba',
            'ON' => 'Ontario',
            'QC' => 'Québec',
            'PEI' => 'Île-du-Prince-Édouard',
            'NL' => 'Terre-Neuve-et-Labrador',
            'NB' => 'Nouveau-Brunswick',
            'NS' => 'Nouvelle-Écosse'
        ];
        ksort($provinces);
        //asort($provinces);
        ?>
        <h1>Provinces et territoires</h1>


        <form action="" method="get">
            <h2>Entrer votre nom</h2>
            <input type="text" name="txtNom" /><br /><br />
            <h2>Sélectionner une province ou un territoire</h2>
            <select name="provinces">
                <?php
                foreach ($provinces as $code => $provinces) {
                    echo "<option value \"".$code."\">$provinces</option>";
                }
                ?>
                
            </select>
            <br /><br />
            <input type="submit" value="Afficher" class="btn btn-success" />
        </form>
    </div>
</body>

</html>