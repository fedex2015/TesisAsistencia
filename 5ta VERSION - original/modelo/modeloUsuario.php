<?php
 
function get_usuario($usuarioIng,$contrasenaIng)
 {
 	//$usuarioIng=filter_var($usuarioIng,FILTER_SANITIZE_STRING);
	//$contrasenaIng=filter_var($contrasenaIng,FILTER_SANITIZE_STRING);
 	$db=conectar_db(); 
 	$query= mysql_query("select * from usuario where usuario='$usuarioIng' and contrasena = '$contrasenaIng'",$db);
	$prueba = mysql_num_rows($query);
	if($prueba>0){
		$fila = mysql_fetch_array($query);
	}
	else {
		 $fila=NULL;
		
	}
	
	cerrar_db($db);	
	return $fila;
 }
//*****************************************************************************************
 
function get_usuarioByCodigo($cod,$perm){
	$db=conectar_db();
 	$query= mysql_query("select * from usuario where cod_usuario='$cod' and permiso='$perm' ",$db);
	$prueba = mysql_num_rows($query);
	if($prueba>0){
		$fila = mysql_fetch_array($query);
	}
	else {
		 $fila=NULL;
		
	}
	cerrar_db($db);
	return $fila;
	
}
//*****************************************************************************************

 function nuevo_usuario($usuario,$contra,$permiso,$idpro)
 {
	$db=conectar_db();
	
	$pass=md5($contra);
	
	 //Escribo en mi base de datos
    $cad="insert into usuario (usuario,contrasena,permiso,cod_usuario) 
          values ('".$usuario."','".$pass."','".$permiso."','".$idpro."')";
 
    mysql_query($cad,$db);
	
	cerrar_db($db);
 } 
//***************************************************************************************** 
 function modifica_nombreusuario($usu,$productor,$perm){
 	
 	$db=conectar_db();
 	if (isset($usu))
  	{	
  	$cad="UPDATE usuario set usuario='".$usu."' where cod_usuario='".$productor."' and permiso='$perm' ";
	$prueba = mysql_num_rows($query);	
  	mysql_query($cad,$db) or die ("Problema con query");
  	}
	cerrar_db($db);
 }
//***************************************************************************************** 
 function modifica_contrausuario($pass,$productor,$perm){
 	
 	$db=conectar_db();
 	if (isset($pass))
  	{
  	$pass = md5($pass);	
  	$cad="UPDATE usuario set contrasena='$pass' where cod_usuario='$productor' and permiso='$perm'";	
  	mysql_query($cad,$db) or die ("Problema con query");
  	}
	cerrar_db($db);
	
 }
//***************************************************************************************** 
?>