<?php
session_start();
    
if(!isset($_SESSION['usuario'])) {
    // Si ha iniciado sesión, mostramos la información privada
    header('Location: http://localhost:8084/proyecto/login.php');
}
include $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/CarteleraService.php";
include $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/ButacaService.php";
include $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/EntradaService.php";

$butacaService = new ButacaService();
$service = new CarteleraService();
$eService = new EntradaService();

if (isset($_GET['id'])) {
    $id_cartelera = $_GET['id'];
    $cartelera = $service->obtenerCartelera($id_cartelera);
    $butacas = $butacaService->obtenerTodos($id_cartelera);
}

if (isset($_GET['id']) && isset($_GET['butaca_id'])) {
    $id_entrada = $eService->crearEntrada($_GET['id'], $_GET['butaca_id'], $_SESSION['usuario']);
    $id_cartelera = $_GET['id'];
    $id_butaca = $_GET['butaca_id'];
    $ruta = 'GenerarEntrada.php?id=' . $id_cartelera . '&butaca_id=' . $id_butaca . '&entrada_id=' . $id_entrada;

    header("Location: $ruta");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Compra de Entradas de Cine</title>  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">   
    <link rel="stylesheet" href="../../css/seleccionAsiento.css">
</head>
<header class="bg-dark text-white text-center py-3">
    <h1><a style="text-decoration: none; color: inherit;" href="http://localhost:8084/proyecto">Boletería de Cine</a></h1> 
    <nav class="nav justify-content-center">
        <a class="nav-link text-white" href="http://localhost:8084/proyecto/Vistas/CarteleraVistas/CarteleraPublica.php">Cartelera</a>
        <a class="nav-link text-white" href="http://localhost:8084/proyecto/Vistas/EstrenoVistas/EstrenoPublico.php">Proximos Estrenos</a>
        <a class="nav-link text-white" href="http://localhost:8084/proyecto/Vistas/Entradas/Peliculas.php">Películas</a>
       
    </nav>
    <h4>Menu Admin</h4>
    <nav class="nav justify-content-center">
        <a class="nav-link text-white" href="http://localhost:8084/proyecto/Vistas/CarteleraVistas/VerCartelera.php">Cartelera</a>
        <a class="nav-link text-white" href="http://localhost:8084/proyecto/Vistas/EstrenoVistas/VerEstrenos.php">Estreno</a>
        <a class="nav-link text-white" href="http://localhost:8084/proyecto/Vistas/PeliculaVistas/MostrarPeliculas.php">Películas</a>
        <a class="nav-link text-white" href="http://localhost:8084/proyecto/Vistas/SalaVistas/TodasSalas.php">Salas</a>
        <a class="nav-link text-white" href="http://localhost:8084/proyecto/Vistas/UsuarioVistas/ListaUsuarios.php">Usuario</a>
    </nav>
</header>
<body>
    <div class="container">
        <h2>Compra de Entradas de Cine</h2>
        <form action="Seleccion.php" method="GET">
            <input type="hidden" name="id" value="<?php echo $cartelera->getId(); ?>">
            <div class="form-group">
                <label for="pelicula">Película:</label>
                <span class="readonly"><?php echo $cartelera->getPelicula(); ?></span>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <span class="readonly"><?php echo $cartelera->getDia(); ?></span>
            </div>
            <div class="form-group">
                <label for="hora">Hora:</label>
                <span class="readonly"><?php echo $cartelera->getHora(); ?></span>
            </div>
            <label for="asientos">Seleccione su asiento:</label>
            <br>
            <br>
            <br>
            <br>
            <div class="seating">
                <?php foreach ($butacas as $butaca) { ?>
                    <?php if ($butaca->getDisponible() == 1) { ?>
                        <div class="seat">
                            <input type="radio" id="asiento-<?php echo $butaca->getId(); ?>" name="butaca_id" value="<?php echo $butaca->getId(); ?>">
                            <label for="asiento-<?php echo $butaca->getId(); ?>"><?php echo $butaca->getNombre(); ?></label>
                        </div>
                    <?php } else { ?>
                        <div class="seat bloqued">
                            <input type="radio" id="asiento-<?php echo $butaca->getId(); ?>" name="asiento" value="asd" disabled>
                            <label for="asiento-<?php echo $butaca->getId(); ?>"></label>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
            <input type="submit" value="Comprar Entradas">
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const seats = document.querySelectorAll('.seat');
            seats.forEach(seat => {
                seat.addEventListener('click', function() {
                    // Deseleccionar todos los asientos
                    seats.forEach(s => {
                        s.classList.remove('selected');
                        s.querySelector('input[type="radio"]').checked = false;
                    });
                    // Seleccionar el asiento actual
                    const radio = this.querySelector('input[type="radio"]');
                    radio.checked = true;
                    this.classList.add('selected');
                });
            });
        });
    </script>
</body>
</html>
