<?php 
    
     require_once '../Models/CategoriasModel.php';
    require_once '../headers.php';
   class AgregarCategoriasControllers{

   	    public function addCategoriasController(){
   	      $data = file_get_contents("php://input");
		  $request = json_decode($data);
		  $request = (array) $request;

		    $nombreCategoria =$request['nombreCategoria'];
 			
 			$respuesta = CategoriasModel::addCategoriasModel($nombreCategoria, 'categorias' );

 			 if ($respuesta == 'success') {
 			 	
 			 		echo json_encode($respuesta);
 			 
 			 }else{
 			 	echo json_encode("no hay ingreso");
 			 }

   	    }
   }

   $cat=new AgregarCategoriasControllers;
   $cat->addCategoriasController();
   


?>