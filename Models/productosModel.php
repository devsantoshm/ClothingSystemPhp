<?php 
  require_once 'conexion.php';
   class ProductosModel{


   	   public function getProductosModel($table){


   	   	    $sql = Conexion::conectar()->prepare("SELECT * FROM $table");

   	   	    if ($sql->execute()) {
   	   	    	 return $sql->fetchAll();

   	   	    }else{
   	   	    	return 'error';
   	   	    }
            $sql->close();
   	   }

        public function comprobarProductosModel($datosModel , $table){


            $sql = Conexion::conectar()->prepare("SELECT * FROM $table 
              WHERE nombreProducto = :datosModel");
            $sql->execute(array(':datosModel'=>$datosModel));
            $res = $sql->fetch();
            if ( $res ) {
               return 'success';

            }else{
              return 'error';
            }
            $sql->close();
       }

           public function addProductosModel($nombreProducto,
                                             $idProveedor,
                                             $precioProducto,
                                             $idCategoria , $tabla){

               $sql = Conexion::conectar()->prepare("INSERT INTO $tabla (nombreProducto,idProveedor,precioProducto,idCategoria)
                           VALUES(:nombreProducto,:idProveedor,:precioProducto,:idCategoria)");

              $sql->bindParam(':nombreProducto', $nombreProducto);
              $sql->bindParam(':idProveedor', $idProveedor);
              $sql->bindParam(':precioProducto', $precioProducto);
              $sql->bindParam(':idCategoria', $idCategoria);
                if($sql->execute()){

                  return 'success';
                }else{
                  return 'Error';
                }
             
                  $sql->close();
         }


      }