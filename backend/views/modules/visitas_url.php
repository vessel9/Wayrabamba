<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:ingreso");

	exit();

}

include "views/modules/botonera.php";
include "views/modules/cabezote.php";

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.1/css/bulma.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
</head>
<?php
if (!isset($_GET["url"])) {
    exit("No hay URL");
}
$url = urldecode($_GET["url"]);
include_once "../../controllers/funciones.php";

$hoy = fechaHoy();
list($inicio, $fin) = fechaInicioYFinDeMes();
if (isset($_GET["inicio"])) {
    $inicio = $_GET["inicio"];
}
if (isset($_GET["fin"])) {
    $fin = $_GET["fin"];
}
$visitasYVisitantes = obtenerConteoVisitasYVisitantesDePaginaEnRango($inicio, $fin, $url);
$visitasYVisitantes = obtenerConteoVisitasYVisitantesEnRango($hoy, $hoy);
$visitantes = obtenerVisitantesDePaginaEnRango($inicio, $fin, $url);
$visitas = obtenerVisitasDePaginaEnRango($inicio, $fin, $url);
?>
<section class="section">
    <div class="columns">
        <div class="column">

            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        Estadísticas para <?php echo $url ?> entre <?php echo $inicio ?> y <?php echo $fin ?>
                    </p>
                </header>
                <div class="card-content">
                    <div class="content">
                        <a class="button is-info mb-2" href="visitas.php">
                            <i class="fa fa-arrow-left"></i>
                            &nbsp;
                            Volver</a>
                        <form action="visitas_url.php">
                            <input type="hidden" value="<?php echo $url ?>" name="url">
                            <div class="field is-grouped">
                                <p class="control is-expanded">
                                    <label>Desde: </label>
                                    <input class="input" type="date" name="inicio" value="<?php echo $inicio ?>">
                                </p>
                                <p class="control is-expanded">
                                    <label>Hasta: </label>
                                    <input class="input" type="date" name="fin" value="<?php echo $fin ?>">
                                </p>
                                <p class="control">
                                    <!--La etiqueta es invisible a propósito para que tome el espacio y alinee el botón-->
                                    <label style="color: white;">ª</label>
                                    <input type="submit" value="Filtrar" class="button is-success input">
                                </p>
                            </div>
                        </form>
                        <canvas id="grafica"></canvas>
                    </div>
                </div>
                <footer class="card-footer">
                </footer>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    // Pasar variable de PHP a JS
    const visitantes = <?php echo json_encode($visitantes) ?>;
    const visitas = <?php echo json_encode($visitas) ?>;
    // Obtener una referencia al elemento canvas del DOM
    const $grafica = document.querySelector("#grafica");
    // Las etiquetas son las que van en el eje X. 
    // Podemos mapear  visitas o visitantes, ya que solo necesitamos las fechas
    const etiquetas = visitas.map(visita => visita.fecha);
    // Podemos tener varios conjuntos de datos
    const datosVisitas = {
        label: "Visitas",
        data: visitas.map(visita => visita.conteo),
        backgroundColor: 'rgba(237,78,136, 0.2)', // Color de fondo
        borderColor: 'rgba(237,78,136, 1)', // Color del borde
        borderWidth: 1, // Ancho del borde
    };
    const datosVisitantes = {
        label: "Visitantes",
        data: visitantes.map(visitante => visitante.conteo),
        backgroundColor: 'rgba(93,82,247, 0.2)', // Color de fondo
        borderColor: 'rgba(93,82,247,1)', // Color del borde
        borderWidth: 1, // Ancho del borde
    };

    new Chart($grafica, {
        type: 'line', // Tipo de gráfica
        data: {
            labels: etiquetas,
            datasets: [
                datosVisitas,
                datosVisitantes,
                // Aquí más datos...
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }],
            },
        }
    });
</script>
