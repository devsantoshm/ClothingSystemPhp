<?php 

  require_once 'conexion.php';

   class UsuarioModel{

   	  static public function getUsuarioModel($datosModel, $tabla){
         
          $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE nombreAdmin = :nombreAdmin && password = :password");
          $sql->execute( array(
          	':nombreAdmin'=>$datosModel['nombreAdmin'],
          	':password'=>$datosModel['password'],
          	));
            $resultado = $sql->fetch();
            if ($resultado) {
            	
            	return json_encode( $resultado );
            }else{
            	return json_encode(0);
            }

        $sql->close();
   	  }
   }


 ?>