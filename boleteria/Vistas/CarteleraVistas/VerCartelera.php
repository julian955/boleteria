<?php
    session_start();
    
    if(!isset($_SESSION['usuario'])) {
        
        header('Location: http://localhost:8084/proyecto/index.php');
    }elseif($_SESSION['role'] != 2){
        header('Location: http://localhost:8084/proyecto/index.php');
    }

    include_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/CarteleraService.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/PeliculaService.php";

    $peliculaService = new PeliculaService();
    $service = new CarteleraService();

    $carteleras = $service -> obtenerTodos();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
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
                <a class="text-white" href="/proyecto/Vistas/UsuarioVistas/ModificarUsuario.php?id=<?php echo $_SESSION['id']; ?>">Editar</a>
                <a class="text-white" href="/proyecto/logout.php">Salir</a>
            <?php else: ?>
                <a class="text-white" href="/proyecto/login.php">Iniciar Sesión</a>
            <?php endif; ?>
        </div>
    </div>
</header>
<header class="bg-dark text-white text-center py-3">
    <div class="container d-flex justify-content-between align-items-center">
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

<body>
    
  <table class="table table-striped table-bordered">
      <thead>
          <th>ID</th>
          <th>PELICULA</th>
          <th>IDIOMA</th>
          <th>SALA</th>
          <th>DIA</th>
          <th>HORA</th>
      </thead>
      <tbody>

      <?php foreach ($carteleras as $cartelera){?>
        <tr>        
              <td><?php echo $cartelera -> getId(); ?></td>
              <td><?php echo $peliculaService -> obtenerNombrePelicula($cartelera -> getPelicula()); ?></td>
              <td><?php echo $cartelera -> getIdioma(); ?></td>
              <td><?php echo $cartelera -> getSala(); ?></td>
              <td><?php echo $cartelera -> getDia(); ?></td>
              <td><?php echo $cartelera -> getHora(); ?></td>
              <td>                      
                      <a href="http://localhost:8084/proyecto/Vistas/CarteleraVistas/EliminarCartelera.php?id=<?php echo $cartelera -> getId(); ?>"><i class="fas fa-ban"></i></a>
                      <a href="http://localhost:8084/proyecto/Vistas/CarteleraVistas/EditarCartelera.php?id=<?php echo $cartelera -> getId(); ?>"><i class="far fa-edit"></i></a>
              </td>
              
              
        </tr>
        <?php } ?>
          
      </tbody>
  </table>
  <a href="http://localhost:8084/proyecto/Vistas/CarteleraVistas/AgregarCartelera.php" class="btn btn-primary">Agregar Cartelera</a>

</body>
</html>