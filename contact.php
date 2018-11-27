<?php
            include 'database.php';
            
            $msg = '';
            
            if (isset($_POST['sugerencias']) && !empty($_POST['inputNombre']) && !empty($_POST['inputEmail']) && !empty($_POST['inputMensaje'])) {
            
                echo "hola";
                $form_nombre = $_POST['inputNombre'];
                $form_email = $_POST['inputEmail'];
                $form_mensaje = $_POST['inputMensaje'];
                
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO sugerencias (nombre,email,sugerencia) values(?, ?, ?)";
                $q = $pdo->prepare($sql);
                $q->execute(array($form_nombre,$form_email,$form_mensaje));
                Database::disconnect();
                $msg = '¡Gracias por tus sugerencias!';
            }
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
    <script src='https://www.google.com/recaptcha/api.js?render=6Lcug3oUAAAAANW8BWMc6db87rp3HTsA8BBYhSkd'></script>
    <title>Contacto - VARK y MBTI</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="./img/fsblack.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="test_launcher.php">Realizar Test</a>
                    </li>
                    <li class="nav-item active">
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
        <div class="fondo"></div>
        <div class="banner container-fluid">
            <div class="inner row">
                <div class="content col-md-12 px-0">
                    <div class="titulo">
                        <h3 class="texto">contacto</h3>
                    </div>
                    <img class="imagen" src="./img/bnnr-c.jpg" alt="" width="100%" height="350px"/>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="text-center">
            <h2 class="form-signin-heading" style="color: green">
                    <?php echo $msg; ?>
            </h2>
        </div>
            
        <section class="generales">
            <div class="container">
                <div class="row"></div>
                <div class="col-md-12">
                    <h4 class="facultad"><strong>Facultad de Sistemas</strong></h4>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="direccion">Ciudad Universitaria, Fundadores Km. 13, Centro, 25350 Arteaga, Coahuila.</h5>
                    </div>
                </div>
            </div>
        </section>

        <section class="contacto">
            <div class="container">
            <h1>¿Sugerencias? ¡Escríbenos!</h1>
                <div class="row">
                    <div class="col-md-6">
                        <form class="form_contacto" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
                    ?>"
                    method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="inputNombre" id="inputNombre" placeholder="Nombre (Obligatorio)" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Correo electrónico (Obligatorio)" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="" rows="3" name="inputMensaje" placeholder="Mensaje (Obligatorio)" required></textarea>
                            </div>
                            <div class="captcha form-group">
                                <div class="g-recaptcha" data-sitekey="6Leukm4UAAAAAOmkY9OOKd-L5cdzVyqKzN2TABgf"></div>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="sugerencias" class="btn btn-outline-success btn-send" value="Enviar Mensaje">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="contactos">
                            <div class="row contactar">
                                <div class="icono">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="info">
                                    <h6><strong>Tel:</strong> 844 123 4567</h6>
                                </div>
                            </div>
                            <div class="row contactar">
                                <div class="icono">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="info">
                                    <h6><strong>Correo:</strong> correo@uadec.edu.mx</h6>
                                </div>
                            </div>
                            <div class="row contactar">
                                <div class="icono web">
                                    <i class="fas fa-globe web"></i>
                                </div>
                                <div class="info">
                                    <h6><strong>Web: </strong><a href="#">www.sistemas.com</a> </h6>
                                </div>
                            </div>
                            <div class="row contactar">
                                <div class="icono facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </div>
                                <div class="info">
                                    <h6><strong>Facebook: </strong><a href="#">Sistemas UAdeC Oficial</a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mapa">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6059.0839956009595!2d-100.86199051625834!3d25.440562848445992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x868872a9d13e6c1b%3A0x4884b6bb05124874!2sFacultad+de+Sistemas+UAdeC!5e0!3m2!1ses-419!2smx!4v1543196197756" width="100%" 
            height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
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
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('6Lcug3oUAAAAANW8BWMc6db87rp3HTsA8BBYhSkd', {action: 'action_name'})
            .then(function(token) {
            // Verify the token on the server.
            });
        });
    </script>
    <script>
            function myMap() {
            var mapProp= {
                center:new google.maps.LatLng(51.508742,-0.120850),
                zoom:5,
            };
            var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
            }
            </script>
            
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
</body>
</html>