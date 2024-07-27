<?php
     session_start();
    
     if(!isset($_SESSION['usuario'])) {
             
         header('Location: http://localhost:8084/proyecto/index.php');
     }elseif($_SESSION['role'] != 2){
         header('Location: http://localhost:8084/proyecto/index.php');
     }


    include $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/EntradaService.php";
    include $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/PeliculaService.php";
    include_once  $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/SalaService.php";

    $pservice = new PeliculaService();
    $peliculas = $pservice -> obtenerTodos();

    $service = new EntradaService();
    $entradas = $service -> obtenerTodos();

    $salaS = new SalaService();
    $salas = $salaS -> obtenerTodos();  

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

<!-- Header -->
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
            <div class="col-md-3 mb-2">
                <p style="text-align: right">Filtrar por sala: </p>
            </div>
            <div class="col-md-3 mb-2">                  
              <select id="sala" class="form-control" name="tipo">
                    <option value="1">Selecciona una sala:</option>
                    <?php foreach ($salas as $sala){?>
                        <option value="<?php echo $sala -> getNombre(); ?>"><?php echo $sala -> getNombre(); ?></option>
                    <?php } ?> 
                </select>
            </div> 
            
            <div class="col-md-3 mb-2">
                    <p style="text-align: right">Filtrar por pelicula: </p>
            </div>
            <div class="col-md-3 mb-2">                  
                <select id="peli" class="form-control" name="tipo">
                    <option value="1">Selecciona una pelicula:</option>
                    <?php foreach ($peliculas as $pelicula){?>
                        <option value="<?php echo $pelicula -> getTitulo(); ?>"><?php echo $pelicula -> getTitulo(); ?></option>
                    <?php } ?>                     
                </select>
            </div>           
                     
      </div>         
  
</div>
    
  <table class="table table-striped table-bordered">
      <thead>
          <th>ID</th>
          <th>SALA</th>
          <th>PELICULA</th>
          <th>FECHA</th>
          <th>HORA</th>
          <th>BUTACA</th>
          <th>USUARIO</th>
          
      </thead>
      <tbody id="tabla">

      <?php foreach ($entradas as $entrada){?>
        <tr>        
              <td><?php echo $entrada -> getId(); ?></td>
              <td><?php echo $entrada -> getSala(); ?></td>
              <td><?php echo $entrada -> getPelicula(); ?></td>
              <td><?php echo $entrada -> getFecha(); ?></td>
              <td><?php echo $entrada -> getHora(); ?></td>
              <td><?php echo $entrada -> getButaca(); ?></td>
              <td><?php echo $entrada -> getEmail(); ?></td>              
        </tr>
        <?php } ?>
          
      </tbody>
  </table>

  <script>
        $(document).ready(function(){
            $('#sala').change(function(){
                var sal = $(this).val();
                if(sal){                    
                    $.ajax({
                        type:'POST',
                        url:'EntradasAjax.php',
                        data:'sala='+sal,                        
                        success:function(html){                        
                            $('#tabla').html(html);
                        }
                    });
                }
            });
        });
        $(document).ready(function(){
            $('#peli').change(function(){
                var pelicula = $(this).val();
                if(pelicula){                   
                    $.ajax({
                        type:'POST',
                        url:'EntradasAjax.php',
                        data:'peli='+pelicula,                        
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