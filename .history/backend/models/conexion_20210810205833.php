<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=cms2","root","");
		return $link;

	}

}