# ... added section ...
<?php
// Configuration de la base de données
$host = 'db'; // Nom du service db dans docker-compose.yml
$user = 'user'; // Utilisateur défini dans docker-compose.yml
$password = 'password'; // Mot de passe défini dans docker-compose.yml
$db_catalogue = 'catalogue';
$db_utilisateurs = 'utilisateurs';

// Connexion à la base de données catalogue
$conn_catalogue = new mysqli($host, $user, $password, $db_catalogue);

// Vérifier la connexion
if ($conn_catalogue->connect_error) {
    die("Échec de la connexion à la base de données catalogue : " . $conn_catalogue->connect_error);
}
// echo "Connexion à la base de données catalogue réussie !"; // Pour le débogage

// Connexion à la base de données utilisateurs
$conn_utilisateurs = new mysqli($host, $user, $password, $db_utilisateurs);

// Vérifier la connexion
if ($conn_utilisateurs->connect_error) {
    die("Échec de la connexion à la base de données utilisateurs : " . $conn_utilisateurs->connect_error);
}
// echo "Connexion à la base de données utilisateurs réussie !"; // Pour le débogage

// Note : Vous devrez fermer les connexions lorsque vous n'en aurez plus besoin
// $conn_catalogue->close();
// $conn_utilisateurs->close();
?>
# ... end added section ...