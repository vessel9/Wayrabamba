<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=cms","root","123456");
		return $link;

	}

}