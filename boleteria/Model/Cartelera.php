<?php
class Cartelera
{
    // Declaración de una propiedad
    private $id_cartelera;
    private $id_pelicula;
    private $id_sala;
    private $idioma;
    private $dia;
    private $hora;        
    private $created;
    




        // Constructor
    public function __construct(){
       
    }
     
    //Métodos
    public function getId(){

        return $this->id_cartelera;
    }

    public function setId($id_cartelera){

        $this->id_cartelera = $id_cartelera;
    }

    public function getPelicula(){

        return $this->id_pelicula;
    }
     
    public function setPelicula($id_pelicula){

        $this->id_pelicula = $id_pelicula;
    }

    public function getSala(){

        return $this->id_sala;
    }
     
    public function setSala($id_sala){

        $this->id_sala = $id_sala;  
    } 

    public function getIdioma(){

        return $this->idioma;
    }
     
    public function setIdioma($idioma){

        $this->idioma = $idioma;  
    } 

    public function getDia(){

        return $this->dia;
    }
     
    public function setDia($dia){

        $this->dia = $dia;  
    } 

    public function getHora(){

        return $this->hora;
    }
     
    public function setHora($hora){

        $this->hora = $hora;  
    } 
  

    public function getCreated(){

        return $this->created;
    } 


    
}
?>