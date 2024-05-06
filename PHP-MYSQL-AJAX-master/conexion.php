<?php

Class Conexion{

	static public function getConexion(){

		$link = new PDO("mysql:host=localhost:8081;dbname=tienda","root","");

		$link->exec("set names utf8");

		return $link;

	}


}