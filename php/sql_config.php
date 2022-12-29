<?php   
    session_start();
    $Sql_Host= "127.0.0.1:3306";
    $Sql_User = "root";
    $Sql_Pass = "";
    $Sql_DB = "app_ccf";
    $DB = new PDO("mysql:host=$Sql_Host;dbname=$Sql_DB", $Sql_User,$Sql_Pass);
?>