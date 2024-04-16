<?php
// Informations de connexion à la base de données
$servername = "localhost";  // Nom du serveur MySQL (généralement 'localhost' si la base de données est sur le même serveur que le script PHP)
$username = "root";  // Nom d'utilisateur MySQL
$password = "";  // Mot de passe MySQL
$dbname = "ski";  // Nom de la base de données MySQL importée depuis piste.sql

// Création de la connexion à la base de données avec identifiant et mot de passe
$conn = new mysqli($servername, $username, $password, $dbname);


// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}
?>
