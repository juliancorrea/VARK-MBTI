<?php
    session_start();
    if(!isset($_SESSION["admin"]))
    {
        header('Refresh: 0; URL = login.php');
        die();
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
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <a href="#"><img src="./img/logo.png" alt=""></a>
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
    <?php
        if(isset($_SESSION["admin"]))
        {
            $nombre_admin = $_SESSION["admin"];
            echo '<div class="col-md-12">
            <h1><b>Bienvenido administrador:</b></h1>
            <h1>';
            echo $nombre_admin;
            echo'</h1></div>';
            echo '<div class="col-md-12">
            <div class="card mt-3">
            <div class="card-header">
                <div class="row">
                    <h3>Lista de registros VARK</h3>
                </div>
            </div>
            <div class="card-body">
            <table class="table table-striped table-bordered" id="vark_dt" width="100%">
                    <thead>
                        <tr>
                        <th>Matrícula</th>
                        <th>Suma Visual</th>
                        <th>Suma Auditivo</th>
                        <th>Suma Lectura/Escritura</th>
                        <th>Suma Quinestésico</th>
                        <th>Status
                        <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>';
                    include 'database.php';
                    $pdo = Database::connect();
                    $sql = 'SELECT * FROM resultado_vark ORDER BY Matricula DESC';
                    foreach ($pdo -> query($sql) as $row) {
                                echo '<tr>';
                                echo '<td>'. $row['Matricula'] . '</td>';
                                echo '<td>'. $row['SumaVisual'] . '</td>';
                                echo '<td>'. $row['SumaAuditivo'] . '</td>';
                                echo '<td>'. $row['SumaLectura'] . '</td>';
                                echo '<td>'. $row['SumaQuinestesico'] . '</td>';
                                echo '<td>'. $row['Status'] . '</td>';
                                echo '<td width=250>';
                                echo '<a class="btn btn-primary" href="details.php?id='.$row['Matricula'].'">Detalles</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="edit.php?id='.$row['Matricula'].'">Editar</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete.php?id='.$row['Matricula'].'">Eliminar</a>';
                                echo '</td>';
                                echo '</tr>';
                    }
                    Database::disconnect();
                    
                    echo '</tbody>
                </table>
            </div>
        </div>
    </div>';
    echo '<div class="col-md-12">
            <div class="card mt-3">
            <div class="card-header">
                <div class="row">
                    <h3>Lista de registros MBTI</h3>
                </div>
            </div>
            <div class="card-body">
            <table class="table table-striped table-bordered" id="mbti_dt" width="100%">
                    <thead>
                        <tr>
                        <th>Matrícula</th>
                        <th>Suma Extroversión</th>
                        <th>Suma Introversión</th>
                        <th>Suma Sensorial</th>
                        <th>Suma Intuitivo</th>
                        <th>Suma Racional</th>
                        <th>Suma Emocional</th>
                        <th>Suma Calificador</th>
                        <th>Suma Perceptivo</th>
                        <th>Status
                        <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>';
                    $pdo = Database::connect();
                    $sql = 'SELECT * FROM resultado_mbti ORDER BY Matricula DESC';
                    foreach ($pdo -> query($sql) as $row) {
                                echo '<tr>';
                                echo '<td>'. $row['Matricula'] . '</td>';
                                echo '<td>'. $row['SumaExtroversion'] . '</td>';
                                echo '<td>'. $row['SumaIntroversion'] . '</td>';
                                echo '<td>'. $row['SumaSensorial'] . '</td>';
                                echo '<td>'. $row['SumaIntuitivo'] . '</td>';
                                echo '<td>'. $row['SumaRacional'] . '</td>';
                                echo '<td>'. $row['SumaEmocional'] . '</td>';
                                echo '<td>'. $row['SumaCalificador'] . '</td>';
                                echo '<td>'. $row['SumaPerceptivo'] . '</td>';
                                echo '<td>'. $row['Status'] . '</td>';
                                echo '<td width=250>';
                                echo '<a class="btn btn-primary" href="details.php?id='.$row['Matricula'].'">Detalles</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="edit.php?id='.$row['Matricula'].'">Editar</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete.php?id='.$row['Matricula'].'">Eliminar</a>';
                                echo '</td>';
                                echo '</tr>';
                    }
                    Database::disconnect();
                    
                    echo '</tbody>
                </table>
            </div>
        </div>
    </div>';
        }
        //to-do dashboard maestros
    ?>

    


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

<script>
  $(document).ready(function() {
    $('#vark_dt').DataTable({
      "language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(Filtrado de _MAX_ registros totales)",
            "search": "Buscar: ",
            "paginate": {
              "previous": "Anterior",
              "next": "Siguiente",
              "last": "Ultimo",
              "first": "Primero"
            }
        },
        "pageLength": 10,
        "bLengthChange": false
    });

    $('#mbti_dt').DataTable({
      "language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(Filtrado de _MAX_ registros totales)",
            "search": "Buscar: ",
            "paginate": {
              "previous": "Anterior",
              "next": "Siguiente",
              "last": "Ultimo",
              "first": "Primero"
            }
        },
        "pageLength": 10,
        "bLengthChange": false
    });
  });
</script>