<?php

class ButacaService{    


    public function __construct(){
        
    }

    public function crearButaca($id_butaca,$id_cartelera,$nombre){ 

        require 'conexion.php';

        $sqlInsertar = "INSERT INTO butaca(id_butaca, id_cartelera, nombre, disponible) VALUES ('$id_butaca','$id_cartelera','$nombre','1')";
        mysqli_query($mysqli,$sqlInsertar);
    
    }

    public function obtenerButaca($id){ 

        require 'conexion.php';
        require $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Model/Butaca.php";

        $sql = "SELECT * FROM butaca WHERE id_butaca='".$id."'";
        $resultado = mysqli_query($mysqli,$sql);

        $butaca = new Butaca();


        while($fila=mysqli_fetch_assoc($resultado)){      

            $butaca -> setId($fila['id_butaca']);            
            $butaca -> setIdCartelera($fila['id_cartelera']);
            $butaca -> setNombre($fila['nombre']);
            $butaca -> setDisponible($fila['disponible']);

        }   

        return $butaca;
    
    }

    public function obtenerTodos($id_cartelera){ 

        require 'conexion.php';
        require $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Model/Butaca.php";

        $sql = "SELECT * FROM butaca WHERE id_cartelera= '".$id_cartelera."'";
        $resultado = mysqli_query($mysqli,$sql);

        

        $butacas = array();

        while($fila=mysqli_fetch_assoc($resultado)){      

            $butaca = new Butaca();
            $butaca -> setId($fila['id_butaca']);            
            $butaca -> setIdCartelera($fila['id_cartelera']);
            $butaca -> setNombre($fila['nombre']);
            $butaca -> setDisponible($fila['disponible']);

            array_push($butacas,$butaca);
            
        }   

        return $butacas;
    
    }

    public function ocuparButaca($id_butaca){ 

        require 'conexion.php';

        $sqlInsertar = "UPDATE butaca SET disponible='0' WHERE id_butaca='".$id_butaca."'";        
        mysqli_query($mysqli,$sqlInsertar);
    
    }

    public function obtenerNombre($id){ 

        require 'conexion.php';        

        $sql = "SELECT * FROM butaca WHERE id_butaca='".$id."'";
        $resultado = mysqli_query($mysqli,$sql);        


        while($fila=mysqli_fetch_assoc($resultado)){  
            $nombre = $fila['nombre'];
        }   

        return $nombre;
    
    }
    
    


}  
?>