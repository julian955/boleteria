<?php
class Usuario
{
    // Declaración de una propiedad
    private $id_usuario;
    private $email;
    private $nombre;
    private $apellido;
    private $telefono;
    private $password;
    private $id_rol;
    private $created;
    private $deleted = 0;




        // Constructor
    public function __construct(){
       
    }
     
    //Métodos

    public function getId(){

        return $this->id_usuario;
    }

    public function setId($id_usuario){

        $this->id_usuario = $id_usuario;
    }

    public function getEmail(){

        return $this->email;
    }
     
    public function setEmail($email){

        $this->email = $email;
    }

     public function getNombre(){

        return $this->nombre;
    }
     
    public function setNombre($nombre){

        $this->nombre = $nombre;
    }

     public function getApellido(){

        return $this->apellido;
    }
     
    public function setApellido($apellido){

        $this->apellido = $apellido;
    }

     public function getTelefono(){

        return $this->telefono;
    }
     
    public function setTelefono($telefono){

        $this->telefono = $telefono;
    }

     public function getPassword(){

        return $this->password;
    }
     
    public function setPassword($password){

        $this->password = $password;
    }
    
    public function getCreated(){

        return $this->created;
    }    
    

    
}
?>