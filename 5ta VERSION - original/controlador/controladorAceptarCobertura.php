<?php
session_start(); 
if(empty($_SESSION['miSession']) || empty($_SESSION['miSession']['id_compania']) ){
	header('location:../index.php');
} 

include_once ('../modelo/modeloConexion.php');
include_once ('../modelo/modeloCompania.php');
include_once ('../modelo/modeloUsuario.php');
include_once ('../modelo/modeloCobertura.php');
include_once ('../modelo/modeloCliente.php');
include_once ('../modelo/modeloCobSolicitada.php');

$idProductor=$_SESSION['miSession']['id_compania'];

if($_GET!=NULL){
       if($_GET['tipo']=="aceptar"){
	     if(isset($_GET['nro'])){
			$a=aceptarCoberSolicitada($_GET['nro'],$_GET['ok']);	
			header('location:../controlador/controladorCompania.php');		
				}
	   }
}
?>