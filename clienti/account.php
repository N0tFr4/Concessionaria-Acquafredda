<!DOCTYPE html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Concessionaria Acquafredda</title>
    <link rel="stylesheet" href="../css/account.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/x-icon" href="img/favicon.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <?php 

        include '../connessione.php'; 
        session_start();
        if(!isset($_SESSION['username'])){
            header("Location: ../index.php");
        }

        $username = $_SESSION['username'];
        $sql = "SELECT * FROM cliente WHERE username_cliente = '$username'";

        if ($conn->query($sql)) {   
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        } else {
            echo "Errore: " . $conn->error . "\n";
        } 

        $idcliente = $row['id_cliente'];

    ?> 

</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php">Concessionaria Acquafredda</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="catalogoclienti.php">Le nostre auto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="prenotazione.php">Prenota un incontro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Il tuo account</a>
                    </li>
                </ul>
            
                
                <a href="../all/logout.php" class="btn btn-outline-primary">Logout</a>
                
            </div>
        </div>
    </nav>

    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="container d-flex justify-content-center align-items-center vh-100">
                        <div class="card text-center mb-3" style="width: 20rem;">
                            <div class="card-body">
                                <h5 class="card-title">Le tue informazioni</h5>
                                <p class="card-text">
    
                                    <form method="post" action="modclient.php">

                                        <input type="hidden" name="idcliente" value="<?php echo $row['id_cliente']; ?>">

                                        <div class="input-group input-group-sm mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Username</span>
                                            <input type="text" class="form-control" aria-label="Sizing example input" value="<?php echo $row['username_cliente']; ?>" aria-describedby="inputGroup-sizing-sm" disabled name="username" placeholder="Inserisci l'username" required>
                                        </div>
                                        
                                        <div class="input-group input-group-sm mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Nome</span>
                                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="<?php echo $row['nome_cliente']; ?>" name="nome" placeholder="Inserisci il nome" required>
                                        </div>
                                
                                        <div class="input-group input-group-sm mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Cognome</span>
                                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="<?php echo $row['cognome_cliente']; ?>" name="cognome" placeholder="Inserisci il cognome" required>
                                        </div>

                                        <div class="input-group input-group-sm mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Telefono</span>
                                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="telefono" value="<?php echo $row['telefono_cliente']; ?>" name="telefono" id="telefono" placeholder="Inserisci il n. di telefono" required>
                                        </div>

                                        <div class="input-group input-group-sm mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Email</span>
                                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="<?php echo $row['email_cliente']; ?>" name="email" placeholder="Inserisci l'email" required>
                                        </div>

                                        <div class="input-group input-group-sm mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Data di nascita</span>
                                            <input type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="<?php echo $row['data_nascita_cliente']; ?>" name="data" required>
                                        </div>
                                
                                        <button type="submit" name="submit" class="btn btn-primary">Modifica</button>
                
                                    </form>
                                </p>
                            </div>
                        </div>
                    </div>           
                </div>
                <div class="col-md-6">
                    <div class="container d-flex justify-content-center align-items-center vh-100">
                        <div class="card text-center mb-3" style="width: 40rem;">
                            <div class="card-body">
                                <h5 class="card-title">Ecco la lista delle tue prenotazioni </h5>
                                <p class="card-text">

                                    <?php   

                                        $sql = "SELECT incontro.id_incontro, incontro.data_incontro, auto.modello_auto, auto.produttrice_auto, rappresentante.nome_rappresentante, rappresentante.cognome_rappresentante FROM auto INNER JOIN incontro ON  auto.id_auto = incontro.id_auto INNER JOIN cliente ON cliente.id_cliente = incontro.id_cliente INNER JOIN rappresentante ON auto.id_rappresentante=rappresentante.id_rappresentante WHERE incontro.id_cliente = $idcliente ORDER BY incontro.data_incontro";
                                        $result = $conn->query($sql);
                                        if(mysqli_num_rows($result)!=0){
                                            echo "<div class=\"table-responsive\">";
                                            echo "<table  class=\"table table-borderless \">";  
                                                echo "<tr>\n";  
                                                    echo "<th>DATA INCONTRO</th>  \n";  
                                                    echo "<th>CASA PRODUTTRICE</th> \n"; 
                                                    echo "<th>MODELLO</th> \n"; 
                                                    echo "<th>RAPPRESENTANTE</th> \n";   
                                                    echo "<th>ANNULLA</th> \n";
                                                echo "</tr>\n";  
                                                while ($row = $result->fetch_assoc()) {   

                                                    echo "<tr> \n";
                                                        echo "<td>" . $row["data_incontro"] . "</td> \n";  
                                                        echo "<td>" . $row["modello_auto"] . "</td> \n";
                                                        echo "<td>" . $row["produttrice_auto"] . "</td> \n";
                                                        echo "<td>" . $row["nome_rappresentante"] ." ". $row["cognome_rappresentante"] ."</td> \n";
                                                    

                                                        echo "<td> <a class=\"btn btn-primary\" href='eliminaincontro.php?id=" . $row['id_incontro'] .  "'>Annulla</a> </td>";
                                                    echo "</tr> \n";    
                                                }
                                            echo "</table>\n";
                                            echo "</div>";
                                        } else {
                                            echo  "Nessun incontro presente nel DB";

                                        }

                                        $result->free(); 
                                        $conn->close();
                                        
                                    ?>
                                    
                                </p>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>


    <div class="footer-basic">
        <footer>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="home.php">Home</a></li>
                <li class="list-inline-item"><a href="catalogoclienti.php">Le nostre auto</a></li>
            </ul>
            <p class="street">Via Napoli 45, 70127, Bari, Italia</p>
            <p class="copyright">Concessionaria Acquafredda © 2024</p>
        </footer>
    </div>


    <?php

        if(isset($_SESSION['alert'])) {
            echo "<script>alert('" . $_SESSION['alert'] . "');</script>";
            unset($_SESSION['alert']);
        }

        if(isset($_SESSION['alertError'])) {
            echo "<script>alert('" . $_SESSION['alertError'] . "');</script>";
            unset($_SESSION['alertError']);
        }

    ?>

    <script src="../js/cliente.js"></script>

</body>
</html>