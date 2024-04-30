<?php
session_start();

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inclure le fichier de connexion à la base de données
    include_once "connexion.php";

    // Récupérer la piste et le nouvel état envoyés depuis le formulaire
    $piste = $_POST['piste'];
    $nouvelEtat = $_POST['nouvelEtat']; // Ajoutez un champ "nouvelEtat" dans votre formulaire pour récupérer le nouvel état

    // Si le nouvel état est "fermé", mettre à jour sa valeur dans la base de données
    if ($nouvelEtat == "fermé") {
        $nouvelEtat = "fermé"; // Modifier l'état si nécessaire
    }
    // Préparer la requête SQL pour mettre à jour l'état de la piste dans la base de données
    $sql = "UPDATE piste SET etat='$nouvelEtat' WHERE nom='$piste'";
    

    // Exécuter la requête SQL
    if ($conn->query($sql) === TRUE) {
        // Rediriger l'utilisateur vers la page d'accueil
        header("location: accueil.php");
    } else {
        echo "Erreur lors de la mise à jour de l'état de la piste : " . $conn->error;
    }

    // Fermer la connexion à la base de données
    $conn->close();
} else {
    // Si le formulaire n'a pas été soumis via la méthode POST, rediriger vers la page d'accueil
    header("location: accueil.php");
}
?>
