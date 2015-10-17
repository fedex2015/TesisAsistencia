<?php
//funcion para conectarnos a la base de datos
function conectar_db()
{
	$id=mysqli_connect('mysql.hostinger.es','u723009264_admin','m3r3b42015','u723009264_tesis');
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