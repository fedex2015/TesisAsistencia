<?php include_once ('modelo/modeloConexion.php');?>
<?php 
$db=conectar_db();
	$id=$_GET['id'];
	$consulta="select * from cobertura where id_compania=$id";
	$res=mysql_query($consulta,$db);
	
	$consulta1="select porc_comision_prod from compania where id_compania=$id";
	$res1=mysql_query($consulta1,$db);
	$porcen=mysql_result($res1,0);
	cerrar_db($db);
	?>


<select name="cober" id="cober" onchange="from(document.formu1.cober.value, 'midiv1','../porcen.php')" >	
	<?php while ($fila=mysql_fetch_array($res)){ ?>
	<option value="<?php echo $fila['id_cobertura']?>"><?php echo $fila['descripcion']?></option>
<?php }?>
</select>

<div  class="control-group">	
	<label name="porcen" for="cobertura" class="control-label">Comision:</label>
	<div id="midiv1" class="controls">
	<input type="text" id="comision" name="comision" value="<?php echo $porcen?>" />
</div></div>	
