<?php 

    class Conexion{

    	public static function conectar(){
    		$conexion= new PDO('mysql:host=localhost;dbname=ventas', 'root', '');
    		$conexion->exec('SET CHARACTER SET UTF8');
    		 return $conexion;
    	}
    }


 ?>