<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1.0"  />
		<title>Edición Compañía</title>
        <link type="text/css" href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
        <link type="text/css" href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="../css-propio/estilos.css"/>
        
        <script type="text/javascript" src="../bootstrap/js/jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../bootstrap/js/jquery-ui-1.9.1.custom.min.js"></script>
</head>
<script type="text/javascript">
    $(document).ready(function () {

        $('#myModal2').modal('toggle')
        });

</script>

<body >	
<div id="myModal2" data-backdrop="static" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="background-color: #cacaca;color: #000;">
	<div class="modal-dialog">	
    	<div class="modal-content">
            <div class="modal-header" style="background-color:#000000">
			<a href="controladorAdministrador.php"><span class="glyphicon glyphicon-remove pull-right" style="color:#FFF"></span></a>        
            <h3 style="color:#fff;">Editar Compania</h3>
            </div>
            
            <div class="modal-body">
            <form method="post" action="../controlador/controladorOpcionesCompania.php" class="form-horizontal well">
                
            <div class="form-group">
                    <label for="formGroup" class="col-lg-4 control-label"></label>
                <div class="col-lg-4">
                    <input type="hidden" class="form-control" name="id_compania" id="formGroup" value="<?php echo $compania['id_compania'] ?>" />
                </div>
            </div>
            
            <div class="form-group">
                <label for="formGroup" class="col-lg-4 control-label">Razon social:</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="razon_social" id="formGroup" value="<?php echo $compania['razon_social'] ?>" required/>
                </div>
            </div>
            
            <div class="form-group">
                <label for="formGroup" class="col-lg-4 control-label">Dirección:</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="direccion" id="formGroup" value="<?php echo $compania['direccion'] ?>" pattern="[a-zA-ZñÑ0-9-\s]{3,60}" required />
                </div>
            </div>
            
            <div class="form-group">
                <label for="formGroup" class="col-lg-4 control-label">RC:</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="rc" id="formGroup" value="<?php echo $compania['rc'] ?>"  required />
                </div>
            </div>
        
            <div class="form-group">
                <label for="formGroup" class="col-lg-4 control-label" style="text-decoration:underline">Impuestos para coberturas</label>
            </div>
            
            <div class="form-group">
                <label for="formGroup" class="col-lg-2 control-label"></label>
                <label for="formGroup" class="col-lg-4 control-label">Consumidor final:</label>
                <div class="input-group col-lg-2">
                    <input type="text" class="form-control" name="por_consuFinal" id="formGroup" value="<?php echo $compania['por_consuFinal'] ?>" pattern="[0-9]+(\.[0-9][0-9]?)?" required />
                    <span class="input-group-addon">%</span>
                </div>
            </div>
            
            <div class="form-group">
                <label for="formGroup" class="col-lg-2 control-label"></label>
                <label for="formGroup" class="col-lg-4 control-label">Monotributo:</label>
                <div class="input-group col-lg-2">
                    <input type="text" class="form-control" name="por_monotri" id="formGroup" value="<?php echo $compania['por_monotri'] ?>" pattern="[0-9]+(\.[0-9][0-9]?)?" required />
                    <span class="input-group-addon">%</span>
                </div>
            </div>
            
            <div class="form-group">
                <label for="formGroup" class="col-lg-2 control-label"></label>
                <label for="formGroup" class="col-lg-4 control-label">Responsable inscripto:</label>
                <div class="input-group col-lg-2">
                    <input type="text" class="form-control" name="por_responsable" id="formGroup" value="<?php echo $compania['por_responsable'] ?>" pattern="[0-9]+(\.[0-9][0-9]?)?" required />
                    <span class="input-group-addon">%</span>
                </div>
            </div>
            
            <div class="form-group">
                <label for="formGroup" class="col-lg-4 control-label margen">% de comision para productores:</label>
                <div class="input-group col-lg-2" style="margin-top:20px;">
                    <input type="text" class="form-control" name="porc_comision_prod" id="formGroup" value="<?php echo $compania['porc_comision_prod'] ?>" pattern="[0-9]+(\.[0-9][0-9]?)?" required />
                    <span class="input-group-addon">%</span>
                </div>
            </div>
        
            <div class="form-group">
                <label for="formGroup" class="col-lg-4 control-label margen">% de descuento:</label>
                <div class="input-group col-lg-2">
                    <input type="text" class="form-control" name="porc_dto" id="formGroup" value="<?php echo $compania['porc_dto'] ?> ?>" pattern="[0-9]+(\.[0-9][0-9]?)?" required />
                    <span class="input-group-addon">%</span>
                </div>
            </div> 
            
            <div class="modal-footer">
            	<div class="form-group">
                	<label class="col-sm-6 control-label" for="formGroup"></label>
                    <div class="col-sm-4">
                    	<button type="submit" name="agregar" class="btn btn-default"><span class="glyphicon glyphicon-floppy-saved"></span> Modificar</button>
                                    
                    </div>
                </div>   
            </div><!-----Fin del modal-footer------------->
                        
            </form><!------------Fin del formulario----------------->   
            </div><!----fin modal body--------------->
    	</div><!----fin modal content----->        
	</div><!----fin modal dialog--------->
</div><!----fin modal principal--------->		
</body>
</html>