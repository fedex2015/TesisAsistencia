<?php
include_once ('modelo/modeloConexion.php');;
include_once ('modelo/modeloUsuario.php');

//capturamos las variables que vienen por post
$usuarioIng  = $_POST['usuario'];
$contrasenaIng = ($_POST['contrasena']);

//Comprobamos que las variables ingresadas no sean nulos  
if(!empty($usuarioIng) && !empty($contrasenaIng)){
	$fila=get_usuario($usuarioIng, $contrasenaIng);
    
	if($fila!=NULL){
  		
		$usuario=$fila['usuario'];
    	$pass=$fila['contrasena'];
    	$perm=$fila['permiso'];
		$codigousuario=$fila['cod_usuario'];
		
		if ( $perm=="pro" ){
			//obtengo todos los datos del productor
            $obtener=get_productor($codigousuario); 
			
			$idproductor=$obtener['id_productor'];
			$dni=$obtener['dni'];
			$nombreproductor=$obtener['nombre'];
			$apellidoproductor=$obtener['apellido'];
			$emailproductor=$obtener['email'];
			$direccionproductor=$obtener['direccion'];		
			$fijo=$obtener['tel_fijo'];
			$movil=$obtener['tel_movil'];	
			
			/*creamos un array asosiativo,para tener todos los datos del usuario en una variable, 
			  sola(de esta manera no tratamos con variables sueltas)*/
			// podriamos solo obtener el id del productor, yo lo puse asi por las dudas!!!  
			$misesion=array('id_productor'=>$idproductor,'dni'=>$dni,'nombre'=>$nombreproductor,'apellido'=>$apellidoproductor,'telfijo'=>$fijo,'telmovil'=>$movil,
			                 'email'=>$emailproductor,'direccion'=>$direccionproductor,'usuariopro'=>$usuarioIng ,'contrasenapro'=>$contrasenaIng);
			
			/*inventamos una variable session, llamada 'miSession', y almacenamos nuestro misesion(que tiene todos los datos del usuario)
			  para mantener esas variables mientras el usuario no cierre el navegador*/
			session_start();
			$_SESSION['miSession']=$misesion;
			header('location:controlador/controladorProductor.php');
			
  		}
	 else{
		if($perm=="adm"){
				
			$misesion=array('id_administrador'=>$codigousuario,'usuario'=>$usuarioIng ,'contrasena'=>$contrasenaIng);
				
			session_start();
			$_SESSION['miSession']=$misesion;
			header('location:controlador/controladorAdministrador.php');
		}
	else{
		if($perm=="com"){
			//obtengo todos los datos de la compañia
            $obtener=get_compania($codigousuario);
			
			$idcompania=$obtener['id_compania'];
			$r_s=$obtener['razon_social'];
			$direccion=$obtener['direccion'];
			$rc=$obtener['rc'];
			$comision=$obtener['porc_comision_prod'];
			$descuento=$obtener['porc_dto'];		
			$consumidorFinal=$obtener['por_consuFinal'];
			$monotributo=$obtener['por_monotri'];
			$responsable=$obtener['por_responsable'];		
			
			$misesion=array('id_compania'=>$idcompania,'rason'=>$r_s,'direccion'=>$direccion,'rc'=>$rc,'comision'=>$comision,'descuento'=>$descuento,
			                 'consumidor_final'=>$consumidorFinal,'monotributo'=>$monotributo,'responsable'=>$responsable,'usuario'=>$usuarioIng ,'contrasena'=>$contrasenaIng);	
							 
			session_start();
			$_SESSION['miSession']=$misesion;
			header('location:controlador/controladorCompania.php');							 
			}
		}		
		}
  	}
  	else{
  		header('location:index.php?error=2');
		}
  	}
  	else{
  		header('location:index.php?error=1');
  		}	
?>