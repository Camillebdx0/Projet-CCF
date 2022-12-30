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
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saisie Notes - CCF</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="center1">
    <center>
        <img src="logo.png" alt="Logo ENC">
            <h1>Saisie de Note</h1>
                <form class="saisie-form" method="POST" action="enregistrement_saisie.php">
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
                    </table>
                    <br>
                    <button type="submit"><span>Valider</span></button>
                </form>
    </center>
</div>
</body>
</html>