<?php
class Estreno
{
    // Declaración de una propiedad
    private $id_estreno;
    private $id_pelicula;
    private $fecha_estreno;        
    private $created;





        // Constructor
    public function __construct(){}
        
     
    //Métodos
    public function getId(){

        return $this->id_estreno;
    }

    public function setId($id_estreno){

        $this->id_estreno = $id_estreno;
    }

    public function getPelicula(){

        return $this->id_pelicula;
    }
     
    public function setPelicula($id_pelicula){

        $this->id_pelicula = $id_pelicula;
    }

    public function getFechaEstreno(){

        return $this->fecha_estreno;
    }
     
    public function setFechaEstreno($fecha_estreno){

        $this->fecha_estreno = $fecha_estreno;  
    } 
  

    public function getCreated(){

        return $this->created;
    } 


}
?>