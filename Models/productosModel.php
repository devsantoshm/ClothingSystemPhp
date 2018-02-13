<?php 
  require_once 'conexion.php';
   class ProductosModel{


   	   public function getProductosModel($table){


   	   	    $sql = Conexion::conectar()->prepare("SELECT * FROM $table ta  JOIN categorias cat ON cat.idCategoria = ta.idCategoria WHERE estado = 1");

   	   	    if ($sql->execute()) {
   	   	    	 return $sql->fetchAll();

   	   	    }else{
   	   	    	return 'error';
   	   	    }
            $sql->close();
   	   }

         public function getProductosBajaModel($table){


            $sql = Conexion::conectar()->prepare("SELECT * FROM $table ta  JOIN categorias cat ON cat.idCategoria = ta.idCategoria WHERE estado = 0");

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
                  // aqui agrega al inventario con el correspondiente idProducto para su relacion
            $ult = Conexion::conectar()->prepare("SELECT MAX(idProducto)as ID FROM productos");
            $ult->execute();
            $res = $ult->fetch();
            // var_dump($res['ID']);
            $a = $res['ID'];
            $sqlInv = Conexion::conectar()->prepare("INSERT INTO inventario(cantidadIngresada, precioVenta,idProducto)
                        VALUES(0,0,$a)");
            $sqlInv->execute();

                  return 'success';
                }else{
                  return 'Error';
                }
             
                  $sql->close();
         }

           public static function deleteProductosModel($datosModel, $tabla)
    {

        $sql = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idProducto = :idProducto");
        $sql->bindParam(':idProducto', $datosModel);

        if ($sql->execute()) {
            return 'success';
        }
        $sql->close();
    }

     public function bajaProductosModel($idProducto , $tabla){


                $sql = Conexion::conectar()->prepare("UPDATE $tabla SET  estado = 0 WHERE idProducto = :idProducto");
                
                if($sql->execute(array(
                   ':idProducto'=>$idProducto
                 ))){

                  return 'success';
                }else{
                  return 'Error';
                }


      }

         public function altaProductosModel($idProducto , $tabla){


                $sql = Conexion::conectar()->prepare("UPDATE $tabla SET  estado = 1 WHERE idProducto = :idProducto");
                
                if($sql->execute(array(
                   ':idProducto'=>$idProducto
                 ))){

                  return 'success';
                }else{
                  return 'Error';
                }


      }

      //////
    //  INVENTARIO.
    //////

    public  function getInventarioModel($tabla)
    {
        $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla ta 
          JOIN productos pro ON pro.idProducto = ta.idProducto  ");
        if ($sql->execute()) {
               return $sql->fetchAll();

            }else{
              return 'error';
            }
            $sql->close();
    }

    public  function agregarInventarioModel(
      $cantidadIngresada,
      $precioVenta,
      $idProducto,
      $tabla)
    {

        $sql = Conexion::conectar()->prepare(" UPDATE $tabla SET 
          cantidadIngresada= cantidadIngresada + :cantidadIngresada,precioVenta=:precioVenta WHERE idProducto =:idProducto");

        $sql->bindParam(':cantidadIngresada', $cantidadIngresada);
        $sql->bindParam(':precioVenta', $precioVenta);
        $sql->bindParam(':idProducto', $idProducto);
        if ($sql->execute()) {
            return 'success';
        } else {
            return 'Error';
        }

        $sql->close();
    }


    }