<?php
    include 'sql_Config.php';
    if (!isset($_POST)){
        exit('Formulaire inexistant');
    }
    else {
        $Sql_Request = $DB->prepare('SELECT Numen, Password, Verif_code FROM prof_data WHERE Numen = ?');
        $Sql_Request->bindParam(1, $_POST['Username'], PDO::PARAM_STR);
        $Sql_Request->execute();
        $Row = $Sql_Request->fetch(PDO::FETCH_ASSOC);
        $Id = $Row['Numen'];
        $Hash = $Row['Password'];
        $Activation_state = $Row['Verif_code'];
        $_SESSION['numen'] = $Id;
        $_SESSION['validity'] = true;
        $Sql_Request->fetch();
        if (password_verify($_POST['Password'], $Hash)) {
            if ($Activation_state == 'activated') {
                header("Location: bts.php");
                exit();
            }
            else {
                exit('Verifier votre compte avec le mail recu à l inscription.');
            }
        } 
        else {
            exit('Identifiants non reconnus');
        }       
    }
?>