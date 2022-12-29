<?php
    session_start();
    if(!isset($_POST['bts'])){
        header("Location: p1.php");
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
                <h3 style="font-family:'Roboto',sans-serif;">SAISIE - CHOIX EPREUVE</h3>
                <form method="POST" action="saisie.php">
                    <select name="ccf">
                        <?php
                            foreach($row_ccf as $ccf){
                                echo '<option value="',$ccf['ID_ccf'],'">',$ccf['Libelle'],'</option>';
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