<?php
 session_start();
    
 if(!isset($_SESSION['usuario'])) {
         
     header('Location: http://localhost:8084/proyecto/index.php');
 }elseif($_SESSION['role'] != 2){
     header('Location: http://localhost:8084/proyecto/index.php');
 }

include $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/CarteleraService.php";

    $service = new CarteleraService();
    if(isset($_GET['id'])){
    $id_cartelera = $_GET['id'];
    $cartelera = $service -> eliminarCartelera($id_cartelera); 
    header('location:VerCartelera.php'); 
    
   }
  
  
?>