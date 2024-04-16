<?php
// Inclure la connexion à la base de données
include 'connexion.php';

// Récupérer les données du formulaire
$nom = $_POST['nom'];
$identifiant = $_POST['identifiant'];
$motdepasse = $_POST['motdepasse'];

// Préparer et exécuter la requête SQL d'insertion
$sql = "INSERT INTO utilisateur (nom, identifiant, motdepasse) VALUES ('$nom', '$identifiant', '$motdepasse')";

if ($conn->query($sql) === TRUE) {
    echo "Utilisateur ajouté avec succès.";
} else {
    echo "Erreur lors de l'ajout de l'utilisateur : " . $conn->error;
}

// Fermer la connexion à la base de données
$conn->close();
?>
