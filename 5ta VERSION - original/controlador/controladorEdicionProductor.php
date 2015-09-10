<?php
session_start(); 
if(empty($_SESSION['miSession']) || empty($_SESSION['miSession']['id_productor']) ){
	header('location:../index.php');
} 

include_once ('../modelo/modeloConexion.php');
include_once ('../modelo/modeloProductor.php');

//Pregunto si existe esa variable,(es una manera de preguntar si ya se apreto el boton aceptar)
if(isset($_POST['id_productor']))
  {
   if(!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['dni']) && !empty($_POST['tel_fijo']) && !empty($_POST['tel_movil']) && !empty($_POST['direccion']) && !empty($_POST['email']) &&!empty($_POST['usuario'])){
			
  $a=modificarProductor($_POST['id_productor'],$_POST['nombre'],$_POST['apellido'],$_POST['dni'],
          $_POST['direccion'],$_POST['email'],$_POST['tel_fijo'],$_POST['tel_movil'],
          $_POST['usuario'],$_POST['contrasena'],$_POST['contrasenanew']);
  
  
  
  if($_SESSION['miSession']['nombre']!=$_POST['nombre'])
	 $_SESSION['miSession']['nombre']=$_POST['nombre'];
  if($_SESSION['miSession']['apellido']!=$_POST['apellido'])
     $_SESSION['miSession']['apellido']=$_POST['apellido'];
  if($_SESSION['miSession']['dni']!=$_POST['dni'])
     $_SESSION['miSession']['dni']=$_POST['dni'];
  if($_SESSION['miSession']['email']!=$_POST['email'])				
      $_SESSION['miSession']['email']=$_POST['email'];
  if($_SESSION['miSession']['direccion']!=$_POST['direccion'])
     $_SESSION['miSession']['direccion']=$_POST['direccion'];
  if($_SESSION['miSession']['telfijo']!=$_POST['tel_fijo'])
     $_SESSION['miSession']['telfijo']=$_POST['tel_fijo'];
  if($_SESSION['miSession']['telmovil']!=$_POST['tel_movil'])
     $_SESSION['miSession']['telmovil']=$_POST['tel_movil'];
  if($_SESSION['miSession']['usuariopro']!=$_POST['usuario'])
     $_SESSION['miSession']['usuariopro']=$_POST['usuario'];
	 
  header('Location:../controlador/controladorProductor.php');		  
  }
else{
	header('Location:../controlador/controladorProductor.php?error=1');
}	
  }	  
?>