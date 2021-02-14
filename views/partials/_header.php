<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parc Agricole</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
<nav>
    <ul class="nav bg-info text-white ml-auto">
        <?php if(isset($_SESSION['user'])): ?>
            <li class="nav-item"><a href="?page=home" class="nav-link text-white">Profil</a></li>
            <li class="nav-item"><a href="?page=list" class="nav-link text-white">Liste Produits</a></li>
            <li class="nav-item"><a href="?page=search" class="nav-link text-white">Recherche</a></li>
            <li class="nav-item"><a href="?page=logout" class="nav-link text-white">Déconnexion</a></li>
        <?php else: ?>
            <li class="nav-item"><a href="?page=login" class="nav-link text-white">Connexion</a></li>
            <li class="nav-item"><a href="?page=register" class="nav-link text-white">Inscription</a></li>
        <?php endif; ?>
    </ul>
</nav>
