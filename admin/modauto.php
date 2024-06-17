<?php

    include '../connessione.php';
    session_start();
    if(!isset($_SESSION['username_admin']) || !isset($_SESSION['username_rappresentante'])){
        header("Location: ../index.php");
    }

    if(isset($_POST['submit'])) {

        $modello= $_POST['modello'];
        $cavalli= $_POST['cavalli'];
        $cilindrata= $_POST['cilindrata'];
        $alimentazione= $_POST['alimentazione'];
        $anno= $_POST['anno'];
        $prezzo= $_POST['prezzo'];
        $id= $_POST['id'];

        $sql = "UPDATE auto SET modello_auto = '$modello', cavalli_auto = $cavalli, cilindrata_auto = $cilindrata, alimentazione_auto= '$alimentazione', anno_auto = $anno, prezzo_auto = $prezzo  WHERE id_auto = $id ";   
        if ($conn->query($sql)) {   
            $sql = "SELECT * FROM auto WHERE modello_auto = '$modello' AND cilindrata_auto = $cilindrata AND cavalli_auto = $cavalli  AND anno_auto = $anno";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $_SESSION['alert'] = 'Auto modificata correttamente! \n\nAuto: ' . $row["produttrice_auto"] . ' ' . $row["modello_auto"] . '\nCavalli: '. $row["cavalli_auto"] . '\nCilindrata: ' . $row["cilindrata_auto"].
                    '\nAlimentazione: ' . $row["alimentazione_auto"].'\nAnno: '.$row["anno_auto"]. '\nPrezzo: ' .$row["prezzo_auto"];
                    header("Location: {$_SERVER['HTTP_REFERER']}");
                    exit;
                }
        } else {
            $_SESSION['alertError'] = "Errore nella modifica: " . $conn->error . "\n";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        } 
    }

    $conn->close();