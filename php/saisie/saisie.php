<?php
    session_start();
    if(!isset($_POST['ccf'])){
        header("Location: ../login.html");
        exit();
    }
    else {    
        include '../sql_Config.php';
        # requete pour les notes pas saisie :
        $Sql_Request = $DB->prepare('SELECT N.Id, N.Fk_Epreuve, E.Nom FROM note N LEFT JOIN eleve_data E ON E.Id = N.Fk_Eleve WHERE N.Note IS NULL AND N.Fk_Prof = ? AND N.Fk_Epreuve = ?');
        $Sql_Request->bindParam(1, $_SESSION['numen'], PDO::PARAM_STR);
        $Sql_Request->bindParam(2, $_POST['ccf'], PDO::PARAM_STR);
        $Sql_Request->execute();
        $row_null = $Sql_Request->fetchAll();            
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
            <h3 style="font-family:'Roboto',sans-serif;">SAISIE</h3>
            <form method="POST" action="enregistrement_saisie.php">
                <!-- <select>
                    < ? php
                        foreach($row_bts as $bts){
                            echo '<option value="',$bts['Code_bts'],'">',$bts['Libelle'],' ',$bts['Libelle_opt'],'</option>';
                        }
                    ?>
                </select>
                <select>
                    < ? php
                        $Sql_Request = $DB->prepare('SELECT * FROM ccf');
                        $Sql_Request->execute();
                        $row_ccf = $Sql_Request->fetchAll();
                        foreach($row_ccf as $ccf){
                            echo '<option value="',$ccf['ID_ccf'],'">',$ccf['Libelle'],'</option>';
                        }
                    ?>
                </select> -->
                <table>
                    <?php
                        foreach($row_null as $value){
                            echo"<tr>";
                            echo"<th>";
                            echo $value['Nom'];
                            echo"</th>";
                            echo"<th>";
                            echo $value['Fk_Epreuve'];
                            echo"</th>";
                            echo"<th>";
                            echo '<input name="',$value['Id'],'[]" type="number" placeholder="Note">';
                            echo"</th>";
                            echo"<th>";
                            echo '<input name="',$value['Id'],'[]" type="date" placeholder="Date">';
                            echo"</th>";
                            echo"<th>";
                            echo '<input name="',$value['Id'],'[]" type="text" placeholder="Commentaire">';
                            echo"</th>";
                            echo"</tr>";
                        }
                    ?>
                    <tr>
                        <th><button type="submit"><span>Valider</span></button></th>
                    </tr>
                </table>
            </form>
            </center>
        </div>
    </div>
</body>
</html>  