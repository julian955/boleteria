<?php

    session_start();
        
    if(!isset($_SESSION['usuario'])) {
            
        header('Location: http://localhost:8084/proyecto/index.php');
    }elseif($_SESSION['role'] != 2){
        header('Location: http://localhost:8084/proyecto/index.php');
    }

    include $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/PeliculaService.php";

    $service = new PeliculaService();
    if(isset($_GET['id'])){
    $id_pelicula = $_GET['id'];
    $pelicula = $service -> eliminarPelicula($id_pelicula);
    header('location:MostrarPeliculas.php');  
    
   }
  
  
?>