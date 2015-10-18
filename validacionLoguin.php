<?php
include_once ('modelo/modeloConexion.php');;
include_once ('modelo/modeloUsuario.php');

//capturamos las variables que vienen por post
$usuarioIng  = $_POST['usuario'];
$contrasenaIng = ($_POST['contrasena']);

//Comprobamos que las variables ingresadas no sean nulos  
if(!empty($usuarioIng) && !empty($contrasenaIng)){
	$fila=get_usuario($usuarioIng, $contrasenaIng);
}
else{
	$fila='usuario o contraseña vacios';
}
print json_encode($fila);
?>