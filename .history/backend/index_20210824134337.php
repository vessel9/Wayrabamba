<?php

require_once "models/enlaces.php";
require_once "models/ingreso.php";
require_once "models/gestorSlide.php";
require_once "models/gestorArticulos.php";
require_once "models/gestorGaleria.php";
require_once "models/gestorVideos.php";
require_once "models/gestorMensajes.php";
require_once "models/gestorSuscriptores.php";
require_once "models/gestorPerfiles.php";
require_once "models/gestorCategorias.php";
require_once "models/gestorChat.php";
require_once "models/gestorNegocio.php";
require_once "models/gestorProductoServicio.php";
require_once "models/gestorTipoProductoServicio.php";




require_once "controllers/template.php";
require_once "controllers/enlaces.php";
require_once "controllers/ingreso.php";
require_once "controllers/gestorSlide.php";
require_once "controllers/gestorArticulos.php";
require_once "controllers/gestorGaleria.php";
require_once "controllers/gestorVideos.php";
require_once "controllers/gestorMensajes.php";
require_once "controllers/gestorSuscriptores.php";
require_once "controllers/gestorPerfiles.php";
require_once "controllers/gestorCategorias.php";
require_once "controllers/gestorChat.php";
require_once "controllers/gestorNegocio.php";
require_once "controllers/gestorProductoServicio.php";
require_once "controllers/gestorTipoProductoServicio.php";
require_once "controllers/funciones.php";




$template = new TemplateController();
$template -> template();