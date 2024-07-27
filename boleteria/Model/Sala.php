<?php
class Sala
{
    // Declaración de una propiedad
    private $id_sala;
    private $nombre;
    private $num_asientos;
    private $tipo;        
    private $created;
    




        // Constructor
        /*
    public function __construct($id_sala, $num_asientos, $tipo, $created){
        $this->id_sala = $id_sala;
        $this->num_asientos = $num_asientos;
        $this->tipo = $tipo;                
        $this->created = $created;
    }*/

    public function __construct(){
     
    }
    
     
    //Métodos
    public function getId(){

        return $this->id_sala;
    }

    public function setId($id_sala){

        $this->id_sala = $id_sala;
    }

    public function getNombre(){

        return $this->nombre;
    }

    public function setNombre($nombre){

        $this->nombre = $nombre;
    }

    public function getAsientos(){

        return $this->num_asientos;
    }
     
    public function setAsientos($num_asientos){

        $this->num_asientos = $num_asientos;
    }

    public function getTipo(){

        return $this->tipo;
    }
     
    public function setTipo($tipo){

        $this->tipo = $tipo;  
    } 
  

    public function getCreated(){

        return $this->created;
    } 


}
?>