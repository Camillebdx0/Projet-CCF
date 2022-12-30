<?php
    session_start();
    if(!isset($_POST)){
        header("Location: saisie.html");
        exit();
    }
    else {
        include '../sql_Config.php';
        $array = array_keys($_POST);
        foreach ($array as $value){
            $array = $_POST[$value];
            $Sql_Request = $DB->prepare('UPDATE note SET Note = ?, Date = ?, Commentaire = ? WHERE Id = ?');
            $Sql_Request->bindParam(1, $array[0], PDO::PARAM_STR);
            $Sql_Request->bindParam(2,  $array[1], PDO::PARAM_STR);
            $Sql_Request->bindParam(3,  $array[2], PDO::PARAM_STR);
            $Sql_Request->bindParam(4, $value, PDO::PARAM_STR);
            $Sql_Request->execute();
        }
    }
?>