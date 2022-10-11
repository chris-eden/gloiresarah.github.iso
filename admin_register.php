<?php

@include 'config.php';

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];
    
    $select = "SELECT * FROM user_admin WHERE email = '$email' && password = '$password' ";

    $result = mysqli_query($conn,$select);

    if (mysqli_num_rows($result) > 0){

        $error[] ='user already exist!';

    } else {

        if($password != $cpassword){
            $error[] = 'password not matched!';
        }else{
            $insert = "INSERT INTO user_admin(name, email, password, user_type) VALUES ('$name','$email','$password','$user_type')";
            mysqli_query($conn, $insert);
            header('location:login.php');
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
        <h3>Ajouter un Admin</h3>
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
        <select name="user_type">
            <option value="admin">admin</option>
        </select>
        <input type="submit" name="submit" value="inscrire" class="form-btn">
        <p>Deja admin <a href="login.php">Login</a></p>
    </form>


    </div>
</body>
</html>