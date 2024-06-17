<?php

    include '../connessione.php';
    session_start();
    if(!isset($_SESSION['username_admin'])){
        header("Location: ../index.php");
    }

    if(isset($_POST['submit'])) {

        $nome= $_POST['nome'];
        $cognome= $_POST['cognome'];
        $azienda= $_POST['azienda'];
        $username= $_POST['username'];
        $id= $_POST['id'];

        $sql = "UPDATE rappresentante SET nome_rappresentante = '$nome', cognome_rappresentante = '$cognome', username_rappresentante = '$username' , azienda_rappresentante = '$azienda' WHERE id_rappresentante = $id ";
        
        
        if ($conn->query($sql)) {   
            $_SESSION['alert'] = "Rappresentante modificato correttamente!";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        } else {
            $_SESSION['alertError'] = "Errore nella modifica: " . $conn->error . "\n";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        } 
    }

    $conn->close();