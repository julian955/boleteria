<?php

    session_start();
        
    if(!isset($_SESSION['usuario'])) {
            
        header('Location: http://localhost:8084/proyecto/index.php');
    }elseif($_SESSION['role'] != 2){
        header('Location: http://localhost:8084/proyecto/index.php');
    }

    include $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/PeliculaService.php";
    include $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/GeneroService.php";

    $gservice = new GeneroService();   
    $generos = $gservice -> obtenerTodos();

    $service = new PeliculaService();
    if(isset($_GET['id'])){
    $id_pelicula = $_GET['id'];
    $pelicula = $service -> obtenerPelicula($id_pelicula);      
   } 

   if(isset($_POST['titulo']) && isset($_POST['genero']) && isset($_POST['descripcion']) && isset($_POST['duracion']) && isset($_POST['calificacion']) && isset($_POST['director'])){
    
    $service -> modificarPelicula($_POST['id'],$_POST['titulo'],$_POST['imagen'],$_POST['genero'],$_POST['descripcion'],$_POST['duracion'],$_POST['calificacion'],$_POST['director']);
    header('location:MostrarPeliculas.php');
      
  }
  
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Pelicula</title>
    <link rel="stylesheet" href="../../css/formularioStyle.css">
</head>

<body>
    <div class="container">
        <h2>Modificar Pelicula</h2>

        <fieldset>
            
            <form action="ModificarPelicula.php" method="POST">

                <div class="form-group">
                    <label>ID</label>
                    <input type="text" name="id" value="<?php echo $pelicula -> getId();?>"readonly ><br>
                </div>

                <div class="form-group">
                    <label>Titulo: </label>
                    <input type="text" name="titulo" value="<?php echo $pelicula -> getTitulo();?>" ><br>
                </div>

                <div class="form-group">                    
                    <label for="genero">Genero:</label>
                    <select id="genero" name="genero">
                    <?php foreach ($generos as $genero){?>
                        <option value="<?php echo $genero -> getId(); ?>" 
                            <?php if ($pelicula -> getGenero() == $genero -> getNombre()) echo 'selected'; ?>>
                            <?php echo $genero -> getNombre(); ?>
                        </option>
                    <?php } ?> 
                    </select>
                </div>

                <div class="form-group">                
                    <label>Imagen</label>
                    <input type="file" name="imagen"><br>
                </div>
               
               
                <div class="form-group">
                    <label>Descripcion</label>
                    <input type="text" name="descripcion" value="<?php echo $pelicula -> getDescripcion();?>"><br>  
                </div> 

                <div class="form-group"> 
                    <label>Duracion</label>
                    <input type="number" name="duracion"  value="<?php echo $pelicula -> getDuracion();?>"><br>
                </div>

                <div class="form-group">                    
                    <label for="calificacion">Calificacion:</label>
                    <select id="calificacion" name="calificacion">
                        <option value="ATP" <?php if ($pelicula -> getCalificacion() == "ATP") echo 'selected'; ?>>ATP</option>
                        <option value="+13" <?php if ($pelicula -> getCalificacion() == "+13") echo 'selected'; ?>>+13</option>
                        <option value="+18" <?php if ($pelicula -> getCalificacion() == "+18") echo 'selected'; ?>>+18</option>                        
                    </select>
                </div>

                <div class="form-group">
                    <label>Director</label>
                    <input type="text" name="director" value="<?php echo $pelicula -> getDirector();?>"><br>
                </div>   

                <div class="form-group">
                    <input type="submit" value="Guardar">  
                </div>    
                <div class="form-group">
                    <a href="javascript:history.back()" class="button">Volver</a>
                </div>
            </form>            
        </fieldset>
    </div>
</body>
</html>
