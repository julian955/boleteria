<?php

   include $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/UsuarioService.php";

   $service = new UsuarioService();

   if(isset($_POST['email']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['telefono']) && isset($_POST['password'])){
    
    $service -> crearUsuario($_POST['email'],$_POST['nombre'],$_POST['apellido'],$_POST['telefono'],$_POST['password']);
    header('location:../../index.php');
  }  
  
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta Usuario</title>
    <link rel="stylesheet" href="../../css/formularioStyle.css">
</head>
<body>
    <div class="container">
    <h2>Registro Usuario</h2>
        <fieldset>            
            <form action="AgregarUsuario.php" method="POST">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    <input type="text" id="apellido" name="apellido" required>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="number" id="telefono" name="telefono" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>
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