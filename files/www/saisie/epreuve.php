<?php
    error_reporting(E_ALL ^ E_NOTICE);
    session_start();
    if(!isset($_POST['bts'])){
        header("Location: bts.php");
        exit();
    }
    else {    
        include '../sql_Config.php';
        $Sql_Request = $DB->prepare('SELECT ID_ccf,Libelle FROM ccf WHERE Fk_bts = ?');
        $Sql_Request->bindParam(1, $_POST['bts'], PDO::PARAM_STR);
        $Sql_Request->execute();
        $row_ccf = $Sql_Request->fetchAll();                               
    }
?>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix Epreuve - CCF</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="center">
        <center>
            <img src="../assets/logo.png" alt="Logo ENC">
            <h1>Saisie - Choix Epreuve</h1>
                <form class="bts-form" method="POST" action="saisie.php">
                    <select class="bts-form" name="ccf">
                    <?php
                        foreach($row_ccf as $ccf){
                            echo '<option value="',$ccf['ID_ccf'],'">',$ccf['Libelle'],'</option>';
                        }
                    ?>
                    </select>
                    <br>
                    <br>
                    <button name="Submit" type="submit"><span>Valider</span></button>       
                </form>
        </center>
    </div>
</body>
</html>