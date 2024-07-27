<?php
// Iniciamos la sesión
session_start();
include $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/UsuarioService.php";

$service = new UsuarioService();

if(isset($_POST['usuario']) && isset($_POST['contraseña'])) {
    // Si se ha enviado el formulario, verificamos si las credenciales son correctas
    if($service -> verificarUsuario($_POST['usuario'],$_POST['contraseña'])) {
        // Si las credenciales son correctas, iniciamos sesión y redirigimos al usuario a la página privada
        $_SESSION['usuario'] = $_POST['usuario'];
        $_SESSION['role'] = $service -> verificarRol($_POST['usuario']);
        $_SESSION['id'] =  $service -> obtenerIdUsuario($_POST['usuario']);       
        
        header('Location: index.php');
        exit;
    } 
} ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            margin-top: 100px;
            max-width: 400px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            background-color: #fff;
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #007bff;
        }
        .form-control {
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .btn-primary {
            border-radius: 5px;
            padding: 10px 20px;
            width: 100%;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: #dc3545;
            margin-top: 10px;
            text-align: center;
        }
        .register-link {
            text-align: center;
            margin-top: 20px;
        }
        .register-link a {
            color: #007bff;
            text-decoration: none;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<header class="bg-dark text-white text-center py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <h1 class="mb-0"><a style="text-decoration: none; color: inherit;" href="http://localhost:8084/proyecto">Boletería de Cine</a></h1>    
        <nav class="nav">
            <a class="nav-link text-white" href="http://localhost:8084/proyecto/Vistas/CarteleraVistas/CarteleraPublica.php">Cartelera</a>
            <a class="nav-link text-white" href="http://localhost:8084/proyecto/Vistas/EstrenoVistas/EstrenoPublico.php">Próximos Estrenos</a>
            <a class="nav-link text-white" href="http://localhost:8084/proyecto/Vistas/Entradas/Peliculas.php">Películas</a>        
        </nav>
        <div class="text-right">
            <?php if(isset($_SESSION['usuario'])): ?>
                <span>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?></span><br>
                <a class="text-white" href="/proyecto/logout.php">Salir</a>
            <?php else: ?>
                <a class="text-white" href="/proyecto/login.php">Iniciar Sesión</a>
            <?php endif; ?>
        </div>
    </div>
</header>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="login-container">
                    <h2>Iniciar Sesión</h2>
                    <form method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="usuario" placeholder="Usuario" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="contraseña" placeholder="Contraseña" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Iniciar Sesión">
                        </div>
                    </form>
                    <?php
                        // Mensaje de error si las credenciales son incorrectas
                        if (isset($_POST['usuario']) && isset($_POST['contraseña'])) {
                            echo '<div class="error-message">Usuario o contraseña incorrectos.</div>';
                        }
                    ?>
                    <div class="register-link">
                        <p>¿Eres Nuevo? <a href="/proyecto/Vistas/UsuarioVistas/AgregarUsuario.php">Regístrate</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

