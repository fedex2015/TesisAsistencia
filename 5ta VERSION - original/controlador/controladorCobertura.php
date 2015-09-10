<?php
session_start();
if(empty($_SESSION['miSession']) || empty($_SESSION['miSession']['id_compania']) ){
	header('location:../index.php');
}  

include_once ('../modelo/modeloConexion.php');
include_once ('../modelo/modeloCompania.php');
include_once ('../modelo/modeloUsuario.php');
include_once ('../modelo/modeloCobertura.php');

$id=$_SESSION['miSession']['id_compania'];

if($_GET!=NULL){
	
	if($_GET['tipo']=="borrar"){
		
     $a=borrar_cobertura($_GET['nro']);	
	 header('location:../controlador/controladorCompania.php');
    }
   else {
       if($_GET['tipo']=="editar")
       	{
	     if(isset($_GET['nro']))
	     	{
			$cobertura=get_cobertura($_GET['nro']);
			require_once ('../vista/vistaEdicionCobertura.php');
			}
		}	
   		}
}
     
if($_GET==NULL){
	//Pregunto si existe esa variable,(es una manera de preguntar si ya se apreto el boton aceptar)
	if(isset($_POST['id_cobertura'])){
		
		if(!empty($_POST['descripcion']) && !empty($_POST['porc_tasa'])){		
	
		$a=modificarCobertura($_POST['id_cobertura'],$_POST['descripcion'],$_POST['porc_tasa']);
				  
		header('location:../controlador/controladorCompania.php');		
		}	  
	}
 	else {
			if(!empty($_POST['descripcion']) && !empty($_POST['porc_tasa']))
   			{
    		$des=$_POST['descripcion'];
    		$porcentaje=$_POST['porc_tasa'];
	
			$a=nueva_cobertura($id,$des,$porcentaje);
   
   			header('location:../controlador/controladorCompania.php');
   		}
	else {
	 	header('location:../controlador/controladorCompania.php');
		}
	}	    
}
?>