<?php
   session_start();
      
   if(!isset($_SESSION['usuario'])) {
         
      header('Location: http://localhost:8084/proyecto/index.php');
   }elseif($_SESSION['role'] != 2){
      header('Location: http://localhost:8084/proyecto/index.php');
   }

   include $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/EstrenoService.php";

   $service = new EstrenoService();
   if(isset($_GET['id'])){
    $id_estreno = $_GET['id'];
    $service -> eliminarEstreno($id_estreno);  
   }

   header('location:VerEstrenos.php'); 
  
?>