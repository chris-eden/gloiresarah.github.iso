<?php
$dbb = new PDO('mysql:host=localhost;dbname=user_db','root','');

$etudiant = $dbb->query('SELECT * FROM bacD');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>administration</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
            <div class="content">
            <h3><span>Liste des étudiants</span></h3>
                <ul>
                    <?php while($m = $etudiant->fetch()){ ?>
                        <li><?= $m['id'] ?> : <?= $m['name'] ?> : <?= $m['email'] ?> : <?= $m['promotion'] ?></li>. <a href="mail.php" class="btn">Envoie horaire</a>
                    <?php }?>
                </ul>
            </div>
    </div>
</body>
</html>

