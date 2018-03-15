<?php 
  
     header("Access-Control-Allow-Origin: *");
     header("Access-Control-Allow-Headers:Origin, X-Requested-Withd, Content-Type, Accept");
   require_once '../models/clienteModel.php';
   class ClientesController{

   	  	public function getClientesController(){
 			  
      $respuesta = ClientesModel::getClientesModel('clientes');

       if ($respuesta) {
        
          echo json_encode($respuesta);
       
       }

        }


      public function getClientesInactivosController(){
        
      $respuesta = ClientesModel::getClientesInactivosModel('clientes');

       if ($respuesta) {
        
          echo json_encode($respuesta);
       
       }

        }

 

      public function getClienteControllerId(){
              $data = file_get_contents("php://input");
             $request = json_decode($data);
             $request = (array) $request;
                
            
              $idCliente =$request['idCliente'];
              // $idCliente =1;
         $respuesta = ClientesModel::getClienteIdModel($idCliente, 'clientes');

         if ($respuesta) {
          
              echo json_encode($respuesta);
           
         }

        }

           


   	  public function  agregarClienteController(){
             

              $data = file_get_contents("php://input");
		         $request = json_decode($data);
		         $request = (array) $request;
                
            
            $nombreCliente =$request['nombreCliente'];
            $telefonoCliente =$request['telefonoCliente'];
            $direccionCliente =$request['direccionCliente'];
          $respuesta = ClientesModel::addClienteModel($nombreCliente, 
                                                      $telefonoCliente,
                                                      $direccionCliente,'clientes' );

          		 if ($respuesta == 'success') {
 			 	
 			 		echo json_encode($respuesta);
 			 
 			 }else{
 			 	echo json_encode($respuesta);
 			 }

   	   }

         public function  editarClientesController(){
             

              $data = file_get_contents("php://input");
             $request = json_decode($data);
             $request = (array) $request;
                
            
              $nombreCliente =$request['nombreCliente'];
              $telefonoCliente =$request['telefonoCliente'];
              $direccionCliente =$request['direccionCliente'];
              $idCliente =$request['idCliente'];
          $respuesta = ClientesModel::editarClientesModel($nombreCliente, 
                                                          $telefonoCliente,
                                                          $direccionCliente,
                                                          $idCliente,
                                                          'clientes' );

        if ($respuesta == 'success') {
        
          echo json_encode($respuesta);
       
       }else{
        echo json_encode("no hay edicion de  Clientes");
       }

       }


  
        public function bajaClienteController(){
       	  $data = file_get_contents("php://input");
    		  $request = json_decode($data);
    		  $request = (array) $request;

    		  $idCliente =$request['idCliente'];
 			
 			     $respuesta = ClientesModel::bajaClientesModel($idCliente, 'clientes' );

         			 if ($respuesta == 'success') {
         			 	
         			 		echo json_encode($respuesta);
         			 
         			 }else{
         			 	echo json_encode($respuesta);
         			 }
        }

        public function altaClienteController(){
          $data = file_get_contents("php://input");
          $request = json_decode($data);
          $request = (array) $request;

          $idCliente =$request['idCliente'];
      
           $respuesta = ClientesModel::altaClientesModel($idCliente, 'clientes' );

               if ($respuesta == 'success') {
                
                  echo json_encode($respuesta);
               
               }else{
                echo json_encode($respuesta);
               }
        }


       public function comprobarVendedorController(){
          $data = file_get_contents("php://input");
          $request = json_decode($data);
          $request = (array) $request;

          // $nombreVendedor ='juan valdes';
          $nombreVendedor =$request['nombreVendedor'];
      
           $respuesta = ClientesModel::comprobarClientesModel($nombreVendedor, 'vendedores' );

               if ($respuesta == 'success') {
                
                  echo json_encode(1);
               
               }else{
                echo json_encode(0);
               }
        }
  

   }

  
        if(isset($_GET['id'])){
      if ($_GET['id'] == "addCliente") {
         $usuario = new ClientesController;
         $usuario->agregarClienteController();
      }
   }

        if(isset($_GET['id'])){
      if ($_GET['id'] == "getCli") {
         $usuario = new ClientesController;
         $usuario->getClientesController();
      }
   }

           if(isset($_GET['id'])){
      if ($_GET['id'] == "getCliInactivo") {
         $usuario = new ClientesController;
         $usuario->getClientesInactivosController();
      }
   }
     if(isset($_GET['id'])){
      if ($_GET['id'] == "getCliId") {
         $usuario = new ClientesController;
         $usuario->getClienteControllerId();
      }
   }
        if(isset($_GET['id'])){
      if ($_GET['id'] == "comprobarVen") {
         $usuario = new ClientesController;
         $usuario->comprobarVendedorController();
      }
   }

          if(isset($_GET['id'])){
      if ($_GET['id'] == "editarCli") {
         $usuario = new ClientesController;
         $usuario->editarClientesController();
      }
   }

           if(isset($_GET['id'])){
      if ($_GET['id'] == "bajaCliente") {
         $usuario = new ClientesController;
         $usuario->bajaClienteController();
      }
   }

           if(isset($_GET['id'])){
      if ($_GET['id'] == "altaCliente") {
         $usuario = new ClientesController;
         $usuario->altaClienteController();
      }
   }
     