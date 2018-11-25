<?php
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
        $resultado = "Aural";
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
    case("Aural"):
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

<head>
    <meta charset="utf-8">
    <title>Test de Aprendizaje VARK - Resultados</title>
    <script src="./js/jquery-3.3.1.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
</head>

<div class="container">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Visual</th>
                <th>Aural</th>
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
        <h1><b>Su resultado es: <?php echo $resultado?></b></h1>

        <div class="card mt-3 text-white bg-success">
            <div class="card-header">Estrategias sugeridas para el aprendizaje:</div>
            <div class="card-body">
                <?php echo $estrategia?>
            </div>
        </div>
    </div>
</div>