<?php

    session_start();
        
    if(!isset($_SESSION['usuario'])) {
            
        header('Location: http://localhost:8084/proyecto/index.php');
    }elseif($_SESSION['role'] != 2){
        header('Location: http://localhost:8084/proyecto/index.php');
    }

    include_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/EstrenoService.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/PeliculaService.php";

    $service = new EstrenoService();
    $peliculaS = new PeliculaService();

    $peliculas = $peliculaS -> obtenerTodos();

   if(isset($_GET['id'])){
    $id_estreno = $_GET['id'];
    $estreno = $service -> obtenerEstreno($id_estreno);  
   }
   
   if(isset($_POST['id_pelicula']) && isset($_POST['fecha'])){    
    $service -> modificarEstreno($_POST['id'],$_POST['id_pelicula'],$_POST['fecha']);
    header('location:VerEstrenos.php');      
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Estreno</title>
    <link rel="stylesheet" href="../../css/formularioStyle.css">
</head>

<body>
    <div class="container">
        <h2>Modificar Estreno</h2>

        <fieldset>
            
            <form action="EditarEstreno.php" method="POST">

                <div class="form-group">
                    <label>ID</label>
                    <input type="text" name="id" value="<?php echo $estreno -> getId();?>"readonly ><br>
                </div>
                <div class="form-group"> 
                    <label>Pelicula:</label>
                    <select id="options" name="id_pelicula">
                        <?php foreach ($peliculas as $pelicula) { ?>
                            <option value="<?php echo $pelicula->getId(); ?>" 
                                <?php if ($pelicula->getId() == $estreno->getPelicula()) echo 'selected'; ?>>
                                <?php echo $pelicula->getTitulo(); ?>
                            </option>
                        <?php } ?>                
                    </select>
                </div>  
                <div class="form-group"> 
                    <label>Fecha:</label>
                    <input type="date" name="fecha" value="<?php echo $estreno -> getFechaEstreno();?>"><br>
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