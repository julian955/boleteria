<?php

    include $_SERVER["DOCUMENT_ROOT"] . "/proyecto/Service/EntradaService.php";

    $service = new EntradaService();

    if(isset($_GET['entrada_id']) && isset($_GET['id']) && isset($_GET['butaca_id'])){

       $id_entrada = $_GET['entrada_id'];
       $id_cartelera = $_GET['id'];
       $id_butaca =  $_GET['butaca_id'];
       
        $entrada = $service -> generarEntrada($id_entrada,$id_cartelera,$id_butaca);                
    }

    

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket de Entrada</title>
    <link rel="stylesheet" href="../../css/entradaStyle.css">
</head>
<body>
    <div class="ticket-container">
        <header>
            <h1>Su entrada se generó correctamente</h1>
        </header>
        <div class="ticket">
            <div class="ticket-item">
                <span class="label">Código:</span>
                <span class="value"><?php echo $id_entrada; ?></span>
            </div>
            <div class="ticket-item">
                <span class="label">Película:</span>
                <span class="value"><?php echo $entrada->getPelicula(); ?></span>
            </div>
            <div class="ticket-item">
                <span class="label">Sala:</span>
                <span class="value"><?php echo $entrada->getSala(); ?></span>
            </div>
            <div class="ticket-item">
                <span class="label">Fecha:</span>
                <span class="value"><?php echo $entrada->getFecha(); ?></span>
            </div>
            <div class="ticket-item">
                <span class="label">Hora:</span>
                <span class="value"><?php echo $entrada->getHora(); ?></span>
            </div>
            <div class="ticket-item">
                <span class="label">Butaca:</span>
                <span class="value"><?php echo $entrada->getButaca(); ?></span>
            </div>
        </div>
        <footer>
            <button onclick="volverAlMenu()">Volver al menú</button>
        </footer>
    </div>

    <script>
        function volverAlMenu() {
            window.location.href = 'Peliculas.php';
        }
    </script>
</body>
</html>
