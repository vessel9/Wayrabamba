<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=cmd2","root","123456");
		return $link;

	}

}