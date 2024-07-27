
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
    $service -> eliminarSala($id_sala);  
   }

   header('location:TodasSalas.php');  
  
?>