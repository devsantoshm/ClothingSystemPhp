<?php 
  require_once 'conexion.php';
   class CategoriasModel{


   	   public function getCategoriasModel($table){


   	   	    $sql = Conexion::conectar()->prepare("SELECT * FROM $table ORDER BY idCategoria DESC");

   	   	    if ($sql->execute()) {
   	   	    	 return $sql->fetchAll();

   	   	    }else{
   	   	    	return 'error';
   	   	    }
            $sql->close();
   	   }

        public function getCategoriasModelId($datosModel , $table){


            $sql = Conexion::conectar()->prepare("SELECT * FROM $table WHERE idCategoria = :idCategoria");

            if ($sql->execute(array(':idCategoria' =>$datosModel))) {
               return $sql->fetch();

            }else{
              return 'error';
            }
            $sql->close();
       }

        public function comprobarCategoriasModel($datosModel , $table){


            $sql = Conexion::conectar()->prepare("SELECT * FROM $table 
              WHERE nombreCategoria = :datosModel");
            $sql->execute(array(':datosModel'=>$datosModel));
            $res = $sql->fetch();
            if ( $res ) {
               return 'success';

            }else{
              return 'error';
            }
            $sql->close();
       }
         public function addCategoriasModel($datosModel , $tabla){


                $sql = Conexion::conectar()->prepare("INSERT INTO $tabla (nombreCategoria) VALUES (:nombreCategoria)");
                
                if($sql->execute(array(':nombreCategoria'=>$datosModel))){

                  return 'success';
                }else{
                  return 'Error';
                }
             
                  $sql->close();
         }

           public function editarCategoriasModelId($nombreCategoria, $idCategoria , $tabla){


                $sql = Conexion::conectar()->prepare("UPDATE $tabla SET  nombreCategoria = :nombreCategoria WHERE idCategoria = :idCategoria");
                
                if($sql->execute(array(
                  ':nombreCategoria'=>$nombreCategoria,
                   ':idCategoria'=>$idCategoria
                 ))){

                  return 'success';
                }else{
                  return 'Error';
                }
             
                  $sql->close();
         }

         public static function deleteCategoriasModel($datosModel, $tabla)
    {

        $sql = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idCategoria = :idCategoria");
        $sql->bindParam(':idCategoria', $datosModel);

        if ($sql->execute()) {
            return 'success';
        }
        $sql->close();
    }
   }



 ?>