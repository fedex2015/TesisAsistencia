<?php
session_start();
if(empty($_SESSION['miSession']) && empty($_SESSION['miSession']['id_productor'])){
	header('location:../index.php');
}

include_once ('../modelo/modeloConexion.php');
include_once ('../modelo/modeloCompania.php');
include_once ('../modelo/modeloUsuario.php');
include_once ('../modelo/modeloCobertura.php');
include_once ('../modelo/modeloCliente.php');
include_once ('../modelo/modeloCobSolicitada.php');

$idProductor=$_SESSION['miSession']['id_productor'];

if($_GET!=NULL){
	
	if($_GET['tipo']=="borrar"){
		
     $a=borrarCoberSolicitada($_GET['nro'],$_GET['ok']);	
	header('location:../controlador/controladorProductor.php');		
    }
}

if(@$_GET['confirmada']==1){
	
	nueva_solicitud($idProductor,$_SESSION['miSession']['id_compania_cober'],$_SESSION['miSession']['id_cliente_cober'],$_SESSION['miSession']['id_cobertura'],$_SESSION['miSession']['nombreAuto'],$_SESSION['miSession']['modelo'],$_SESSION['miSession']['sumaAsegurada'],$_SESSION['miSession']['porc_comision_prod'],$_SESSION['miSession']['costoSeguro']);
	
	  header('Location:../controlador/controladorProductor.php');		  
	
}
else if($_POST!=NULL){

	if(!empty($_POST['nombreAuto']) && !empty($_POST['modelo']) && !empty($_POST['id_compania']) && !empty($_POST['id_cliente']) && !empty($_POST['id_cobertura']) && !empty($_POST['sumaAsegurada']) && !empty($_POST['porc_comision_prod']) ){
				
		$idcompa=$_POST['id_compania'];
		$idcliente=$_POST['id_cliente'];
		$idcober=$_POST['id_cobertura'];
		$sumaAsegurada=$_POST['sumaAsegurada'];
		$disminucion=$_POST['porc_comision_prod'];
		
		$cober=get_cobertura($idcober);
		$compania=get_compania($idcompa);
		$cliente=get_cliente($idcliente);
		
		$SIT=0;
		switch($cliente['condicionimpositiva']){
			
			case 'consumidor-final':
					$SIT=$compania['por_consuFinal'];
			break;
			
			case 'monotributo':
				$SIT=$compania['por_monotri'];
			break;
			
			case 'responsable inscripto': 
				$SIT=$compania['por_responsable'];
			break;
			
			}
		}/***** fin del switch *****/	
	
	$T=$cober['porc_tasa'];
	$RC=$compania['rc'];
	$costoSeguro=((($sumaAsegurada * $T) / 100) + $RC) * ((100-$disminucion)/100) * ((100 + $SIT)/100);	
	
	$costoSeguro=round($costoSeguro,2);
	
	require_once ('../vista/vistaConfirmacion.php');
	
	$_SESSION['miSession']['modelo']=$_POST['modelo'];
	$_SESSION['miSession']['nombreAuto']=$_POST['nombreAuto'];
	$_SESSION['miSession']['id_compania_cober']=$idcompa;
	$_SESSION['miSession']['id_cliente_cober']=$idcliente;
	$_SESSION['miSession']['id_cobertura']=$idcober;
	$_SESSION['miSession']['sumaAsegurada']=$sumaAsegurada;
	$_SESSION['miSession']['porc_comision_prod']=$disminucion;
	$_SESSION['miSession']['costoSeguro']=$costoSeguro;
	
	}
	
?>