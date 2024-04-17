<?php
// Fichier logout.php
session_start();  // Initialisation de la session

if (isset($_SESSION['identifiant'])) {
    session_destroy();  // Destruction de la session
    header("Location: utilisateur.html");  // Redirection vers la page de connexion
    exit;  // Assurez-vous que le script est terminé après la redirection
} else {
    echo "Erreur: Aucun utilisateur connecté.";
}
?>
