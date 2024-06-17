<?php 

    include '../connessione.php';
    session_start();
    if(!isset($_SESSION['username_admin'])){
        header("Location: ../index.php");
    }

    if(isset($_GET['id'])) {

        $id= $_GET["id"];

        $sql = "DELETE FROM rappresentante WHERE id_rappresentante= $id"; 
        if ($conn->query($sql)) {   
            $_SESSION['alert'] = "Rappresentante eliminato correttamente!";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        } else {
            $_SESSION['alertError'] = "Errore nell'eliminazione: " . $conn->error . "\n";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        } 
    }

    $conn->close();
