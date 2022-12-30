<?php
    session_start();
    if(!isset($_SESSION['numen']) && !isset($_SESSION['validity']) && $_SESSION['validity'] == true){
        header("Location: login.html");
        exit();
    }
    else {    
        include '../sql_Config.php';
        $Sql_Request = $DB->prepare('SELECT * FROM bts');
        $Sql_Request->execute();
        $row_bts = $Sql_Request->fetchAll();
    }
?>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Choix BTS - CCF</title>
        <link rel="stylesheet" href="style.css">
    </head>
<body>
<div class="center">
    <center>
        <img src="logo.png" alt="Logo ENC">
            <h1>Saisie - Choix BTS</h1>
                <form class="bts-form" method="POST" action="epreuve.php">
                    <select name="bts">
                        <?php
                            foreach($row_bts as $bts){
                                echo '<option value="',$bts['Code_bts'],'">',$bts['Libelle'],' ',$bts['Libelle_opt'],'</option>';
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