<?php
session_start();

// Vérifier si l'utilisateur est connecté, sinon le rediriger vers la page de connexion
if (!isset($_SESSION["identifiant"]) || $_SESSION["identifiant"] == false) {
    header("location: utilisateur.html");
    exit;
}

// Inclure le fichier de connexion à la base de données
include_once "connexion.php";

// Vérifier si le formulaire a été soumis pour modifier l'état de la piste
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['piste']) && isset($_POST['nouvelEtat'])) {
    // Récupérer la piste et le nouvel état envoyés depuis le formulaire
    $piste = $_POST['piste'];
    $nouvelEtat = $_POST['nouvelEtat'];

    // Si le nouvel état est "fermé", mettre à jour sa valeur dans la base de données
    if ($nouvelEtat == "fermé") {
        $nouvelEtat = "fermé"; // Modifier l'état si nécessaire
    }

    // Préparer la requête SQL pour mettre à jour l'état de la piste dans la base de données
    $sql = "UPDATE piste SET etat='$nouvelEtat' WHERE nom='$piste'";

    // Exécuter la requête SQL
    if ($conn->query($sql) === TRUE) {
        // Rediriger l'utilisateur vers la page d'accueil pour rafraîchir les données
        header("location: index.php");
    } else {
        echo "Erreur lors de la mise à jour de l'état de la piste : " . $conn->error;
    }
}

// Sélectionner toutes les pistes depuis la base de données
// Sélectionner distinctement les noms des pistes depuis la base de données
$sql = "SELECT DISTINCT nom, couleur, etat FROM piste";

$result = $conn->query($sql);
?>

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
            <!--<li class="nav-item active">
                <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
            </li>-->
            <li class="nav-item">
                <a class="nav-link" href="#">À propos</a>
            </li>
            <li class="nav-item">
                <a href="logout.php" class="btn btn-secondary custom-btn btn-lg active" role="button" aria-pressed="true">Log Out</a>
            </li>
        </ul>
        <!-- Afficher le nom de l'utilisateur si connecté -->
        <?php
        if (isset($_SESSION['identifiant'])) {
            $username = $_SESSION['identifiant']['nom']; // Remplacez 'nom' par le champ approprié de votre table utilisateur
            echo '<span class="navbar-text">Connecté en tant que ' . $username . '</span>';
        }
        ?>
    </div>
</nav>

<!-- Contenu de la page d'accueil -->
<div class="container mt-5">
    <h1>Bienvenue sur votre application</h1>
    <p>C'est ici que vous pouvez afficher toutes les fonctionnalités et les informations importantes de votre application.</p>

    <!-- Formulaire pour modifier l'état d'une piste -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="piste">Modifier l'état d'une piste :</label>
        <select id="piste" name="piste">
            <?php
            // Afficher les options pour chaque piste
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['nom'] . "'>" . $row['nom'] . "</option>";
                }
            }
            ?>
        </select>
        <label for="nouvelEtat">Nouvel état :</label>
        <select id="nouvelEtat" name="nouvelEtat">
            <option value="ouvert">Ouvert</option>
            <option value="fermé">Fermé</option>
        </select>
        <input type="submit" value="Modifier">
    </form>

    <!-- Affichage des données des pistes -->
    <h2>État des pistes</h2>
    <?php
    // Réinitialiser le pointeur de résultat de la requête SQL
    $result->data_seek(0);

    // Afficher les données des pistes dans un tableau HTML
    echo "<table class='table'>
            <thead>
                <tr>
                    <th>Nom de la piste</th>
                    <th>État</th>
                    <th>Difficulté</th>
                </tr>
            </thead>
            <tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['nom'] . "</td>";
        echo "<td>" . $row['etat'] . "</td>";
        echo "<td>" . $row['couleur'] . "</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
    ?>
</div>

<!-- Liens vers les bibliothèques Bootstrap JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="navigation.js"></script>
<div class="footer">
    <p> Copyright&copy; 2024 Alicia & Capucine </p>
</div>
</body>
</html>

<?php
// Fermer la connexion à la base de données
$conn->close();
?>
