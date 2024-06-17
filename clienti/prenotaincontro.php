<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Concessionaria Acquafredda</title>
    <link rel="stylesheet" href="../css/prenota.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/x-icon" href="../img/favicon.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <?php

        include '../connessione.php'; 
        session_start();
        if(!isset($_SESSION['username'])){
            header("Location: ../index.php");
        }

    ?> 

</head>
<body>

    <?php

        $id = $_GET['id'];
        $idcliente = $_GET['idcliente'];
        $sql = "SELECT * FROM auto WHERE id_auto= $id ";

        if ($conn->query($sql)) {   
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        } else {
            echo "Errore: " . $conn->error . "\n";
        } 

        $conn->close();

    ?>

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
                        <a class="nav-link" href="account.php">Il tuo account</a>
                    </li>
                </ul>
            
                <a href="../all/logout.php" class="btn btn-outline-primary">Logout</a>
        
            </div>
        </div>
    </nav>


    <section class="hero">
        <div class="container d-flex justify-content-center align-items-center vh-100">
            <div class="card text-center mb-3" style="width: 20rem;">
                <div class="card-body">
                <div class="d-flex align-items-start">
                <a href="catalogoclienti.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                </svg> </a>

                </div>
                    <h5 class="card-title">PRENOTA INCONTRO</h5>
                    <p class="card-text">
    
                        <form method="post" action="prenotaz.php">

                            <input type="hidden" name="id" value="<?php echo $row['id_auto']; ?>">
                            <input type="hidden" name="idcliente" value="<?php echo $idcliente; ?>">
                            
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Modello</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled value="<?php echo $row['modello_auto']; ?>" name="modello" required>
                            </div>
                    
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Produttrice</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" disabled value="<?php echo $row['produttrice_auto']; ?>" name="produttrice" required>
                            </div>

                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Data incontro</span>
                                <input type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="data" placeholder="Inserisci la data dell'incontro" required>
                            </div>
                    
                            <button type="submit" name="submit" class="btn btn-primary">Prenota</button>
    
                        </form>
    
                    </p>
                </div>
            </div>
        </div>
    </section>


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
            echo "<script>window.location.href = 'account.php';</script>";
        }

        if(isset($_SESSION['alert1'])) {
            echo "<script>alert('" . $_SESSION['alert1'] . "');</script>";
            unset($_SESSION['alert1']);
        }

        if(isset($_SESSION['alertError'])) {
            echo "<script>alert('" . $_SESSION['alertError'] . "');</script>";
            unset($_SESSION['alertError']);
        }
        
    ?>
    
</body>
</html>