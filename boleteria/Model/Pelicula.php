<?php
class Pelicula
{
    // Declaración de una propiedad
    private $id_pelicula;
    private $titulo;
    private $imagen;
    private $genero;
    private $duracion;
    private $descripcion;    
    private $calificacion;
    private $director;    
    private $created;
    




        // Constructor
    public function __construct(){
        
        
    }
     
    //Métodos
    public function getId(){

        return $this->id_pelicula;
    }

    public function setId($id_pelicula){

        $this->id_pelicula = $id_pelicula;
    }

    public function getImagen(){

        return $this->imagen;
    }

    public function setImagen($imagen){

        $this->imagen = $imagen;
    }

    public function getTitulo(){

        return $this->titulo;
    }
     
    public function setTitulo($titulo){

        $this->titulo = $titulo;
    }

    public function getGenero(){

        return $this->genero;
    }
     
    public function setGenero($genero){

        $this->genero = $genero;
    }

    public function getDuracion(){

        return $this->duracion;
    }
     
    public function setDuracion($duracion){

       $this->duracion = $duracion;
    }

    public function getDescripcion(){

        return $this->descripcion;
    }
     
    public function setDescripcion($descripcion){

       $this->descripcion = $descripcion;
    }

     public function getCalificacion(){

        return $this->calificacion;
    }
     
    public function setCalificacion($calificacion){

        $this->calificacion = $calificacion;
    }

     public function getDirector(){

        return $this->director;
    }
     
    public function setDirector($director){

        $this->director = $director;
    }
  

    public function getCreated(){

        return $this->created;
    } 
  

}
?>