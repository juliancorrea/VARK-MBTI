<?php
 session_start();
   if(isset($_SESSION["expediente"]) || isset($_SESSION["admin"]))
    {
        header('Refresh: 0; URL = dashboard.php');
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
    <title>Login - VARK y MBTI</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-custom">
        <div class="container">
            <?php
            include 'database.php';
            $pdo = Database::connect();
            
            $msg = '';
            
            if (isset($_POST['maestro']) && !empty($_POST['expediente'])) {
            
                $form_expediente = $_POST['expediente'];
                
                $grant_access = false;
                foreach($pdo -> query("SELECT * FROM gruposmaestros WHERE expediente = '$form_expediente'") as $bd_user)
                {
                    if($bd_user["expediente"] == $form_expediente)
                    {
                        $grant_access = true;
                        break;
                    }
                }
                if($grant_access && isset($_SESSION))
                {
                    $_SESSION['valid'] = true;
                    $_SESSION['timeout'] = time();
                    $_SESSION['expediente'] = $form_expediente;
                    $_SESSION['nombre'] = $bd_user["maestro"];
                    ?>
                    <!DOCTYPE html>
                    <html>
                    <script type="text/javascript">
                        window.location = "dashboard_maestro.php";
                    </script>
                    </html>
                    <?php
                }
                else
                {
                    $msg = 'Expediente incorrecto, verifique por favor.';
                }
            }
            if (isset($_POST['admin']) && !empty($_POST['email']) 
            && !empty($_POST['password'])) {
            
                $form_email = $_POST['email'];
                $form_pwd = $_POST['password'];
                
                $grant_access = false;
                foreach($pdo -> query("SELECT * FROM admin WHERE email = '$form_email'") as $bd_user)
                {
                    if($bd_user["email"] == $form_email && $bd_user["password"] == $form_pwd)
                    {
                        $grant_access = true;
                        break;
                    }
                }
                if($grant_access && isset($_SESSION))
                {
                    $_SESSION['valid'] = true;
                    $_SESSION['timeout'] = time();
                    $_SESSION['admin'] = $bd_user["nombre"];
                    $_SESSION['email'] = $form_email;
                    $_SESSION['password'] = $bd_user["password"];
                    ?>
                    <!DOCTYPE html>
                    <html>
                    <script type="text/javascript">
                        window.location = "dashboard.php";
                    </script>
                    </html>
                    <?php
                }
                else
                {
                    $msg = 'Credenciales incorrectas, verifique por favor.';
                }
            }
        ?>
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
    <div class="rojo">
            <div class="container">
                <h2 class="primer">Acceder</h2>
            </div>
        </div>
    </header>

    <main>
		<div class="container mt-3">
  			<h2>Acceder</h2><br/>
  			<!-- Nav tabs -->
  			<ul class="nav nav-tabs">
    			<li class="nav-item">
      				<a class="nav-link active" data-toggle="tab" href="#maestro">Maestro</a>
    			</li>
    			<li class="nav-item">
      				<a class="nav-link" data-toggle="tab" href="#admin">Administrador</a>
    			</li>
  			</ul>
  			<!-- Tab panes -->
  			<div class="tab-content">
    			<div id="maestro" class="container tab-pane active"><br>
      				<h3>Maestros</h3>
      				<p>Ingrese su número de expediente para acceder a la plataforma.</p>
                      <form class="form-signin" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
                    ?>"
                    method="post">
						<div class="form-group">
							<label for="ingresarExpediente"></label>
							<input type="text" class="form-control" name="expediente" placeholder="Número de expediente" required>
                        </div>
                        <p class="form-signin-heading" style="color: red">
                        <?php echo $msg; ?>
                    </p>
						<div class="form-group">
							<button type="submit" name="maestro" class="btn btn-primary">Acceder</button>
						</div>
					</form>
				</div>
    			<div id="admin" class="container tab-pane fade"><br>
      				<h3>Administrador</h3>
					<p>Iniciar sesión como administrador.</p>
					<form class="form-signin" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
                    ?>"
                    method="post">
						<div class="form-group">
							<input type="text" name="email" class="form-control" placeholder="Usuario" value="" required>
						</div>
						<div class="form-group">
							<input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                        </div>
                        <p class="form-signin-heading" style="color: red">
                        <?php echo $msg; ?>
                    </p>
						<div class="form-group">
							<input class="btn btn-primary" name="admin" type="submit" value="Acceder">
						</div>	
					</form>  
    			</div>
  			</div>
		</div>
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