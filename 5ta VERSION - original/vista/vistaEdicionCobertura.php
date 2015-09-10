<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1.0"  />
		<title>Edición cobertura</title>
        <link type="text/css" href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
        <link type="text/css" href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet"/>
		<link rel="stylesheet" type="text/css" href="../css-propio/estilos.css"/>
        
        <script type="text/javascript" src="../bootstrap/js/jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../bootstrap/js/jquery-ui-1.9.1.custom.min.js"></script>
</head>
<script type="text/javascript">
    $(document).ready(function () {

        $('#myModal1').modal('toggle')
        });

</script>

<body >	

<div id="myModal1" data-backdrop="static"  class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="background-color: #cacaca;color: #000;">	  
	<div class="modal-dialog">
    	<div class="modal-content">
        	
            <div class="modal-header" style="background-color:#000000">
                <a href="controladorCompania.php"><span class="glyphicon glyphicon-remove pull-right" style="color:#FFF"></span></a>
                <h3 style="color:#FFF">Editar Cobertura</h3>
            </div>
            
            <div class="modal-body"> 
                <!--formulario para ingreso de cliente -->	
            	<form method="post" action="../controlador/controladorCobertura.php"  class="form-horizontal well">
                
                 <div class="form-group">
                    <label for="formGroup" class="col-lg-4 control-label"></label>
                	<div class="col-lg-4">
                    	<input type="hidden" class="form-control" name="id_cobertura" id="formGroup" value="<?php echo $cobertura['id_cobertura'] ?>" />
                	</div>
            	</div>
            
                <div class="form-group">
                    <label for="formGroup" class="col-lg-3 control-label">Descripcion:</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="descripcion" id="formGroup" value="<?php echo $cobertura['descripcion'] ?>" required/>
                    </div>
                </div>    				
            
                <div class="form-group">
                    <label for="formGroup" class="col-lg-3 control-label margen">% Tasa:</label>
                    <div class="input-group col-lg-2">
                        <input type="text" class="form-control" name="porc_tasa" id="formGroup" value="<?php echo $cobertura['porc_tasa'] ?>" pattern="[0-9]+(\.[0-9][0-9]?)?" required/>
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
                </div>    
                </form>
            </div><!----fin del modal body---------------->
    	</div><!-----Fin del modal content---------------->
	</div><!--------Fin de modal dialog------------------->    
</div><!-------Fin del modal principal-------------------->	 	   	  
</body>
</html>