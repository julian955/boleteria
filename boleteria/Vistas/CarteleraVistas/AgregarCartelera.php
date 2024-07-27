<?php
    session_start();
    
    if(!isset($_SESSION['usuario'])) {
            
        header('Location: http://localhost:8084/proyecto/index.php');
    }elseif($_SESSION['role'] != 2){
        header('Location: http://localhost:8084/proyecto/index.php');
    }

    include_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/PeliculaService.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/SalaService.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/CarteleraService.php";

    $salaS = new SalaService();    
    $peliculaS = new PeliculaService();
    $peliculas = $peliculaS -> obtenerTodos();
    $salas = $salaS -> obtenerTodos();

    $service = new CarteleraService();

   if(isset($_POST['pelicula_id']) && isset($_POST['sala_id']) && isset($_POST['idioma']) && isset($_POST['dia']) && isset($_POST['hora'])){
    
    $service -> crearCartelera($_POST['pelicula_id'],$_POST['sala_id'], $_POST['idioma'], $_POST['dia'],$_POST['hora']);
    header('location:VerCartelera.php'); 
  }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Cartelera</title>
    <link rel="stylesheet" href="../../css/formularioStyle.css">
</head>

<body>
    <div class="container">
        <h2>Registro Cartelera</h2>

    <fieldset>
        
        <form action="AgregarCartelera.php" method="POST">
            <div class="form-group"> 
                <label>Pelicula:</label>
                <select id="options" name="pelicula_id">
                    <?php foreach ($peliculas as $pelicula){?>
                        <option value="<?php echo $pelicula -> getId(); ?>"><?php echo $pelicula -> getTitulo(); ?></option>
                    <?php } ?>                
                </select>
            </div>
            <div class="form-group"> 
                <label>Sala:</label>
                <select id="options" name="sala_id">
                    <?php foreach ($salas as $sala){?>
                        <option value="<?php echo $sala -> getId(); ?>"><?php echo $sala -> getNombre(); ?></option>
                    <?php } ?>                
                </select>
            </div>
            <div class="form-group">        
                <label for="idioma">Idioma:</label>
                        <select id="idioma" name="idioma">
                            <option value="español">Español</option>               
                            <option value="subtitulado">Subtitulado</option>
                        </select>
            </div>
            <div class="form-group"> 
                <label>Dia:</label>
                <input type="date" name="dia"><br>
            </div>
            <div class="form-group"> 
                <label>Hora:</label>
                <input type="time" name="hora"><br>
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