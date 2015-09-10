<?php

function get_administrador($id)
   {
   	$db=conectar_db(); 	
	
	/*$id=filter_var($id,FILTER_SANITIZE_STRING);*/
   	$obtener="select * from administrador where id_administrador='$id'";
	$con=mysql_query($obtener,$db);
	$datospro=mysql_fetch_array($con);
	
	cerrar_db($db);	
	return $datospro;
	
   }
?>