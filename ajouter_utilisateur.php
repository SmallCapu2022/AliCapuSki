<?php
// Inclure la connexion à la base de données
include 'connexion.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si les données POST existent et ne sont pas vides
    if (isset($_POST['nom']) && isset($_POST['identifiant']) && isset($_POST['motdepasse'])) {
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
    } else {
        echo "Veuillez remplir tous les champs du formulaire.";
    }
} else {
    echo "Le formulaire n'a pas été soumis.";
}

// Fermer la connexion à la base de données
$conn->close();
?>
