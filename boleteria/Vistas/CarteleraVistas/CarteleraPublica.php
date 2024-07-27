<?php

    session_start();

    include $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/CarteleraService.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/PeliculaService.php";

    $Pservice = new PeliculaService();
    $Cservice = new CarteleraService();

    $carteleras = $Cservice -> obtenerTodos();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartelera de Películas</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/carteleraStyle.css">
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
    <div class="container">
        <div class="header">            
            <h1>PELICULAS EN CARTELERA</h1>
        </div>
        
        <?php foreach ($carteleras as $cartelera){?>
            <?php $pelicula = $Pservice ->obtenerPelicula($cartelera ->getPelicula());?>
            <div class="movie">
                <img src="<?php echo $pelicula -> getImagen(); ?>" alt="<?php echo $pelicula -> getTitulo(); ?>">
                <div class="movie-details">
                    <h2><?php echo $pelicula -> getTitulo(); ?></h2>
                    <p><strong>ESTRENO DE LA SEMANA</strong></p>
                    <p><?php echo $pelicula -> getDescripcion(); ?></p>
                    <p><strong>Género:</strong> <?php echo $pelicula -> getGenero(); ?></p>  
                    <p><strong>Director:</strong> <?php echo $pelicula -> getDirector(); ?></p>
                    <p><strong>Calificación: </strong> <?php echo $pelicula -> getCalificacion(); ?></p>                  
                    
                    <p><strong>Dia:</strong> <?php echo $cartelera->getDia();?> </p>
                    <p><strong>Hora:</strong> <?php echo $cartelera->getHora();?></p>
                    
                    <a href="http://localhost:8084/proyecto/Vistas/Entradas/Seleccion.php?id=<?php echo $cartelera -> getId(); ?>" class="btn btn-danger">Comprar Entrada</a>
                </div>
            </div>
        <?php } ?>
        <!--
        <div class="movie">
            <img src="furiosa_poster.jpg" alt="Furiosa">
            <div class="movie-details">
                <h2>FURIOSA: DE LA SAGA MAD MAX - 2D CAST (SALA GRAND CRU)</h2>
                <p><strong>ESTRENO DE LA SEMANA</strong></p>
                <p>La nueva película de Warner Bros. Pictures y Village Roadshow Pictures es producida por Miller y su socio de toda la vida, el productor nominado al Oscar Doug Mitchell ("Mad Max: Fury Road", "Babe"), bajo su compañía Kennedy Miller Mitchell, con sede en Australia. Mientras el mundo caía, la joven Furiosa es arrebatada del Lugar Verde de Muchas...</p>
                <p><strong>Género:</strong> Acción</p>
                <p><strong>Director:</strong> George Miller</p>
                <p><strong>Protagonistas:</strong> Anya Taylor Joy, Chris Hemsworth, Tom Burke</p>
                <p><strong>Calificación:</strong> Apta para mayores de 13 años</p>
                <button>Comprar Entrada</button>
            </div>
        </div>
        <div class="movie">
            <img src="furiosa_poster.jpg" alt="Furiosa">
            <div class="movie-details">
                <h2>FURIOSA: DE LA SAGA MAD MAX - 2D SUB (SALA GRAND CRU)</h2>
                <p><strong>ESTRENO DE LA SEMANA</strong></p>
                <p>La nueva película de Warner Bros. Pictures y Village Roadshow Pictures es producida por Miller y su socio de toda la vida, el productor nominado al Oscar Doug Mitchell ("Mad Max: Fury Road", "Babe"), bajo su compañía Kennedy Miller Mitchell, con sede en Australia. Mientras el mundo caía, la joven Furiosa es arrebatada del Lugar Verde de Muchas...</p>
                <p><strong>Género:</strong> Acción</p>
                <p><strong>Director:</strong> George Miller</p>
                <p><strong>Protagonistas:</strong> Anya Taylor Joy, Chris Hemsworth, Tom Burke</p>
                <p><strong>Calificación:</strong> Apta para mayores de 13 años</p>
                <button>Comprar Entrada</button>
            </div>
        </div> -->
    </div>
</body>
</html>


