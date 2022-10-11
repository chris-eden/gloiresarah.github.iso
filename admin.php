<?php
@include 'config.php';

session_start();



?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adimintrateur</title>
    
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <h3>Bonjour <span>Mr le paritaire de l'UMM</span></h3>
            <h1>Bienvenue <span></span></h1>
            <p>ceci est une page d'administration de l'Universite Maria Malkia</p>
            <a href="" class="btn">Ajouter un enseignant</a>
            <a href="register.php" class="btn">inscrit un(e) étudiant(e)</a>
            <a href="etudiant.php" class="btn">horaire</a>
        </div>
    </div>
</body>
</html>