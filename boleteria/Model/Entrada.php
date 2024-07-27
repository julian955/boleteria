<?php
class Entrada
{
    // Declaración de una propiedad
    private $id_entrada;
    private $sala;
    private $pelicula;
    private $fecha;        
    private $hora;
    private $butaca;
    private $email;
    




  

    public function __construct(){
     
    }
    
     
    
    public function getId(){

        return $this->id_entrada;
    }

    public function setId($id_entrada){

        $this->id_entrada = $id_entrada;
    }

    public function getSala(){

        return $this->sala;
    }

    public function setSala($sala){

        $this->sala = $sala;
    }

    public function getPelicula(){

        return $this->pelicula;
    }
     
    public function setPelicula($pelicula){

        $this->pelicula = $pelicula;
    }

    public function getFecha(){

        return $this->fecha;
    }
     
    public function setFecha($fecha){

        $this->fecha = $fecha;  
    } 
    
     
    public function setHora($hora){

        $this->hora = $hora;  
    } 

    public function getHora(){

        return $this->hora;
    }
     
    public function setButaca($butaca){

        $this->butaca = $butaca;  
    } 

    public function getButaca(){

        return $this->butaca;
    }

    public function setEmail($email){

        $this->email = $email;  
    } 

    public function getEmail(){

        return $this->email;
    }
  

   


}
?>