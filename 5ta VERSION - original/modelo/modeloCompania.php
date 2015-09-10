<?php
include_once('modeloUsuario.php');
  function get_idcompania($rs)
   {
   $db=conectar_db();
	
	$cad="select id_compania from compania where razon_social='$rs'";
	$result=mysql_result(mysql_query($cad,$db),0);
	
	cerrar_db($db);
	return $result;
	
   }
//*****************************************************************

function nueva_compania($razon_social,$direccion,$rc,$por_c,$por_m,$por_res,$porc,$porc_dto){
	
	$db=conectar_db();
	
	$cad="insert into compania (razon_social,direccion,rc,porc_comision_prod,porc_dto,por_consuFinal,por_monotri,por_responsable)
			values ('".$razon_social."','".$direccion."','".$rc."','".$porc."','".$porc_dto."','".$por_c."','".$por_m."','".$por_res."')";				
		
	mysql_query($cad,$db);
	
	cerrar_db($db);					
	} 
//***************************************************************************************************
 function get_compania($id)
   {
   $db=conectar_db();
	
	$cad="select * from compania where id_compania='$id'";
	$con=mysql_query($cad,$db);
	$datospro=mysql_fetch_array($con);
	
	cerrar_db($db);	
	return $datospro;
	
   }  
//****************************************************************

function modificarCompania($id_compania,$razon_social,$dir,$rc,$por_consuFinal,$por_monotri,$por_res,$porc_comision,$dto,$usu,$pass,$passnew)
{
 $db=conectar_db();
 	
  	$cad="UPDATE compania set razon_social='$razon_social',direccion='$dir',rc='$rc',porc_comision_prod='$porc_comision',porc_dto='$dto',
  			por_consuFinal='$por_consuFinal',por_monotri='$por_monotri',por_responsable='$por_res' where id_compania='$id_compania'";	
  	mysql_query($cad,$db);
	
if(!empty($usu) || (!empty($pass) && !empty($passnew))){
	$prod = get_usuarioByCodigo($id_compania,"com");
		
	if(!empty($usu) && $prod['usuario']!=$usu){
		modifica_nombreusuario($usu,$id_compania,"com");
	}
	if(isset($pass) && isset($passnew) && md5($pass)==$prod['contrasena']){
		modifica_contrausuario($passnew,$id_compania,"com");
	}
}
  
 	cerrar_db($db);	
	
}  
//**********************************************************************************
function cantCompania(){
	
	$db=conectar_db(); 	
	$query = "SELECT * from compania where  estado='1' "; //retorna la cantidad de clientes (paguinacion)
	$cad=mysql_query($query,$db);
	$total_registro=mysql_num_rows($cad);
	
	cerrar_db($db);
	return $total_registro;
}
//******************************************************************************************
function ver_compania($inicio,$limite)
{
    
  $db=conectar_db(); 	
  
  $query =  "SELECT * from compania where estado='1' LIMIT $inicio,$limite ";
  $resultado=mysql_query($query,$db);
  $fila=array();
  while($com=mysql_fetch_assoc($resultado))
  {
  	$fila[]=$com;
  }
  
  cerrar_db($db);	
  return $fila;

}
//*************************************************************************************************
//esta funcion borra la compania seleccionado(lo pone en estado igual a cero)
function borrar_compania($id)
{
 $db=conectar_db();
 
  $mod="UPDATE compania set estado=0 where id_compania=$id";
  mysql_query($mod,$db);	

 
 cerrar_db($db);	
}
//**********************************************************************************
function cantComp($buscarcom){
	
	$db=conectar_db(); 	
	$query = "SELECT * from compania where  estado='1' and razon_social like '%$buscarcom%' "; //retorna la cantidad de clientes (paguinacion)
	$cad=mysql_query($query,$db);
	$total_registro=mysql_num_rows($cad);
	
	cerrar_db($db);
	return $total_registro;
}
//******************************************************************************************
function ver_comp($inicio,$limite,$buscarcom)
{
    
  $db=conectar_db(); 	
  
  $query =  "SELECT * from compania where estado='1' and razon_social like '%$buscarcom%' LIMIT $inicio,$limite ";
  $resultado=mysql_query($query,$db);
  $fila=array();
  while($com=mysql_fetch_assoc($resultado))
  {
  	$fila[]=$com;
  }
  
  cerrar_db($db);	
  return $fila;

} 

//******************************************************************************************
function get_companias(){
	
  $db=conectar_db(); 	
  
  $query =  "SELECT * from compania";
  $resultado=mysql_query($query,$db);
  $fila=array();
  while($com=mysql_fetch_assoc($resultado))
  {
  	$fila[]=$com;
  }
  
  cerrar_db($db);	
  return $fila;
}
//******************************************************************************************
function nombreCompa($id){
	
	$db=conectar_db(); 
	
	$sql="select * from compania where id_compania='$id'";
	$resultado=mysql_query($sql,$db);
	$fila=mysql_fetch_array($resultado);
	
	
	cerrar_db($db);	
	return $fila;	
}	
	

?>

