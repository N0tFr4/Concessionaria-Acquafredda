<?php 

    include '../connessione.php'; 

    if(isset($_POST['submit'])) {
            
        $nome= $_POST["nome"];
        $cognome= $_POST["cognome"];
        $username= $_POST["username"];
        $password= password_hash($_POST["password"], PASSWORD_DEFAULT);
        $telefono= $_POST["telefono"];
        $email= $_POST["email"];
        $data= $_POST["data"];

        $sql = "SELECT * FROM cliente WHERE username_cliente = '$username'";
        $result = $conn->query($sql);
        
        if (mysqli_num_rows($result) != 0) {
            session_start();
            $_SESSION['alert1'] = "Username già utilizzato, riprova!";
            header("Location: {$_SERVER['HTTP_REFERER']}");
                exit;
        } else {
            $sql = "INSERT INTO cliente (nome_cliente, cognome_cliente,username_cliente, password_cliente, telefono_cliente, email_cliente, data_nascita_cliente)"; 
            $sql .= "VALUES ('$nome', '$cognome', '$username', '$password', '$telefono', '$email', '$data')";
            if ($conn->query($sql)) {   
                session_start();
                $_SESSION['alert'] = "Cliente registrato correttamente, puoi effettuare il login!";
                header("Location: {$_SERVER['HTTP_REFERER']}");
                exit;
            } else {
                $_SESSION['alertError'] = "Errore nella registrazione: " . $conn->error . "\n";
                header("Location: {$_SERVER['HTTP_REFERER']}");
                exit;
            }     
        }     
    }

    $conn->close();