<?php

    session_start();
        
    if(!isset($_SESSION['usuario'])) {
            
        header('Location: http://localhost:8084/proyecto/index.php');
    }elseif($_SESSION['role'] != 2){
        header('Location: http://localhost:8084/proyecto/index.php');
    }
    include_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/CarteleraService.php";
    
    include_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/PeliculaService.php";
    include_once  $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/SalaService.php";

    $service = new CarteleraService();
    $salaS = new SalaService();    
    $peliculaS = new PeliculaService();

    $peliculas = $peliculaS -> obtenerTodos();
    $salas = $salaS -> obtenerTodos();

    
    if(isset($_GET['id'])){
        $id_cartelera = $_GET['id'];
        $cartelera = $service -> obtenerCartelera($id_cartelera);     
    }
   
   if(isset($_POST['pelicula_id']) && isset($_POST['idioma']) && isset($_POST['dia']) && isset($_POST['hora'])){

        $service -> modificarCartelera($_POST['id'],$_POST['pelicula_id'],$_POST['idioma'], $_POST['dia'],$_POST['hora']);
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
        <h2>Modificar Cartelera</h2>

    <fieldset>
        
        <form action="EditarCartelera.php" method="POST">

             <div class="form-group">
                <label>ID</label>
                <input type="text" name="id" value="<?php echo $cartelera -> getId();?>"readonly ><br>
            </div>
            <div class="form-group"> 
                <label>Pelicula:</label>
                <select id="options" name="pelicula_id">
                    <?php foreach ($peliculas as $pelicula) { ?>
                        <option value="<?php echo $pelicula->getId(); ?>" 
                            <?php if ($pelicula->getId() == $cartelera->getPelicula()) echo 'selected'; ?>>
                            <?php echo $pelicula->getTitulo(); ?>
                        </option>
                    <?php } ?>                
                </select>
            </div>
            <div class="form-group"> 
                <label>Sala:</label>
                <input type="text" value="<?php echo $salaS -> obtenerNombreSala($cartelera -> getSala()); ?>"readonly ><br>                
            </div>
            <div class="form-group">        
                <label for="idioma">Idioma:</label>
                        <select id="idioma" name="idioma">
                            <option value="Español">Español</option>               
                            <option value="Subtitulado"
                                <?php if ($cartelera -> getIdioma() == 'Subtitulado') echo 'selected'; ?>>
                                Subtitulado
                            </option>
                        </select>
            </div>
            <div class="form-group"> 
                <label>Dia:</label>
                <input type="date" name="dia" value="<?php echo $cartelera -> getDia();?>"><br>
            </div>
            <div class="form-group"> 
                <label>Hora:</label>
                <input type="time" name="hora" value="<?php echo $cartelera -> getHora();?>"><br>
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
