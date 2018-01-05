<?php 
  require_once 'conexion.php';
   class CategoriasModel{


   	   public function getCategoriasModel($table){


   	   	    $sql = Conexion::conectar()->prepare("SELECT * FROM $table");

   	   	    if ($sql->execute()) {
   	   	    	 return $sql->fetchAll();

   	   	    }else{
   	   	    	return 'error';
   	   	    }
                  $sql->close();
   	   }
   }



 ?>