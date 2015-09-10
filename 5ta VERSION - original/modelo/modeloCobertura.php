<?php
//Ingresamos una nueva cobertura
 function nueva_cobertura($id,$desc,$porcentaje){
 	
	$db=conectar_db();
	
	$cad="insert into cobertura(descripcion,porc_tasa,id_compania)
			values('".$desc."','".$porcentaje."','".$id."')";
	 
	mysql_query($cad,$db);
	
	cerrar_db($db);			
 }
//****************************************************************

function borrar_cobertura($id)
{
 $db=conectar_db();
 
  $mod="UPDATE cobertura set estado=0 where id_cobertura=$id";
  mysql_query($mod,$db);	

 
 cerrar_db($db);	
} 
//***********************************************************************
//Obtenemos la cantidad de coberturas de la compania
function cant_cobertura($id){
	
	$db=conectar_db(); 	
	$query = "SELECT * from cobertura where id_compania='$id' and estado='1' "; //retorna la cantidad de clientes (paguinacion)
	$cad=mysql_query($query,$db);
	$total_registro=mysql_num_rows($cad);
	
	cerrar_db($db);
	return $total_registro;
}
//*******************************************************************************
function vercoberturas($id,$inicio,$limite)
{
  /*$pag=filter_var($pag,FILTER_SANITIZE_NUMBER_INT);*/
  
  $db=conectar_db(); 	
  
  $query =  "SELECT * from cobertura where id_compania='$id' and estado='1' LIMIT $inicio,$limite";
  $resultado=mysql_query($query,$db);
  $fila=array();
  while($cli=mysql_fetch_assoc($resultado))
  {
  	$fila[]=$cli;
  }
  
  cerrar_db($db);	
  return $fila;
}
//*******************************************************************************
function modificarCobertura($id,$descripcion,$tasa){
	
	$db=conectar_db();
	
	$cad="UPDATE cobertura set descripcion='$descripcion',porc_tasa='$tasa' where id_cobertura=$id";
	
	mysql_query($cad,$db);
  
  	cerrar_db($db);
}
//*******************************************************************************
function get_cobertura($numReg){
	
  $db=conectar_db();		
  $consulta="select * from cobertura where id_cobertura=$numReg";
  $resultado=mysql_query($consulta,$db);
  
  //aca transferimos a FILA el arreglo, y hacemos que nos retorne el arreglo
  $fila=mysql_fetch_array($resultado);
  
  cerrar_db($db);
  return $fila;
}
//***********************************************************************
//Obtenemos la cantidad de coberturas de la compania
function cant_cober($id,$buscar){
	
	$db=conectar_db(); 	
	$query = "SELECT * from cobertura where id_compania='$id' and estado='1' and descripcion like '%$buscar%' "; //retorna la cantidad de clientes (paguinacion)
	$cad=mysql_query($query,$db);
	$total_registro=mysql_num_rows($cad);
	
	cerrar_db($db);
	return $total_registro;
}
//*******************************************************************************
function vercober($id,$inicio,$limite,$buscar)
{
  /*$pag=filter_var($pag,FILTER_SANITIZE_NUMBER_INT);*/
  
  $db=conectar_db(); 	
  
  $query =  "SELECT * from cobertura where id_compania='$id' and estado='1' and descripcion like '%$buscar%' LIMIT $inicio,$limite";
  $resultado=mysql_query($query,$db);
  $fila=array();
  while($cli=mysql_fetch_assoc($resultado))
  {
  	$fila[]=$cli;
  }
  
  cerrar_db($db);	
  return $fila;
}

//*******************************************************************************
function selectcober($id){
	
	$db=conectar_db(); 
	
	$sql="select * from cobertura where id_compania=$id";
	$res=mysql_query($sql);
	$fila=array();
	while ($comp=mysql_fetch_assoc($res))
	{
		$fila[]=$comp;
	}
	
	 cerrar_db($db);	
	return $fila;	
	}	
//***************************************************************************
function nombreCober($id){
	
	$db=conectar_db(); 
	
	$sql="select * from cobertura where id_cobertura='$id'";
	$resultado=mysql_query($sql,$db);
	$fila=mysql_fetch_array($resultado);
	
	
	cerrar_db($db);	
	return $fila;	
}	
?>