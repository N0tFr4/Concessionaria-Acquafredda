<?php 

    include '../connessione.php';
    session_start();
    if(!isset($_SESSION['username_admin']) || !isset($_SESSION['username_rappresentante'])){
        header("Location: ../index.php");
    }

    if(isset($_GET['id'])) {

        $id= $_GET["id"];

        $sql = "DELETE FROM auto WHERE id_auto= $id"; 
        if ($conn->query($sql)) {   
            $_SESSION['alert'] = "Auto eliminata correttamente!";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        } else {
            $_SESSION['alertError'] = "Errore nell'eliminazione: " . $conn->error . "\n";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        } 
    }

    $conn->close();
