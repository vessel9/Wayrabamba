 
<?php
$payload = json_decode(file_get_contents("php://input"));
if (!$payload) {
    exit("");
}
require_once "funciones.php";
$ok = registrarVisita($payload->pagina, $payload->url);
echo json_encode($ok);
