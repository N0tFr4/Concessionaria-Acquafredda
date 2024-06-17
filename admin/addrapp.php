<?php 

    include '../connessione.php'; 
    session_start();
    if(!isset($_SESSION['username_admin'])){
        header("Location: ../index.php");
    }

    if(isset($_POST['submit'])) {
            
        $nome= $_POST["nome"];
        $cognome= $_POST["cognome"];
        $username= $_POST["username"];
        $password= password_hash($_POST["password"], PASSWORD_DEFAULT);
        $azienda= $_POST["azienda"];
        $username_admin= $_SESSION['username_admin'];

        $sql = "SELECT id_admin FROM admin WHERE username_admin = '$username_admin'";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id=$row['id_admin'];
        }

        $sql = "SELECT * FROM rappresentante WHERE username_rappresentante = '$username'";
        $result = $conn->query($sql);
        
        if (mysqli_num_rows($result) != 0) {
            $_SESSION['alert1'] = "Rappresentante già presente nel db!";
            header("Location: {$_SERVER['HTTP_REFERER']}");
                exit;
        } else {
            $sql = "INSERT INTO rappresentante (nome_rappresentante, cognome_rappresentante, username_rappresentante, password_rappresentante, azienda_rappresentante,id_admin)"; 
            $sql .= "VALUES ('$nome', '$cognome', '$username', '$password', '$azienda', $id)";
            if ($conn->query($sql)) {   
                $_SESSION['alert'] = "Rappresentante aggiunto correttamente!";
                header("Location: {$_SERVER['HTTP_REFERER']}");
                exit;
            } else {
                $_SESSION['alertError'] = "Errore nell'aggiunta del rappresentante: " . $conn->error . "\n";
                header("Location: {$_SERVER['HTTP_REFERER']}");
                exit;
            }     
        }     
    }

    $conn->close();