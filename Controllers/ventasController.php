<?php 
   

    require_once '../headers.php';
     require_once '../Models/ventasModel.php';

    class VentasControllers{


          public function getCarritoController(){
        
      $respuesta = VentasModel::getCarritosModel('temporal');

       if ($respuesta) {
        
          echo json_encode($respuesta);
       
       }

        }


          public function getFacturaController(){
        
      $respuesta = VentasModel::getFacturaModel('tipofactura');

       if ($respuesta) {
        
          echo json_encode($respuesta);
       
       }

        } 

          public function getCarritoTotalController(){
        
      $respuesta = VentasModel::getCarritosTotalModel('temporal');

       if ($respuesta) {
        
          echo json_encode($respuesta);
       
       }

        }


      
        public function addCarritoController(){
   	      $data = file_get_contents("php://input");
		      $request = json_decode($data);
		      $request = (array) $request;
        
          $codigo =$request['codigo'];
          $nombreProducto =$request['nombre'];
          $precioVenta =$request['precioVenta'];
          $cantidad =$request['cantidad'];
          $subTotal =$request['subTotal'];
          // $tipoFact =$request['tipoFact'];
		 
 			
 			$respuesta = VentasModel::addCarritoModel(
        $codigo,
        $nombreProducto,
        $precioVenta,
        $cantidad,
         $subTotal,
         // $tipoFact,
          'temporal');

 			 if ($respuesta == 'success') {
 			 	
 			 		echo json_encode($respuesta);
 			 
 			 }else{
 			 	echo json_encode("no hay ingreso");
 			 }

   	 }

      public function borrarItemController(){
          $data = file_get_contents("php://input");
          $request = json_decode($data);
          $request = (array) $request;

          $idTemporal =$request['idTemporal'];
          $codigo =$request['codigo'];
          $cantidad =$request['cantidad'];
      
           $respuesta = VentasModel::borrarItemModel($idTemporal,$codigo, $cantidad, 'temporal' );

               if ($respuesta == 'success') {
                
                  echo json_encode($respuesta);
               
               }else{
                echo json_encode($respuesta);
               }
        }



  }


  if(isset($_GET["id"])){
      if ($_GET["id"] == 'addCarritos') {
         $venta= new VentasControllers;
         $venta->addCarritoController();
      }
   }

   if(isset($_GET["id"])){
      if ($_GET["id"] == 'getFactura') {
         $venta= new VentasControllers;
         $venta->getFacturaController();
      }
   }


   if(isset($_GET["id"])){
      if ($_GET["id"] == 'getCarrito') {
         $venta= new VentasControllers;
         $venta->getCarritoController();
         // $venta->getCarritoTotalController();
      }
   }

     if(isset($_GET["id"])){
      if ($_GET["id"] == 'getCarritoTotal') {
         $venta= new VentasControllers;
         $venta->getCarritoTotalController();
      }
   }

   if(isset($_GET["id"])){
      if ($_GET["id"] == 'eliminarItem') {
         $venta= new VentasControllers;
         $venta->borrarItemController();
      }
   }