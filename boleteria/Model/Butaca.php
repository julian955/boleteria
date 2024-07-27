<?php
class Butaca
{
    // Declaración de una propiedad
    private $id_butaca;    
    private $id_cartelera; 
    private $nombre;       
    private $disponible;
    




    public function __construct(){
     
    }
    
     
    //Métodos
    public function getId(){

        return $this->id_butaca;
    }

    public function setId($id_butaca){

        $this->id_butaca = $id_butaca;
    }

    public function getIdCartelera(){

        return $this->id_cartelera;
    }
     
    public function setIdCartelera($id_cartelera){

        $this->id_cartelera = $id_cartelera;
    }

    public function getDisponible(){

        return $this->disponible;
    }
     
    public function setDisponible($disponible){

        $this->disponible = $disponible;  
    } 
  

    public function getNombre(){

        return $this->nombre;
    } 

    public function setNombre($nombre){

        $this->nombre = $nombre;
    }

  

}
?>