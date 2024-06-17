<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Concessionaria Acquafredda</title>
    <link rel="stylesheet" href="../css/logreg.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/x-icon" href="../img/favicon.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <?php 

        include '../connessione.php';
        session_start();

    ?>

</head>
<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">Concessionaria Acquafredda</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="catalogo.php">Le nostre auto</a>
                    </li>
                </ul>
            
                <a href="#" class="btn btn-primary">Login</a>
        
            </div>
        </div>
    </nav>


    <section class="hero">
        <div class="container d-flex justify-content-center align-items-center vh-100">
            <div class="card text-center mb-3" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title">LOGIN</h5>
                    <p class="card-text">
    
                        <form method="post" action="auth.php">
                            
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Username</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="username" placeholder="Inserisci l'username" required>
                            </div>
                    
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Password</span>
                                <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="password" placeholder="Inserisci la password" required>
                            </div>
                    
                            <button type="submit" name="submit" class="btn btn-primary">Login</button>
    
                        </form>

                        <br>

                        <p>Non hai un account? <a href="register.php">Registrati</a></p>

                    </p>
                </div>
            </div>
        </div>
    </section>


    <div class="footer-basic">
        <footer>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="../index.php">Home</a></li>
                <li class="list-inline-item"><a href="catalogo.php">Le nostre auto</a></li>
            </ul>
            <p class="street">Via Napoli 45, 70127, Bari, Italia</p>
            <p class="copyright">Concessionaria Acquafredda © 2024</p>
        </footer>
    </div>


    <?php

        if(isset($_SESSION['alert_cliente'])) {
            echo "<script>alert('" . $_SESSION['alert_cliente'] . "');</script>";
            unset($_SESSION['alert_cliente']);
            echo "<script>window.location.href = '../clienti/home.php';</script>";
        }

        if(isset($_SESSION['alert_rappresentante'])) {
            echo "<script>alert('" . $_SESSION['alert_rappresentante'] . "');</script>";
            unset($_SESSION['alert_rappresentante']);
            echo "<script>window.location.href = '../rappresentanti/homerapp.php';</script>";
        }

        if(isset($_SESSION['alert_admin'])) {
            echo "<script>alert('" . $_SESSION['alert_admin'] . "');</script>";
            unset($_SESSION['alert_admin']);
            echo "<script>window.location.href = '../admin/admin.php';</script>";
        }

        if(isset($_SESSION['alert1'])) {
            echo "<script>alert('" . $_SESSION['alert1'] . "');</script>";
            unset($_SESSION['alert1']);
        }
        
    ?>
    
</body>
</html>