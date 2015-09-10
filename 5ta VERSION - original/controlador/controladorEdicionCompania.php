<?php
session_start(); 
if(empty($_SESSION['miSession']) || empty($_SESSION['miSession']['id_compania']) ){
	header('location:../index.php');
} 

include_once ('../modelo/modeloConexion.php');
include_once ('../modelo/modeloCompania.php');
//Pregunto si existe esa variable,(es una manera de preguntar si ya se apreto el boton aceptar)
if(isset($_POST['id_compania']))
  {
  	if(!empty($_POST['razon_social']) && !empty($_POST['direccion']) && !empty($_POST['rc']) && !empty($_POST['por_consuFinal']) && !empty($_POST['por_monotri'])
			&& !empty($_POST['por_responsable']) && !empty($_POST['porc_comision_prod']) && !empty($_POST['porc_dto']) && !empty($_POST['usuario'])){
	 		
	
  	$a=modificarCompania($_POST['id_compania'],$_POST['razon_social'],$_POST['direccion'],$_POST['rc'],$_POST['por_consuFinal'],
          $_POST['por_monotri'],$_POST['por_responsable'],$_POST['porc_comision_prod'],$_POST['porc_dto'],
		   $_POST['usuario'],$_POST['contrasena'],$_POST['contrasenanew']);	
	
 
  
  if($_SESSION['miSession']['rason']!=$_POST['razon_social'])
	 $_SESSION['miSession']['rason']=$_POST['razon_social'];
  
  if($_SESSION['miSession']['direccion']!=$_POST['direccion'])
     $_SESSION['miSession']['direccion']=$_POST['direccion'];
  
  if($_SESSION['miSession']['rc']!=$_POST['rc'])
     $_SESSION['miSession']['rc']=$_POST['rc'];
  
  if($_SESSION['miSession']['comision']!=$_POST['porc_comision_prod'])				
      $_SESSION['miSession']['comision']=$_POST['porc_comision_prod'];
  
  if($_SESSION['miSession']['descuento']!=$_POST['porc_dto'])
     $_SESSION['miSession']['descuento']=$_POST['porc_dto'];
	 
  if($_SESSION['miSession']['consumidor_final']!=$_POST['por_consuFinal'])
     $_SESSION['miSession']['consumidor_final']=$_POST['por_consuFinal'];
  
  if($_SESSION['miSession']['monotributo']!=$_POST['por_monotri'])
     $_SESSION['miSession']['monotributo']=$_POST['por_monotri'];
	 
  if($_SESSION['miSession']['responsable']!=$_POST['por_responsable'])
     $_SESSION['miSession']['responsable']=$_POST['por_responsable'];
  
  if($_SESSION['miSession']['usuariopro']!=$_POST['usuario'])
     $_SESSION['miSession']['usuariopro']=$_POST['usuario'];
	 
 header('location:../controlador/controladorCompania.php');
}
else {
	header('location:../controlador/controladorCompania.php?error=1');
}	
}	  
 	  
?>