
    <p><a href="admin_dashboard.php">Dashboard</a></p>
    <p><a href="index.php">Retour au catalogue</a></p>
    <p><a href="add_game.php">Add New Game</a></p>
    <p><a href="add_editeur.php">Ajouter un éditeur</a></p>
    <p><a href="utilisateurs/liste.php">Gérer les utilisateurs</a></p>
<?php include '../includes/navbar.php'; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="mt-4">Tableau de bord administrateur</h1>
        </div>
    </div>
<div class="row">
    <div class="col-12">
        <h1 class="mb-4">
            <i class="fas fa-tachometer-alt me-2"></i>Tableau de bord administrateur
        </h1>
    </div>
</div>

<!-- Statistiques principales -->
<div class="row mb-4">
    <div class="col-md-3 col-sm-6 mb-3">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="card-title"><?= number_format($stats['jeux']) ?></h4>
                        <p class="card-text">Jeux</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-gamepad fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 col-sm-6 mb-3">
        <div class="card bg-success text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="card-title"><?= number_format($stats['editeurs']) ?></h4>
                        <p class="card-text">Éditeurs</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-building fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 col-sm-6 mb-3">
        <div class="card bg-info text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="card-title"><?= number_format($stats['users']) ?></h4>
                        <p class="card-text">Utilisateurs</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 col-sm-6 mb-3">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="card-title"><?= number_format($stats['admins']) ?></h4>
                        <p class="card-text">Administrateurs</p>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-user-shield fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Actions rapides -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-bolt me-2"></i>Actions rapides
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 col-sm-6 mb-2">
                        <a href="jeux/add_game.php" class="btn btn-success btn-block w-100">
                            <i class="fas fa-plus me-2"></i>Ajouter un jeu
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-2">
                        <a href="editeurs/add_editeur.php" class="btn btn-info btn-block w-100">
                            <i class="fas fa-building me-2"></i>Ajouter un éditeur
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-2">
                        <a href="utilisateurs/liste.php" class="btn btn-primary btn-block w-100">
                            <i class="fas fa-users me-2"></i>Gérer utilisateurs
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-2">
                        <a href="parametres.php" class="btn btn-secondary btn-block w-100">
                            <i class="fas fa-cog me-2"></i>Paramètres
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contenu principal -->
<div class="row">
    <!-- Derniers jeux ajoutés -->
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">
                    <i class="fas fa-gamepad me-2"></i>Derniers jeux ajoutés
                </h5>
                <a href="jeux/liste.php" class="btn btn-sm btn-outline-primary">Voir tout</a>
            </div>
            <div class="card-body">
                <?php if (empty($derniers_jeux)): ?>
                    <p class="text-muted mb-0">Aucun jeu ajouté récemment.</p>
                <?php else: ?>
                    <div class="list-group list-group-flush">
                        <?php foreach ($derniers_jeux as $jeu): ?>
                            <div class="list-group-item px-0">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="mb-1"><?= htmlspecialchars($jeu['nom']) ?></h6>
                                        <p class="mb-1 text-muted small">
                                            <i class="fas fa-building me-1"></i>
                                            <?= htmlspecialchars($jeu['editeur_nom'] ?? 'Éditeur inconnu') ?>
                                        </p>
                                        <?php if (!empty($jeu['genre'])): ?>
                                            <span class="badge bg-secondary"><?= htmlspecialchars($jeu['genre']) ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <small class="text-muted">
                                        <?= date('d/m/Y', strtotime($jeu['date_ajout'])) ?>
                                    </small>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Derniers utilisateurs inscrits -->
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">
                    <i class="fas fa-users me-2"></i>Derniers utilisateurs inscrits
                </h5>
                <a href="utilisateurs/liste.php" class="btn btn-sm btn-outline-primary">Voir tout</a>
            </div>
            <div class="card-body">
                <?php if (empty($derniers_users)): ?>
                    <p class="text-muted mb-0">Aucun utilisateur inscrit récemment.</p>
                <?php else: ?>
                    <div class="list-group list-group-flush">
                        <?php foreach ($derniers_users as $user): ?>
                            <div class="list-group-item px-0">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="mb-1"><?= htmlspecialchars($user['nom_utilisateur']) ?></h6>
                                        <p class="mb-1 text-muted small">
                                            <?= htmlspecialchars($user['nom'] . ' ' . $user['prenom']) ?>
                                        </p>
                                        <small class="text-muted">
                                            <i class="fas fa-envelope me-1"></i>
                                            <?= htmlspecialchars($user['email']) ?>
                                        </small>
                                    </div>
                                    <small class="text-muted">
                                        <?= date('d/m/Y', strtotime($user['date_creation'])) ?>
                                    </small>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Statistiques par genre -->
<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-chart-pie me-2"></i>Jeux par genre (Top 5)
                </h5>
            </div>
            <div class="card-body">
                <?php if (empty($jeux_par_genre)): ?>
                    <p class="text-muted mb-0">Aucune donnée disponible.</p>
                <?php else: ?>
                    <?php foreach ($jeux_par_genre as $genre): ?>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span><?= htmlspecialchars($genre['genre']) ?></span>
                            <div class="d-flex align-items-center">
                                <div class="progress me-2" style="width: 100px; height: 10px;">
                                    <div class="progress-bar" role="progressbar" 
                                         style="width: <?= ($genre['count'] / $stats['jeux']) * 100 ?>%"></div>
                                </div>
                                <span class="badge bg-primary"><?= $genre['count'] ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Activité récente -->
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-clock me-2"></i>Activité récente
                </h5>
            </div>
            <div class="card-body">
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-marker bg-success"></div>
                        <div class="timeline-content">
                            <h6 class="timeline-title">Système en ligne</h6>
                            <p class="timeline-text">Le tableau de bord est opérationnel</p>
                            <small class="text-muted">Maintenant</small>
                        </div>
                    </div>
                    <?php if (!empty($derniers_jeux)): ?>
                        <div class="timeline-item">
                            <div class="timeline-marker bg-primary"></div>
                            <div class="timeline-content">
                                <h6 class="timeline-title">Nouveau jeu ajouté</h6>
                                <p class="timeline-text"><?= htmlspecialchars($derniers_jeux[0]['nom']) ?></p>
                                <small class="text-muted">
                                    <?= date('d/m/Y à H:i', strtotime($derniers_jeux[0]['date_ajout'])) ?>
                                </small>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($derniers_users)): ?>
                        <div class="timeline-item">
                            <div class="timeline-marker bg-info"></div>
                            <div class="timeline-content">
                                <h6 class="timeline-title">Nouvel utilisateur</h6>
                                <p class="timeline-text"><?= htmlspecialchars($derniers_users[0]['nom_utilisateur']) ?> s'est inscrit</p>
                                <small class="text-muted">
                                    <?= date('d/m/Y à H:i', strtotime($derniers_users[0]['date_creation'])) ?>
                                </small>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 15px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: #e9ecef;
}

.timeline-item {
    position: relative;
    margin-bottom: 20px;
}

.timeline-marker {
    position: absolute;
    left: -37px;
    top: 5px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 2px solid #fff;
    box-shadow: 0 0 0 3px #e9ecef;
}

.timeline-content {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 8px;
    border-left: 3px solid #007bff;
}

.timeline-title {
    margin-bottom: 5px;
    font-size: 14px;
    font-weight: 600;
}

.timeline-text {
    margin-bottom: 5px;
    font-size: 13px;
    color: #6c757d;
}
</style>

<?php include '../includes/footer.php'; ?>