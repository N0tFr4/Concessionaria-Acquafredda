<?php

    include '../connessione.php';
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: ../index.php");
    }

    if(isset($_POST['submit'])) {

        $nome= $_POST["nome"];
        $cognome= $_POST["cognome"];
        $idcliente= $_POST["idcliente"];
        $telefono= $_POST["telefono"];
        $email= $_POST["email"];
        $data= $_POST["data"];

        $sql = "UPDATE cliente SET nome_cliente = '$nome', cognome_cliente = '$cognome', telefono_cliente = '$telefono', email_cliente ='$email', data_nascita_cliente = '$data'   WHERE id_cliente = $idcliente ";
        
        
        if ($conn->query($sql)) {   
            $_SESSION['alert'] = "Dati modificati correttamente!";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        } else {
            $_SESSION['alertError'] = "Errore nella modifica: " . $conn->error . "\n";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        } 
    }

    $conn->close();