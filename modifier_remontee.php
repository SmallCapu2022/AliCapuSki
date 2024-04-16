<?php
// Inclure la connexion à la base de données
include 'connexion.php';

// Récupérer l'identifiant de la remontée à modifier depuis le formulaire
$remontee_id = $_POST['remontee'];

// Exemple : mettre à jour l'état de la remontée sélectionnée
$sql = "UPDATE remontee SET etat = 'fermé' WHERE premontee = $remontee_id";

if ($conn->query($sql) === TRUE) {
    echo "État de la remontée mis à jour avec succès.";
} else {
    echo "Erreur lors de la mise à jour de l'état de la remontée : " . $conn->error;
}

// Fermer la connexion à la base de données
$conn->close();
?>
