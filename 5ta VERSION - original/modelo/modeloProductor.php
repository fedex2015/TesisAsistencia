<?php
   include_once('modeloUsuario.php');
function get_productor($id)
   {
   	$db=conectar_db(); 	
	
	/*$id=filter_var($id,FILTER_SANITIZE_STRING);*/
   	$obtener="select * from productor where id_productor='$id'";
	$con=mysql_query($obtener,$db);
	$datospro=mysql_fetch_array($con);
	
	cerrar_db($db);	
	return $datospro;
	
   }
//*********************************************************************************************************************   
function modificarProductor($productor,$nombre,$apellido,$dni,$dir,$email,$tel,$movil,$usu,$pass,$passnew)
{
$db=conectar_db(); 	
/*$productor=filter_var($productor,FILTER_SANITIZE_STRING);
$nombre=filter_var($nombre,FILTER_SANITIZE_STRING);
$apellido=filter_var($apellido,FILTER_SANITIZE_STRING);
$dni=filter_var($dni,FILTER_SANITIZE_STRING);
$dir=filter_var($dir,FILTER_SANITIZE_STRING);
$email=filter_var($email,FILTER_SANITIZE_EMAIL);*/
	
//Escribo en mi base de dato las modificaciones
//Pregunto si la variable id existe	
if (isset($productor))
  	{	
  	$cad="UPDATE productor set nombre='$nombre',apellido='$apellido',dni='$dni',direccion='$dir',email='$email',tel_fijo='$tel',tel_movil='$movil' where id_productor=$productor";	
  	mysql_query($cad,$db);
  	}
	
if(!empty($usu) || (!empty($pass) && !empty($passnew))){
	$prod = get_usuarioByCodigo($productor,"pro");
	if(!empty($usu) && $prod['usuario']!=$usu){
		modifica_nombreusuario($usu,$productor,"pro");
	}
	if(!empty($pass) && !empty($passnew) && md5($pass)==$prod['contrasena']){
		modifica_contrausuario($passnew,$productor,"pro");
	}
}

  
cerrar_db($db);	
}
//*******************************************************************************************************************************   
   
function nuevo_productor($nombre,$apellido,$dni,$fijo,$movil,$direccion,$email)
    {
 	
	$db=conectar_db();
 
  //Escribo en mi base de datos
   $cad="insert into productor (nombre,apellido,dni,direccion,email,tel_fijo,tel_movil) 
          values ('".$nombre."','".$apellido."','".$dni."','".$direccion."','".$email."','".$fijo."','".$movil."')";
 
    mysql_query($cad,$db);
	
	cerrar_db($db);
   }
//****************************************************************************************************	
 function get_idproductor($dni){
 	
	$db=conectar_db();
	
	$cad="select id_productor from productor where dni='$dni'";
	$result=mysql_result(mysql_query($cad,$db),0);
	
	cerrar_db($db);
	return $result;
 }
//****************************************************************************************************

function cantProductor(){
	
	$db=conectar_db(); 	
	$query = "SELECT * from productor where estado='1' "; //retorna la cantidad de clientes (paguinacion)
	$cad=mysql_query($query,$db);
	$total_registro=mysql_num_rows($cad);
	
	cerrar_db($db);
	return $total_registro;
} 
//*******************************************************************************************************
  
function ver_productor($inicio,$limite)
{
  /*$pag=filter_var($pag,FILTER_SANITIZE_NUMBER_INT);*/
  
  $db=conectar_db(); 	
  
  $query =  "SELECT * from productor where estado='1' LIMIT $inicio,$limite ";
  $resultado=mysql_query($query,$db);
  $fila=array();
  while($cli=mysql_fetch_assoc($resultado))
  {
  	$fila[]=$cli;
  }
  
  cerrar_db($db);	
  return $fila;

}
//*****************************************************************************************************
//esta funcion borra al productor seleccionado(lo pone en estado igual a cero)
function borrar_productor($id)
{
 $db=conectar_db();
 
  $mod="UPDATE productor set estado=0 where id_productor=$id";
  mysql_query($mod,$db);	

 
 cerrar_db($db);	
}
//****************************************************************************************************

function cantProd($buscar){
	
	$db=conectar_db(); 	
	$query = "SELECT * from productor where estado='1' and nombre like '%$buscar%' "; //retorna la cantidad de clientes (paguinacion)
	$cad=mysql_query($query,$db);
	$total_registro=mysql_num_rows($cad);
	
	cerrar_db($db);
	return $total_registro;
} 
//*******************************************************************************************************
  
function ver_prod($inicio,$limite,$buscar)
{
  /*$pag=filter_var($pag,FILTER_SANITIZE_NUMBER_INT);*/
  
  $db=conectar_db(); 	
  
  $query =  "SELECT * from productor where estado='1' and nombre like '%$buscar%' LIMIT $inicio,$limite ";
  $resultado=mysql_query($query,$db);
  $fila=array();
  while($cli=mysql_fetch_assoc($resultado))
  {
  	$fila[]=$cli;
  }
  
  cerrar_db($db);	
  return $fila;

}
?>