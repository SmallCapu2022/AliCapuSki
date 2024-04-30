<?php
session_start();

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inclure le fichier de connexion à la base de données
    include_once "connexion.php";

    // Récupérer la remontée et le nouvel état envoyés depuis le formulaire
    $remonteeNom = $_POST['remontee'];
    $nouvelEtat = $_POST['nouvelEtat']; // Assurez-vous d'avoir un champ "nouvelEtat" dans votre formulaire

    // Si le nouvel état est "fermé", mettre à jour sa valeur dans la base de données
    if ($nouvelEtat == "fermé") {
        $nouvelEtat = "fermé";
    }

    // Préparer la requête SQL pour mettre à jour l'état de la remontée dans la base de données
    $sql = "UPDATE remontee SET etat='$nouvelEtat' WHERE nom='$remonteeNom'";

    // Exécuter la requête SQL
    if ($conn->query($sql) === TRUE) {
        // Rediriger l'utilisateur vers la page d'accueil après la mise à jour
        header("location: accueil.php");
        exit;
    } else {
        echo "Erreur lors de la mise à jour de l'état de la remontée : " . $conn->error;
    }

    // Fermer la connexion à la base de données
    $conn->close();
} else {
    // Si le formulaire n'a pas été soumis via la méthode POST, rediriger vers la page d'accueil
    header("location: accueil.php");
    exit;
}
?>
