<?php

    session_start();
        
    if(!isset($_SESSION['usuario'])) {
            
        header('Location: http://localhost:8084/proyecto/index.php');
    }elseif($_SESSION['role'] != 2){
        header('Location: http://localhost:8084/proyecto/index.php');
    }

    include $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/SalaService.php";

   $service = new SalaService();

   if(isset($_POST['nombre']) && isset($_POST['tipo']) && isset($_POST['butacas'])){
    
    $service -> crearSala($_POST['nombre'],$_POST['tipo'],$_POST['butacas']);
    header('location:TodasSalas.php');
  }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Sala</title>
    <link rel="stylesheet" href="../../css/formularioStyle.css">
</head>

<body>
    <div class="container">
        <h2>Registro Sala</h2>

        <fieldset>            
            <form action="AgregarSala.php" method="POST">
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre"><br>
                </div>
                
                <div class="form-group">
                    <label for="tipo">Tipo:</label>
                    <select id="tipo" name="tipo">
                        <option value="Comun">Comun</option>
                        <option value="3-D">3-D</option>
                        <option value="4-D">4-D</option>
                        <option value="VIP">VIP</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Butacas</label>
                    <input type="number" name="butacas"><br>
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