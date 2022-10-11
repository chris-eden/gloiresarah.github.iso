<?php
namespace PHPMailer\PHPMailer;

include('phpmailer/Exception.php');
include('phpmailer/PHPMailer.php');
include('phpmailer/SMTP.php');

if(isset($_POST['submit'])){
    extract($_POST);
    //var_dump($_FILES);

    $content_dir = "files/";

    $tmp_file = $_FILES ['file']['tmp_name'];

    if (!is_uploaded_file($tmp_file)){
        exit('ce fichier est introuvable');
    }

    $type_file = $_FILES['file']['type'];

    if(!strstr($type_file, 'PDF') and !strstr($type_file,'pdf')){
        exit("ce type de fichier n'est pas pris en charge");
    }

    $name_file = time().'.pdf';

    if (!move_uploaded_file($tmp_file,$content_dir.$name_file)) {
        exit('impossible de copier ce fichier');
    }

    $phpmail = new PHPMailer(true);
    $phpmail->addAttachment('files/'.$name_file);
    $phpmail->setFrom($email, $nom);
    $phpmail->Subject = $nom;
    $phpmail->addAddress('christainkabwit@gmail.com');
    $phpmail->Body=$message;
    $phpmail->isHTML(true);
    $phpmail->send();
}



?>