<?php

class EntradaService{    


    public function __construct(){
        
    }

    public function crearEntrada($id_cartelera, $id_butaca,$email){ 

        require 'conexion.php';
        require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/ButacaService.php";
        require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/UsuarioService.php";

        $service = new UsuarioService();
        $butacaService = new ButacaService();


        $butacaService -> ocuparButaca($id_butaca);

        $idUsuario = $service -> obtenerIdUsuario($email);


        $sqlInsertar = "INSERT INTO entrada(id_entrada, id_usuario, id_cartelera, butaca) VALUES ('0','$idUsuario','$id_cartelera','$id_butaca')";
        mysqli_query($mysqli,$sqlInsertar);

        return mysqli_insert_id($mysqli);    
    }

    public function generarEntrada($id_entrada,$id_cartelera,$id_butaca){

       
        require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/CarteleraService.php";
        require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/SalaService.php";
        require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/PeliculaService.php";
        require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/ButacaService.php";
        require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Model/Entrada.php";

        $carteleraService = new CarteleraService();
        $salaService = new SalaService();
        $peliculaService = new PeliculaService();
        $butacaService = new ButacaService();

        $cartelera = $carteleraService -> obtenerCartelera($id_cartelera);
        $entrada = new Entrada();

        $entrada -> setId($id_entrada);

        $entrada -> setSala($salaService -> obtenerNombreSala($cartelera -> getSala()));

        $entrada -> setPelicula($peliculaService -> obtenerTituloPelicula($cartelera -> getPelicula()));

        $entrada -> setFecha($cartelera -> getDia());

        $entrada -> setHora($cartelera -> getHora());

        $entrada -> setButaca($butacaService -> obtenerNombre($id_butaca));

        return $entrada;
        
    }

    public function obtenerTodos(){ 

        require 'conexion.php';
        require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Model/Entrada.php";
        require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/UsuarioService.php";

        $service = new UsuarioService();
           

        $sql = "SELECT * FROM entrada";
        $resultado = mysqli_query($mysqli,$sql);

        

        $entradas = array();

        while($fila=mysqli_fetch_assoc($resultado)){      

            $idEntrada = $fila['id_entrada'];
            $cartelera = $fila['id_cartelera'];
            $idUsuario = $fila['id_usuario'];
            $butaca = $fila['butaca'];
            $email = $service -> obtenerEmailUsuario($idUsuario);
            $entrada = $this->generarEntrada($idEntrada,$cartelera,$butaca);

            $entrada -> setEmail($email);


            array_push($entradas,$entrada);
            
        }   

        return $entradas;
    
    }

  
}  
?>