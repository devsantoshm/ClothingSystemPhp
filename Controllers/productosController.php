<?php 


    require_once '../Models/productosModel.php';
    require_once '../headers.php';

    class ProductosControllers{


    	   public function getProductosController(){
		  
		      $respuesta = ProductosModel::getProductosModel('productos');

		       if ($respuesta) {
		        
		          echo json_encode($respuesta);
		       
		       }

        }


 
        public function comprobarProductoController(){
              $data = file_get_contents("php://input");
              $request = json_decode($data);
              $request = (array) $request;

              $nombreProducto =$request['nombreProducto'];
          
               $respuesta = ProductosModel::comprobarProductosModel($nombreProducto, 'productos' );

                   if ($respuesta == 'success') {
                    
                      echo json_encode(1);
                   
                   }else{
                    echo json_encode(0);
                   }
        }

   	  public function addProductosController(){
   	      $data = file_get_contents("php://input");
		  $request = json_decode($data);
		  $request = (array) $request;
        
          $nombreProducto =$request['nombreProducto'];
          $idProveedor =$request['idProveedor'];
          $precioProducto =$request['precioProducto'];
          $idCategoria =$request['idCategoria'];
		 
 			
 			$respuesta = ProductosModel::addProductosModel(
 				$nombreProducto,
 				$idProveedor,
 				$precioProducto,
 				$idCategoria,
 				 'productos' );

 			 if ($respuesta == 'success') {
 			 	
 			 		echo json_encode($respuesta);
 			 
 			 }else{
 			 	echo json_encode("no hay ingreso");
 			 }

   	    }
   }

  

 


   if(isset($_GET['id'])){
   	  if ($_GET['id'] == "getProd") {
         $cat=new ProductosControllers;
         $cat->getProductosController();
      }
   }


     if(isset($_GET['id'])){
      if ($_GET['id'] == "comprobar") {
        $comprobar = new ProductosControllers;
        $comprobar->comprobarProductoController();  
      }
}
   if(isset($_GET['id'])){
   	  if ($_GET['id'] == "addProd") {
         $cat=new ProductosControllers;
         $cat->addProductosController();
      }
   }