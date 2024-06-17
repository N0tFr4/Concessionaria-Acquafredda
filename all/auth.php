<?php 

    include '../connessione.php'; 

    if(isset($_POST['submit'])) {
            
        $username= $_POST["username"];
        $password= $_POST["password"];

        $username= stripslashes($username);
        $password= stripslashes($password);

        $controllo = false;
        $controllo1 = false;
        $controllo2 = false;

        $sql = "SELECT * FROM cliente WHERE username_cliente = '$username'";
        $result = $conn->query($sql);
        if (mysqli_num_rows($result) != 0) {
            
            $row = $result -> fetch_assoc();
            $passc = $row['password_cliente'];
            if(password_verify($password,$passc)){
                $controllo = true;
            }
        } else{
            $sql = "SELECT * FROM admin WHERE username_admin = '$username'";
            $result = $conn->query($sql);
            if (mysqli_num_rows($result) != 0) {
            
                $row = $result -> fetch_assoc();
                $passc = $row['password_admin'];
                if(password_verify($password,$passc)){
                    $controllo1 = true;
                }
            } else{
                $sql = "SELECT * FROM rappresentante WHERE username_rappresentante = '$username'";
                $result = $conn->query($sql);
                if (mysqli_num_rows($result) != 0) {
                
                    $row = $result -> fetch_assoc();
                    $passc = $row['password_rappresentante'];
                    if(password_verify($password,$passc)){
                        $controllo2 = true;
                    }
                }
            }
        }

        session_start();

        if($controllo){
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['alert_cliente'] = "Login effettuato correttamente!";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        } elseif($controllo1){
            $_SESSION['username_admin'] = $username;
            $_SESSION['password_admin'] = $password;
            $_SESSION['alert_admin'] = "Login effettuato correttamente!";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        } elseif($controllo2){
            $_SESSION['username_rappresentante'] = $username;
            $_SESSION['password_rappresentante'] = $password;
            $_SESSION['alert_rappresentante'] = "Login effettuato correttamente!";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        }else{
            $_SESSION['alert1'] = "Credenziali errate! riprova";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit;
        }  
        
    }

    $conn->close();