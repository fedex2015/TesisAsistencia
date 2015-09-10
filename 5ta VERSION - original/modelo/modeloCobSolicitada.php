<?php 
//Ingresamos un nueva solicitud, y lo almacenamos en la base de datos
function nueva_solicitud($idproductor,$idcompania,$idcliente,$idcobertura,$nombreAuto,$modelo,$sumaAsegurada,$comision,$costo)
 {
 	
	$db=conectar_db();
 
 	$fechaSolicitud=date('y/m/d');
	
  //Escribo en mi base de datos
   $cad="insert into cobsolicitada (id_productor,id_compania,id_cobertura,id_cliente,modelo,descripcion,sumaAsegurada,comisionProductor,costoTotal,fechaSolicitud) 
          values ('".$idproductor."','".$idcompania."','".$idcobertura."','".$idcliente."','".$modelo."','".$nombreAuto."','".$sumaAsegurada."','".$comision."','".$costo."','".$fechaSolicitud."')";
 
    mysql_query($cad,$db);
	
	cerrar_db($db);
  
 }
 
/*************************************************************************************/
//Con esta funcion obtenemos todos los clientes del Productor   
function verCoberturaSolicitadas($id,$inicio,$limite)
{
  /*$pag=filter_var($pag,FILTER_SANITIZE_NUMBER_INT);*/
  
  $db=conectar_db(); 	
  
  $query =  "SELECT * from cobsolicitada where id_productor='$id' LIMIT $inicio, $limite ";
  $resultado=mysql_query($query,$db);
  $fila=array();
  while($solicitadas=mysql_fetch_assoc($resultado))
  {
  	$fila[]=$solicitadas;
  }
  
  cerrar_db($db);	
  return $fila;

}

/*******************************************************************************************/
//Obtenemos la cantidad de clientes del productor
function cantCoberturaSolicitada($id){
	
	$db=conectar_db(); 	
	$query = "SELECT * from cobsolicitada where id_productor='$id' "; //retorna la cantidad de clientes (paguinacion)
	$rs = mysql_query($query,$db);
	$total_registro=mysql_num_rows($rs);

	
	
	cerrar_db($db);
	return $total_registro;
}
/*******************************************************************************************/
//Obtenemos la cantidad de coberturas solicitadas de la compania
function cantCoberturaSolicitadaPorCompania($id){
	
	$db=conectar_db(); 	
	$query = "SELECT * from cobsolicitada where id_compania='$id' "; //retorna la cantidad de clientes (paguinacion)
	$rs = mysql_query($query,$db);
	$total_registro=mysql_num_rows($rs);

	
	
	cerrar_db($db);
	return $total_registro;
}
/*************************************************************************************/
//Con esta funcion obtenemos todos las cob solicitadas de la Compania   
function verCoberturaSolicitadasPorCompa($id,$inicio,$limite)
{
  /*$pag=filter_var($pag,FILTER_SANITIZE_NUMBER_INT);*/
  
  $db=conectar_db(); 	
  
  $query =  "SELECT * from cobsolicitada where id_compania='$id' LIMIT $inicio, $limite ";
  $resultado=mysql_query($query,$db);
  $fila=array();
  while($solicitadas=mysql_fetch_assoc($resultado))
  {
  	$fila[]=$solicitadas;
  }
  
  cerrar_db($db);	
  return $fila;
}

/*************************************************************************************/
function borrarCoberSolicitada($id,$ok)
{
 $db=conectar_db();
 
 if($ok==0){	
  $mod="delete from cobsolicitada where id_cobSolicitada=$id";
  mysql_query($mod,$db);	
 }else{
	 echo "<script>alert('La cobertura ya fue aceptada por la compania, por lo que no pudo ser eliminada!');</script>";
	 }
 
 cerrar_db($db);	
}

/*************************************************************************************/
function aceptarCoberSolicitada($id,$ok){
	
	$db=conectar_db();
 
	 if($ok==0){	
	  $mod="update cobsolicitada set confirmada=1 where id_cobSolicitada=$id";
	  mysql_query($mod,$db);	
	  echo "<script>alert('La cobertura ya fue aceptada!');</script>";
	 }else{
		 echo "<script>alert('La cobertura no pudo ser aceptada!');</script>";
		 }
 
	cerrar_db($db);	
	
	}
?>
