<?php
session_start(); 

if(empty($_SESSION['miSession']) ){
	header('location:../index.php');
}  

include_once ('../modelo/modeloConexion.php');
include_once ('../modelo/modeloCompania.php');
include_once ('../modelo/modeloUsuario.php');

if($_GET!=NULL){
	
	if($_GET['tipo']=="borrar"){
		
     $a=borrar_compania($_GET['nro']);	
	 header('location:../controlador/controladorAdministrador.php');
    }
   else {
       if($_GET['tipo']=="editar")
       	{
	     if(isset($_GET['nro']))
	     	{
			$compania=get_compania($_GET['nro']);
			require_once ('../vista/vistaEdicionCompania.php');
			}
		}	
   		}
}

if($_GET==NULL){
	//Pregunto si existe esa variable,(es una manera de preguntar si ya se apreto el boton aceptar)
	if(isset($_POST['id_compania'])){
		 
		if(!empty($_POST['razon_social']) && !empty($_POST['direccion']) && !empty($_POST['rc']) && !empty($_POST['por_consuFinal']) && !empty($_POST['por_monotri'])
			&& !empty($_POST['por_responsable']) && !empty($_POST['porc_comision_prod']) && !empty($_POST['porc_dto'])){
	 		
	 	
  		$a=modificarCompania($_POST['id_compania'],$_POST['razon_social'],$_POST['direccion'],$_POST['rc'],$_POST['por_consuFinal'],
          					$_POST['por_monotri'],$_POST['por_responsable'],$_POST['porc_comision_prod'],$_POST['porc_dto']);	
            						 		
		header('location:../controlador/controladorAdministrador.php');								 	  
		}
		else{
			header('location:../controlador/controladorAdministrador.php?error=2');
		}
	}	
	else{
		if(!empty($_POST['razon_social']) && !empty($_POST['direccion']) && !empty($_POST['rc']) && !empty($_POST['por_consuFinal']) && !empty($_POST['por_monotri'])
			&& !empty($_POST['por_responsable']) && !empty($_POST['porc_comision_prod']) && !empty($_POST['porc_dto']) && !empty($_POST['usuario']) && !empty($_POST['contrasena']) && !empty($_POST['permiso'])){
		
		$rs=$_POST['razon_social'];
	
		$agregar=nueva_compania($_POST['razon_social'],$_POST['direccion'],$_POST['rc'], $_POST['por_consuFinal'], $_POST['por_monotri'],
  			$_POST['por_responsable'],$_POST['porc_comision_prod'],$_POST['porc_dto']);
	
  			
		$a=get_idcompania($rs);


		$b=nuevo_usuario($_POST['usuario'], $_POST['contrasena'], $_POST['permiso'], $a);	
  		
		header('location:../controlador/controladorAdministrador.php');			
		}
		else{
			header('location:../controlador/controladorAdministrador.php?error=2');
		}		
	}		
}
?>