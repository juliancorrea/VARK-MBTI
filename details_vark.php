<?php
session_start();
require 'database.php';
$id = null;
if (!empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}
 
if (null == $id) {
	header("Location: index.php");
} else {
	$pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM resultado_vark where Matricula = ?";
	$q = $pdo->prepare($sql);
	$q->execute(array($id));
	$data = $q->fetch(PDO::FETCH_ASSOC);
	Database::disconnect();
}

$suma_total = $data['SumaVisual'] + $data['SumaAuditivo'] + $data['SumaLectura'] + $data['SumaQuinestesico']; 


$dataPoints = array( 
	array("label"=>"Visual", "y" => $data['SumaVisual']/$suma_total*100),
	array("label"=>"Auditivo", "y"=> $data['SumaAuditivo']/$suma_total*100),
	array("label"=>"Lectura/escritura", "y"=> $data['SumaLectura']/$suma_total*100),
	array("label"=>"Quinestésico", "y"=> $data['SumaQuinestesico']/$suma_total*100)
);

define("V_estr","Libros con diagramas y dibujos.<br>Usar símbolos.<br>Subrayar.<br>Diagramas de flujo.<br>Mapas mentales.<br>Imágenes, videos.");
define("A_estr","Graba resumenes.<br>Estudiar con audio.<br>Explicar a otros.<br>Leer resúmenes en voz alta.<br>Explicar los apuntes a otra persona aural.<br>Conversar con maestros y compañeros.");
define("R_estr","Listas.<br>Diccionarios.<br>Glosarios.<br>Definiciones.<br>Libros de texto y revistas.<br>Manuales.<br>Bitácoras.<br>Textos en internet.");
define("K_estr","Laboratorios.<br>Ejemplos.<br>Aplicaciones reales.<br>Proyectos.<br>Simulaciones.<br>Modelos.<br>Algoritmos.<br>Juegos de rol.<br>Dramatizaciones.");

$estrategia = "";

switch($data["Resultado"])
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
?>
<!DOCTYPE HTML>
<html>

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
    <link rel="stylesheet" href="./css/datatables.min.css">
    <link rel="shortcut icon" href="./img/fs.ico" type="image/x-icon">
    <title>Resultados - Test de Aprendizaje VARK</title>
    <script>
        window.onload = function() {
         
         
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title: {
                text: "Distribución de factores de aprendizaje individual."
            },
            subtitles: [{
                text: "Facultad de Sistemas VARK-MBTI"
            }],
            data: [{
                type: "pie",
                yValueFormatString: "#,##0.00\"%\"",
                indexLabel: "{label} ({y})",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();
         
        }
        </script>
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
    </header>
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Visual</th>
                    <th>Auditivo</th>
                    <th>Lectura/escritura</th>
                    <th>Quinestésico</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php echo $data['SumaVisual']?>
                    </td>
                    <td>
                        <?php echo $data['SumaAuditivo']?>
                    </td>
                    <td>
                        <?php echo $data['SumaLectura']?>
                    </td>
                    <td>
                        <?php echo $data['SumaQuinestesico']?>
                    </td>
                </tr>
            </tbody>

        </table>
        <div class="text-center">
            <h1><b>Su resultado fue:
                    <?php echo $data['Resultado']?></b></h1>          
            
        </div>

    </div>

    <div class="container text-center">
    <div class="card mt-3 text-white bg-success">
                <div class="card-header">Estrategias sugeridas para el aprendizaje:</div>
                <div class="card-body">
                    <?php echo $estrategia?>
                </div>
            </div>
    </div>
    
    <div id="chartContainer" style="height: 370px; width: 100%;" class="mt-3"></div>
    <div class="container text-center">
        <button class="btn btn-primary mt-3" onclick="location.href='dashboard.php';">Regresar</button>
    </div>
    
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
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
    <script src="./js/datatables.min.js"></script>

</body>

</html>