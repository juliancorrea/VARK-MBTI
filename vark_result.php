<?php
    session_start();
    if(!isset($_SESSION["matricula"]))
    {
        header('Refresh: 0; URL = index.php');
        die();
    }
?>

<?php
require 'database.php';
$matricula = $_SESSION["matricula"];
$vark_array = [
    0 => 0,
    1 => 0,
    2 => 0,
    3 => 0
];

foreach($_POST['check_list'] as $selected) 
{
    switch($selected)
    {
        case("V"):
            $vark_array[0]++;
            break;
        case("A"):
            $vark_array[1]++;
            break;
        case("R"):
            $vark_array[2]++;
            break;
        case("K"):
            $vark_array[3]++;
            break;
    }
}

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO resultado_vark (Matricula,SumaVisual,SumaAuditivo,SumaLectura,SumaQuinestesico,Status) values(?, ?, ?, ?, ?, 100)";
$q = $pdo->prepare($sql);
$q->execute(array($matricula,$vark_array[0],$vark_array[1],$vark_array[2],$vark_array[3]));
Database::disconnect();

$max_value = 0;
$max_index = 0;
$resultado = "";

for ($i = 0; $i < count($vark_array); $i++) 
{
    if($vark_array[$i] > $max_value)
    {
        $max_value = $vark_array[$i];
        $max_index = $i;
    }
}

switch($max_index) 
{
    case(0):
        $resultado = "Visual";
        break;
    case(1):
        $resultado = "Auditivo";
        break;
    case(2):
        $resultado = "Lectura/escritura";
        break;
    case(3):
        $resultado = "Quinestésico";
        break;
}


define("V_estr","Libros con diagramas y dibujos.<br>Usar símbolos.<br>Subrayar.<br>Diagramas de flujo.<br>Mapas mentales.<br>Imágenes, videos.");
define("A_estr","Graba resumenes.<br>Estudiar con audio.<br>Explicar a otros.<br>Leer resúmenes en voz alta.<br>Explicar los apuntes a otra persona aural.<br>Conversar con maestros y compañeros.");
define("R_estr","Listas.<br>Diccionarios.<br>Glosarios.<br>Definiciones.<br>Libros de texto y revistas.<br>Manuales.<br>Bitácoras.<br>Textos en internet.");
define("K_estr","Laboratorios.<br>Ejemplos.<br>Aplicaciones reales.<br>Proyectos.<br>Simulaciones.<br>Modelos.<br>Algoritmos.<br>Juegos de rol.<br>Dramatizaciones.");

$estrategia = "";

switch($resultado)
{
    case("Visual"):
        $estrategia = V_estr;
        break;
    case("Auditivo"):
        $estrategia = A_estr;
        break;
    case("Lectura/escritura"):
        $estrategia = R_estr;
        break;
    case("Quinestésico"):
        $estrategia = K_estr;
        break;
}

unset($_SESSION["matricula"]);
?>

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
    <title>Resultados - Test de Aprendizaje VARK</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <a href="index.php"><img src="./img/logo.png" alt=""></a>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse btns" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto w-100 justify-content-end">
                        <li class="nav-item">
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
    </header>

    <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Visual</th>
                    <th>Auditivo</th>
                    <th>Lectura/Escritura</th>
                    <th>Quinestésico</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php echo $vark_array[0]?>
                    </td>
                    <td>
                        <?php echo $vark_array[1]?>
                    </td>
                    <td>
                        <?php echo $vark_array[2]?>
                    </td>
                    <td>
                        <?php echo $vark_array[3]?>
                    </td>
                </tr>
            </tbody>

        </table>
        <div class="text-center">
            <h1><b>Su resultado es:
                    <?php echo $resultado?></b></h1>

            <div class="card mt-3 text-white bg-success">
                <div class="card-header">Estrategias sugeridas para el aprendizaje:</div>
                <div class="card-body">
                    <?php echo $estrategia?>
                </div>
            </div>
            <button class="btn btn-primary mt-3" onclick="location.href='index.php';">Regresar</button>
        </div>
    </div>

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