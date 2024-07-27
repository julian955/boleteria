<?php

include $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/SalaService.php";

$service = new SalaService();


if($_POST['tipo'] == 1){
    $salas = $service -> obtenerTodos();   
    
    $options = '';

    foreach($salas as $sala){
        $options .= '<tr>';
        $options .= '<td>'. $sala->getId() .'</td>';
        $options .= '<td>'. $sala->getNombre() .'</td>';
        $options .= '<td>'. $sala->getTipo() .'</td>';
        $options .= '<td>'. $sala->getAsientos() .'</td>';
        $options .= '<td>';
        $options .= '<a href="http://localhost:8084/proyecto/Vistas/SalaVistas/EliminarSala.php?id='. $sala->getId() .'"><i class="fas fa-ban"></i></a> ';
        $options .= '<a href="http://localhost:8084/proyecto/Vistas/SalaVistas/ModificarSala.php?id='. $sala->getId() .'"><i class="far fa-edit"></i></a>';
        $options .= '</td>';
        $options .= '</tr>';
    }
    
    echo $options;
    
}else{

    $tipo = $_POST['tipo'];

    $salas = $service -> obtenerPorTipo($tipo);    
    
    $options = '';

    foreach($salas as $sala){
        $options .= '<tr>';
        $options .= '<td>'. $sala->getId() .'</td>';
        $options .= '<td>'. $sala->getNombre() .'</td>';
        $options .= '<td>'. $sala->getTipo() .'</td>';
        $options .= '<td>'. $sala->getAsientos() .'</td>';
        $options .= '<td>';
        $options .= '<a href="http://localhost:8084/proyecto/Vistas/SalaVistas/EliminarSala.php?id='. $sala->getId() .'"><i class="fas fa-ban"></i></a> ';
        $options .= '<a href="http://localhost:8084/proyecto/Vistas/SalaVistas/ModificarSala.php?id='. $sala->getId() .'"><i class="far fa-edit"></i></a>';
        $options .= '</td>';
        $options .= '</tr>';
    }
    
    echo $options;


}


?>
