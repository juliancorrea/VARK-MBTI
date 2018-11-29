<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no,
        initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/fontawesome.min.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"> 
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="shortcut icon" href="./img/fs.ico" type="image/x-icon">
    <title>¿Quiénes somos? - VARK y MBTI</title>
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
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tipos_test.php">Los Tests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="test_launcher.php">Realizar Tests</a>
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
                                echo '<li class="nav-item acceder"><a class="nav-link" href="login.php">Login</a></li>';
                            }
                        ?>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <section class="acerca-de">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>Sitio web creado como proyecto final para la materia de Desarrollo de Aplicaciones Web.</p>
                        <p class="fecha">Noviembre 2018</p>
                        <p class="lugar">Arteaga, Coahuila</p>
                        <p>Desarrollado por: <br/>
                           Jaime Villarreal<br/> Cuauhtémoc Martínez <br/> Enrique Castillo</p>
                        <p class="iconos">Hecho con <i class="fas fa-heart"></i> y <i class="fas fa-cookie-bite"></i> <:)</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-content">
            <div class="container">
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