<?php
//funcion para conectarnos a la base de datos
function conectar_db()
{
	$id=mysql_connect('localhost','root','');
	mysql_select_db('tpfinal');
	return $id;
}
//********************************************************************

function cerrar_db($id)
{
	mysql_close($id);
}

?>