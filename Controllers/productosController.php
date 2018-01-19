<?php 


      require_once '../headers.php';
    require_once '../Models/productosModel.php';

    class ProductosControllers{


    	  public function getProductosController(){
		  
		      $respuesta = ProductosModel::getProductosModel('productos');

		       if ($respuesta) {
		        
		          echo json_encode($respuesta);
		       
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
		  // $datosController = array('nombreProducto' => 'camisa',
    //             'idProveedor' => 1,
    //             'precioProducto' => '100',
    //             'idCategoria' => 33,
    //         );

 			
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
   	  if ($_GET['id'] == "addProd") {
         $cat=new ProductosControllers;
         $cat->addProductosController();
      }
   }