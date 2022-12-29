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
<html lang="fr"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - CFA</title>
    <link rel="stylesheet" href="Assets/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <div class="center">
        <div style="width: 450px;padding: 10px;margin: auto;border-radius:15px;background-color: #ffffff;">
            <center>
                <img src="Assets/enc.jpg" alt="Logo ENC" width="100px">
                <h3 style="font-family:'Roboto',sans-serif;">SAISIE - CHOIX BTS</h3>
                <form method="POST" action="p2.php">
                    <select name="bts">
                        <?php
                            foreach($row_bts as $bts){
                                echo '<option value="',$bts['Code_bts'],'">',$bts['Libelle'],' ',$bts['Libelle_opt'],'</option>';
                            }
                        ?>
                    </select>
                    <button name="Submit" type="submit"><span>Valider</span></button>       
                </form>
            </center>
        </div>
    </div>
</body>
</html>  