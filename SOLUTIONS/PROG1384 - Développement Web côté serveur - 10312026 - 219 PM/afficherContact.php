<!DOCTYPE html>
<html lang="fr">

<head>
        <meta charset="UTF-8">
        <title>Traitement du Formulaire</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <style>
                body {
                        background-color: lightgray;
                }
        </style>
</head>

<body>
        <div class="container mt-5">
                <div class="row">
                        <div class="col-md-6 offset-md-3">
                                <?php

                                if (
                                        isset($_GET['nom']) && !empty($_GET['nom']) &&
                                        isset($_GET['email']) && !empty($_GET['email']) &&
                                        isset($_GET['message']) && !empty($_GET['message'])
                                ) {
                                        $nom = htmlspecialchars($_GET['nom']);
                                        $email = htmlspecialchars($_GET['email']);
                                        $message = htmlspecialchars($_GET['message']);
                                        $longueur = strlen($message); // Calcul de la longueur du message

                                        echo "<div class='alert alert-success' role='alert'>";
                                        echo "<h4 class='alert-heading'>Informations reçues :</h4>";
                                        echo "<p><strong>Nom :</strong> $nom</p>";
                                        echo "<p><strong>Email :</strong> $email</p>";
                                        echo "<p><strong>Message :</strong> $message</p>";
                                        echo "<p><strong>Longueur du Message :</strong> $longueur caractères</p>";
                                        echo "</div>";
                                } else {
                                        echo "<div class='alert alert-danger' role='alert'>Tous les champs sont obligatoires.</div>";
                                }

                                ?>
                        </div>
                </div>
        </div>
</body>

</html>