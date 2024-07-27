<?php

class PeliculaService{    


    public function __construct(){
        
    }

    public function crearPelicula($titulo, $imagen, $genero, $descripcion, $duracion, $calificacion, $director){ 

        require 'conexion.php';

        $ruta = '/proyecto/img/' . $imagen;


        $sqlInsertar = "INSERT INTO pelicula(id_pelicula, titulo, imagen, id_genero, descripcion, duracion, calificacion, director) VALUES
         ('0','$titulo','$ruta','$genero','$descripcion','$duracion', '$calificacion', '$director')";

        mysqli_query($mysqli,$sqlInsertar);
    
    }

    public function obtenerPelicula($id){ 

        require 'conexion.php';
        require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Model/Pelicula.php";
        include_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/GeneroService.php";

        $service = new GeneroService();

        $sql = "SELECT * FROM pelicula WHERE id_pelicula='".$id."'";
        $resultado = mysqli_query($mysqli,$sql);

        $pelicula = new Pelicula();


        while($fila=mysqli_fetch_assoc($resultado)){      

            $pelicula -> setId($fila['id_pelicula']);            
            $pelicula -> setTitulo($fila['titulo']);
            $pelicula -> setImagen($fila['imagen']);
            $pelicula -> setGenero($service -> obtenerNombreGenero($fila['id_genero']));
            $pelicula -> setDescripcion($fila['descripcion']);
            $pelicula -> setDuracion($fila['duracion']);
            $pelicula -> setCalificacion($fila['calificacion']);
            $pelicula -> setDirector($fila['director']);

        }   

        return $pelicula;
    
    }

    public function obtenerPeliculaPorGenero($genero){ 

        require 'conexion.php';
        require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Model/Pelicula.php";
        include_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/GeneroService.php";

        $service = new GeneroService();

        $sql = "SELECT * FROM pelicula WHERE id_genero='".$genero."'";
        $resultado = mysqli_query($mysqli,$sql);

        $peliculas = array();

        while($fila=mysqli_fetch_assoc($resultado)){      

            $pelicula = new Pelicula();
            $pelicula -> setId($fila['id_pelicula']);            
            $pelicula -> setTitulo($fila['titulo']);
            $pelicula -> setImagen($fila['imagen']);
            $pelicula -> setGenero($service -> obtenerNombreGenero($fila['id_genero']));
            $pelicula -> setDescripcion($fila['descripcion']);
            $pelicula -> setDuracion($fila['duracion']);
            $pelicula -> setCalificacion($fila['calificacion']);
            $pelicula -> setDirector($fila['director']);

            array_push($peliculas,$pelicula);
            
        }   

        return $peliculas;
    
    }

    public function obtenerNombrePelicula($id){ 

        require 'conexion.php';
        require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Model/Pelicula.php";

        $sql = "SELECT titulo FROM pelicula WHERE id_pelicula='".$id."'";
        $resultado = mysqli_query($mysqli,$sql);        


        while($fila=mysqli_fetch_assoc($resultado)){      

          $titulo = $fila['titulo'];

        }   

        return $titulo;
    
    }

    public function obtenerTodos(){ 

        require 'conexion.php';
        require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Model/Pelicula.php";
        include_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/GeneroService.php";

        $service = new GeneroService();

        $sql = "SELECT * FROM pelicula";
        $resultado = mysqli_query($mysqli,$sql);        

        $peliculas = array();

        while($fila=mysqli_fetch_assoc($resultado)){      

            $pelicula = new Pelicula();
            $pelicula -> setId($fila['id_pelicula']);            
            $pelicula -> setTitulo($fila['titulo']);
            $pelicula -> setImagen($fila['imagen']);
            $pelicula -> setGenero($service -> obtenerNombreGenero($fila['id_genero']));
            $pelicula -> setDescripcion($fila['descripcion']);
            $pelicula -> setDuracion($fila['duracion']);
            $pelicula -> setCalificacion($fila['calificacion']);
            $pelicula -> setDirector($fila['director']);

            array_push($peliculas,$pelicula);
            
        }   

        return $peliculas;
    
    }
    
    public function modificarPelicula($id_pelicula, $titulo, $imagen, $genero, $descripcion, $duracion, $calificacion, $director){ 

        require 'conexion.php';
        if($imagen != null){
            $ruta = '/proyecto/img/' . $imagen;
            $sqlInsertar = "UPDATE pelicula SET titulo= '".$titulo."', imagen= '".$ruta."', id_genero= '".$genero."',descripcion= '".$descripcion."',duracion= '".$duracion."',calificacion= '".$calificacion."',director= '".$director."' WHERE id_pelicula= '".$id_pelicula."'";
        }else{
            $sqlInsertar = "UPDATE pelicula SET titulo= '".$titulo."', id_genero= '".$genero."',descripcion= '".$descripcion."',duracion= '".$duracion."',calificacion= '".$calificacion."',director= '".$director."' WHERE id_pelicula= '".$id_pelicula."'";
        }
        
        mysqli_query($mysqli,$sqlInsertar);
    
    }

    public function eliminarPelicula($id_pelicula){ 

        require 'conexion.php';

        $sqlInsertar = "DELETE FROM pelicula WHERE id_pelicula= '".$id_pelicula."'";
        mysqli_query($mysqli,$sqlInsertar);
    
    }

    public function obtenerTituloPelicula($id){ 

        require 'conexion.php';       

        $sql = "SELECT * FROM pelicula WHERE id_pelicula='".$id."'";
        $resultado = mysqli_query($mysqli,$sql);      


        while($fila=mysqli_fetch_assoc($resultado)){ 

            $titulo = $fila['titulo'];

        }   

        return $titulo;
    
    }
    


}  
?>