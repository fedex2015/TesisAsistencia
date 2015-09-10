<?php
session_start(); 

if(empty($_SESSION['miSession']) ){
	header('location:../index.php');
}  

include_once ('../modelo/modeloConexion.php');
include_once ('../modelo/modeloUsuario.php');
include_once ('../modelo/modeloProductor.php');
include_once ('../modelo/modeloCompania.php');

$limite= 3;

@$pag = $_GET["pag"];
if (empty($pag)) {
	$inicio = 0;
	$pag = 1;
	$activaCom=0;
}
else {
	$inicio = ($pag - 1) * $limite;
	$activaPro=1;
	
}

$cant_registros=cantProductor();
$cant_paginas = ceil($cant_registros / $limite);
$a=ver_productor($inicio,$limite);

if(!empty($_POST['buscarpro']))
{
	$activaPro=1;
	$buscar=$_POST['buscarpro'];
	$cant_registros=cantProd($buscar);
	$cant_paginas = ceil($cant_registros / $limite);
	$a=ver_prod($inicio,$limite,$buscar);
}
//*********************************************************************************************

$limite= 1;

@$pagina = $_GET["pagi"];
if (empty($pagina)) {
	$inicio = 0;
	$pagina = 1;
	
}
else {
	$inicio = ($pagina - 1) * $limite;
	$activaCom=1;
	
}

$tot_registros=cantCompania();
$tot_paginas = ceil($tot_registros / $limite);
$c=ver_compania($inicio,$limite); 

if(!empty($_POST['buscarcom']))
{
	$activaCom=1;
	$buscarcom=$_POST['buscarcom'];
	$tot_registros=cantComp($buscarcom);
	$tot_paginas = ceil($tot_registros / $limite);
	$c=ver_comp($inicio,$limite,$buscarcom); 
}
include_once ('../vista/vistaAdministrador.php');	


?>