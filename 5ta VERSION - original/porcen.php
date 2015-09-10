<?php include_once ('modelo/modeloConexion.php');?>
<?php 
$db=conectar_db();
	$id=$_GET['id'];
	$consulta="select porc_comision_prod from compania where id_compania=$id";
	$res=mysql_query($consulta,$db);
	cerrar_db($db);
	?>

<input type="text" id="comision" name="comision" value="<?php echo 'hoola';?>" />