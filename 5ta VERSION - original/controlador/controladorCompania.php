<?php
 session_start(); 
 if(empty($_SESSION['miSession']) || empty($_SESSION['miSession']['id_compania']) ){
	header('location:../index.php');
} 
 
 $id=$_SESSION['miSession']['id_compania'];
 $rason=$_SESSION['miSession']['rason'];
 $dir=$_SESSION['miSession']['direccion'];
 $rc=$_SESSION['miSession']['rc'];
 $comision=$_SESSION['miSession']['comision'];
 $descuento=$_SESSION['miSession']['descuento'];
 $consumidorFinal=$_SESSION['miSession']['consumidor_final'];
 $monotributo=$_SESSION['miSession']['monotributo'];
 $responsable=$_SESSION['miSession']['responsable'];
 $us=$_SESSION['miSession']['usuario'];
 
 
include_once ('../modelo/modeloConexion.php');
include_once ('../modelo/modeloUsuario.php');
include_once ('../modelo/modeloCompania.php');
include_once ('../modelo/modeloCobertura.php');
 include_once ('../modelo/modeloCobSolicitada.php');
 
$limite= 3;

@$pagina = $_GET["pagina"];
if (empty($pagina)) {
	$inicio = 0;
	$pagina = 1;
}
else {
	$inicio = ($pagina - 1) * $limite;
	$activa=1;
}

$tot_registros=cant_cobertura($id);
$tot_paginas = ceil($tot_registros / $limite);

$a=vercoberturas($id,$inicio,$limite);

if(!empty($_POST['buscar']))
{
	$activa=1;
	$buscar=$_POST['buscar'];
	$tot_registros = cant_cober($id,$buscar);
	$tot_paginas = ceil($tot_registros / $limite);
	$a=vercober($id,$inicio,$limite,$buscar);
}else{
	$activada=1;
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
}

$cant_registros=cantCoberturaSolicitadaPorCompania($id);
$cant_paginas = ceil($cant_registros / $limite);
$soli=verCoberturaSolicitadasPorCompa($id,$inicio,$limite);

include_once ('../vista/vistaCompania.php');	
?>