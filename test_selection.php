<?php
    session_start();
    if(!isset($_SESSION["matricula"]))
    {
        header('Refresh: 0; URL = index.php');
        die();
    }
?>

<?php
    include 'database.php';
    $pdo = Database::connect();
    $msg = '';
    $matricula = $_SESSION["matricula"];

    if(isset($_POST['start']))
    {
        if($_POST['tests'][0] == "Test de Aprendizaje VARK")
        {
            $sql = "SELECT count(*) FROM resultado_vark WHERE Matricula = '$matricula'";
            $q = $pdo->prepare($sql);
            $q->execute();
            $vark_entries = $q->fetchColumn();

            if($vark_entries > 0)
            {
                header('Refresh: 0; URL = details_vark.php?id='.$matricula);
            }
            else 
            {
                header('Refresh: 0; URL = vark.php');
            }
        }
        else
        if($_POST['tests'][0] == "Test de Personalidad MBTI")
        {
            $sql = "SELECT count(*) FROM resultado_mbti WHERE Matricula = '$matricula'";
            $q = $pdo->prepare($sql);
            $q->execute();
            $mbti_entries = $q->fetchColumn();

            if($mbti_entries > 0)
            {
                header('Refresh: 0; URL = details_mbti.php?id='.$matricula);
            }
            else 
            {
                header('Refresh: 0; URL = mbti.php');
            } 
        }

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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/fontawesome.min.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="shortcut icon" href="./img/fs.ico" type="image/x-icon">
    <title>Seleccione un test - VARK y MBTI</title>
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
    
    <header>
        <div class="guelcom">
            <h2 class="bienvenida"><strong>Bienvenido</strong><br/><?php echo $_SESSION["alumno"]?></h2>
        </div>
    </header>

    <main>
        <section class="test">
            <div class="form-matricula container mt-3">
                <h2 class="titulo">Selecciona un test:</h2>
                <br />
                <div class="col-md-12">
                <form class="form-signin" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
                        ?>"
                        method="post">
                    <select name="tests[]" class="form-control" id="testSelect">
                        <option>Test de Aprendizaje VARK</option>
                        <option>Test de Personalidad MBTI</option>
                    </select>
                    <p class="form-signin-heading" style="color: red">
                            <?php echo $msg; ?>
                        </p>
                    <button class="btn btn-lg btn-outline-success btn-block mt-3" type="submit" name="start">Comenzar</button>
                </form>
                </div> 
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-content mt-3">
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