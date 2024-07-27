<?php
include $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/UsuarioService.php";

   $service = new UsuarioService();
   if(isset($_GET['id'])){
    $id_usuario = $_GET['id'];
    $usuario = $service -> obtenerUsuario($id_usuario);  
   } 
   
   if(isset($_POST['email']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['telefono'])){
    
    $service -> modificarUsuario($_POST['id'], $_POST['nombre'], $_POST['apellido'], $_POST['telefono']);
    header('location:ListaUsuarios.php');
      
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
        <h2>Modificar Usuario</h2>

        <fieldset>
            
        <form action="ModificarUsuario.php" method="POST">

                <div class="form-group">
                    <label>ID</label>
                    <input type="text" name="id" value="<?php echo $usuario -> getId();?>"readonly ><br>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" value="<?php echo $usuario -> getEmail();?>"readonly ><br>
                </div>
              

                <div class="form-group">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" value="<?php echo $usuario -> getNombre();?>" ><br>
                </div>
               
                <div class="form-group">
                    <label>Apellido:</label>
                    <input type="text" name="apellido" value="<?php echo$usuario -> getApellido();?>"><br> 
                </div>            
               

                <div class="form-group"> 
                    <label>Telefono:</label>
                    <input type="number" name="telefono" value="<?php echo $usuario -> getTelefono();?>" ><br>  
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