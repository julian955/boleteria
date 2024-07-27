
<?php

  session_start();
        
  if(!isset($_SESSION['usuario'])) {
          
      header('Location: http://localhost:8084/proyecto/index.php');
  }elseif($_SESSION['role'] != 2){
      header('Location: http://localhost:8084/proyecto/index.php');
  }

include $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/UsuarioService.php";

   $service = new UsuarioService();
   if(isset($_GET['id'])){
    $id_usuario = $_GET['id'];
    $usuario = $service -> eliminarUsuario($id_usuario); 
    header('location:ListaUsuarios.php'); 
   }
  
  
?>