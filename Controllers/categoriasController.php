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
          public function getCategoriasControllerId(){
         $data = file_get_contents("php://input");
          $request = json_decode($data);
          $request = (array) $request;

          $idCategoria =$request['idCategoria'];
      
      $respuesta = CategoriasModel::getCategoriasModelId($idCategoria , 'categorias');

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
         			 	echo json_encode($respuesta);
         			 }
        }

        public function comprobarCategoriaController(){
          $data = file_get_contents("php://input");
          $request = json_decode($data);
          $request = (array) $request;

          $nombreCategoria =$request['nombreCategoria'];
      
           $respuesta = CategoriasModel::comprobarCategoriasModel($nombreCategoria, 'categorias' );

               if ($respuesta == 'success') {
                
                  echo json_encode(1);
               
               }else{
                echo json_encode(0);
               }
        }
   
        public function editarCategoriasControllerId(){
          $data = file_get_contents("php://input");
      $request = json_decode($data);
      $request = (array) $request;

        $nombreCategoria =$request['nombreCategoria'];
        $idCategoria =$request['idCategoria'];
      
      $respuesta = CategoriasModel::editarCategoriasModelId($nombreCategoria, $idCategoria ,'categorias' );

       if ($respuesta == 'success') {
        
          echo json_encode($respuesta);
       
       }else{
        echo json_encode("no hay ingreso");
       }

        }


   }

   if(isset($_GET['id'])){
   	  if ($_GET['id'] == "getCat") {
         $cat=new CategoriasControllers;
         $cat->getCategoriasController();
      }
   }
     if(isset($_GET['id'])){
      if ($_GET['id'] == "delete") {
        $delete = new CategoriasControllers;
        $delete->deleteCategoriaController();  
      }
   }

     if(isset($_GET['id'])){
      if ($_GET['id'] == "comprobar") {
        $comprobar = new CategoriasControllers;
        $comprobar->comprobarCategoriaController();  
      }

     if(isset($_GET['id'])){
      if ($_GET['id'] == "editarId") {
        $comprobar = new CategoriasControllers;
        $comprobar->getCategoriasControllerId();  
      }
    }

    if(isset($_GET['id'])){
      if ($_GET['id'] == "editar") {
        $comprobar = new CategoriasControllers;
        $comprobar->editarCategoriasControllerId();  
      }
    }

   }

     
   


?>