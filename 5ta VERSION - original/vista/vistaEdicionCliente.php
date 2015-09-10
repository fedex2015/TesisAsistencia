<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edición cliente</title>
  		<link type="text/css" href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
        <link type="text/css" href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet"/>
		<link rel="stylesheet" type="text/css" href="../css-propio/estilos.css"/>
        
        <script type="text/javascript" src="../bootstrap/js/jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../bootstrap/js/jquery-ui-1.9.1.custom.min.js"></script>
</head>
<script type="text/javascript">
    $(document).ready(function () {

        $('#myModal').modal('toggle')
        });

</script>
<body>
<div id="myModal" data-backdrop="static" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="background-color: #cacaca;color: #000;">
	<div class="modal-dialog">
		<div class="modal-content">
            <div class="modal-header" style="background-color:#000">
                <a href="controladorProductor.php"><span class="glyphicon glyphicon-remove pull-right" style="color:#FFF"></span></a>
                <h3 style="color:#FFF">Editar Cliente</h3>
            </div>
            
            <div class="modal-body">
            <form method="post" action="../controlador/controladorCliente.php" class="form-horizontal well">
            
            	 <div class="form-group">
                    <label for="formGroup" class="col-lg-4 control-label"></label>
                <div class="col-lg-4">
                    <input type="hidden" class="form-control" name="id_cliente" id="formGroup" value="<?php echo $amigos['id_cliente'] ?>" />
                </div>
            </div>
                
                <div class="form-group">
                    <label for="formGroup" class="col-lg-3 control-label">Nombre:</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="nombrecliente" id="formGroup" value="<?php echo $amigos['nombrecliente']?>" pattern="[a-zA-ZñÑ]{2,60}" title="Ingrese solamente letras. Mínimo 2 / Máximo 60" required/>
                    </div>
                </div>
            
                <div class="form-group">
                    <label for="formGroup" class="col-lg-3 control-label">Apellido:</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="apellidocliente" id="formGroup" value="<?php echo $amigos['apellidocliente'] ?>" pattern="[a-zA-ZñÑ]{2,60}" title="Ingrese solamente letras. Mínimo 2 / Máximo 60" required/>
                    </div>
                </div>        				
                    
                <div class="form-group">
                    <label for="formGroup" class="col-lg-3 control-label">DNI:</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="dni" id="formGroup" value="<?php echo $amigos['dni'] ?>" pattern="[0-9]{7,8}"  title="Ingrese solamente números. Minimo 7 / Máximo 8" required/>
                    </div>
                </div>     
                                 
                <div class="form-group">
                    <label for="formGroup" class="col-lg-3 control-label">Fecha de nacimiento:</label>
                    <div class="col-lg-4">
                        <input type="date" class="form-control" name="fecha_nacimiento" id="formGroup" value="<?php echo $amigos['fecha_nacimiento'] ?>" required/>
                    </div>
                </div>          	
            
                <div class="form-group">
                    <label for="formGroup" class="col-lg-3 control-label">Dirección:</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="direccioncliente" id="formGroup" value="<?php echo $amigos['direccioncliente'] ?>" pattern="[a-zA-ZñÑ0-9-\s]{3,60}" required/>
                    </div>
                </div>       
                                    
                <div class="form-group">
                    <label for="formGroup" class="col-lg-3 control-label margen">Correo electrónico:</label>
                    <div class="input-group col-lg-3">
                        <span class="input-group-addon">@</span>
                        <input type="text" class="form-control" name="emailcliente" id="formGroup" value="<?php echo $amigos['emailcliente'] ?>" pattern="^[a-zA-Z0-9_\-\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]{3,10}$" title="mail@example.com" required/>
                    </div>
                </div>
                                  
                <div class="form-group">
                    <label for="formGroup" class="col-lg-3 control-label margen">Telefono fijo:</label>
                    <div class="input-group col-lg-3">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-phone-alt"></span></span>
                        <input type="text" class="form-control" name="tel_fijo" id="formGroup" value="<?php echo $amigos['tel_fijo'] ?>" pattern="[0-9-]{8,20}" title="Ingrese solamente números. Mínimo 10. Máximo 20" required/>
                    </div>
                </div>
            
                <div class="form-group">
                    <label for="formGroup" class="col-lg-3 control-label margen">Telefono movil:</label>
                    <div class="input-group col-lg-3">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
                        <input type="text" class="form-control" name="tel_movil" id="formGroup" value="<?php echo $amigos['tel_movil'] ?>" pattern="[0-9-]{8,20}" title="Ingrese solamente números. Mínimo 10. Máximo 20" required />
                    </div>
                </div>
                        
                <div class="form-group">
                    <label for="formGroup" class="col-lg-3 control-label">CUIT:</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="cuit" id="formGroup" value="<?php echo $amigos['cuit'] ?>" pattern="[0-9-]{12,13}" title="XX-XXXXXXXX-X" required/>
                    </div>
                </div>     
            
                <div class="form-group">
                    <label for="formGroup" class="col-lg-3 control-label">Condicion impositiva:</label>
                    <div class="col-lg-4">	
                    <select name="condicionimpositiva" class="form-control">
                        <option value="consumidor-final">Consumidor Final</option>
                        <option value="monotributo">Monotributo</option>
                        <option value="resp-insc">Responsable Inscripto</option>
                    </select> 
                    </div>           
                </div>
                
                <div class="modal-footer">
                <div class="form-group">
                    <label class="col-sm-6 control-label" for="formGroup"></label>
                    <div class="col-sm-4">
                        <button type="submit" name="aceptar" class="btn btn-default"><span class="glyphicon glyphicon-floppy-saved"></span> Modificar</button>
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