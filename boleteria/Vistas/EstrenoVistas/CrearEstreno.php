<?php

    session_start();
        
    if(!isset($_SESSION['usuario'])) {
            
        header('Location: http://localhost:8084/proyecto/index.php');
    }elseif($_SESSION['role'] != 2){
        header('Location: http://localhost:8084/proyecto/index.php');
    }

    include $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/PeliculaService.php";
    include $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/EstrenoService.php";

    $service = new PeliculaService();
    $EService = new EstrenoService();

    $peliculas = $service -> obtenerTodos();

    if(isset($_POST['id_pelicula']) && isset($_POST['fecha'])){
    
        $EService -> crearEstreno($_POST['id_pelicula'],$_POST['fecha']);
        header('location:VerEstrenos.php'); 
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Estreno</title>
    <link rel="stylesheet" href="../../css/formularioStyle.css">
</head>

<body>
    <div class="container">
        <h2>Registro Estreno</h2>
    <fieldset>
        
        <form action="CrearEstreno.php" method="POST">
            <div class="form-group">    
                <label>Pelicula: </label>           
                <select id="options" name="id_pelicula">
                    <?php foreach ($peliculas as $pelicula){?>
                        <option value="<?php echo $pelicula -> getId(); ?>"><?php echo $pelicula -> getTitulo(); ?></option>
                    <?php } ?>                
                </select>
            </div>
            
            <div class="form-group">
                <label>Fecha</label>
                <input type="date" name="fecha"><br>
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