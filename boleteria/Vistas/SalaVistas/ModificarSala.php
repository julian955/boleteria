<?php
    session_start();
        
    if(!isset($_SESSION['usuario'])) {
            
        header('Location: http://localhost:8084/proyecto/index.php');
    }elseif($_SESSION['role'] != 2){
        header('Location: http://localhost:8084/proyecto/index.php');
    }

    include $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/SalaService.php";

   $service = new SalaService();
   if(isset($_GET['id'])){
    $id_sala = $_GET['id'];
    $sala = $service -> obtenerSala($id_sala);  
   }  

   if(isset($_POST['tipo'])){
    
    $service -> modificarSala($_POST['id'], $_POST['nombre'], $_POST['tipo']);
    header('location:TodasSalas.php');
      
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
            
            <form action="ModificarSala.php" method="POST">

                <div class="form-group">
                    <label>ID</label>
                    <input type="text" name="id" value="<?php echo $sala -> getId();?>"readonly ><br>
                </div>
              

                <div class="form-group">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" value="<?php echo $sala -> getNombre();?>"><br>
                </div>
               
               
                <div class="form-group">
                    <label for="tipo">Tipo:</label>
                    <select id="tipo" name="tipo">
                        <option value="Comun" <?php if ($sala -> getTipo() == "Comun") echo 'selected'; ?>>Comun</option>
                        <option value="3-D" <?php if ($sala -> getTipo() == "3-D") echo 'selected'; ?>>3-D</option>
                        <option value="4-D" <?php if ($sala -> getTipo() == "4-D") echo 'selected'; ?>>4-D</option>
                        <option value="VIP" <?php if ($sala -> getTipo() == "VIP") echo 'selected'; ?>>VIP</option>
                    </select>
                </div>

                <div class="form-group"> 
                    <label>Butacas:</label>
                    <input type="text" name="butacas" value="<?php echo $sala -> getAsientos();?>" disabled ><br> 
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