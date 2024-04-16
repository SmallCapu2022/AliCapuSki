<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre application</title>
    <link rel="icon" type="image/png" href="img/favicon.png">
    <!-- Liens vers les bibliothèques Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Styles personnalisés -->
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>

<!-- Barre de navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Waze Queyras</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">À propos</a>
            </li>
        </ul>
        <!-- Afficher le nom de l'utilisateur si connecté -->
        <?php
        session_start();
        if (isset($_SESSION['identifiant'])) {
            $username = $_SESSION['identifiant']['nom']; // Vous devez remplacer 'nom' par le champ approprié de votre table utilisateur
            echo '<span class="navbar-text">Connecté en tant que ' . $username . '</span>';
        }
        ?>
    </div>
</nav>

<!-- Contenu de la page d'accueil -->
<div class="container mt-5">
    <h1>Bienvenue sur votre application</h1>
    <p>C'est ici que vous pouvez afficher toutes les fonctionnalités et les informations importantes de votre application.</p>
    <!-- Ajoutez plus de contenu selon vos besoins -->
</div>

<!-- Liens vers les bibliothèques Bootstrap JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
