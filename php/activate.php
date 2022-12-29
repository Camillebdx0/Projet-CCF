<?php
    include 'sql_Config.php';
    $Sql_Request = $DB->prepare('SELECT * FROM prof_data WHERE Email = ? AND Verif_code = ?');
    $Sql_Request->bindParam(1, $_GET['email'], PDO::PARAM_STR);
    $Sql_Request->bindParam(2, $_GET['code'], PDO::PARAM_STR);
    $Sql_Request->execute();
    $Row = $Sql_Request->fetch(PDO::FETCH_ASSOC);
    $Sql_Request = $DB->prepare('UPDATE prof_data SET Verif_code = ? WHERE Email = ? AND Verif_code = ?');
    $newcode = "activated";
    $Sql_Request->bindParam(1, $newcode, PDO::PARAM_STR);
    $Sql_Request->bindParam(2, $_GET['email'], PDO::PARAM_STR);
    $Sql_Request->bindParam(3, $_GET['code'], PDO::PARAM_STR);
    $Sql_Request->execute();
    echo 'Your account is now activated! You can now <a href="login.php">login</a>!';
?>