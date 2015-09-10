<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edición cliente</title>
  		<link type="text/css" href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
        <link type="text/css" href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet"/>
        
        <script type="text/javascript" src="../bootstrap/js/ajax.js"></script>	
        <script type="text/javascript" src="../bootstrap/js/jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../bootstrap/js/jquery-ui-1.9.1.custom.min.js"></script>
     

<script type="text/javascript">
    $(document).ready(function () {

        $('#myModal').modal('toggle')
		
		});
		
		 $(document).ready(function () {
		//aca, nuestro div selectCompania change es como el onchange de HTML
			$("#selectCompania").change(function(event) {
				var id = $("#selectCompania").find(':selected').val(); //aca obtenemos el nuevo valor que tenga el #selectcompania
				if (id != ""){
					$("#midiv").load('../vista/combocompa.php?id='+id);
				}
				else{
					$("#midiv").text("");
				}	
			});
        
		});
		
</script>

</head>
<body>
	
<div id="myModal" data-backdrop="static" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="background-color: #cacaca;color: #000;">
	<div class="modal-dialog">
		<div class="modal-content">
            <div class="modal-header" style="background-color:#000">
                <a href="controladorProductor.php"><span class="glyphicon glyphicon-remove pull-right" style="color:#FFF"></span></a>
                <h3 style="color:#FFF">Solicitar cobertura</h3>
            </div>
            
            <div class="modal-body">
            <form method="post" action="../controlador/controladorSolicitudCobertura.php" class="form-horizontal well">

				<input type="hidden" name="id_cliente" value="<?php echo $amigos['id_cliente'] ?>"/>
                
                <div class="form-group">
                    <label for="formGroup" class="col-lg-3 control-label">Descripcion del vehiculo:</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="nombreAuto" id="formGroup" value="" maxlength="30" required=""/>
                    </div>
                </div>
            
                <div class="form-group">
                    <label for="formGroup" class="col-lg-3 control-label">Modelo</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="modelo" id="formGroup" value="" pattern= "[0-9]{4}" title="Número de 4 dígitos positivos" required/>
                    </div>
                </div>    
                
                <div class="form-group">
                    <label for="formGroup" class="col-lg-3 control-label">Suma Asegurada:</label>
                    <div class="col-lg-4">
                        <input type="number" class="form-control" name="sumaAsegurada" id="formGroup" value="" min="0" maxlength="12" step="any" required/>
                    </div>
                </div>      				
                    
                <div class="form-group">
                    <label for="formGroup" class="col-lg-3 control-label">Compañia:</label>
                    <div class="col-lg-4">
                    	<select name="id_compania" id="selectCompania" class="form-control" required>
							<option value="">Seleccione una Compañia</option>
                            <?php foreach ($resultado as $fila): ?>
								<option value="<?php echo $fila['id_compania']?>"><?php echo $fila['razon_social']?></option>
							 <?php endforeach;?>
						</select>
                    </div>
                </div>     
                
	            <div id="midiv"></div>

                <div class="modal-footer">
                <div class="form-group">
                    <label class="col-sm-6 control-label" for="formGroup"></label>
                    <div class="col-sm-4">
                        <button type="submit" name="aceptar" class="btn btn-default"><span class="glyphicon glyphicon-floppy-saved"></span> Solicitar</button>
                    </div>
                </div>    
                </div>
            </form>
            </div><!----fin modal body--------->
    	</div><!----fin modal content--------->        
	</div><!----fin modal dialog--------->
</div><!----fin modal principal--------->
</body>
</html>