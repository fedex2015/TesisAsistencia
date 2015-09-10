<div class="row">
	<div class="col-xs-12">
		<h2>Formulario de nuevo cliente</h2>
	</div>
</div>

<br /><br />	
<!-------------------------------formulario para ingreso de cliente --------------------------------------------------->	
<form method="post" action="../controlador/controladorCliente.php" onsubmit="return validarIngreso()" class="form-horizontal well">

	<div class="form-group">
    	<label for="formGroup" class="col-lg-2 control-label">Nombre:</label>
        <div class="col-lg-4">
        	<input type="text" class="form-control" name="nombrecliente" id="formGroup" value="" pattern="[a-zA-ZñÑ]{2,60}" title="Ingrese solamente letras. Mínimo 2 / Máximo 60" required/>
        </div>
    </div>

	<div class="form-group">
    	<label for="formGroup" class="col-lg-2 control-label">Apellido:</label>
        <div class="col-lg-4">
        	<input type="text" class="form-control" name="apellidocliente" id="formGroup" value="" pattern="[a-zA-ZñÑ]{2,60}" title="Ingrese solamente letras. Mínimo 2 / Máximo 60" required/>
        </div>
    </div>        				
    	
    <div class="form-group">
    	<label for="formGroup" class="col-lg-2 control-label">DNI:</label>
        <div class="col-lg-4">
        	<input type="text" class="form-control" name="dni" id="formGroup" value="" pattern="[0-9]{7,8}"  title="Ingrese solamente números. Minimo 7 / Máximo 8" required/>
        </div>
    </div>     
                     
	<div class="form-group">
    	<label for="formGroup" class="col-lg-2 control-label">Fecha de nacimiento:</label>
        <div class="col-lg-4">
        	<input type="date" class="form-control" name="fecha_nacimiento" id="formGroup" value="" pattern="[0-9]{7,8}"  title="Ingrese solamente números. Minimo 7 / Máximo 8" required/>
        </div>
    </div>          	

	<div class="form-group">
    	<label for="formGroup" class="col-lg-2 control-label">Dirección:</label>
        <div class="col-lg-4">
        	<input type="text" class="form-control" name="direccioncliente" id="formGroup" value="" pattern="[a-zA-ZñÑ0-9-\s]{3,60}" required/>
        </div>
    </div>       
                        
    <div class="form-group">
    	<label for="formGroup" class="col-lg-2 control-label margen">Correo electrónico:</label>
        <div class="input-group col-lg-3">
        	<span class="input-group-addon">@</span>
            <input type="text" class="form-control" name="emailcliente" id="formGroup" value="" pattern="^[a-zA-Z0-9_\-\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]{3,10}$" title="mail@example.com" required/>
		</div>
    </div>
                      
    <div class="form-group">
    	<label for="formGroup" class="col-lg-2 control-label margen">Telefono fijo:</label>
        <div class="input-group col-lg-3">
        	<span class="input-group-addon"><span class="glyphicon glyphicon-phone-alt"></span></span>
            <input type="text" class="form-control" name="tel_fijo" id="formGroup" value="" pattern="[0-9-]{8,20}" title="Ingrese solamente números. Mínimo 10. Máximo 20" required/>
		</div>
    </div>

	<div class="form-group">
    	<label for="formGroup" class="col-lg-2 control-label margen">Telefono movil:</label>
        <div class="input-group col-lg-3">
        	<span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
            <input type="text" class="form-control" name="tel_movil" id="formGroup" value="" pattern="[0-9-]{8,20}" title="Ingrese solamente números. Mínimo 10. Máximo 20" required />
		</div>
    </div>
            
    <div class="form-group">
    	<label for="formGroup" class="col-lg-2 control-label">CUIT:</label>
        <div class="col-lg-4">
        	<input type="text" class="form-control" name="cuit" id="formGroup" value="" pattern="[0-9-]{12,13}" title="XX-XXXXXXXX-X" required/>
        </div>
    </div>     

	<div class="form-group">
    	<label for="formGroup" class="col-lg-2 control-label">Condicion impositiva:</label>
     	<div class="col-lg-4">	
     	<select name="condicionimpositiva" class="form-control"> 
     		<option value="consumidor-final">Consumidor Final</option>
            <option value="monotributo">Monotributo</option>
            <option value="resp-insc">Responsable Inscripto</option>
		</select> 
        </div>           
	</div>
    
    <div class="form-group">
		<label class="col-sm-2 control-label" for="formGroup"></label>
		<div class="col-sm-4">
			<button type="submit" name="aceptar" class="btn btn-default" style="background-color:#CCC"><span class="glyphicon glyphicon-floppy-saved"></span> Aceptar</button>
			<button type="reset" name="limpiar" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span> Cancelar</button>
		</div>
	</div>
</form>
  