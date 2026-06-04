<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GesEmp - Gestion des Employés</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">GesEmp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ">
                    <?php if(isset($_SESSION['user']) && $_SESSION['user']->getTypeUser()->value=="ADMIN"):?>
                        <li class="nav-item">
                            <a class="nav-link active" href="/departement/list">Départements</a>
                        </li>
                    <?php endif?>
                    <li class="nav-item">
                        <a class="nav-link" href="/employe/list">Employés</a>
                    </li>
                      <?php if(isset($_SESSION['user']) && $_SESSION['user']->getTypeUser()->value=="CHEF"):?>
                         <li class="nav-item active">
                           <a class="nav-link" href="/tache/list">Mes Taches</a>
                         </li>
                    <?php endif?>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><?php echo isset($_SESSION['user']) ? $_SESSION['user'] : 'Utilisateur'; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/security/logout">Deconnexion</a>
                    </li>
                </ul>
            </div>
        </div>
</nav>