<?php 

    include '../connessione.php';
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: ../index.php");
    }

    if(isset($_GET['id'])) {

        $id= $_GET["id"];

        $sql = "DELETE FROM incontro WHERE id_incontro= $id"; 
        if ($conn->query($sql)) {   
            $_SESSION['alert'] = "Prenotazione annullata correttamente!";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        } else {
            $_SESSION['alertError'] = "Errore nell'eliminazione: " . $conn->error . "\n";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        } 

    }

    $conn->close();
