<?php

class SalaService{    


    public function __construct(){
        
    }

    public function crearSala($nombre, $tipo, $butacas){ 

        require 'conexion.php';

        $sqlInsertar = "INSERT INTO sala(id_sala, nombre, tipo, num_asientos) VALUES ('0','$nombre','$tipo','$butacas')";
        mysqli_query($mysqli,$sqlInsertar);
    
    }

    public function obtenerSala($id){ 

        require 'conexion.php';
        require_once  $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Model/Sala.php";

        $sql = "SELECT * FROM sala WHERE id_sala='".$id."'";
        $resultado = mysqli_query($mysqli,$sql);

        $sala = new Sala();


        while($fila=mysqli_fetch_assoc($resultado)){      

            $sala -> setId($fila['id_sala']); 
            $sala -> setNombre($fila['nombre']);           
            $sala -> setTipo($fila['tipo']);
            $sala -> setAsientos($fila['num_asientos']);

        }   

        return $sala;
    
    }

    public function obtenerTodos(){ 

        require 'conexion.php';
        require_once  $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Model/Sala.php";

        $sql = "SELECT * FROM sala";
        $resultado = mysqli_query($mysqli,$sql);

        

        $salas = array();

        while($fila=mysqli_fetch_assoc($resultado)){      

            $sala = new Sala();
            $sala -> setId($fila['id_sala']);
            $sala -> setNombre($fila['nombre']);            
            $sala -> setTipo($fila['tipo']);
            $sala -> setAsientos($fila['num_asientos']);

            array_push($salas,$sala);
            
        }   

        return $salas;
    
    }

    public function obtenerPorTipo($tipo){ 

        require 'conexion.php';
        require_once  $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Model/Sala.php";

        $sql = "SELECT * FROM sala WHERE tipo='".$tipo."'";
        $resultado = mysqli_query($mysqli,$sql);

        

        $salas = array();

        while($fila=mysqli_fetch_assoc($resultado)){      

            $sala = new Sala();
            $sala -> setId($fila['id_sala']);
            $sala -> setNombre($fila['nombre']);            
            $sala -> setTipo($fila['tipo']);
            $sala -> setAsientos($fila['num_asientos']);

            array_push($salas,$sala);
            
        }   

        return $salas;
    
    }

    public function modificarSala($id_sala, $nombre, $tipo){ 

        require 'conexion.php';

        $sqlInsertar = "UPDATE sala SET nombre= '".$nombre."', tipo= '".$tipo."' WHERE id_sala= '".$id_sala."'";
        mysqli_query($mysqli,$sqlInsertar);
    
    }

    public function eliminarSala($id_sala){ 

        require 'conexion.php';

        $sqlInsertar = "DELETE FROM sala WHERE id_sala= '".$id_sala."'";
        mysqli_query($mysqli,$sqlInsertar);
    
    }

    public function obtenerNombreSala($id){ 

        require 'conexion.php';       

        $sql = "SELECT * FROM sala WHERE id_sala='".$id."'";
        $resultado = mysqli_query($mysqli,$sql);      


        while($fila=mysqli_fetch_assoc($resultado)){ 

            $nombre = $fila['nombre'];

        }   

        return $nombre;
    
    }
    
    


}  
?>