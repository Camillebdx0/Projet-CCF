<?php
    include 'sql_Config.php';
    $Uniqid = uniqid();
    if (!isset($_POST)){
        header("Location: inscription");
        exit('Formulaire inexistant');
    }
    else {
        $Sql_Request = $DB->prepare('INSERT INTO prof_data (Numen,Nom,Prenom,Email,Verif_code,Telephone,Password) VALUES (?,?,?,?,?,?,?)');
        $Password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
        $Sql_Request->bindParam(1, $_POST['Numen'], PDO::PARAM_STR);
        $Sql_Request->bindParam(2, $_POST['Nom'], PDO::PARAM_STR);
        $Sql_Request->bindParam(3, $_POST['Prenom'], PDO::PARAM_STR);
        $Sql_Request->bindParam(4, $_POST['Email'], PDO::PARAM_STR);
        $Sql_Request->bindParam(5, $Uniqid, PDO::PARAM_STR);
        $Sql_Request->bindParam(6, $_POST['Tel'], PDO::PARAM_STR);
        $Sql_Request->bindParam(7, $Password, PDO::PARAM_STR);
        $Sql_Request->execute();
        $Mail_from = 'noreply@yourdomain.com';
        $Mail_subject = 'Activation de votre compte';
        $Mail_header = 'From: ' . $Mail_from . "\r\n" . 'Reply-To: ' . $Mail_from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
        $Activate_link = 'http://localhost/activate.php?email=' . $_POST['Email'] . '&code=' . $Uniqid;
        $Mail_message = '<p>Veuillez activer votre compte en cliquand sur le lien suivant : <a href="' . $Activate_link . '">' . $Activate_link . '</a></p>';
        mail($_POST['Email'], $Mail_subject, $Mail_message, $Mail_header);
        echo 'Please check your email to activate your account!';
        header("Location: connexion.html");
    }
?>