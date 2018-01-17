<?php 

 
  require_once '../headers.php';
  require_once '../Models/loginModel.php';
  class UsuarioController{

  	  public function getUsuarioController(){

		  $data = file_get_contents("php://input");
		  $request = json_decode($data);
		  $request = (array) $request;

		    $nombre =$request['nombreAdmin'];
		    $password =$request['password'];
		    $datosController = array('nombreAdmin' => $nombre,
                'password' => $password,
               
            );
       
        $respuesta = UsuarioModel::getUsuarioModel($datosController , 'administrador');
        echo $respuesta ;
		     
  	  }
  }

 
  	 $usuario = new UsuarioController;
  	 $usuario->getUsuarioController();
  


 ?>