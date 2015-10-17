<?php
function get_usuario($usuarioIng,$contrasenaIng)
 {
$db = mysqli_connect('mysql.hostinger.es','u723009264_admin','m3r3b42015','u723009264_tesis');
$query = mysqli_query($db, "SELECT email as c FROM usuarios WHERE Email = '$usuarioIng' AND Password='$contrasenaIng'");
$prueba = mysqli_num_rows($query);

	if($prueba > 0){
        $rta = "correcto";	
	}
	else{
          $rta = "incorrecto";	
	}
	return json_encode($rta)
	cerrar_db($db);	
 }
?>										