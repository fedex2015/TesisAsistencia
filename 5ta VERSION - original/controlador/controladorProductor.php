<?php
 session_start(); 
 if(empty($_SESSION['miSession']) || empty($_SESSION['miSession']['id_productor']) ){
	header('location:../index.php');
}  
 
 $nom=$_SESSION['miSession']['nombre'];
 $ape=$_SESSION['miSession']['apellido'];
 $id=$_SESSION['miSession']['id_productor'];
 $us=$_SESSION['miSession']['usuariopro'];
 $pas=$_SESSION['miSession']['contrasenapro'];
 $dni=$_SESSION['miSession']['dni'];
 $dir=$_SESSION['miSession']['direccion'];
 $tel_fijo=$_SESSION['miSession']['telfijo'];
 $tel_movil=$_SESSION['miSession']['telmovil'];
 $email=$_SESSION['miSession']['email'];
 
 include_once ('../modelo/modeloConexion.php');
 include_once ('../modelo/modeloCliente.php');
 include_once ('../modelo/modeloUsuario.php');
 include_once ('../modelo/modeloProductor.php');
  include_once ('../modelo/modeloCobSolicitada.php');
  
 
$limite= 3;

@$pagina = $_GET["pagina"];
if (empty($pagina)) {
	$inicio = 0;
	$pagina = 1;
	$activaCober=0;
}
else {
	$inicio = ($pagina - 1) * $limite;
	$activa=1;
}


$total_registros = cantclientesProductor($id);
$tot_paginas = ceil($total_registros / $limite);
$a=verclientes($id,$inicio,$limite);

if(!empty($_POST['buscar']))
{
	$buscar=$_POST['buscar'];
	$total_registros = cantclientesPro($id,$buscar);
	$tot_paginas = ceil($total_registros / $limite);
	$a=vercli($id,$inicio,$limite,$buscar);
		
}

/****************************************************************************/
$limite= 3;

@$pag = $_GET["pag"];
if (empty($pag)) {
	$inicio = 0;
	$pag = 1;
	
}
else {
	$inicio = ($pag - 1) * $limite;
	$activaCober=1;
	
}

$cant_registros=cantCoberturaSolicitada($id);
$cant_paginas = ceil($cant_registros / $limite);
$soli=verCoberturaSolicitadas($id,$inicio,$limite);

include_once ('../vista/vistaProductor.php');	
?>