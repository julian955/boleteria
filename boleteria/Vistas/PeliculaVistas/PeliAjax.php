<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/PeliculaService.php";

    $service = new PeliculaService(); 


if($_POST['genero'] == 0){

    $peliculas = $service -> obtenerTodos();   
    
    $options = '';

    foreach($peliculas as $pelicula){
        $options .= '<tr>';
        $options .= '<td>'. $pelicula -> getId() .'</td>';
        $options .= '<td>'. $pelicula -> getTitulo() .'</td>';
        $options .= '<td>'. $pelicula -> getImagen() .'</td>';
        $options .= '<td>'. $pelicula -> getGenero() .'</td>';
        $options .= '<td>'. $pelicula -> getDescripcion() .'</td>';
        $options .= '<td>'. $pelicula -> getDuracion() .'</td>';
        $options .= '<td>'. $pelicula -> getCalificacion() .'</td>';
        $options .= '<td>'. $pelicula -> getDirector() .'</td>';
        $options .= '<td>';
        $options .= '<a href="http://localhost:8084/proyecto/Vistas/PeliculaVistas/EliminarPelicula.php?id='. $pelicula -> getId() .'"><i class="fas fa-ban"></i></a> ';
        $options .= '<a href="http://localhost:8084/proyecto/Vistas/PeliculaVistas/ModificarPelicula.php?id='. $pelicula -> getId() .'"><i class="far fa-edit"></i></a>';
        $options .= '</td>';
        $options .= '</tr>';
    }
    
    echo $options;
    
}else{

    $genero = $_POST['genero'];

    $peliculas = $service ->  obtenerPeliculaPorGenero($genero);    
    
    $options = '';

    foreach($peliculas as $pelicula){
        $options .= '<tr>';
        $options .= '<td>'. $pelicula -> getId() .'</td>';
        $options .= '<td>'. $pelicula -> getTitulo() .'</td>';
        $options .= '<td>'. $pelicula -> getImagen() .'</td>';
        $options .= '<td>'. $pelicula -> getGenero() .'</td>';
        $options .= '<td>'. $pelicula -> getDescripcion() .'</td>';
        $options .= '<td>'. $pelicula -> getDuracion() .'</td>';
        $options .= '<td>'. $pelicula -> getCalificacion() .'</td>';
        $options .= '<td>'. $pelicula -> getDirector() .'</td>';
        $options .= '<td>';
        $options .= '<a href="http://localhost:8084/proyecto/Vistas/PeliculaVistas/EliminarPelicula.php?id='. $pelicula -> getId() .'"><i class="fas fa-ban"></i></a> ';
        $options .= '<a href="http://localhost:8084/proyecto/Vistas/PeliculaVistas/ModificarPelicula.php?id='. $pelicula -> getId() .'"><i class="far fa-edit"></i></a>';
        $options .= '</td>';
        $options .= '</tr>';
    }
    
    echo $options;


}


?>
