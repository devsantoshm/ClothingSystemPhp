<?php 
    
    require_once '../headers.php';
    require_once '../Models/categoriasModel.php';
    
   class CategoriasControllers{

   	    public function getCategoriasController(){
 			
 			$respuesta = CategoriasModel::getCategoriasModel('categorias');

 			 if ($respuesta) {
 			 	
 			 		echo json_encode($respuesta);
 			 
 			 }

   	    }

   	   public function deleteCategoriaController(){
   	     $data = file_get_contents("php://input");
		  $request = json_decode($data);
		  $request = (array) $request;

		    $idCategoria =$request['idCategoria'];
 			
 			$respuesta = CategoriasModel::deleteCategoriasModel($idCategoria, 'categorias' );

 			 if ($respuesta == 'success') {
 			 	
 			 		echo json_encode($respuesta);
 			 
 			 }else{
 			 	echo json_encode("no hay ingreso");
 			 }
   	    }
   }

   if(isset($_GET['id'])){
   	  if (isset($_GET['id']) == "delete") {
   	    $delete = new CategoriasControllers;
   	    $delete->deleteCategoriaController();
   	  }
   }

   $cat=new CategoriasControllers;
   $cat->getCategoriasController();
   


?>