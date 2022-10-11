<?php

@include 'config.php';

if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = md5($_POST['password']);
    
    $select = "SELECT * FROM user_admin WHERE email = '$email' && password = '$password' ";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_array($result);

        if($row['user_type'] == 'admin'){

            $_SESSION['admin_name'] = $row['name'];
            header('location:admin.php');
        }else {
            $error[] = 'incorrect email ou password';
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
    <title>login</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">

    <form action="" method="post">
        <h3>Admin</h3>
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
        }; 

        ?>
        <input type="email" name="email" require placeholder="Entre votre email">
        <input type="password" name="password" require placeholder="Entre votre password">
        <input type="submit" name="submit" value="login" class="form-btn">
        <p>Pas encore Admin ?<a href="admin_register.php">register</a></p>
    </form>


    </div>
</body>
</html>