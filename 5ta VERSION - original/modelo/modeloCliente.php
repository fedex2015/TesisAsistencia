<?php
 
//Con esta funcion obtenemos todos los clientes del Productor   
function verclientes($id,$inicio,$limite)
{
  /*$pag=filter_var($pag,FILTER_SANITIZE_NUMBER_INT);*/
  
  $db=conectar_db(); 	
  
  $query =  "SELECT * from cliente where id_productor='$id' and estado='1' LIMIT $inicio, $limite ";
  $resultado=mysql_query($query,$db);
  $fila=array();
  while($cli=mysql_fetch_assoc($resultado))
  {
  	$fila[]=$cli;
  }
  
  cerrar_db($db);	
  return $fila;

}
//*************************************************************************************************************************
//Obtenemos la cantidad de clientes del productor
function cantclientesProductor($id){
	
	$db=conectar_db(); 	
	$query = "SELECT * from cliente where id_productor='$id' and estado='1' "; //retorna la cantidad de clientes (paguinacion)
	$rs = mysql_query($query,$db);
	$total_registro=mysql_num_rows($rs);

	
	
	cerrar_db($db);
	return $total_registro;
}

//******************************************************************************************

//esta funcion borra al cliente seleccionado(lo pone en estado igual a cero)
function borrar_cliente($id)
{
 $db=conectar_db();
 
  $mod="UPDATE cliente set estado=0 where id_cliente=$id";
  mysql_query($mod,$db);	

 
 cerrar_db($db);	
}

//*******************************************************************************
//esta funcion recibe un parametro, que es el numero(id) del cliente que queremos editar, obteniendo todos los datos del cliente
function get_cliente($numReg)
{
  $db=conectar_db();		
  $consulta="select * from cliente where id_cliente=$numReg";
  $resultado=mysql_query($consulta,$db);
  
  //aca transferimos a FILA el arreglo, y hacemos que nos retorne el arreglo
  $fila=mysql_fetch_array($resultado);
  
  cerrar_db($db);
  return $fila;
}

//********************************************************************************************************
//Modificamos los datos del cliente en la base de datos
function modificarCliente($id,$nom,$ape,$dni,$fijo,$movil,$fecha,$dir,$email,$cuit,$cond)
{
  $db=conectar_db();		
 //Escribo en mi base de dato las modificaciones
 //Pregunto si la variable id existe	
  if (isset($id))
  {	
  $cad="UPDATE cliente set nombrecliente='$nom',apellidocliente='$ape',dni='$dni',fecha_nacimiento='$fecha',direccioncliente='$dir',emailcliente='$email',
        tel_fijo='$fijo',tel_movil='$movil',cuit='$cuit',condicionimpositiva='$cond' where id_cliente=$id";	
  mysql_query($cad,$db);
  
  cerrar_db($db);
  }
}

//*********************************************************************************************************************
//Ingresamos un nuevo cliente, y lo almacenamos en la base de datos
function nuevo_cliente($id,$nombre,$apellido,$dni,$fijo,$movil,$fecha,$direccion,$email,$cuit,$conimpo)
 {
 	
	$db=conectar_db();
 
  //Escribo en mi base de datos
   $cad="insert into cliente (nombrecliente,apellidocliente,dni,fecha_nacimiento,direccioncliente,emailcliente,cuit,condicionimpositiva,id_productor,tel_fijo,tel_movil) 
          values ('".$nombre."','".$apellido."','".$dni."','".$fecha."','".$direccion."','".$email."','".$cuit."','".$conimpo."','".$id."','".$fijo."','".$movil."')";
 
    mysql_query($cad,$db);
	
	cerrar_db($db);
  
 }
//********************************************************************************************************************* 
//Obtenemos la cantidad de clientes del productor
function cantclientesPro($id,$buscar){
	
	$db=conectar_db(); 	
	$query = "SELECT * from cliente where id_productor='$id' and estado='1' and nombrecliente like '%$buscar%'"; //retorna la cantidad de clientes (paginacion)
	$rs = mysql_query($query,$db);
	$total_registro=mysql_num_rows($rs);

	
	
	cerrar_db($db);
	return $total_registro;
}
//********************************************************************************************************************* 
function vercli($id,$inicio,$limite,$buscar)
{
  /*$pag=filter_var($pag,FILTER_SANITIZE_NUMBER_INT);*/
  
  $db=conectar_db(); 	
  
  $query =  "SELECT * from cliente where id_productor='$id' and estado='1' and nombrecliente like '%$buscar%' LIMIT $inicio, $limite ";
  $resultado=mysql_query($query,$db);
  $fila=array();
  while($cli=mysql_fetch_assoc($resultado))
  {
  	$fila[]=$cli;
  }
  
  cerrar_db($db);	
  return $fila;

}
//********************************************************************************************************************* 
function nombreCli($id){
	
	$db=conectar_db(); 
	
	$sql="select * from cliente where id_cliente='$id'";
	$resultado=mysql_query($sql,$db);
	$fila=mysql_fetch_array($resultado);
	
	
	cerrar_db($db);	
	return $fila;	
}
?>