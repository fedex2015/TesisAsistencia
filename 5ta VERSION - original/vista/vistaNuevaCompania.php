<div class="row">
	<div class="col-xs-12">
		<h2>Perfil de la Compañía</h2>
	</div>
</div>

<br /><br />
<!------------------------------------------Formulario de productor----------------------------------------- -->
<form  method="post" action="../controlador/controladorOpcionesCompania.php" class="form-horizontal well" >
	<fieldset><legend class="leyenda">Datos personales</legend>
	<div class="form-group">
    	<label for="formGroup" class="col-lg-2 control-label">Razon social:</label>
        <div class="col-lg-4">
        	<input type="text" class="form-control" name="razon_social" id="formGroup" value="" required/>
        </div>
    </div>
    
    <div class="form-group">
    	<label for="formGroup" class="col-lg-2 control-label">Dirección:</label>
        <div class="col-lg-4">
        	<input type="text" class="form-control" name="direccion" id="formGroup" value="" pattern="[a-zA-ZñÑ0-9-\s]{3,60}" required />
        </div>
    </div>
    
	<div class="form-group">
    	<label for="formGroup" class="col-lg-2 control-label">RC:</label>
        <div class="col-lg-4">
        	<input type="text" class="form-control" name="rc" id="formGroup" value=""  required />
        </div>
    </div>

	<div class="form-group">
    	<label for="formGroup" class="col-lg-3 control-label" style="text-decoration:underline">Impuestos para coberturas</label>
    </div>
    
    <div class="form-group">
    	<label for="formGroup" class="col-lg-1 control-label"></label>
        <label for="formGroup" class="col-lg-2 control-label">Consumidor final:</label>
        <div class="input-group col-lg-1">
            <input type="text" class="form-control" name="por_consuFinal" id="formGroup" value="" pattern="[0-9]+(\.[0-9][0-9]?)?" required />
            <span class="input-group-addon">%</span>
		</div>
    </div>
    
	<div class="form-group">
    	<label for="formGroup" class="col-lg-1 control-label"></label>
    	<label for="formGroup" class="col-lg-2 control-label">Monotributo:</label>
        <div class="input-group col-lg-1">
            <input type="text" class="form-control" name="por_monotri" id="formGroup" value="" pattern="[0-9]+(\.[0-9][0-9]?)?" required />
            <span class="input-group-addon">%</span>
		</div>
    </div>
    
    <div class="form-group">
        <label for="formGroup" class="col-lg-1 control-label"></label>
    	<label for="formGroup" class="col-lg-2 control-label">Responsable inscripto:</label>
        <div class="input-group col-lg-1">
            <input type="text" class="form-control" name="por_responsable" id="formGroup" value="" pattern="[0-9]+(\.[0-9][0-9]?)?" required />
            <span class="input-group-addon">%</span>
		</div>
    </div>
    
    <div class="form-group">
    	<label for="formGroup" class="col-lg-2 control-label margen">% de comision para productores:</label>
        <div class="input-group col-lg-1" style="margin-top:10px;">
            <input type="text" class="form-control" name="porc_comision_prod" id="formGroup" value="" pattern="[0-9]+(\.[0-9][0-9]?)?" required />
            <span class="input-group-addon">%</span>
		</div>
    </div>

    <div class="form-group">
    	<label for="formGroup" class="col-lg-2 control-label margen">% de descuento:</label>
        <div class="input-group col-lg-1">
            <input type="text" class="form-control" name="porc_dto" id="formGroup" value="" pattern="[0-9]+(\.[0-9][0-9]?)?" required />
            <span class="input-group-addon">%</span>
		</div>
    </div> 
	</fieldset>
	
    <br />
	<fieldset>
    <legend class="leyenda">Datos de conexión</legend>
    <div class="form-group">
    	<label for="formGroup" class="col-lg-2 control-label">Usuario:</label>
        <div class="col-lg-4">
        	<input type="text" class="form-control" name="usuario" id="formGroup" value="" pattern="[a-zA-ZñÑ]{2,60}" title="Ingrese solamente letras. Mínimo 2 / Máximo 60" required />
        </div>
    </div>
    
    <div class="form-group">
    	<label for="formGroup" class="col-lg-2 control-label">Contraseña:</label>
        <div class="col-lg-4">
        	<input type="password" class="form-control" name="contrasena" value="" required/>
        </div>
    </div>
    
	<div class="form-group">
    	<label for="formGroup" class="col-lg-2 control-label">Permiso:</label>
        <div class="col-lg-4">
        <label class="radio-inline">
        	<input type="radio" name="permiso" value="com" checked="checked" />Compañia
        </label>
        </div>
    </div>
    
	<div class="form-group">
		<label class="col-sm-2 control-label" for="formGroup"></label>
		<div class="col-sm-4">
			<button type="submit" name="agregar" class="btn btn-default" style="background-color:#CCC"><span class="glyphicon glyphicon-floppy-saved"></span> Agregar</button>
			<button type="reset" name="limpiar" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span> Cancelar</button>
		</div>
	</div>
    </fieldset>
</form>  
