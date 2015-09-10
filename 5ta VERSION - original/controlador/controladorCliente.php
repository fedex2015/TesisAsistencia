<?php
session_start();
if(empty($_SESSION['miSession']) ){
	header('location:../index.php');
}  
include_once ('../modelo/modeloConexion.php');
include_once ('../modelo/modeloCliente.php');

include_once ('../modelo/modeloCobertura.php');
include_once ('../modelo/modeloCompania.php');


$id=$_SESSION['miSession']['id_productor'];
     
if($_GET!=NULL){
	
	if($_GET['tipo']=="borrar"){
		
     $a=borrar_cliente($_GET['nro']);	
	header('location:../controlador/controladorProductor.php');		
    }
   else {
       if($_GET['tipo']=="editar"){
	     if(isset($_GET['nro'])){
			$amigos=get_cliente($_GET['nro']);
			require_once ('../vista/vistaEdicionCliente.php');
			}
		}
	   else{
	   	if($_GET['tipo']=="solicitar"){
			$amigos=get_cliente($_GET['nro']);
	   		$resultado=get_companias();	
	   		require_once ('../vista/vistaSolicitudCobertura.php');
			
	   		}
		  
	   } 	
	} 
} 

if($_GET==NULL){
	//Pregunto si existe esa variable,(es una manera de preguntar si ya se apreto el boton aceptar)
	if(isset($_POST['id_cliente'])){
		
		if(!empty($_POST['nombrecliente']) && !empty($_POST['apellidocliente']) && !empty($_POST['dni']) && !empty($_POST['tel_fijo'])
			&& !empty($_POST['tel_movil']) && !empty($_POST['fecha_nacimiento']) && !empty($_POST['direccioncliente']) && !empty($_POST['emailcliente'])
			&& !empty($_POST['cuit']) && !empty($_POST['condicionimpositiva']))	{	
	
	
			$a=modificarCliente($_POST['id_cliente'],$_POST['nombrecliente'],$_POST['apellidocliente'],$_POST['dni'],$_POST['tel_fijo'],$_POST['tel_movil'],
       			  			$_POST['fecha_nacimiento'],$_POST['direccioncliente'],$_POST['emailcliente'],$_POST['cuit'],$_POST['condicionimpositiva']);
				  
			header('location:../controlador/controladorProductor.php');				  
			}
	}
	else {
		 if(!empty($_POST['nombrecliente']) && !empty($_POST['apellidocliente']) && !empty($_POST['dni']) && !empty($_POST['tel_fijo'])
			&& !empty($_POST['tel_movil']) && !empty($_POST['fecha_nacimiento']) && !empty($_POST['direccioncliente']) && !empty($_POST['emailcliente'])
			&& !empty($_POST['cuit']) && !empty($_POST['condicionimpositiva'])) {
				
		$agregar=nuevo_cliente($id,$_POST['nombrecliente'],$_POST['apellidocliente'],$_POST['dni'], $_POST['tel_fijo'], $_POST['tel_movil'],
	        $_POST['fecha_nacimiento'],$_POST['direccioncliente'],$_POST['emailcliente'],$_POST['cuit'],$_POST['condicionimpositiva']);
	
		header('location:../controlador/controladorProductor.php');	
		} 
	}
}
?>