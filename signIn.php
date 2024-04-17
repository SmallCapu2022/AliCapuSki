<?php
// Inclure la connexion à la base de données
include 'connexion.php';

// Récupérer les données du formulaire de connexion
$identifiant = $_POST['identifiantConnexion'];
$motdepasse = $_POST['motdepasseConnexion'];

echo "id: " . $identifiant . PHP_EOL;
echo "mdp: " . $motdepasse . PHP_EOL;

// Vérifier les informations de connexion dans la base de données
// Code de vérification à implémenter ici

// Suppose que l'authentification est réussie et récupère les informations de l'utilisateur depuis la base de données
$sql = "SELECT * FROM utilisateur WHERE identifiant = '$identifiant'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    // id: 23 mdp: piou array(7) { ["id"]=> string(1) "7" ["nom"]=> string(8) "Capucine" ["identifiant"]=> string(2) "23" ["motdepasse"]=> string(4) "piou" ["commentaire"]=> string(0) "" ["piste_id"]=> NULL ["remontee_id"]=> NULL }
    // Stocker les informations de l'utilisateur dans la session
    session_start();
    $_SESSION['identifiant'] = $user;

    // Redirection vers la page d'accueil ou autre après connexion réussie
    header("Location: index.php");
    exit;
} else {
    echo "Identifiant ou mot de passe incorrect";
}
?>
