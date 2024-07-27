<?php

    session_start();

    include_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/PeliculaService.php";

    $service = new PeliculaService();

    $peliculas = $service -> obtenerTodos();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Estilos CSS para las cards */
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .card {
            width: 200px; /* Ajusta el tamaño según tu preferencia */
            margin: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow: hidden;
            transition: transform 0.3s;
        }
        .card img {
            width: 100%;
            height: auto;
        }
        .card:hover {
            transform: scale(1.05);
        }
        /* Otros estilos CSS */
        /* Estilos adicionales para personalizar la página */
    </style>
</head>

<header class="bg-dark text-white text-center py-3">
    <div style="background-color:rgb(33 37 41)" class="container d-flex justify-content-between align-items-center">
        <h1 class="mb-0"><a style="text-decoration: none; color: inherit;" href="http://localhost:8084/proyecto">Boletería de Cine</a></h1>    
        <nav class="nav">
            <a class="nav-link text-white" href="http://localhost:8084/proyecto/Vistas/CarteleraVistas/CarteleraPublica.php">Cartelera</a>
            <a class="nav-link text-white" href="http://localhost:8084/proyecto/Vistas/EstrenoVistas/EstrenoPublico.php">Próximos Estrenos</a>
            <a class="nav-link text-white" href="http://localhost:8084/proyecto/Vistas/Entradas/Peliculas.php">Películas</a>        
        </nav>
        <div class="text-right">
            <?php if(isset($_SESSION['usuario'])): ?>
                <span>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?></span><br>
                <a class="text-white" href="/proyecto/Vistas/UsuarioVistas/ModificarUsuario.php?id=<?php echo $_SESSION['id']; ?>">Editar</a>
                <a class="text-white" href="/proyecto/logout.php">Salir</a>
            <?php else: ?>
                <a class="text-white" href="/proyecto/login.php">Iniciar Sesión</a>
            <?php endif; ?>
        </div>
    </div>
</header>
<?php if(isset($_SESSION['role'])): ?>
    <?php if($_SESSION['role'] == 2): ?>
<header class="bg-dark text-white text-center py-3">
    <div style="background-color:rgb(33 37 41)" class="container d-flex justify-content-between align-items-center">
        <h1 class="mb-0"><a style="text-decoration: none; color: inherit;">Menu Admin</a></h1>    
        <nav class="nav">
            <a class="nav-link text-white" href="http://localhost:8084/proyecto/Vistas/CarteleraVistas/VerCartelera.php">Cartelera</a>
            <a class="nav-link text-white" href="http://localhost:8084/proyecto/Vistas/EstrenoVistas/VerEstrenos.php">Estreno</a>
            <a class="nav-link text-white" href="http://localhost:8084/proyecto/Vistas/PeliculaVistas/MostrarPeliculas.php">Películas</a>
            <a class="nav-link text-white" href="http://localhost:8084/proyecto/Vistas/SalaVistas/TodasSalas.php">Salas</a>
            <a class="nav-link text-white" href="http://localhost:8084/proyecto/Vistas/UsuarioVistas/ListaUsuarios.php">Usuario</a> 
            <a class="nav-link text-white" href="http://localhost:8084/proyecto/Vistas/Entradas/VerEntradas.php">Entradas</a>     
        </nav>
        <div class="text-right">

        </div>      
    </div>
</header>
<?php endif; ?>
    <?php endif; ?>
<body>


<main>
    <div class="card-container">

    <?php foreach ($peliculas as $pelicula){?>
        <div class="card">
            <img src="<?php echo $pelicula -> getImagen(); ?>" alt="<?php echo $pelicula -> getTitulo(); ?>">
        </div>
    <?php } ?>     
        <!-- Agrega más cards según sea necesario -->
    </div>
</main>

<footer>
    <!-- Aquí puedes agregar información de contacto o derechos de autor -->
</footer>

</body>
</html>
