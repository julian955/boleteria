<?php
     session_start();
    
     if(!isset($_SESSION['usuario'])) {
             
         header('Location: http://localhost:8084/proyecto/index.php');
     }elseif($_SESSION['role'] != 2){
         header('Location: http://localhost:8084/proyecto/index.php');
     }
     
    include_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/PeliculaService.php";
    include $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/GeneroService.php";

    $gservice = new GeneroService();
   
    $generos = $gservice -> obtenerTodos();
   

    $service = new PeliculaService();

    $peliculas = $service -> obtenerTodos();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>BOLETERIA</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

<body>

    <div class="container mt-4 mb-0">
        
            <div class="row">
                    <div class="col-md-4 mb-3">
                        <p style="text-align: right">Filtrar por genero: </p>
                    </div>
                    <div class="col-md-4 mb-3">                  
                    <select id="gen" class="form-control" name="tipo">
                            <option value="0">Selecciona un genero</option>
                            <?php foreach ($generos as $genero){?>
                                <option value="<?php echo $genero -> getId(); ?>"><?php echo $genero -> getNombre(); ?></option>
                            <?php } ?> 
                        </select>
                    </div>           
            </div>         
        
    </div>
    
  <table class="table table-striped table-bordered">
      <thead>
          <th>ID</th>
          <th>TITULO</th>
          <th>IMAGEN</th>
          <th>GENERO</th>
          <th>DESCRIPCION</th>
          <th>DURACION</th>
          <th>CALIFICACION</th>
          <th>DIRECTOR</th>
      </thead>
      <tbody id="tabla">

      <?php foreach ($peliculas as $pelicula){?>
        <tr>        
              <td><?php echo $pelicula -> getId(); ?></td>
              <td><?php echo $pelicula -> getTitulo(); ?></td>
              <td><?php echo $pelicula -> getImagen(); ?></td>
              <td><?php echo $pelicula -> getGenero(); ?></td>
              <td><?php echo $pelicula -> getDescripcion(); ?></td>
              <td><?php echo $pelicula -> getDuracion(); ?></td>
              <td><?php echo $pelicula -> getCalificacion(); ?></td>
              <td><?php echo $pelicula -> getDirector(); ?></td>
              <td>                      
                      <a href="http://localhost:8084/proyecto/Vistas/PeliculaVistas/EliminarPelicula.php?id=<?php echo $pelicula -> getId(); ?>"><i class="fas fa-ban"></i></a>
                      <a href="http://localhost:8084/proyecto/Vistas/PeliculaVistas/ModificarPelicula.php?id=<?php echo $pelicula -> getId(); ?>"><i class="far fa-edit"></i></a>
              </td>
              
              
        </tr>
        <?php } ?>
          
      </tbody>
  </table>
  <a href="http://localhost:8084/proyecto/Vistas/PeliculaVistas/CrearPelicula.php" class="btn btn-primary">Agregar Pelicula</a>


    <script>
        $(document).ready(function(){
            $('#gen').change(function(){
                var genero = $(this).val();
                if(genero){                    
                    $.ajax({
                        type:'POST',
                        url:'PeliAjax.php',
                        data:'genero='+genero,                        
                        success:function(html){                        
                            $('#tabla').html(html);
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>