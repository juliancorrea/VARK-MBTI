<?php
    session_start();
    if(!isset($_SESSION["expediente"]))
    {
        header('Refresh: 0; URL = login.php');
        die();
    }
    //Cuenta totales de ambas tablas
    include 'database.php';
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT count(*) FROM resultado_vark";
    $q = $pdo->prepare($sql);
    $q->execute();
    $total_vark_rows = $q->fetchColumn();

    $sql = "SELECT count(*) FROM resultado_mbti";
    $q = $pdo->prepare($sql);
    $q->execute();
    $total_mbti_rows = $q->fetchColumn();

    //Totales por resultado VARK
    $sql = "SELECT count(*) FROM resultado_vark WHERE Resultado = 'Visual'";
    $q = $pdo->prepare($sql);
    $q->execute();
    $total_vark_visual = $q->fetchColumn();

    $sql = "SELECT count(*) FROM resultado_vark WHERE Resultado = 'Auditivo'";
    $q = $pdo->prepare($sql);
    $q->execute();
    $total_vark_auditivo = $q->fetchColumn();

    $sql = "SELECT count(*) FROM resultado_vark WHERE Resultado = 'Lectura/escritura'";
    $q = $pdo->prepare($sql);
    $q->execute();
    $total_vark_lectura = $q->fetchColumn();

    $sql = "SELECT count(*) FROM resultado_vark WHERE Resultado = 'Quinestésico'";
    $q = $pdo->prepare($sql);
    $q->execute();
    $total_vark_quin = $q->fetchColumn();

    //Totales por resultado MBTI

    $sql = "SELECT count(*) FROM resultado_mbti WHERE Resultado = 'ISFJ'";
    $q = $pdo->prepare($sql);
    $q->execute();
    $total_mbti_isfj = $q->fetchColumn();

    $sql = "SELECT count(*) FROM resultado_mbti WHERE Resultado = 'ISFP'";
    $q = $pdo->prepare($sql);
    $q->execute();
    $total_mbti_isfp = $q->fetchColumn();

    $sql = "SELECT count(*) FROM resultado_mbti WHERE Resultado = 'ISTJ'";
    $q = $pdo->prepare($sql);
    $q->execute();
    $total_mbti_istj = $q->fetchColumn();

    $sql = "SELECT count(*) FROM resultado_mbti WHERE Resultado = 'ISTP'";
    $q = $pdo->prepare($sql);
    $q->execute();
    $total_mbti_istp = $q->fetchColumn();

    $sql = "SELECT count(*) FROM resultado_mbti WHERE Resultado = 'INFJ'";
    $q = $pdo->prepare($sql);
    $q->execute();
    $total_mbti_infj = $q->fetchColumn();

    $sql = "SELECT count(*) FROM resultado_mbti WHERE Resultado = 'ISFP'";
    $q = $pdo->prepare($sql);
    $q->execute();
    $total_mbti_infp = $q->fetchColumn();

    $sql = "SELECT count(*) FROM resultado_mbti WHERE Resultado = 'INTJ'";
    $q = $pdo->prepare($sql);
    $q->execute();
    $total_mbti_intj = $q->fetchColumn();

    $sql = "SELECT count(*) FROM resultado_mbti WHERE Resultado = 'INTP'";
    $q = $pdo->prepare($sql);
    $q->execute();
    $total_mbti_intp = $q->fetchColumn();

    $sql = "SELECT count(*) FROM resultado_mbti WHERE Resultado = 'ESFJ'";
    $q = $pdo->prepare($sql);
    $q->execute();
    $total_mbti_esfj = $q->fetchColumn();

    $sql = "SELECT count(*) FROM resultado_mbti WHERE Resultado = 'ESFP'";
    $q = $pdo->prepare($sql);
    $q->execute();
    $total_mbti_esfp = $q->fetchColumn();

    $sql = "SELECT count(*) FROM resultado_mbti WHERE Resultado = 'ESTJ'";
    $q = $pdo->prepare($sql);
    $q->execute();
    $total_mbti_estj = $q->fetchColumn();

    $sql = "SELECT count(*) FROM resultado_mbti WHERE Resultado = 'ESTP'";
    $q = $pdo->prepare($sql);
    $q->execute();
    $total_mbti_estp = $q->fetchColumn();

    $sql = "SELECT count(*) FROM resultado_mbti WHERE Resultado = 'ENFJ'";
    $q = $pdo->prepare($sql);
    $q->execute();
    $total_mbti_enfj = $q->fetchColumn();

    $sql = "SELECT count(*) FROM resultado_mbti WHERE Resultado = 'ENFP'";
    $q = $pdo->prepare($sql);
    $q->execute();
    $total_mbti_enfp = $q->fetchColumn();

    $sql = "SELECT count(*) FROM resultado_mbti WHERE Resultado = 'ENTJ'";
    $q = $pdo->prepare($sql);
    $q->execute();
    $total_mbti_entj = $q->fetchColumn();

    $sql = "SELECT count(*) FROM resultado_mbti WHERE Resultado = 'ENTP'";
    $q = $pdo->prepare($sql);
    $q->execute();
    $total_mbti_entp = $q->fetchColumn();
    
    Database::disconnect();

    //Data points VARK
    if($total_vark_rows < 1)
    {
        $dataPoints_VARK = array( 
            array("label"=>"Visual", "y" => 0),
            array("label"=>"Auditivo", "y"=> 0),
            array("label"=>"Lectura/escritura", "y"=> 0),
            array("label"=>"Quinestésico", "y"=> 0)
        );
    }
    else
    {
        $dataPoints_VARK = array( 
            array("label"=>"Visual", "y" => $total_vark_visual/$total_vark_rows*100),
            array("label"=>"Auditivo", "y"=> $total_vark_auditivo/$total_vark_rows*100),
            array("label"=>"Lectura/escritura", "y"=> $total_vark_lectura/$total_vark_rows*100),
            array("label"=>"Quinestésico", "y"=> $total_vark_quin/$total_vark_rows*100)
        );
    }
    

    //Data points MBTI

    if($total_mbti_rows < 1)
    {
        $dataPoints_MBTI = array( 
            array("label"=>"ISFJ", "y" => 0),
            array("label"=>"ISFP", "y" => 0),
            array("label"=>"ISTJ", "y" => 0),
            array("label"=>"ISTP", "y" => 0),
            array("label"=>"INFJ", "y" => 0),
            array("label"=>"INFP", "y" => 0),
            array("label"=>"INTJ", "y" => 0),
            array("label"=>"INTP", "y" => 0),
            array("label"=>"ESFJ", "y" => 0),
            array("label"=>"ESFP", "y" => 0),
            array("label"=>"ESTJ", "y" => 0),
            array("label"=>"ESTP", "y" => 0),
            array("label"=>"ENFJ", "y" => 0),
            array("label"=>"ENFP", "y" => 0),
            array("label"=>"ENTJ", "y" => 0),
            array("label"=>"ENTP", "y" => 0)
        );
    }
    else
    {
        $dataPoints_MBTI = array( 
            array("label"=>"ISFJ", "y" => $total_mbti_isfj/$total_mbti_rows*100),
            array("label"=>"ISFP", "y" => $total_mbti_isfp/$total_mbti_rows*100),
            array("label"=>"ISTJ", "y" => $total_mbti_istj/$total_mbti_rows*100),
            array("label"=>"ISTP", "y" => $total_mbti_istp/$total_mbti_rows*100),
            array("label"=>"INFJ", "y" => $total_mbti_infj/$total_mbti_rows*100),
            array("label"=>"INFP", "y" => $total_mbti_infp/$total_mbti_rows*100),
            array("label"=>"INTJ", "y" => $total_mbti_intj/$total_mbti_rows*100),
            array("label"=>"INTP", "y" => $total_mbti_intp/$total_mbti_rows*100),
            array("label"=>"ESFJ", "y" => $total_mbti_esfj/$total_mbti_rows*100),
            array("label"=>"ESFP", "y" => $total_mbti_esfp/$total_mbti_rows*100),
            array("label"=>"ESTJ", "y" => $total_mbti_estj/$total_mbti_rows*100),
            array("label"=>"ESTP", "y" => $total_mbti_estp/$total_mbti_rows*100),
            array("label"=>"ENFJ", "y" => $total_mbti_enfj/$total_mbti_rows*100),
            array("label"=>"ENFP", "y" => $total_mbti_enfp/$total_mbti_rows*100),
            array("label"=>"ENTJ", "y" => $total_mbti_entj/$total_mbti_rows*100),
            array("label"=>"ENTP", "y" => $total_mbti_entp/$total_mbti_rows*100)
        );
    }

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
    <link rel="stylesheet" href="./css/datatables.min.css">
    <link rel="shortcut icon" href="./img/fs.ico" type="image/x-icon">
    <title>Dashboard - VARK y MBTI</title>
    <script>
        window.onload = function() {
         
         
        var chart = new CanvasJS.Chart("chartContainer1", {
            animationEnabled: true,
            title: {
                text: "Distribución de factores de aprendizaje global."
            },
            subtitles: [{
                text: "Facultad de Sistemas VARK-MBTI"
            }],
            data: [{
                type: "pie",
                yValueFormatString: "#,##0.00\"%\"",
                indexLabel: "{label} ({y})",
                dataPoints: <?php echo json_encode($dataPoints_VARK, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();

        var chart = new CanvasJS.Chart("chartContainer2", {
            animationEnabled: true,
            title: {
                text: "Distribución de factores de personalidad global."
            },
            subtitles: [{
                text: "Facultad de Sistemas VARK-MBTI"
            }],
            data: [{
                type: "pie",
                yValueFormatString: "#,##0.00\"%\"",
                indexLabel: "{label} ({y})",
                dataPoints: <?php echo json_encode($dataPoints_MBTI, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();
         
        }
        </script>
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
        <div class="col-md-12">
            <h1><b>Bienvenido maestro</b></h1>


            <div id="globales"><br>
                <div class="card mt-3">
                    <div class="card-header">
                        <h3>Resultados globales VARK</h3>
                    </div>
                    <div class="card-body">
                        <div id="chartContainer1" style="height: 370px; width: 100%;" class="mt-3"></div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        <h3>Resultados globales MBTI</h3>
                    </div>
                    <div class="card-body">
                        <div id="chartContainer2" style="height: 370px; width: 100%;" class="mt-3"></div>
                    </div>
                </div>
            </div>
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
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</body>