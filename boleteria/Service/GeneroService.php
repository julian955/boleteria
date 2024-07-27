<?php

class GeneroService{    


    public function __construct(){
        
    }

    public function crearGenero($nombre){ 

        require 'conexion.php';

        $sqlInsertar = "INSERT INTO genero(id_genero, nombre) VALUES
         ('0','$nombre')";

        mysqli_query($mysqli,$sqlInsertar);
    
    }

    public function obtenerNombreGenero($id){ 

        require 'conexion.php';
        require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Model/Genero.php";

        $sql = "SELECT * FROM genero WHERE id_genero='".$id."'";
        $resultado = mysqli_query($mysqli,$sql);        


        while($fila=mysqli_fetch_assoc($resultado)){      

            
            $genero = $fila['nombre'];
        }   

        return $genero;
    
    }

    public function obtenerTodos(){ 

        require 'conexion.php';
        require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Model/Genero.php";

        $sql = "SELECT * FROM genero";
        $resultado = mysqli_query($mysqli,$sql);

        

        $generos = array();

        while($fila=mysqli_fetch_assoc($resultado)){      

            $genero = new genero();
            $genero -> setId($fila['id_genero']);            
            $genero -> setNombre($fila['nombre']);          

            array_push($generos,$genero);
            
        }   

        return $generos;
    
    } 


}  
?>