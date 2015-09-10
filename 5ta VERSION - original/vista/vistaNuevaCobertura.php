<div class="row">
	<div class="col-xs-12">
		<h2>Perfil de nueva Cobertura</h2>
	</div>
</div>

<br /><br />
<!------------------------------------------Formulario de productor----------------------------------------- -->
<form method="post" action="../controlador/controladorCobertura.php" onsubmit="return validarIngreso()" class="form-horizontal">

	<div class="form-group">
    	<label for="formGroup" class="col-lg-2 control-label">Descripcion:</label>
        <div class="col-lg-4">
        	<input type="text" class="form-control" name="descripcion" id="formGroup" value="" required/>
        </div>
    </div>    				

	<div class="form-group">
    	<label for="formGroup" class="col-lg-2 control-label margen">% Tasa:</label>
        <div class="input-group col-lg-1">
        	<input type="text" class="form-control" name="porc_tasa" id="formGroup" value="" pattern="[0-9]+(\.[0-9][0-9]?)?" required/>
        <span class="input-group-addon">%</span>
        </div>
    </div>   
                     
	<div class="form-group">
		<label class="col-sm-2 control-label" for="formGroup"></label>
		<div class="col-sm-4">
			<button type="submit" name="agregar" class="btn btn-default" style="background-color:#CCC"><span class="glyphicon glyphicon-floppy-saved"></span> Agregar</button>
			<button type="reset" name="limpiar" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span> Cancelar</button>
		</div>
	</div>           	
</form>