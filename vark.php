<?php
    session_start();
    if(!isset($_SESSION["matricula"]))
    {
        header('Refresh: 0; URL = index.php');
        die();
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
    <title>Test de Aprendizaje VARK</title>
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
                            <a class="nav-link" href="test_launcher.php">Realizar test</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contacto</a>
                        </li>
                        <li class="nav-item acceder">
                            <a class="nav-link" href="acceder.php">Acceder</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-3">

        <body>
            <form action="vark_result.php" method="post">
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Pregunta 1
                    </div>
                    <div class="card-body">
                        <p><b>Usted cocinará algo especial para su familia. Usted haría:</b></p>
                    </div>
                    <div class="card-footer">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="A">
                            <label class="form-check-label">
                                Preguntar a amigos por sugerencias.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="V">
                            <label class="form-check-label">
                                Dar una visita al recetario por ideas de las fotos.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="R">
                            <label class="form-check-label">
                                Usar un libro de cocina donde usted sabe que hay una buena receta.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="K">
                            <label class="form-check-label">
                                Cocinar algo que usted sabe sin la necesidad de instrucciones.
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Pregunta 2
                    </div>
                    <div class="card-body">
                        <p><b>Usted escogerá alimento en un restaurante o un café. Usted haría:</b></p>
                    </div>
                    <div class="card-footer">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="A">
                            <label class="form-check-label">
                                Escuchar al mesero o pedir que amigos recomienden opciones.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="V">
                            <label class="form-check-label">
                                Mirar lo que otros comen o mirar dibujos de cada platillo.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="R">
                            <label class="form-check-label">
                                Escoger de las descripciones del menú.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="K">
                            <label class="form-check-label">
                                Escoger algo que tienes o has tenido antes.
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Pregunta 3
                    </div>
                    <div class="card-body">
                        <p><b>Aparte del precio, ¿qué más te influenciaría para comprar un libro de ciencia ficción?</b></p>
                    </div>
                    <div class="card-footer">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="A">
                            <label class="form-check-label">
                                Un amigo habla acerca de él y te lo recomienda.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="K">
                            <label class="form-check-label">
                                Tienes historias reales, expereiencias y ejemplos.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="R">
                            <label class="form-check-label">
                                Leyendo rápidamente partes de él.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="V">
                            <label class="form-check-label">
                                El diseño de la pasta es atractivo.
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Pregunta 4
                    </div>
                    <div class="card-body">
                        <p><b>Usted ha terminado una competencia o un examen y le gustaría tener una retroalimentación.
                                Te
                                gustaría retroalimentarte:</b></p>
                    </div>
                    <div class="card-footer">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="R">
                            <label class="form-check-label">
                                Usando descripciones escritas de los resultados.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="K">
                            <label class="form-check-label">
                                Usando ejemplos de lo que usted ha hecho.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="V">
                            <label class="form-check-label">
                                Usando gráficos que muestran lo que usted ha logrado.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="A">
                            <label class="form-check-label">
                                De alguien que habla por usted.
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Pregunta 5
                    </div>
                    <div class="card-body">
                        <p><b>Usted tiene un problema con la rodilla. Usted preferiría que el doctor:</b></p>
                    </div>
                    <div class="card-footer">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="K">
                            <label class="form-check-label">
                                Use un modelo de plástico y te enseñe lo que está mal.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="R">
                            <label class="form-check-label">
                                Te de una página de internet o algo para leer.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="A">
                            <label class="form-check-label">
                                Te describa lo que está mal.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="V">
                            <label class="form-check-label">
                                Te enseñe un diagrama de lo que está mal.
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Pregunta 6
                    </div>
                    <div class="card-body">
                        <p><b>Usted está a punto de comprar una cámara digital o teléfono móvil. ¿Aparte del precio qué
                                más
                                influirá en tomar su decisión?</b></p>
                    </div>
                    <div class="card-footer">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="K">
                            <label class="form-check-label">
                                Probándolo.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="V">
                            <label class="form-check-label">
                                Es un diseño moderno y se mira bien.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="R">
                            <label class="form-check-label">
                                Leer los detalles acerca de sus características.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="A">
                            <label class="form-check-label">
                                El vendedor me informa acerca de sus características.
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Pregunta 7
                    </div>
                    <div class="card-body">
                        <p><b>Usted no está seguro como se escribe "trascendente" o "tracendente". ¿Usted qué haría?</b></p>
                    </div>
                    <div class="card-footer">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="K">
                            <label class="form-check-label">
                                Escribir ambas palabras en un papel y escojo una.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="A">
                            <label class="form-check-label">
                                Pienso cómo suena cada palabra y escojo una.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="R">
                            <label class="form-check-label">
                                Busco una palabra en un diccionario.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="V">
                            <label class="form-check-label">
                                Veo la palabra en mi mente y escojo según como la veo.
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Pregunta 8
                    </div>
                    <div class="card-body">
                        <p><b>Me gustan las página de Internet que tienen:</b></p>
                    </div>
                    <div class="card-footer">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="R">
                            <label class="form-check-label">
                                Interesantes descripciones escritas, listas y explicaciones.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="V">
                            <label class="form-check-label">
                                Diseño interesante y características visuales.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="K">
                            <label class="form-check-label">
                                Cosas que con un click pueda cambiar o examinar.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="A">
                            <label class="form-check-label">
                                Canales donde puedo oír música, programas de radio o entrevistas.
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Pregunta 9
                    </div>
                    <div class="card-body">
                        <p><b>Usted está planeando unas vacaciones para un grupo. Usted quiere alguna observación de
                                ellos
                                acerca del plan. Usted haría:</b></p>
                    </div>
                    <div class="card-footer">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="V">
                            <label class="form-check-label">
                                Usa un mapa o página de Internet para mostrarles los lugares.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="A">
                            <label class="form-check-label">
                                Describe algunos de los puntos sobresalientes.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="R">
                            <label class="form-check-label">
                                Darles una copia del itinerario impreso.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="K">
                            <label class="form-check-label">
                                Llamarles por teléfono o mandar mensaje por correo electrónico.
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Pregunta 10
                    </div>
                    <div class="card-body">
                        <p><b>Usted está usando un libro, disco compacto o página de Internet para aprender a tomar
                                fotos
                                con su cámara digital nueva. A usted le gustaría tener:</b></p>
                    </div>
                    <div class="card-footer">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="A">
                            <label class="form-check-label">
                                Una oportunidad de hacer preguntas acerca de la cámara y sus características.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="V">
                            <label class="form-check-label">
                                Esquemas o diagramas que muestran la cámara y la función de cada parte.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="K">
                            <label class="form-check-label">
                                Ejemplos de buenas y malas fotos y cómo mejorarlas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="R">
                            <label class="form-check-label">
                                Aclarar las instrucciones escritas con listas y puntos sobre qué hacer.
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Pregunta 11
                    </div>
                    <div class="card-body">
                        <p><b>Usted quiere aprender un programa nuevo, habilidad o juego en una computadora. Usted qué
                                hace:</b></p>
                    </div>
                    <div class="card-footer">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="A">
                            <label class="form-check-label">
                                Hablar con gente que sabe acerca del programa.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="R">
                            <label class="form-check-label">
                                Leer las instrucciones que vienen en el programa.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="V">
                            <label class="form-check-label">
                                Seguir los esquemas en el libro que acompaña el programa.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="K">
                            <label class="form-check-label">
                                Use los controles o el teclado.
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Pregunta 12
                    </div>
                    <div class="card-body">
                        <p><b>Estás ayudando a alguien que quiere ir al aeropuerto, al centro del pueblo o la estación
                                del
                                ferrocarril. Usted hace:</b></p>
                    </div>
                    <div class="card-footer">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="K">
                            <label class="form-check-label">
                                Va con la persona.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="R">
                            <label class="form-check-label">
                                Anota las direcciones en un papel (sin mapa).
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="A">
                            <label class="form-check-label">
                                Les dice las direcciones.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="V">
                            <label class="form-check-label">
                                Les dibuja un croquis o les da un mapa.
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Pregunta 13
                    </div>
                    <div class="card-body">
                        <p><b>Recuerde un momento en su vida que usted aprendió a hacer algo nuevo. Trate de evitar
                                escoger
                                una destreza física, como andar en bicicleta. Usted aprendió mejor:</b></p>
                    </div>
                    <div class="card-footer">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="K">
                            <label class="form-check-label">
                                Viendo una demostración.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="R">
                            <label class="form-check-label">
                                Con instrucciones escritas, en un manual o libro de texto.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="A">
                            <label class="form-check-label">
                                Escuchando a alguien explicarlo o haciendo preguntas.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="V">
                            <label class="form-check-label">
                                Con esquemas y diagramas o pistas visuales.
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Pregunta 14
                    </div>
                    <div class="card-body">
                        <p><b>Usted prefiere un maestro o conferencista que use:</b></p>
                    </div>
                    <div class="card-footer">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="K">
                            <label class="form-check-label">
                                Demostraciones, modelos o sesiones prácticas.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="R">
                            <label class="form-check-label">
                                Folletos, libros o lecturas.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="V">
                            <label class="form-check-label">
                                Diagramas, esquemas o gráficos.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="A">
                            <label class="form-check-label">
                                Preguntas y respuestas, pláticas y oradores invitados.
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Pregunta 15
                    </div>
                    <div class="card-body">
                        <p><b>Un grupo de turistas quiere aprender acerca de parques o reservas naturales en su área.
                                Usted:</b></p>
                    </div>
                    <div class="card-footer">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="K">
                            <label class="form-check-label">
                                Los acompaña a un parque o reserva natural.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="R">
                            <label class="form-check-label">
                                Les da un libro o folleto acerca de parques o reservas naturales.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="A">
                            <label class="form-check-label">
                                Les da una plática acerca de parques o reservas naturales.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="V">
                            <label class="form-check-label">
                                Les muestras imágenes de Internet, fotos o libros con dibujos.
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header bg-danger text-white">
                        Pregunta 16
                    </div>
                    <div class="card-body">
                        <p><b>Usted tiene que hacer un discurso para una conferencia u ocasión especial. Usted hace:</b></p>
                    </div>
                    <div class="card-footer">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="R">
                            <label class="form-check-label">
                                Escribir el discurso y aprendérselo leyéndo varias veces.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="K">
                            <label class="form-check-label">
                                Reunir muchos ejemplos e historias para hacer el discurso verdadero y práctico.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="A">
                            <label class="form-check-label">
                                Escribir algunas palabras claves y practicar el discurso repetidas veces.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_list[]" value="V">
                            <label class="form-check-label">
                                Hacer diagramas o esquemas que te ayuden a explicar las cosas.
                            </label>
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