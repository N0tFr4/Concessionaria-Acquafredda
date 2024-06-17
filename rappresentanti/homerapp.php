<!DOCTYPE html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Concessionaria Acquafredda</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/x-icon" href="../img/favicon.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <?php 

        include '../connessione.php'; 
        session_start();
        if(!isset($_SESSION['username_rappresentante'])){
            header("Location: ../index.php");
        }
        
    ?> 

</head>
<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Concessionaria Acquafredda</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="catalogorapp.php">Le auto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aggiungiauto.php">Aggiungi auto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listaprenotazioni.php">Lista prenotazioni</a>
                    </li>
                </ul>
                
                <a href="../all/logout.php" class="btn btn-outline-primary">Logout</a>
                
            </div>
        </div>
    </nav>


    <section class="hero">
        <div class="container">
            <h1 class="display-4">Benvenuto nella sezione riservata ai rappresentanti</h1>
            <p class="lead">Scegli l'operazione da fare</p>

            <a href="catalogorapp.php" class="btn btn-primary btn-lg">Catalogo</a>
            <a href="aggiungiauto.php" class="btn btn-primary btn-lg">Aggiungere auto</a>
            <a href="listaprenotazioni.php" class="btn btn-primary btn-lg">Lista prenotazioni</a>

        </div>
    </section>


    <div class="footer-basic">
        <footer>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Home</a></li>
                <li class="list-inline-item"><a href="catalogorapp.php">Le auto</a></li>
            </ul>
            <p class="street">Via Napoli 45, 70127, Bari, Italia</p>
            <p class="copyright">Concessionaria Acquafredda © 2024</p>
        </footer>
    </div>

</body>
</html>