<?php

class UsuarioService{    


    public function __construct(){
        
    }

    public function crearUsuario($email, $nombre, $apellido, $telefono, $password){ 

        require 'conexion.php';

        $sqlInsertar = "INSERT INTO usuario(id_usuario, email, nombre, apellido, telefono, pass, rol_id) VALUES
         ('0','$email','$nombre', '$apellido', '$telefono', '$password', '1')";

        mysqli_query($mysqli,$sqlInsertar);
    
    }

    public function obtenerUsuario($id){ 

        require 'conexion.php';
        require $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Model/Usuario.php";

        $sql = "SELECT * FROM usuario WHERE id_usuario='".$id."'";
        $resultado = mysqli_query($mysqli,$sql);

        $usuario = new Usuario();


        while($fila=mysqli_fetch_assoc($resultado)){      

            $usuario -> setId($fila['id_usuario']);            
            $usuario -> setEmail($fila['email']);
            $usuario -> setNombre($fila['nombre']);
            $usuario -> setApellido($fila['apellido']);
            $usuario -> setTelefono($fila['telefono']);
            

        }   

        return $usuario;
    
    }

    public function obtenerEmailUsuario($id){ 

        require 'conexion.php';
        

        $sql = "SELECT email FROM usuario WHERE id_usuario='".$id."'";
        $resultado = mysqli_query($mysqli,$sql);

        while($fila=mysqli_fetch_assoc($resultado)){     

        
            $email = $fila['email'];
            
        }   

        return $email;
    
    }

    public function obtenerIdUsuario($email){ 

        require 'conexion.php';
        

        $sql = "SELECT id_usuario FROM usuario WHERE email='".$email."'";
        $resultado = mysqli_query($mysqli,$sql);

        while($fila=mysqli_fetch_assoc($resultado)){     

        
            $id = $fila['id_usuario'];
            
        }   

        return $id;
    
    }

    public function obtenerTodos(){ 

        require 'conexion.php';
        require $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Model/Usuario.php";

        $sql = "SELECT * FROM usuario";
        $resultado = mysqli_query($mysqli,$sql);

        

        $usuarios = array();

        while($fila=mysqli_fetch_assoc($resultado)){      

            $usuario = new Usuario();
            $usuario -> setId($fila['id_usuario']);            
            $usuario -> setEmail($fila['email']);
            $usuario -> setNombre($fila['nombre']);
            $usuario -> setApellido($fila['apellido']);
            $usuario -> setTelefono($fila['telefono']);
            

            array_push($usuarios,$usuario);
            
        }   

        return $usuarios;
    
    }

    public function modificarUsuario($id_usuario, $nombre, $apellido, $telefono){ 

        require 'conexion.php';

        $sqlInsertar = "UPDATE usuario SET nombre= '".$nombre."', apellido= '".$apellido."', telefono= '".$telefono."' WHERE id_usuario= '".$id_usuario."'";
        mysqli_query($mysqli,$sqlInsertar);
    
    }

    public function eliminarUsuario($id_usuario){ 

        require 'conexion.php';

        $sqlInsertar = "DELETE FROM usuario WHERE id_usuario= '".$id_usuario."'";
        mysqli_query($mysqli,$sqlInsertar);
    
    }

    public function verificarUsuario($email,$pass){

        require 'conexion.php';      

        $sql = "SELECT * FROM usuario WHERE email='".$email."'";
        $resultado = mysqli_query($mysqli,$sql);      

        while($fila=mysqli_fetch_assoc($resultado)){ 
            
            if($email == $fila['email'] && $pass == $fila['pass']){
                return true;
            }   

        } 

        return false;

    }

    public function verificarRol($email){

        require 'conexion.php';      

        $sql = "SELECT * FROM usuario WHERE email='".$email."'";
        $resultado = mysqli_query($mysqli,$sql);      

        while($fila=mysqli_fetch_assoc($resultado)){ 
            
            return $fila['rol_id']; 

        } 

        return null;

    }
    
    


}  
?>