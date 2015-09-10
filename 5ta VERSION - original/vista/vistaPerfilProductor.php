<!------------------------------------------Formulario de productor----------------------------------------- -->
<form  method="post" action="../controlador/controladorEdicionProductor.php" class="form-horizontal well" >
	<fieldset><legend class="leyenda">Datos personales</legend>
    
	<div class="form-group">
    	<label for="formGroup" class="col-lg-2 control-label"></label>
        <div class="col-lg-4">
        	<input type="hidden" class="form-control" name="id_productor" id="formGroup" value="<?php echo $id ?>" />
        </div>
    </div>
    
    <div class="form-group">
    	<label for="formGroup" class="col-lg-2 control-label">Nombre:</label>
        <div class="col-lg-4">
        	<input type="text" class="form-control" name="nombre" id="formGroup" value="<?php echo $nom ?>" title="Ingrese solamente letras. Mínimo 2 / Máximo 60" required/>
        </div>
    </div>
    
    <div class="form-group">
    	<label for="formGroup" class="col-lg-2 control-label">Apellido:</label>
        <div class="col-lg-4">
        	<input type="text" class="form-control" name="apellido" id="formGroup" value="<?php echo $ape?>" pattern="[a-zA-ZñÑ]{2,60}" title="Ingrese solamente letras. Mínimo 2 / Máximo 60" required />
        </div>
    </div>
    
    <div class="form-group">
    	<label for="formGroup" class="col-lg-2 control-label">DNI:</label>
        <div class="col-lg-4">
        	<input type="text" class="form-control" name="dni" id="formGroup" value="<?php echo $dni?>" pattern="[0-9]{7,8}"  title="Ingrese solamente números. Minimo 7 / Máximo 8" required/>
        </div>
    </div>
    
    <div class="form-group">
    	<label for="formGroup" class="col-lg-2 control-label">Dirección:</label>
        <div class="col-lg-4">
        	<input type="text" class="form-control" name="direccion" id="formGroup" value="<?php echo $dir ?>" pattern="[a-zA-ZñÑ0-9-\s]{3,60}" required />
        </div>
    </div>
    
    <div class="form-group">
    	<label for="formGroup" class="col-lg-2 control-label margen">Telefono fijo:</label>
        <div class="input-group col-lg-3">
        	<span class="input-group-addon"><span class="glyphicon glyphicon-phone-alt"></span></span>
            <input type="text" class="form-control" name="tel_fijo" id="formGroup" value="<?php echo $tel_fijo?>" pattern="[0-9-]{8,20}" title="Ingrese solamente números. Mínimo 10. Máximo 20" required/>
		</div>
    </div>
    
	<div class="form-group">
    	<label for="formGroup" class="col-lg-2 control-label margen">Telefono movil:</label>
        <div class="input-group col-lg-3">
        	<span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
            <input type="text" class="form-control" name="tel_movil" id="formGroup" value="<?php echo $tel_movil ?>" pattern="[0-9-]{8,20}" title="Ingrese solamente números. Mínimo 10. Máximo 20" required />
		</div>
    </div>
    
    <div class="form-group">
    	<label for="formGroup" class="col-lg-2 control-label margen">Correo electrónico:</label>
        <div class="input-group col-lg-3">
        	<span class="input-group-addon">@</span>
            <input type="text" class="form-control" name="email" id="formGroup" value="<?php echo $email ?>" pattern="^[a-zA-Z0-9_\-\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]{3,10}$" title="mail@example.com" required/>
		</div>
    </div>
    </fieldset>
    
	<br />
    <fieldset>
    <legend class="leyenda">Datos de conexión</legend>
    <div class="form-group">
    	<label for="formGroup" class="col-lg-2 control-label">Usuario:</label>
        <div class="col-lg-4">
        	<input type="text" class="form-control" name="usuario" id="formGroup" value="<?php echo $us ?>" pattern="[a-zA-ZñÑ]{2,60}" title="Ingrese solamente letras. Mínimo 2 / Máximo 60" required />
        </div>
    </div>
    
    <div class="form-group">
    	<label for="formGroup" class="col-lg-2 control-label">Contraseña actual:</label>
        <div class="col-lg-4">
        	<input type="password" class="form-control" name="contrasena" value="" />
        </div>
    </div>
    
	<div class="form-group">
    	<label for="formGroup" class="col-lg-2 control-label">Contraseña nueva:</label>
        <div class="col-lg-4">
        	<input type="password" class="form-control" name="contrasenanew" value="" />
        </div>
    </div>
    
   
	<div class="form-group">
		<label class="col-sm-2 control-label" for="formGroup"></label>
		<div class="col-sm-4">
			<button type="submit" name="agregar" class="btn btn-default" style="background-color:#CCC"><span class="glyphicon glyphicon-floppy-saved"></span> Modificar</button>
			<button type="reset" name="limpiar" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span> Cancelar</button>
		</div>
	</div>
    </fieldset>
</form>

