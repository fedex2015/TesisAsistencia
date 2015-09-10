<?php
session_start(); 

if(empty($_SESSION['miSession']) ){
	header('location:../index.php');
}  

include_once ('../modelo/modeloConexion.php');
include_once ('../modelo/modeloProductor.php');
include_once ('../modelo/modeloUsuario.php');

if($_GET!=NULL){
	
	if($_GET['tipo']=="borrar"){
		
     $a=borrar_productor($_GET['nro']);	
	 header('location:../controlador/controladorAdministrador.php');
    }
   else {
       if($_GET['tipo']=="editar")
       	{
	     if(isset($_GET['nro']))
	     	{
			$productor=get_productor($_GET['nro']);
			require_once ('../vista/vistaEdicionProductor.php');
			}
		}	
   		}
}

if($_GET==NULL){
	//Pregunto si existe esa variable,(es una manera de preguntar si ya se apreto el boton aceptar)
	if(isset($_POST['id_productor'])){
		
		if(!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['dni']) && !empty($_POST['tel_fijo']) && !empty($_POST['tel_movil'])
		&& !empty($_POST['direccion']) && !empty($_POST['email'])){
				
	        
          $a=modificarProductor($_POST['id_productor'],$_POST['nombre'],$_POST['apellido'],$_POST['dni'],
            						 $_POST['direccion'],$_POST['email'],$_POST['tel_fijo'],$_POST['tel_movil']);
            						 		
		header('location:../controlador/controladorAdministrador.php');								 	  
	}
		else{
			header('location:../controlador/controladorAdministrador.php?error=1');
		}	
	}else {
	
		if(!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['dni']) && !empty($_POST['tel_fijo']) && !empty($_POST['tel_movil'])
		&& !empty($_POST['direccion']) && !empty($_POST['email']) && !empty($_POST['usuario']) && !empty($_POST['contrasena']) && !empty($_POST['permiso'])){
			
		$dni=$_POST['dni'];
	
		$agregar=nuevo_productor($_POST['nombre'],$_POST['apellido'],$_POST['dni'], $_POST['tel_fijo'], $_POST['tel_movil'],
  			$_POST['direccion'],$_POST['email']);
	
  			
		$idpro=get_idproductor($dni);

  
		$b=nuevo_usuario($_POST['usuario'], $_POST['contrasena'], $_POST['permiso'], $idpro);	
  		
		header('location:../controlador/controladorAdministrador.php');	
		}
		else{
			header('location:../controlador/controladorAdministrador.php?error=1');
		}			
	}
}			
?>