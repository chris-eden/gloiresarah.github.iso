<?php

require_once('traitement.php');

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mail</title>
    <link rel="stylesheet" href="style.css">
    <style type="text/css">
        .form{
            width:40%;
            margin-top:100px;
            margin-left:auto;
            margin-right:auto;
        }
    </style>
</head>
<body>
    
    <section class="form-container">
        <form method="POST" action="" enctype="multipart/form-data">
            <h1>Envoie horaire</h1> <br>
            <input type="text" name="nom" placeholder="Nom Etudiant" required=""> <br>
            <input type="email" name="email" placeholder="Email" required=""> <br>
            <input type="file" name="file" placeholder="piece ci-jointe"> <br>
            <input type="submit" name="submit" value="envoyer">
        </form>
    </section>
</body>
</html>
