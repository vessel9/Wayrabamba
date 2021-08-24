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
    <title>Reporte de visitas - By Parzibyte</title>
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.1/css/bulma.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
</head>

<?php
// require_once "./controllers/funciones.php";
$hoy = fechaHoy();
list($inicio, $fin) = fechaInicioYFinDeMes();
if (isset($_GET["inicio"])) {
    $inicio = $_GET["inicio"];
}
if (isset($_GET["fin"])) {
    $fin = $_GET["fin"];
}
if (isset($_GET["hoy"])) {
    $hoy = $_GET["hoy"];
}
$visitasYVisitantes = obtenerConteoVisitasYVisitantesEnRango($hoy, $hoy);
$paginas = obtenerPaginasVisitadasEnFecha($hoy);
$visitantes = obtenerVisitantesEnRango($inicio, $fin);
$visitas = obtenerVisitasEnRango($inicio, $fin);
?>
<section class="section">
    <div class="columns">

        <div class="column">
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        Estadísticas entre <?php echo $inicio ?> y <?php echo $fin ?>
                    </p>
                </header>
                <div class="card-content">
                    <div class="content">
                        <form action="visitas">
                            <input type="hidden" name="hoy" value="<?php echo $hoy ?>">
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
                                    <input type="submit" value="OK" class="button is-success input">
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
        <div class="column is-one-third ">
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">
                        Estadísticas de <?php echo $hoy ?>
                    </p>
                </header>
                <div class="card-content">
                    <div class="content">
                        <form action="visitas" class="mb-2">
                            <input type="hidden" name="inicio" value="<?php echo $inicio ?>">
                            <input type="hidden" name="fin" value="<?php echo $fin ?>">
                            <div class="field is-grouped">
                                <p class="control is-expanded">
                                    <label>Fecha: </label>
                                    <input class="input" type="date" name="hoy" value="<?php echo $hoy ?>">
                                </p>
                                <p class="control">
                                    <!--La etiqueta es invisible a propósito para que tome el espacio y alinee el botón-->
                                    <label style="color: white;">ª</label>
                                    <input type="submit" value="OK" class="button is-success input">
                                </p>
                            </div>
                        </form>
                        <div class="field is-grouped is-grouped-multiline">
                            <div class="control">
                                <div class="tags has-addons">
                                    <span class="tag is-success is-large">Visitas</span>
                                    <span class="tag is-info is-large"><?php echo $visitasYVisitantes->visitas ?></span>
                                </div>
                            </div>
                            <div class="control">
                                <div class="tags has-addons">
                                    <span class="tag is-warning is-large">Visitantes</span>
                                    <span class="tag is-info is-large"><?php echo $visitasYVisitantes->visitantes ?></span>
                                </div>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Página</th>
                                    <th>Visitas</th>
                                    <th>Visitantes</th>
                                    <th>Estadísticas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($paginas as $pagina) { ?>
                                    <tr>
                                        <td><a target="_blank" href="<?php echo $pagina->url ?>"><?php echo $pagina->pagina ?></a></td>
                                        <td><?php echo $pagina->conteo_visitas ?></td>
                                        <td><?php echo $pagina->conteo_visitantes ?></td>
                                        <td>
                                            <a class="button is-info" href="visitas_url.php?url=<?php echo urlencode($pagina->url) ?>">
                                                <i class="fa fa-chart-area"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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
