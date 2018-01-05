<?php 
    
    require_once '../Models/categoriasModel.php';
   class CategoriasControllers{

   	    public function getCategoriasController(){
 			
 			$respuesta = CategoriasModel::getCategoriasModel('categorias');

 			 if ($respuesta) {
 			 	
 			 		echo json_encode($respuesta);
 			 
 			 }

   	    }
   }

   $cat=new CategoriasControllers;
   $cat->getCategoriasController();

?>