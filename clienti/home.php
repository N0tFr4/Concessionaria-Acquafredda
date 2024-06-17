<!DOCTYPE html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Concessionaria Acquafredda</title>
    <link rel="stylesheet" href="../css/index.css">
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
        <div class="container">
            <h1 class="display-4">Benvenuto nella Concessionaria Acquafredda</h1>
            <p class="lead">Qui potrai trovare l'auto dei tuoi sogni</p>
            <a href="catalogoclienti.php" class="btn btn-primary btn-lg">Catalogo</a>
        </div>
    </section>
    

    <section class="carousel-section mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../img/carousel1.jpg" class="d-block w-100" alt="Car 1">
                            </div>
                            <div class="carousel-item">
                                <img src="../img/carousel2.jpeg" class="d-block w-100" alt="Car 2">
                            </div>
                            <div class="carousel-item">
                                <img src="../img/carousel3.jpg" class="d-block w-100" alt="Car 3">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div>
                        <h2>Il paradiso delle auto</h2>
                        <p>Benvenuto alla Concessionaria Acquafredda! Offriamo una vasta gamma di auto per soddisfare ogni tua esigenza. 
                            La nostra collezione include veicoli delle migliori marche, garantendo qualità e prestazioni eccellenti. 
                            Visita il nostro catalogo per scoprire tutte le offerte disponibili e trova l'auto dei tuoi sogni oggi stesso.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <br>

    <div class="container">
        <div class="row">   
            <div class="col-md-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2880.5827151067256!2d16.824424015846747!3d41.158585079286584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1347b85b4f9b94c7%3A0xf6c9b2bb56c79d6a!2sVia%20Napoli%2C%2045%2C%2070127%20Bari%20BA%2C%20Italia!5e0!3m2!1sit!2sit!4v1686703742902!5m2!1sit!2sit" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="col-md-6">
                <h2>Informazioni sede di Bari</h2>
                <p>Via Napoli 45, 70127, Bari, Italia</p>
                <p>Telefono:  <a href="tel:+391234567890">+39 123 456 7890</a></p>
                <p>Orari di Apertura: Lun-Ven 9:00-17:00</p>
                <p>Email: <a href="mailto:concessionariaacquafredda@info.it">concessionariaacquafredda@info.it</a></p>
            </div>
        </div>
    </div>


    <div class="footer-basic">
        <footer>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Home</a></li>
                <li class="list-inline-item"><a href="catalogoclienti.php">Le nostre auto</a></li>
            </ul>
            <p class="street">Via Napoli 45, 70127, Bari, Italia</p>
            <p class="copyright">Concessionaria Acquafredda © 2024</p>
        </footer>
    </div>

</body>
</html>