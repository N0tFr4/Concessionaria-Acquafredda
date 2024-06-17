<!DOCTYPE html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Concessionaria Acquafredda</title>
    <link rel="stylesheet" href="../css/list.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/x-icon" href="../img/favicon.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <?php 

        include '../connessione.php'; 
        session_start();
        if(!isset($_SESSION['username_admin'])){
            header("Location: ../index.php");
        }

    ?> 

</head>
<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin.php">Concessionaria Acquafredda</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="admin.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="catalogoadmin.php">Le nostre auto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aggiungirapp.php">Aggiungi rappresentante</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listarapp.php">Lista rappresentanti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Lista prenotazioni</a>
                    </li>
                </ul>
                
                <a href="../all/logout.php" class="btn btn-outline-primary">Logout</a>
                
            </div>
        </div>
    </nav>


    <section class="hero">
        <div class="container d-flex justify-content-center align-items-center vh-100">
            <div class="card text-center mb-3" style="width: 60rem;">
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <a href="admin.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                        </svg> </a>

                    </div>
          
                    <h5 class="card-title">Ecco la lista delle prenotazioni con i clienti </h5>
                    <p class="card-text">

                        <?php   

                            $sql = "SELECT incontro.data_incontro, cliente.nome_cliente, cliente.cognome_cliente, auto.modello_auto, auto.produttrice_auto, rappresentante.nome_rappresentante, rappresentante.cognome_rappresentante FROM auto INNER JOIN rappresentante ON auto.id_rappresentante=  rappresentante.id_rappresentante INNER JOIN incontro ON auto.id_auto = incontro.id_auto INNER JOIN cliente ON cliente.id_cliente = incontro.id_cliente ORDER BY incontro.data_incontro";
                            $result = $conn->query($sql);
                            if(mysqli_num_rows($result)!=0){
                                echo "<div class=\"table-responsive\">";
                                echo "<table  class=\"table table-borderless \">";  
                                    echo "<tr>\n";  
                                        echo "<th>DATA</th>  \n";  
                                        echo "<th>CLIENTE</th> \n";  
                                        echo "<th>CASA PRODUTTRICE</th> \n";
                                        echo "<th>MODELLO</th> \n";                                    
                                        echo "<th>RAPPRESENTANTE</th> \n";

                                    echo "</tr>\n";  
                                    while ($row = $result->fetch_assoc()) {   

                                        echo "<tr> \n";
                                            echo "<td>" . $row["data_incontro"] . "</td> \n";
                                            echo "<td>" . $row["nome_cliente"] ." " .$row["cognome_cliente"] . "</td> \n";
                                            echo "<td>" . $row["produttrice_auto"] . "</td> \n";
                                            echo "<td>" . $row["modello_auto"] . "</td> \n";                                           
                                            echo "<td>" . $row["nome_rappresentante"] ." " . $row["cognome_rappresentante"] . "</td> \n";

                                        echo "</tr> \n";    
                                    }
                                echo "</table>\n";
                                echo "</div>";
                            } else {
                                echo "<script>alert('Nessuna prenotazione al momento');
                                        window.location.href = 'admin.php';</script>";
                            }

                            $result->free(); 
                            $conn->close();

                        ?>

                    </p>
                </div>
            </div>
        </div>
    </section>


    <div class="footer-basic">
        <footer>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="admin.php">Home</a></li>
                <li class="list-inline-item"><a href="catalogoadmin.php">Le nostre auto</a></li>
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
            unset($_SESSION['alert1']);
        }
        
    ?>

</body>
</html>