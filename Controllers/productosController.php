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

             public function getProductosBajaController(){
      
          $respuesta = ProductosModel::getProductosBajaModel('productos');

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

        public function comprobarProductoCodigoController(){
              $data = file_get_contents("php://input");
              $request = json_decode($data);
              $request = (array) $request;
              $codigo =$request['codigo'];
          
               $respuesta = ProductosModel::comprobarProductosCodigoModel($codigo, 'productos' );

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
        
          $codigo =$request['codigo'];
          $nombreProducto =$request['nombreProducto'];
          $idProveedor =$request['idProveedor'];
          $precioProducto =$request['precioProducto'];
          $idCategoria =$request['idCategoria'];
          $estado =$request['estado'];
		 
 			
 			$respuesta = ProductosModel::addProductosModel(
        $codigo,
        $nombreProducto,
        $idProveedor,
        $precioProducto,
        $idCategoria,
        $estado,
 				 'productos' );

 			 if ($respuesta == 'success') {
 			 	
 			 		echo json_encode($respuesta);
 			 
 			 }else{
 			 	echo json_encode("no hay ingreso");
 			 }

   	    }

         public function deleteProductosController(){
          $data = file_get_contents("php://input");
          $request = json_decode($data);
          $request = (array) $request;

          $idProducto =$request['idProducto'];
      
           $respuesta = ProductosModel::deleteProductosModel($idProducto, 'productos' );

               if ($respuesta == 'success') {
                
                  echo json_encode($respuesta);
               
               }else{
                echo json_encode($respuesta);
               }
        }

        public function bajaProductosController(){
          $data = file_get_contents("php://input");
          $request = json_decode($data);
          $request =(array) $request;

          $idProducto = $request['idProducto'];

            $respuesta = ProductosModel::bajaProductosModel($idProducto , 'productos');
            if ($respuesta == 'success') {
                
                  echo json_encode($respuesta);
               
               }else{
                echo json_encode($respuesta);
               }

        }

          public function altaProductosController(){
          $data = file_get_contents("php://input");
          $request = json_decode($data);
          $request =(array) $request;

          $idProducto = $request['idProducto'];

            $respuesta = ProductosModel::altaProductosModel($idProducto , 'productos');
            if ($respuesta == 'success') {
                
                  echo json_encode($respuesta);
               
               }else{
                echo json_encode($respuesta);
               }

        }


    //
    // INVENTARIO
    //
    // public function validarProductoController($validarProducto)
    // {
    //     $datosController = $validarProducto;
    //     $respuesta = ProductosModel::validarProductoModel($datosController, 'productos');
    //     if ($respuesta) {
    //         echo 1;
    //     } else {
    //         echo 0;
    //     }
    // }

    public  function getInventarioController()
    {
        $respuesta = ProductosModel::getInventarioModel('inventario');

         echo json_encode($respuesta);
    }

    public function agregarInventarioController()
    {

          $data = file_get_contents("php://input");
          $request = json_decode($data);
          $request = (array) $request;
          
          $cantidadIngresada =$request['cantidadIngresada'];
          $precioVenta =$request['precioVenta'];
          $idProducto =$request['idProducto'];
          $codigo =$request['codigo'];
          
    
            $respuesta = ProductosModel::agregarInventarioModel(
              $cantidadIngresada,
              $precioVenta,
              $idProducto, 
              $codigo,
              'inventario');
           
                 
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
      if ($_GET['id'] == "getProdBaja") {
         $cat=new ProductosControllers;
         $cat->getProductosBajaController();
      }
   }


     if(isset($_GET['id'])){
      if ($_GET['id'] == "comprobar") {
        $comprobar = new ProductosControllers;
        $comprobar->comprobarProductoController();  
      }
}

    if(isset($_GET['id'])){
      if ($_GET['id'] == "comprobarCodigo") {
        $comprobar = new ProductosControllers;
        $comprobar->comprobarProductoCodigoController();  
      }
}
   if(isset($_GET['id'])){
   	  if ($_GET['id'] == "addProd") {
         $cat=new ProductosControllers;
         $cat->addProductosController();
      }
   }

        if(isset($_GET['id'])){
      if ($_GET['id'] == "delete") {
        $delete = new ProductosControllers;
        $delete->deleteProductosController();  
      }
   }

     if(isset($_GET['id'])){
      if ($_GET['id'] == "baja") {
        $delete = new ProductosControllers;
        $delete->bajaProductosController();  
      }
   }
    if(isset($_GET['id'])){
      if ($_GET['id'] == "alta") {
        $delete = new ProductosControllers;
        $delete->altaProductosController();  
      }
   }


   if(isset($_GET['id'])){
      if ($_GET['id'] == "getInven") {
         $inventario=new ProductosControllers;
         $inventario->getInventarioController();
      }
   }

      if(isset($_GET['id'])){
      if ($_GET['id'] == "addInven") {
         $inventario=new ProductosControllers;
         $inventario->agregarInventarioController();
      }
   }