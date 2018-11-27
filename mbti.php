<?php
    session_start();
    if(!isset($_SESSION["matricula"]))
    {
        header('Refresh: 0; URL = index.php');
        die();
    }
?>

<!DOCTYPE html>


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
    <title>Test de Personalidad MBTI</title>
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

    <div class="container mt-3">

        <body>
            <form action="mbti_result.php" method="post">
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 1
                    </div>
                    <div class="card-body">
                        <p><b>Emprendedor y entusiasta</b></p>
                        <div class="text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[0]" id="inlineRadio1"
                                    value="Extrovertido_TD">
                                <label class="form-check-label" for="inlineRadio1">Totalmente en desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[0]" id="inlineRadio2"
                                    value="Extrovertido_D">
                                <label class="form-check-label" for="inlineRadio2">En desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[0]" id="inlineRadio3"
                                    value="Extrovertido_A">
                                <label class="form-check-label" for="inlineRadio3">De acuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[0]" id="inlineRadio4"
                                    value="Extrovertido_TA">
                                <label class="form-check-label" for="inlineRadio4">Totalmente de acuerdo</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 2
                    </div>
                    <div class="card-body">
                        <p><b>Piensa y luego actúa</b></p>
                        <div class="text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[1]" id="inlineRadio5"
                                    value="Introvertido_TD">
                                <label class="form-check-label" for="inlineRadio5">Totalmente en desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[1]" id="inlineRadio6"
                                    value="Introvertido_D">
                                <label class="form-check-label" for="inlineRadio6">En desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[1]" id="inlineRadio7"
                                    value="Introvertido_A">
                                <label class="form-check-label" for="inlineRadio7">De acuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[1]" id="inlineRadio8"
                                    value="Introvertido_TA">
                                <label class="form-check-label" for="inlineRadio8">Totalmente de acuerdo</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 3
                    </div>
                    <div class="card-body">
                        <p><b>Piensa en voz alta</b></p>
                        <div class="text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[2]" id="inlineRadio9"
                                    value="Extrovertido_TD">
                                <label class="form-check-label" for="inlineRadio9">Totalmente en desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[2]" id="inlineRadio10"
                                    value="Extrovertido_D">
                                <label class="form-check-label" for="inlineRadio10">En desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[2]" id="inlineRadio11"
                                    value="Extrovertido_A">
                                <label class="form-check-label" for="inlineRadio11">De acuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[2]" id="inlineRadio12"
                                    value="Extrovertido_TA">
                                <label class="form-check-label" for="inlineRadio12">Totalmente de acuerdo</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 4
                    </div>
                    <div class="card-body">
                        <p><b>Energía tranquila</b></p>
                        <div class="text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[3]" id="inlineRadio13"
                                    value="Introvertido_TD">
                                <label class="form-check-label" for="inlineRadio13">Totalmente en desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[3]" id="inlineRadio14"
                                    value="Introvertido_D">
                                <label class="form-check-label" for="inlineRadio14">En desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[3]" id="inlineRadio15"
                                    value="Introvertido_A">
                                <label class="form-check-label" for="inlineRadio15">De acuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[3]" id="inlineRadio16"
                                    value="Introvertido_TA">
                                <label class="form-check-label" for="inlineRadio16">Totalmente de acuerdo</label>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 5
                    </div>
                    <div class="card-body">
                        <p><b>Prefiere hacer varias cosas a la vez</b></p>
                        <div class="text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[4]" id="inlineRadio17"
                                    value="Extrovertido_TD">
                                <label class="form-check-label" for="inlineRadio17">Totalmente en desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[4]" id="inlineRadio18"
                                    value="Extrovertido_D">
                                <label class="form-check-label" for="inlineRadio18">En desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[4]" id="inlineRadio19"
                                    value="Extrovertido_A">
                                <label class="form-check-label" for="inlineRadio19">De acuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[4]" id="inlineRadio20"
                                    value="Extrovertido_TA">
                                <label class="form-check-label" for="inlineRadio20">Totalmente de acuerdo</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 6
                    </div>
                    <div class="card-body">
                        <p><b>Escucha más que habla</b></p>
                        <div class="text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[5]" id="inlineRadio21"
                                    value="Introvertido_TD">
                                <label class="form-check-label" for="inlineRadio21">Totalmente en desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[5]" id="inlineRadio22"
                                    value="Introvertido_D">
                                <label class="form-check-label" for="inlineRadio22">En desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[5]" id="inlineRadio23"
                                    value="Introvertido_A">
                                <label class="form-check-label" for="inlineRadio23">De acuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[5]" id="inlineRadio24"
                                    value="Introvertido_TA">
                                <label class="form-check-label" for="inlineRadio24">Totalmente de acuerdo</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 7
                    </div>
                    <div class="card-body">
                        <p><b>Es fácil de conocer</b></p>
                        <div class="text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[6]" id="inlineRadio25"
                                    value="Extrovertido_TD">
                                <label class="form-check-label" for="inlineRadio25">Totalmente en desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[6]" id="inlineRadio26"
                                    value="Extrovertido_D">
                                <label class="form-check-label" for="inlineRadio26">En desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[6]" id="inlineRadio27"
                                    value="Extrovertido_A">
                                <label class="form-check-label" for="inlineRadio27">De acuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[6]" id="inlineRadio28"
                                    value="Extrovertido_TA">
                                <label class="form-check-label" for="inlineRadio28">Totalmente de acuerdo</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 8
                    </div>
                    <div class="card-body">
                        <p><b>Gran capacidad de concentración</b></p>
                        <div class="text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[7]" id="inlineRadio29"
                                    value="Introvertido_TD">
                                <label class="form-check-label" for="inlineRadio29">Totalmente en desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[7]" id="inlineRadio30"
                                    value="Introvertido_D">
                                <label class="form-check-label" for="inlineRadio30">En desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[7]" id="inlineRadio31"
                                    value="Introvertido_A">
                                <label class="form-check-label" for="inlineRadio31">De acuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[7]" id="inlineRadio32"
                                    value="Introvertido_TA">
                                <label class="form-check-label" for="inlineRadio32">Totalmente de acuerdo</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 9
                    </div>
                    <div class="card-body">
                        <p><b>Le gusta rodearse de gente</b></p>
                        <div class="text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[8]" id="inlineRadio33"
                                    value="Extrovertido_TD">
                                <label class="form-check-label" for="inlineRadio33">Totalmente en desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[8]" id="inlineRadio34"
                                    value="Extrovertido_D">
                                <label class="form-check-label" for="inlineRadio34">En desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[8]" id="inlineRadio35"
                                    value="Extrovertido_A">
                                <label class="form-check-label" for="inlineRadio35">De acuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[8]" id="inlineRadio36"
                                    value="Extrovertido_TA">
                                <label class="form-check-label" for="inlineRadio36">Totalmente de acuerdo</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 10
                    </div>
                    <div class="card-body">
                        <p><b>Confía en sus instintos</b></p>
                        <div class="text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[9]" id="inlineRadio37"
                                    value="Intuitivo_TD">
                                <label class="form-check-label" for="inlineRadio37">Totalmente en desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[9]" id="inlineRadio38"
                                    value="Intuitivo_D">
                                <label class="form-check-label" for="inlineRadio38">En desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[9]" id="inlineRadio39"
                                    value="Intuitivo_A">
                                <label class="form-check-label" for="inlineRadio39">De acuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[9]" id="inlineRadio40"
                                    value="Intuitivo_TA">
                                <label class="form-check-label" for="inlineRadio40">Totalmente de acuerdo</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 11
                    </div>
                    <div class="card-body">
                        <p><b>Realista, ve lo que es</b></p>
                        <div class="text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[10]" id="inlineRadio41"
                                    value="Sensorial_TD">
                                <label class="form-check-label" for="inlineRadio41">Totalmente en desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[10]" id="inlineRadio42"
                                    value="Sensorial_D">
                                <label class="form-check-label" for="inlineRadio42">En desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[10]" id="inlineRadio43"
                                    value="Sensorial_A">
                                <label class="form-check-label" for="inlineRadio43">De acuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[10]" id="inlineRadio44"
                                    value="Sensorial_TA">
                                <label class="form-check-label" for="inlineRadio44">Totalmente de acuerdo</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 12
                    </div>
                    <div class="card-body">
                        <p><b>Prefiere desarrollar nuevas destrezas</b></p>
                        <div class="text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[11]" id="inlineRadio45"
                                    value="Intuitivo_TD">
                                <label class="form-check-label" for="inlineRadio45">Totalmente en desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[11]" id="inlineRadio46"
                                    value="Intuitivo_D">
                                <label class="form-check-label" for="inlineRadio46">En desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[11]" id="inlineRadio47"
                                    value="Intuitivo_A">
                                <label class="form-check-label" for="inlineRadio47">De acuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[11]" id="inlineRadio48"
                                    value="Intuitivo_TA">
                                <label class="form-check-label" for="inlineRadio48">Totalmente de acuerdo</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 13
                    </div>
                    <div class="card-body">
                        <p><b>Prefiere instrucciones detalladas</b></p>
                        <div class="text-center">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions[12]" id="inlineRadio49"
                                value="Sensorial_TD">
                            <label class="form-check-label" for="inlineRadio49">Totalmente en desacuerdo</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions[12]" id="inlineRadio50"
                                value="Sensorial_D">
                            <label class="form-check-label" for="inlineRadio50">En desacuerdo</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions[12]" id="inlineRadio51"
                                value="Sensorial_A">
                            <label class="form-check-label" for="inlineRadio51">De acuerdo</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions[12]" id="inlineRadio52"
                                value="Sensorial_TA">
                            <label class="form-check-label" for="inlineRadio52">Totalmente de acuerdo</label>
                        </div>
                    </div>
                </div>
                    
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 14
                    </div>
                    <div class="card-body">
                        <p><b>Percibe cualquier cosa nueva o diferente</b></p>
                        <div class="text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[13]" id="inlineRadio53"
                                    value="Intuitivo_TD">
                                <label class="form-check-label" for="inlineRadio53">Totalmente en desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[13]" id="inlineRadio54"
                                    value="Intuitivo_D">
                                <label class="form-check-label" for="inlineRadio54">En desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[13]" id="inlineRadio55"
                                    value="Intuitivo_A">
                                <label class="form-check-label" for="inlineRadio55">De acuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[13]" id="inlineRadio56"
                                    value="Intuitivo_TA">
                                <label class="form-check-label" for="inlineRadio56">Totalmente de acuerdo</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 15
                    </div>
                    <div class="card-body">
                        <p><b>Admira soluciones prácticas</b></p>
                        <div class="text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[14]" id="inlineRadio57"
                                    value="Sensorial_TD">
                                <label class="form-check-label" for="inlineRadio57">Totalmente en desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[14]" id="inlineRadio58"
                                    value="Sensorial_D">
                                <label class="form-check-label" for="inlineRadio58">En desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[14]" id="inlineRadio59"
                                    value="Sensorial_A">
                                <label class="form-check-label" for="inlineRadio59">De acuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[14]" id="inlineRadio60"
                                    value="Sensorial_TA">
                                <label class="form-check-label" for="inlineRadio60">Totalmente de acuerdo</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 16
                    </div>
                    <div class="card-body">
                        <p><b>Tiene ideas y visión de conjunto</b></p>
                        <div class="text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[15]" id="inlineRadio61"
                                    value="Intuitivo_TD">
                                <label class="form-check-label" for="inlineRadio61">Totalmente en desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[15]" id="inlineRadio62"
                                    value="Intuitivo_D">
                                <label class="form-check-label" for="inlineRadio62">En desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[15]" id="inlineRadio63"
                                    value="Intuitivo_A">
                                <label class="form-check-label" for="inlineRadio63">De acuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[15]" id="inlineRadio64"
                                    value="Intuitivo_TA">
                                <label class="form-check-label" for="inlineRadio64">Totalmente de acuerdo</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 17
                    </div>
                    <div class="card-body">
                        <p><b>Trabaja a un ritmo uniforme</b></p>
                        <div class="text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[16]" id="inlineRadio65"
                                    value="Sensorial_TD">
                                <label class="form-check-label" for="inlineRadio65">Totalmente en desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[16]" id="inlineRadio66"
                                    value="Sensorial_D">
                                <label class="form-check-label" for="inlineRadio66">En desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[16]" id="inlineRadio67"
                                    value="Sensorial_A">
                                <label class="form-check-label" for="inlineRadio67">De acuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[16]" id="inlineRadio68"
                                    value="Sensorial_TA">
                                <label class="form-check-label" for="inlineRadio68">Totalmente de acuerdo</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 18
                    </div>
                    <div class="card-body">
                        <p><b>Piensa en las implicaciones futuras</b></p>
                        <div class="text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[17]" id="inlineRadio69"
                                    value="Intuitivo_TD">
                                <label class="form-check-label" for="inlineRadio69">Totalmente en desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[17]" id="inlineRadio70"
                                    value="Intuitivo_D">
                                <label class="form-check-label" for="inlineRadio70">En desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[17]" id="inlineRadio71"
                                    value="Intuitivo_A">
                                <label class="form-check-label" for="inlineRadio71">De acuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[17]" id="inlineRadio72"
                                    value="Intuitivo_TA">
                                <label class="form-check-label" for="inlineRadio72">Totalmente de acuerdo</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 19
                    </div>
                    <div class="card-body">
                        <p><b>Tiende a ver defectos ajenos</b></p>
                        <div class="text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[18]" id="inlineRadio73"
                                    value="Racional_TD">
                                <label class="form-check-label" for="inlineRadio73">Totalmente en desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[18]" id="inlineRadio74"
                                    value="Racional_D">
                                <label class="form-check-label" for="inlineRadio74">En desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[18]" id="inlineRadio75"
                                    value="Racional_A">
                                <label class="form-check-label" for="inlineRadio75">De acuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[18]" id="inlineRadio76"
                                    value="Racional_TA">
                                <label class="form-check-label" for="inlineRadio76">Totalmente de acuerdo</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 20
                    </div>
                    <div class="card-body">
                        <p><b>Se convence por sus sensaciones</b></p>
                        <div class="text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[19]" id="inlineRadio77"
                                    value="Emocional_TD">
                                <label class="form-check-label" for="inlineRadio77">Totalmente en desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[19]" id="inlineRadio78"
                                    value="Emocional_D">
                                <label class="form-check-label" for="inlineRadio78">En desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[19]" id="inlineRadio79"
                                    value="Emocional_A">
                                <label class="form-check-label" for="inlineRadio79">De acuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[19]" id="inlineRadio80"
                                    value="Emocional_TA">
                                <label class="form-check-label" for="inlineRadio80">Totalmente de acuerdo</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 21
                    </div>
                    <div class="card-body">
                        <p><b>Aparenta ser frío y reservado</b></p>
                        <div class="text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[20]" id="inlineRadio81"
                                    value="Racional_TD">
                                <label class="form-check-label" for="inlineRadio81">Totalmente en desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[20]" id="inlineRadio82"
                                    value="Racional_D">
                                <label class="form-check-label" for="inlineRadio82">En desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[20]" id="inlineRadio83"
                                    value="Racional_A">
                                <label class="form-check-label" for="inlineRadio83">De acuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[20]" id="inlineRadio84"
                                    value="Racional_TA">
                                <label class="form-check-label" for="inlineRadio84">Totalmente de acuerdo</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 22
                    </div>
                    <div class="card-body">
                        <p><b>Decide por sus valores y sensaciones</b></p>
                        <div class="text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[21]" id="inlineRadio85"
                                    value="Emocional_TD">
                                <label class="form-check-label" for="inlineRadio85">Totalmente en desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[21]" id="inlineRadio86"
                                    value="Emocional_D">
                                <label class="form-check-label" for="inlineRadio86">En desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[21]" id="inlineRadio87"
                                    value="Emocional_A">
                                <label class="form-check-label" for="inlineRadio87">De acuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[21]" id="inlineRadio88"
                                    value="Emocional_TA">
                                <label class="form-check-label" for="inlineRadio88">Totalmente de acuerdo</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 23
                    </div>
                    <div class="card-body">
                        <p><b>No toma las cosas personalmente</b></p>
                        <div class="text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[22]" id="inlineRadio89"
                                    value="Racional_TD">
                                <label class="form-check-label" for="inlineRadio89">Totalmente en desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[22]" id="inlineRadio90"
                                    value="Racional_D">
                                <label class="form-check-label" for="inlineRadio90">En desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[22]" id="inlineRadio91"
                                    value="Racional_A">
                                <label class="form-check-label" for="inlineRadio91">De acuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[22]" id="inlineRadio92"
                                    value="Racional_TA">
                                <label class="form-check-label" for="inlineRadio92">Totalmente de acuerdo</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 24
                    </div>
                    <div class="card-body">
                        <p><b>Es motivado por el reconocimiento</b></p>
                        <div class="text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[23]" id="inlineRadio93"
                                    value="Emocional_TD">
                                <label class="form-check-label" for="inlineRadio93">Totalmente en desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[23]" id="inlineRadio94"
                                    value="Emocional_D">
                                <label class="form-check-label" for="inlineRadio94">En desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[23]" id="inlineRadio95"
                                    value="Emocional_A">
                                <label class="form-check-label" for="inlineRadio95">De acuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[23]" id="inlineRadio96"
                                    value="Emocional_TA">
                                <label class="form-check-label" for="inlineRadio96">Totalmente de acuerdo</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 25
                    </div>
                    <div class="card-body">
                        <p><b>Honesto y directo</b></p>
                        <div class="text-center">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions[24]" id="inlineRadio97"
                                value="Racional_TD">
                            <label class="form-check-label" for="inlineRadio97">Totalmente en desacuerdo</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions[24]" id="inlineRadio98"
                                value="Racional_D">
                            <label class="form-check-label" for="inlineRadio98">En desacuerdo</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions[24]" id="inlineRadio99"
                                value="Racional_A">
                            <label class="form-check-label" for="inlineRadio99">De acuerdo</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions[24]" id="inlineRadio100"
                                value="Racional_TA">
                            <label class="form-check-label" for="inlineRadio100">Totalmente de acuerdo</label>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 26
                    </div>
                    <div class="card-body">
                        <p><b>Valora la armonía y la compasión</b></p>
                        <div class="text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[25]" id="inlineRadio101"
                                    value="Emocional_TD">
                                <label class="form-check-label" for="inlineRadio101">Totalmente en desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[25]" id="inlineRadio102"
                                    value="Emocional_D">
                                <label class="form-check-label" for="inlineRadio102">En desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[25]" id="inlineRadio103"
                                    value="Emocional_A">
                                <label class="form-check-label" for="inlineRadio103">De acuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[25]" id="inlineRadio104"
                                    value="Emocional_TA">
                                <label class="form-check-label" for="inlineRadio104">Totalmente de acuerdo</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 27
                    </div>
                    <div class="card-body">
                        <p><b>Argumenta o debate por diversión</b></p>
                        <div class="text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[26]" id="inlineRadio105"
                                    value="Racional_TD">
                                <label class="form-check-label" for="inlineRadio105">Totalmente en desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[26]" id="inlineRadio106"
                                    value="Racional_D">
                                <label class="form-check-label" for="inlineRadio106">En desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[26]" id="inlineRadio107"
                                    value="Racional_A">
                                <label class="form-check-label" for="inlineRadio107">De acuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[26]" id="inlineRadio108"
                                    value="Racional_TA">
                                <label class="form-check-label" for="inlineRadio108">Totalmente de acuerdo</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 28
                    </div>
                    <div class="card-body">
                        <p><b>Jugar primero, trabajar después</b></p>
                        <div class="text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[27]" id="inlineRadio109"
                                    value="Perceptivo_TD">
                                <label class="form-check-label" for="inlineRadio109">Totalmente en desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[27]" id="inlineRadio110"
                                    value="Perceptivo_D">
                                <label class="form-check-label" for="inlineRadio110">En desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[27]" id="inlineRadio111"
                                    value="Perceptivo_A">
                                <label class="form-check-label" for="inlineRadio111">De acuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[27]" id="inlineRadio112"
                                    value="Perceptivo_TA">
                                <label class="form-check-label" for="inlineRadio112">Totalmente de acuerdo</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 29
                    </div>
                    <div class="card-body">
                        <p><b>Prefiere terminar proyectos</b></p>
                        <div class="text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[28]" id="inlineRadio113"
                                    value="Calificador_TD">
                                <label class="form-check-label" for="inlineRadio113">Totalmente en desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[28]" id="inlineRadio114"
                                    value="Calificador_D">
                                <label class="form-check-label" for="inlineRadio114">En desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[28]" id="inlineRadio115"
                                    value="Calificador_A">
                                <label class="form-check-label" for="inlineRadio115">De acuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[28]" id="inlineRadio116"
                                    value="Calificador_TA">
                                <label class="form-check-label" for="inlineRadio116">Totalmente de acuerdo</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 30
                    </div>
                    <div class="card-body">
                        <p><b>Desea la libertad de la espontaneidad</b></p>
                        <div class="text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[29]" id="inlineRadio117"
                                    value="Perceptivo_TD">
                                <label class="form-check-label" for="inlineRadio117">Totalmente en desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[29]" id="inlineRadio118"
                                    value="Perceptivo_D">
                                <label class="form-check-label" for="inlineRadio118">En desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[29]" id="inlineRadio119"
                                    value="Perceptivo_A">
                                <label class="form-check-label" for="inlineRadio119">De acuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[29]" id="inlineRadio120"
                                    value="Perceptivo_TA">
                                <label class="form-check-label" for="inlineRadio120">Totalmente de acuerdo</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 31
                    </div>
                    <div class="card-body">
                        <p><b>Le gusta tomar decisiones</b></p>
                        <div class="text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[30]" id="inlineRadio121"
                                    value="Calificador_TD">
                                <label class="form-check-label" for="inlineRadio121">Totalmente en desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[30]" id="inlineRadio122"
                                    value="Calificador_D">
                                <label class="form-check-label" for="inlineRadio122">En desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[30]" id="inlineRadio123"
                                    value="Calificador_A">
                                <label class="form-check-label" for="inlineRadio123">De acuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[30]" id="inlineRadio124"
                                    value="Calificador_TA">
                                <label class="form-check-label" for="inlineRadio124">Totalmente de acuerdo</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 32
                    </div>
                    <div class="card-body">
                        <p><b>Menos consciente del tiempo, impuntual</b></p>
                        <div class="text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[31]" id="inlineRadio125"
                                    value="Perceptivo_TD">
                                <label class="form-check-label" for="inlineRadio125">Totalmente en desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[31]" id="inlineRadio126"
                                    value="Perceptivo_D">
                                <label class="form-check-label" for="inlineRadio126">En desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[31]" id="inlineRadio127"
                                    value="Perceptivo_A">
                                <label class="form-check-label" for="inlineRadio127">De acuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[31]" id="inlineRadio128"
                                    value="Perceptivo_TA">
                                <label class="form-check-label" for="inlineRadio128">Totalmente de acuerdo</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 33
                    </div>
                    <div class="card-body">
                        <p><b>Le gusta hacer y atenerse a planes</b></p>
                        <div class="text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[32]" id="inlineRadio129"
                                    value="Calificador_TD">
                                <label class="form-check-label" for="inlineRadio129">Totalmente en desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[32]" id="inlineRadio130"
                                    value="Calificador_D">
                                <label class="form-check-label" for="inlineRadio130">En desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[32]" id="inlineRadio131"
                                    value="Calificador_A">
                                <label class="form-check-label" for="inlineRadio131">De acuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[32]" id="inlineRadio132"
                                    value="Calificador_TA">
                                <label class="form-check-label" for="inlineRadio132">Totalmente de acuerdo</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 34
                    </div>
                    <div class="card-body">
                        <p><b>Quiere tener opciones abiertas</b></p>
                        <div class="text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[33]" id="inlineRadio133"
                                    value="Perceptivo_TD">
                                <label class="form-check-label" for="inlineRadio133">Totalmente en desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[33]" id="inlineRadio134"
                                    value="Perceptivo_D">
                                <label class="form-check-label" for="inlineRadio134">En desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[33]" id="inlineRadio135"
                                    value="Perceptivo_A">
                                <label class="form-check-label" for="inlineRadio135">De acuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[33]" id="inlineRadio136"
                                    value="Perceptivo_TA">
                                <label class="form-check-label" for="inlineRadio136">Totalmente de acuerdo</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 35
                    </div>
                    <div class="card-body">
                        <p><b>Serio y convencional</b></p>
                        <div class="text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[34]" id="inlineRadio137"
                                    value="Calificador_TD">
                                <label class="form-check-label" for="inlineRadio137">Totalmente en desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[34]" id="inlineRadio138"
                                    value="Calificador_D">
                                <label class="form-check-label" for="inlineRadio138">En desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[34]" id="inlineRadio139"
                                    value="Calificador_A">
                                <label class="form-check-label" for="inlineRadio139">De acuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[34]" id="inlineRadio140"
                                    value="Calificador_TA">
                                <label class="form-check-label" for="inlineRadio140">Totalmente de acuerdo</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Característica 36
                    </div>
                    <div class="card-body">
                        <p><b>Cuestiona muchas reglas</b></p>
                        <div class="text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[35]" id="inlineRadio141"
                                    value="Perceptivo_TD">
                                <label class="form-check-label" for="inlineRadio141">Totalmente en desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[35]" id="inlineRadio142"
                                    value="Perceptivo_D">
                                <label class="form-check-label" for="inlineRadio142">En desacuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[35]" id="inlineRadio143"
                                    value="Perceptivo_A">
                                <label class="form-check-label" for="inlineRadio143">De acuerdo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions[35]" id="inlineRadio144"
                                    value="Perceptivo_TA">
                                <label class="form-check-label" for="inlineRadio144">Totalmente de acuerdo</label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Enviar</button>
                </div>
            </form>
        </body>
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