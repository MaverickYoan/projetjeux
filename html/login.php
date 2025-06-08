<?php
require_once '../config/config.php';

// Vérifier si l'utilisateur est administrateur
if (!isAdmin()) {
    redirect('../index.php');
}

$pageTitle = 'Tableau de bord Admin';

// Récupérer les statistiques
$conn_catalogue = getDbConnection(DB_CATALOGUE);
$conn_utilisateurs = getDbConnection(DB_UTILISATEURS);

// Statistiques générales
$stats = [];

// Nombre de jeux
$result = $conn_catalogue->query("SELECT COUNT(*) as count FROM jeux");
$stats['jeux'] = $result->fetch_assoc()['count'];

// Nombre d'éditeurs
$result = $conn_catalogue->query("SELECT COUNT(*) as count FROM editeurs");
$stats['editeurs'] = $result->fetch_assoc()['count'];

// Nombre d'utilisateurs standards
$result = $conn_utilisateurs->query("SELECT COUNT(*) as count FROM standards");
$stats['users'] = $result->fetch_assoc()['count'];

// Nombre d'administrateurs
$result = $conn_utilisateurs->query("SELECT COUNT(*) as count FROM administrateurs");
$stats['admins'] = $result->fetch_assoc()['count'];

// Derniers jeux ajoutés
$result = $conn_catalogue->query("
    SELECT j.*, e.nom as editeur_nom 
    FROM jeux j 
    LEFT JOIN editeurs e ON j.editeur_id = e.id 
    ORDER BY j.date_ajout DESC 
    LIMIT 5
");
$derniers_jeux = $result->fetch_all(MYSQLI_ASSOC);

// Derniers utilisateurs inscrits
$result = $conn_utilisateurs->query("
    SELECT nom_utilisateur, nom, prenom, email, date_creation 
    FROM standards 
    ORDER BY date_creation DESC 
    LIMIT 5
");
$derniers_users = $result->fetch_all(MYSQLI_ASSOC);

// Jeux par genre
$result = $conn_catalogue->query("
    SELECT genre, COUNT(*) as count 
    FROM jeux 
    WHERE genre IS NOT NULL 
    GROUP BY genre 
    ORDER BY count DESC 
    LIMIT 5
");
$jeux_par_genre = $result->fetch_all(MYSQLI_ASSOC);

include '../includes/header.php';
?>

<div class="row">
    <div class="col-12">
        <h1 class="mb-4">
            <i class="fas fa-tachometer-alt me-2"></i>Tableau de bord administrateur
        </h1>
    </div>
</div>

<!-- Statistiques principales -->
<div class="row mb-4">
    <div class