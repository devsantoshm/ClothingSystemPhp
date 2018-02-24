<?php 
     

     require_once 'conexion.php';
     class VentasModel {

           public function getCarritosModel($table){

            $sql = Conexion::conectar()->prepare("SELECT * FROM $table");
         
            if ($sql->execute()) {
               return $sql->fetchAll();

            }else{
              return 'error';
            }
            $sql->close();
       }


       
           public function getFacturaModel($table){

            $sql = Conexion::conectar()->prepare("SELECT * FROM $table");
         
            if ($sql->execute()) {
               return $sql->fetchAll();

            }else{
              return 'error';
            }
            $sql->close();
       }
        public function getCarritosTotalModel($table){

            $sql = Conexion::conectar()->prepare("SELECT * , SUM(subTotal) AS total FROM $table");
         
            if ($sql->execute()) {

               return $sql->fetchAll();

            }else{
              return 'error';
            }
            $sql->close();
       }


     	   public function addCarritoModel( $codigo,$nombreProducto,$precioVenta,$cantidad,$subTotal,
          // $tipoFact, 
          $tabla){


               $sql = Conexion::conectar()->prepare("INSERT INTO $tabla
                (codigo,nombreProducto,precioVenta,cantidad,subTotal)
                           VALUES(:codigo,:nombreProducto,:precioVenta,:cantidad,:subTotal)");

              $sql->bindParam(':codigo', $codigo);
              $sql->bindParam(':nombreProducto', $nombreProducto);
              $sql->bindParam(':precioVenta', $precioVenta);
              $sql->bindParam(':cantidad', $cantidad);
              $sql->bindParam(':subTotal', $subTotal);
              // $sql->bindParam(':tipoFact', $tipoFact);
              // falta el numero de factura que esta por defecto de momento
              
              // inventario descuenta la unidad
                 $sql1 = Conexion::conectar()->prepare("UPDATE inventario SET cantidadIngresada = cantidadIngresada - $cantidad  WHERE codigo = $codigo");
                   $sql1->execute();
              if ($sql->execute()) {
              	 return 'success';
              }
              $sql->close();
     	   }

         public function borrarItemModel($idTemporal,$codigo, $cantidad, $tabla){

             $sql = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idTemporal = :idTemporal");
            $sql->bindParam(':idTemporal', $idTemporal);

            if ($sql->execute()) {
               $sql1 = Conexion::conectar()->prepare("UPDATE inventario SET cantidadIngresada = cantidadIngresada + $cantidad  WHERE codigo = $codigo");
                   $sql1->execute();
                return 'success';
            }
            $sql->close();
             }
     }