<?php
function get_usuario($usuarioIng,$contrasenaIng)
 {
$db = mysqli_connect('us-cdbr-iron-east-03.cleardb.net','b950b27eb27af9','dce8e130','heroku_8636d613bba5fb8');
$query = mysqli_query($db, "SELECT email as c FROM usuarios WHERE Email = '$usuarioIng' AND Password='$contrasenaIng'");
$prueba = mysqli_num_rows($query);

	if($prueba > 0){
        $rta = "correcto";	
	}
	else{
          $rta = "incorrecto";	
	}
	return json_encode($rta);
	mysqli_close($db);	
 }
?>										