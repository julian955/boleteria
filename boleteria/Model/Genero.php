<?php
class Genero
{
    // Declaración de una propiedad
    private $id_genero;
    private $nombre;   
    



    public function __construct(){
     
    }
    
     
    //Métodos
    public function getId(){

        return $this->id_genero;
    }

    public function setId($id_genero){

        $this->id_genero = $id_genero;
    }

    public function getNombre(){

        return $this->nombre;
    }

    public function setNombre($nombre){

        $this->nombre = $nombre;
    }

   

}
?>