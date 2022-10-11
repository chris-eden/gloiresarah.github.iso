<?php

@include 'config.php';

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $lieux = mysqli_real_escape_string($conn,$_POST['lieux']);
    $date = mysqli_real_escape_string($conn,$_POST['date']);
    $promotion = $_POST['promotion'];
    
    $select = "SELECT * FROM user_etudiant WHERE email = '$email' && password = '$password' ";

    $result = mysqli_query($conn,$select);

    if (mysqli_num_rows($result) > 0){

        $error[] ='user already exist!';

    } else {

        if($password != $cpassword){
            $error[] = 'password not matched!';
        }else{
            $insert = "INSERT INTO user_etudiant(name, email, password, lieux, date, promotion) VALUES ('$name','$email','$password','$lieux','$date','$promotion')";
            mysqli_query($conn, $insert);
            header('location:admin.php');
        }
    }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">

    <form action="" method="post">
        <h3>Inscrire un(e) étudiant(e)</h3>
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
        }; 

        ?>
        <input type="text" name="name" require placeholder="Entre votre nom">
        <input type="email" name="email" require placeholder="Entre votre email">
        <input type="password" name="password" require placeholder="Entre votre password">
        <input type="password" name="cpassword" require placeholder="Entre votre confirme le password">
        <input type="text" name="lieux" require placeholder="Entre lieux de naissance">
        <input type="date" name="date" require placeholder="Entre la date de naissance">
        <select name="promotion">
            <option value="Bac1">Bac1</option>
            <option value="Bac2">Bac2</option>
            <option value="Bac3">Bac3</option>
            <option value="L1">L1</option>
            <option value="L2">L2</option>
        </select>
        <input type="submit" name="submit" value="inscrire" class="form-btn">
        <p> <a href="admin.php">Admin</a></p>
    </form>
    </div>
</body>
</html>