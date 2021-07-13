<?php

require_once "models/gestorSlide.php";
require_once "models/gestorArticulos.php";
require_once "models/gestorGaleria.php";
require_once "models/gestorVideos.php";
require_once "models/gestorMensajes.php";
require_once "models/gestorNegocio.php";
require_once "models/gestorProductoServicio.php";


require_once "controllers/template.php";
require_once "controllers/gestorSlide.php";
require_once "controllers/gestorArticulos.php";
require_once "controllers/gestorGaleria.php";
require_once "controllers/gestorVideos.php";
require_once "controllers/gestorMensajes.php";
require_once "models/gestorNegocio.php";
require_once "models/gestorProductoServicio.php";

$template = new TemplateController();
$template -> template();