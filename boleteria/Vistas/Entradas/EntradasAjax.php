<?php

include $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/EntradaService.php";

    $service = new EntradaService();

    $entradas = $service -> obtenerTodos(); 

   


    if(isset($_POST['sala'])){

        $sala = $_POST['sala'];

        if($sala == 1){ 
    
            $options = '';
        
            foreach($entradas as $entrada){
                $options .= '<tr>';
                $options .= '<td>'. $entrada -> getId() .'</td>';
                $options .= '<td>'. $entrada -> getSala() .'</td>';
                $options .= '<td>'. $entrada -> getPelicula() .'</td>';
                $options .= '<td>'. $entrada -> getFecha() .'</td>';
                $options .= '<td>'. $entrada -> getHora() .'</td>';
                $options .= '<td>'. $entrada -> getButaca() .'</td>';
                $options .= '<td>'. $entrada -> getEmail() .'</td>';       
                $options .= '</tr>';
            }
            
            echo $options;
            
        }else{
            
            $options = '';
        
            foreach($entradas as $entrada){
               if($entrada -> getSala() == $sala){
                $options .= '<tr>';
                $options .= '<td>'. $entrada -> getId() .'</td>';
                $options .= '<td>'. $entrada -> getSala() .'</td>';
                $options .= '<td>'. $entrada -> getPelicula() .'</td>';
                $options .= '<td>'. $entrada -> getFecha() .'</td>';
                $options .= '<td>'. $entrada -> getHora() .'</td>';
                $options .= '<td>'. $entrada -> getButaca() .'</td>';
                $options .= '<td>'. $entrada -> getEmail() .'</td>';       
                $options .= '</tr>';
               }
            }
            
            echo $options;

        }

    }

    if(isset($_POST['peli'])){

        $peli = $_POST['peli'];

        if($peli == 1){ 
    
            $options = '';
        
            foreach($entradas as $entrada){
                $options .= '<tr>';
                $options .= '<td>'. $entrada -> getId() .'</td>';
                $options .= '<td>'. $entrada -> getSala() .'</td>';
                $options .= '<td>'. $entrada -> getPelicula() .'</td>';
                $options .= '<td>'. $entrada -> getFecha() .'</td>';
                $options .= '<td>'. $entrada -> getHora() .'</td>';
                $options .= '<td>'. $entrada -> getButaca() .'</td>';
                $options .= '<td>'. $entrada -> getEmail() .'</td>';       
                $options .= '</tr>';
            }
            
            echo $options;
            
        }else{
            
            $options = '';
        
            foreach($entradas as $entrada){
               if($entrada -> getPelicula() == $peli){
                $options .= '<tr>';
                $options .= '<td>'. $entrada -> getId() .'</td>';
                $options .= '<td>'. $entrada -> getSala() .'</td>';
                $options .= '<td>'. $entrada -> getPelicula() .'</td>';
                $options .= '<td>'. $entrada -> getFecha() .'</td>';
                $options .= '<td>'. $entrada -> getHora() .'</td>';
                $options .= '<td>'. $entrada -> getButaca() .'</td>';
                $options .= '<td>'. $entrada -> getEmail() .'</td>';       
                $options .= '</tr>';
               }
            }
            
            echo $options;

        }

    }

?>