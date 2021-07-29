<?php

session_start();

if(!$_SESSION["validar"]){

  header("location:ingreso");

  exit();

}

include "views/modules/botonera.php";
include "views/modules/cabezote.php";

?>
