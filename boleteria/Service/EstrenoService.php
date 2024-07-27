<?php

class EstrenoService{    


    public function __construct(){
        
    }

    public function crearEstreno($id_pelicula, $fecha){ 

        require 'conexion.php';

        $sqlInsertar = "INSERT INTO estreno(id_estreno, id_pelicula, fecha) VALUES
         ('0','$id_pelicula','$fecha')";

        mysqli_query($mysqli,$sqlInsertar);
    
    }

    public function obtenerEstreno($id){ 

        require 'conexion.php';
        require $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Model/Estreno.php";

        $sql = "SELECT * FROM estreno WHERE id_estreno='".$id."'";
        $resultado = mysqli_query($mysqli,$sql);

        $estreno = new estreno();


        while($fila=mysqli_fetch_assoc($resultado)){      

            $estreno -> setId($fila['id_estreno']);
            $estreno -> setPelicula($fila['id_pelicula']);
            $estreno -> setFechaEstreno($fila['fecha']);
          

        }   

        return $estreno;
    
    }

    public function obtenerTodos(){ 

        require 'conexion.php';
        require $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Model/Estreno.php";

        $sql = "SELECT * FROM estreno";
        $resultado = mysqli_query($mysqli,$sql);

        

        $estrenos = array();

        while($fila=mysqli_fetch_assoc($resultado)){      

            $estreno = new estreno();
            $estreno -> setId($fila['id_estreno']);            
            $estreno -> setPelicula($fila['id_pelicula']);
            $fecha = $fila['fecha'];
            $estreno -> setFechaEstreno(date('d/m/Y', strtotime($fecha)));

            array_push($estrenos,$estreno);
            
        }   

        return $estrenos;
    
    }

    public function modificarEstreno($id_estreno, $id_pelicula, $fecha){ 

        require 'conexion.php';

        $sqlInsertar = "UPDATE estreno SET id_pelicula= '".$id_pelicula."',fecha= '".$fecha."' WHERE id_estreno= '".$id_estreno."'";
        mysqli_query($mysqli,$sqlInsertar);
    
    }

    public function eliminarEstreno($id_estreno){ 

        require 'conexion.php';

        $sqlInsertar = "DELETE FROM estreno WHERE id_estreno= '".$id_estreno."'";
        mysqli_query($mysqli,$sqlInsertar);
    
    }
    
    


}  
?>