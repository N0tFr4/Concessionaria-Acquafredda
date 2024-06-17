<?php 

    include '../connessione.php'; 
    session_start();
    if(!isset($_SESSION['username_rappresentante'])){
        header("Location: ../index.php");
    }

    if(isset($_POST['submit'])) {
            
        $modello= $_POST["modello"];
        $cavalli= $_POST["cavalli"];
        $cilindrata= $_POST["cilindrata"];
        $alimentazione= $_POST["alimentazione"];
        $anno= $_POST["anno"];
        $prezzo= $_POST["prezzo"];
        $id= $_POST["id"];
        $username_rappresentante= $_SESSION['username_rappresentante'];

        $sql = "SELECT azienda_rappresentante FROM rappresentante WHERE username_rappresentante = '$username_rappresentante'";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $azienda=$row['azienda_rappresentante'];
        }

        $sql = "SELECT * FROM auto WHERE modello_auto = '$modello' AND cilindrata_auto = $cilindrata AND cavalli_auto = $cavalli  AND anno_auto = $anno";
        $result = $conn->query($sql);
        
        if (mysqli_num_rows($result) != 0) {
            $_SESSION['alert1'] = "Modello di auto già presente nel db!";
            header("Location: {$_SERVER['HTTP_REFERER']}");
                exit;
        } else {
            $sql = "INSERT INTO auto (modello_auto, produttrice_auto, cavalli_auto, cilindrata_auto, alimentazione_auto, anno_auto, prezzo_auto, id_rappresentante)"; 
            $sql .= "VALUES ('$modello', '$azienda', $cavalli, $cilindrata, '$alimentazione', $anno, $prezzo, $id)";
            if ($conn->query($sql)) { 
                
                $sql = "SELECT * FROM auto WHERE modello_auto = '$modello' AND cilindrata_auto = $cilindrata AND cavalli_auto = $cavalli  AND anno_auto = $anno";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $_SESSION['alert'] = 'Auto aggiunta correttamente! \n\nAuto: ' . $row["produttrice_auto"] . ' ' . $row["modello_auto"] . '\nCavalli: '. $row["cavalli_auto"] . '\nCilindrata: ' . $row["cilindrata_auto"].
                    '\nAlimentazione: ' . $row["alimentazione_auto"].'\nAnno: '.$row["anno_auto"]. '\nPrezzo: ' .$row["prezzo_auto"];
                    header("Location: {$_SERVER['HTTP_REFERER']}");
                    exit;
                }
            } else {
                $_SESSION['alertError'] = "Errore nell'aggiunta dell'auto: " . $conn->error . "\n";
                header("Location: {$_SERVER['HTTP_REFERER']}");
                exit;
            }     
        }     
    }

    $conn->close();