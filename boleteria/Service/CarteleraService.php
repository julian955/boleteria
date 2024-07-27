<?php

class CarteleraService{    


    public function __construct(){
        
    }

    public function crearCartelera($id_pelicula, $id_sala, $idioma, $dia, $hora){ 

        require 'conexion.php';
        require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/SalaService.php";
        require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/ButacaService.php";

        $salaService = new SalaService();
        $butacaService = new ButacaService();


        $sqlInsertar = "INSERT INTO cartelera(id_cartelera, id_pelicula, id_sala, idioma, dia, horario) VALUES
         ('0','$id_pelicula','$id_sala', '$idioma', '$dia', '$hora')";        

        mysqli_query($mysqli,$sqlInsertar);

        $sala = $salaService -> obtenerSala($id_sala);
        $num_asientos = $sala -> getAsientos();

        $fecha_hora = $dia . ' ' . $hora;
        $timestamp = strtotime($fecha_hora);

        for($i = 0; $i < $num_asientos; $i++){

            $id = $i+1 . $id_pelicula . $id_sala . $timestamp;
            $nombre = "A-".$i+1;

            $butacaService -> crearButaca($id, mysqli_insert_id($mysqli),$nombre);

        }
    
    }

    public function obtenerCartelera($id){ 

        require 'conexion.php';
        require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Model/Cartelera.php";

        $sql = "SELECT * FROM cartelera WHERE id_cartelera='".$id."'";
        $resultado = mysqli_query($mysqli,$sql);

        $cartelera = new Cartelera();


        while($fila=mysqli_fetch_assoc($resultado)){      

            $cartelera -> setId($fila['id_cartelera']);
            $cartelera -> setPelicula($fila['id_pelicula']);
            $cartelera -> setSala($fila['id_sala']);
            $cartelera -> setIdioma($fila['idioma']);
            $cartelera -> setDia($fila['dia']);
            $cartelera -> setHora($fila['horario']);

        }   

        return $cartelera;
    
    }


    public function obtenerTodos(){ 

        require 'conexion.php';
        require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Model/Cartelera.php";

        $sql = "SELECT * FROM cartelera";
        $resultado = mysqli_query($mysqli,$sql);

        

        $carteleras = array();

        while($fila=mysqli_fetch_assoc($resultado)){      

            $cartelera = new Cartelera();
            $cartelera -> setId($fila['id_cartelera']);
            $cartelera -> setPelicula($fila['id_pelicula']);
            $cartelera -> setSala($fila['id_sala']);
            $cartelera -> setIdioma($fila['idioma']);
            $fecha = $fila['dia'];
            $cartelera -> setDia(date('d/m/Y', strtotime($fecha)));            
            $cartelera -> setHora($fila['horario']);

            array_push($carteleras,$cartelera);
            
        }   

        return $carteleras;
    
    }

    public function modificarCartelera($id_cartelera, $id_pelicula, $idioma, $dia, $horario){ 

        require 'conexion.php';

        $sqlInsertar = "UPDATE cartelera SET id_pelicula= '".$id_pelicula."',idioma= '".$idioma."',dia= '".$dia."',horario= '".$horario."' WHERE id_cartelera= '".$id_cartelera."'";
        mysqli_query($mysqli,$sqlInsertar);
    
    }

    public function eliminarCartelera($id_cartelera){ 

        require 'conexion.php';

        $sqlInsertar = "DELETE FROM cartelera WHERE id_cartelera= '".$id_cartelera."'";
        mysqli_query($mysqli,$sqlInsertar);
    
    }
    
    


}  
?>