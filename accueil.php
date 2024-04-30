<?php
session_start();

// Vérifier si l'utilisateur est connecté, sinon le rediriger vers la page de connexion
if (!isset($_SESSION["identifiant"]) || $_SESSION["identifiant"] == false) {
    header("location: utilisateur.html");
    exit;
}

// Inclure le fichier de connexion à la base de données
include_once "connexion.php";

// Vérifier si le formulaire a été soumis pour modifier l'état d'une piste
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['piste']) && isset($_POST['nouvelEtat'])) {
        // Récupérer la piste et le nouvel état envoyés depuis le formulaire
        $piste = $_POST['piste'];
        $nouvelEtat = $_POST['nouvelEtat'];
        $commentaire = $_POST['commentaire'];

        // Préparer la requête SQL pour mettre à jour l'état et le commentaire de la piste dans la base de données
        $sqlPiste = "UPDATE piste SET etat=?, commentaire=? WHERE nom=?";
        $stmtPiste = $conn->prepare($sqlPiste);
        $stmtPiste->bind_param("sss", $nouvelEtat, $commentaire, $piste);

        // Exécuter la requête préparée pour la piste
        if ($stmtPiste->execute()) {
            // Rediriger l'utilisateur vers la page d'accueil pour rafraîchir les données
            header("location: accueil.php");
            exit;
        } else {
            echo "Erreur lors de la mise à jour de l'état de la piste : " . $conn->error;
        }
    } elseif (isset($_POST['remontee']) && isset($_POST['nouvelEtatRem'])) {
        // Récupérer la remontée et le nouvel état envoyés depuis le formulaire
        $remonteeId = $_POST['remontee'];
        $nouvelEtatRem = $_POST['nouvelEtatRem'];
        $commentaireRem = $_POST['commentaireRem'];

        // Préparer la requête SQL pour mettre à jour l'état et le commentaire de la remontée dans la base de données
        $sqlRemontee = "UPDATE remontee SET etat=?, commentaire=? WHERE nom=?";
        $stmtRemontee = $conn->prepare($sqlRemontee);
        $stmtRemontee->bind_param("sss", $nouvelEtatRem, $commentaireRem, $remonteeId);

        // Exécuter la requête préparée pour la remontée
        if ($stmtRemontee->execute()) {
            // Rediriger l'utilisateur vers la page d'accueil pour rafraîchir les données
            header("location: accueil.php");
            exit;
        } else {
            echo "Erreur lors de la mise à jour de l'état de la remontée : " . $conn->error;
        }
    }
}

// Sélectionner toutes les pistes depuis la base de données
$sqlPistes = "SELECT DISTINCT nom, couleur, etat, commentaire FROM piste";
$resultPistes = $conn->query($sqlPistes);

// Sélectionner toutes les remontées depuis la base de données
$sqlRemontees = "SELECT nom, etat, commentaire FROM remontee";
$resultRemontees = $conn->query($sqlRemontees);
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
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>

<!-- Barre de navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Waze Queyras</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link"
                   href="<?php echo isset($_SESSION['identifiant']) ? 'profil.php' : 'utilisateur.html'; ?>">Mon
                    profil</a>
            </li>
            <li class="nav-item">
                <a href="logout.php" class="btn btn-secondary custom-btn btn-lg active" role="button"
                   aria-pressed="true">Se déconnecter</a>
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
    <h1>Welcome !</h1>
    <p>Souhaitez-vous informer sur l'état d'une piste ou d'une remontée ?</p>

    <!-- Formulaire pour modifier l'état d'une piste -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="piste">Modifier l'état d'une piste :</label>
        <select id="piste" name="piste">
            <?php
            // Afficher les options pour chaque piste
            if ($resultPistes->num_rows > 0) {
                while ($row = $resultPistes->fetch_assoc()) {
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
        <label for="commentaire">Commentaire :</label>
        <input type="text" id="commentaire" name="commentaire">
        <input type="submit" value="Modifier">
    </form>

    <!-- Formulaire pour modifier l'état d'une remontée -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="remontee">Modifier l'état d'une remontée :</label>
        <select id="remontee" name="remontee">
            <?php
            // Afficher les options pour chaque remontée
            if ($resultRemontees->num_rows > 0) {
                while ($row = $resultRemontees->fetch_assoc()) {
                    echo "<option value='" . $row['nom'] . "'>" . $row['nom'] . "</option>";
                }
            }
            ?>
        </select>
        <label for="nouvelEtatRem">Nouvel état :</label>
        <select id="nouvelEtatRem" name="nouvelEtatRem">
            <option value="ouvert">Ouvert</option>
            <option value="fermé">Fermé</option>
        </select>
        <label for="commentaireRem">Commentaire :</label>
        <input type="text" id="commentaireRem" name="commentaireRem">
        <input type="submit" value="Modifier">
    </form>

    <!-- Affichage des données des pistes -->
    <h2>État des pistes</h2>
    <?php
    // Réinitialiser le pointeur de résultat de la requête SQL
    $resultPistes->data_seek(0);

    // Afficher les données des pistes dans un tableau HTML
    echo "<table class='table'>
            <thead>
                <tr>
                    <th>Nom de la piste</th>
                    <th>État</th>
                    <th>Commentaire</th>
                </tr>
            </thead>
            <tbody>";
    while ($row = $resultPistes->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['nom'] . "</td>";
        echo "<td>" . $row['etat'] . "</td>";
        echo "<td>" . $row['commentaire'] . "</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
    ?>

    <!-- Affichage des données des remontées -->
    <h2>État des remontées</h2>
    <?php
    // Réinitialiser le pointeur de résultat de la requête SQL pour les remontées
    $resultRemontees->data_seek(0);

    // Afficher les données des remontées dans un tableau HTML
    echo "<table class='table'>
            <thead>
                <tr>
                    <th>Nom de la remontée</th>
                    <th>État</th>
                    <th>Commentaire</th>
                </tr>
            </thead>
            <tbody>";
    while ($row = $resultRemontees->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['nom'] . "</td>";
        echo "<td>" . $row['etat'] . "</td>";
        echo "<td>" . $row['commentaire'] . "</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
    ?>
</div>

<!-- Liens vers les bibliothèques Bootstrap JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Fermer les résultats des requêtes
$resultPistes->free_result();
$resultRemontees->free_result();

// Fermer la connexion à la base de données
$conn->close();
?>
