<?php
session_start();
if(empty($_SESSION['miSession']) ){
	header('location:../index.php');
}  
include_once ('../modelo/modeloConexion.php');
include_once ('../modelo/modeloCobertura.php');
include_once ('../modelo/modeloCompania.php');

$idcober=$_GET['id'];
$a=selectcober($idcober);
$por=get_compania($idcober);

if($por['id_compania']!=0){
?>

	<div class="form-group">
	<label for="formGroup" class="col-lg-3 control-label">Cobertura:</label>
    <div class="col-lg-4">
	<select id="selectCompania" name="id_cobertura" class="form-control" required>
       	<option value="">Seleccione la cobertura</option>
        <?php foreach ($a as $fila): ?>
    	    <option value="<?php echo $fila['id_cobertura']?>"><?php echo $fila['descripcion']?></option>
        <?php endforeach;?>
    </select>
       </div>
     </div>
     
   <div class="form-group">
	<label for="formGroup" class="col-lg-3 control-label">Disminución de comision:</label>
    <div class="col-lg-4" style="padding-top:10px;"> 
<input class="form-control" type="number" name="porc_comision_prod" value="<?php echo $por['porc_comision_prod']?>" step="any" min="0" max="<?php echo $por['porc_comision_prod']?>" required/>       
 <span class="help-block"><?php echo $por['porc_comision_prod']." es el nro max "?></span>
    </div>
   </div>
<?php
}
?>   