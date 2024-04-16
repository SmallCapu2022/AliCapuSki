<?php
include 'connexion.php';

$piste_id = $_POST['piste'];

// Exemple : mettre à jour l'état de la piste sélectionnée
$sql = "UPDATE piste SET etat = 'fermé' WHERE ppiste = $piste_id";

if ($conn->query($sql) === TRUE) {
    echo "État de la piste mis à jour avec succès.";
} else {
    echo "Erreur lors de la mise à jour de l'état de la piste : " . $conn->error;
}

$conn->close();
?>
