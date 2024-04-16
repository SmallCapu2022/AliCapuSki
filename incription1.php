<?php
// Inclure la connexion à la base de données
include 'connexion.php';

// Récupérer les données du formulaire d'inscription
$nom = $_POST['nom'];
$identifiant = $_POST['identifiant'];
$motdepasse = $_POST['motdepasse'];

// Insérer les données dans la table utilisateur
$sql = "INSERT INTO utilisateur (nom, identifiant, motdepasse) VALUES ('$nom', '$identifiant', '$motdepasse')";

if ($conn->query($sql) === TRUE) {
    echo "Inscription réussie. Vous pouvez maintenant vous connecter.";
    // Redirection vers la page d'accueil ou autre après connexion réussie
    header("Location: utilisateur.html");
    exit;
} else {
    echo "Erreur lors de l'inscription : " . $conn->error;
}

// Fermer la connexion à la base de données
$conn->close();
?>
