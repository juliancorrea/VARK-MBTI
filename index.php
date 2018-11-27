<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no,
        initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/fontawesome.min.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="shortcut icon" href="./img/fs.ico" type="image/x-icon">
    <title>Inicio - VARK y MBTI</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="./img/fsblack.png" alt=""></a>
            <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav mr-auto w-100 justify-content-end">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="test_launcher.php">Realizar Test</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.php">Contacto</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="dashboard.php">Dashboard</a>
                            </li>
                            <?php
                                if(isset($_SESSION["expediente"]) || isset($_SESSION["admin"]))
                                {
                                    echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
                                }
                                else
                                {
                                    echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>';
                                }
                            ?>
                        
                        </ul>
            </div>
        </div>
    </nav>

    <header>
        <div class="bg"></div>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-caption texto-slider">
                <h1 class="sistema">Sistema de Aprendizaje y Personalidad</h1>
                <h2 class="facultad">Facultad de Sistemas</h2>
                <h2 class="universidad">Universidad Autónoma de Coahuila</h2>
            </div>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img class="w-100 h-100" src="./img/s1.jpg" alt="">
                </div>
                <div class="carousel-item">
                    <img class="w-100 h-100" src="./img/s2.jpg" alt="">
                </div>
                <div class="carousel-item">
                    <img class="w-100 h-100" src="./img/s3.jpg" alt="">
                </div>
            </div>
            <a class="flechas carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="flechas carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </header>

    <main>
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 texto">
                                <h3 class="titulo">atención, tenemos un problema</h3>
                                <p class="parrafo"> Como en cualquier escuela, en la <strong>Facultad de Sistemas</strong>
                                    de la
                                    <strong>Universidad Autónoma de Coahuila</strong> hay una gran diversidad de
                                    alumnos, los cuales tienen, obviamente, diferentes personalidades y por lo
                                    tanto cada alumno tiene una facilidad de aprendizaje distinto. Muchas de las
                                    veces los alumnos no saben cómo podrían aprender más rápido y mejor, y tratan
                                    de hacerlo en formas que pueden parecer complicadas para sus habilidades, en
                                    las que por consecuencia, fallan y generan que se rindan fácilmente.</p>
                                <h3 class="titulo">Puedes solucionarlo</h3>
                                <p class="parrafo"> Con tan solo <strong>dos sencillos tests</strong> podrás saber cual
                                    es tu forma
                                    de aprendizaje más optima, todo en base a los sentidos, también conocerás tu tipo
                                    de personalidad de las 16 diferentes propuestas en el test MBTI.</p>
                            </div>
                        </div>
                        <div class="row foto">
                            <div class="col-xs-4 thumb">
                                <img src="" alt="">
                            </div>
                            <div class="col-xs-8 texto">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-content">
            <div class="container">
                <div class="text-center mb-3">
                    <a href='http://www.freevisitorcounters.com'>free visitor counters</a>
                    <script type='text/javascript' src='https://www.freevisitorcounters.com/auth.php?id=6ba07a349b42e2330e6a34d05bc58ee09687ce0b'></script>
                    <script type="text/javascript" src="https://www.freevisitorcounters.com/en/home/counter/447003/t/1"></script>
                </div>
                <div class="row border-top">
                    <div class="col-md-8 footer-item">
                        <h3 class="titulo">Facultad de Sistemas</h3>
                        <a href="contact.php" class="btn btn-link">Contacto</a>
                        <a href="about.php" class="btn btn-link">Acerca de</a>
                    </div>
                    <div class="col-md-4 footer-item">
                        <a href="#" class="btn btn-link">Subir en Página</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="./js/jquery-3.3.1.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
</body>

</html>