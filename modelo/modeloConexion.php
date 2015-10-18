<?php
//funcion para conectarnos a la base de datos
function conectar_db()
{
	$id=mysqli_connect('us-cdbr-iron-east-03.cleardb.net','b950b27eb27af9','dce8e130','heroku_8636d613bba5fb8');
	if (mysqli_connect_errno ($id))
   {
   echo "No se pudo conectar a MySQL: " . mysqli_connect_error ();}

}
//********************************************************************

function cerrar_db($id)
{
	mysqli_close($id);
}

?>	