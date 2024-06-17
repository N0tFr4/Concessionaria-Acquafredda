<?php 

    include '../connessione.php'; 
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: ../index.php");
    }

    if(isset($_POST['submit'])) {
            
        $idauto= $_POST["id"];
        $idcliente= $_POST["idcliente"];
        $data= $_POST["data"];

        $sql = "SELECT * FROM incontro WHERE id_cliente = $idcliente AND id_auto = $idauto AND data_incontro = '$data'";
        $result = $conn->query($sql);
        
        if (mysqli_num_rows($result) != 0) {
            $_SESSION['alert1'] = "Incontro già presente nel db";
            header("Location: {$_SERVER['HTTP_REFERER']}");
                exit;
        } else {
            $sql = "INSERT INTO incontro (data_incontro, id_auto, id_cliente)"; 
            $sql .= "VALUES ('$data', $idauto , $idcliente)";
            if ($conn->query($sql)) {   

                $sql = "SELECT * FROM auto INNER JOIN rappresentante ON auto.id_rappresentante = rappresentante.id_rappresentante INNER JOIN incontro ON auto.id_auto = incontro.id_auto WHERE auto.id_auto = $idauto";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $_SESSION['alert'] = 'Incontro prenotato correttamente! \n\nData: '. $row["data_incontro"] . '\nAuto: ' . $row["produttrice_auto"] . ' ' . $row["modello_auto"] . '\nRappresentante: ' . $row["nome_rappresentante"] . ' ' . $row["cognome_rappresentante"];
                    header("Location: {$_SERVER['HTTP_REFERER']}");
                    exit;
                }
                
            } else {
                $_SESSION['alertError'] = "Errore nella prenotazione dell'incontro: " . $conn->error . "\n";
                header("Location: {$_SERVER['HTTP_REFERER']}");
                exit;
            }     
        }     
    }

    $conn->close();