<div class="row">
	<div class="col-lg-12">
        <div class="panel panel-danger">
          <div class="panel-heading"><h3>Productores</h3></div>
          <div class="panel-body">
            <p class="letraTabla">En la siguiente tabla se mostrarán todos los productores, que se encuentran asociados a la página Web, con la posibilidad de editar y eliminar el productor que se desee</p>
          </div>
        </div>
	</div>
</div>

<div style="overflow: hidden;">
<br /><br />
<!------------------------------- Buscador ----------------------------------------------------------->
<div class="row">	
	<dic class="col-lg-8"></dic>
    <div class="col-lg-4">
    <form method="post" action="controladorAdministrador.php" class="form-horizontal">
         <div class="form-group">
         	<label for="buscar" class="col-lg-2 control-label">Buscar:</label>
            <div class="col-lg-6">
            	<div class="row">
                	<div class="col-lg-8">
                    <input type="text" class="form-control" id="buscar" name="buscarpro" placeholder="buscador de productor">
					</div>
                    
                    <div class="col-lg-4">
                    <button type="submit" name="aceptar" class="btn btn-default active">Aceptar</button>
                    </div>                 
                </div>
        	</div>
		</div>   	
    </form>	
    </div>
</div>		
<!------------------------------- Fin de Buscador ----------------------------------------------------------->

<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
	<thead class="thead"> 
      <tr class="danger">
         <td >DNI</td>
         <td >NOMBRE</td>
         <td >APELLIDO</td>
		 <td >DIRECCION</td>
         <td >EMAIL</td>
         <td >TEL FIJO</td>
         <td >CELULAR</td>
		 <td >EDITAR</td>
		 <td>BORRAR</td>
      </tr>
    </thead>
    <tbody class="letraTabla"> 
    <?php if($cant_registros < 1){ ?>
    <tr>
    	<td colspan="9">
    	<?php echo "No hay resultados" ?>    		
    	</td>
    </tr>     		 
    <?php 
    	}else{
       foreach($a as $cli):  
    	?>
      	
      <tr>
      	<td><?php echo $cli['dni'] ?> </td>
        <td><?php echo $cli['nombre']?> </td>
        <td><?php echo $cli['apellido']?> </td>
        <td><?php echo $cli['direccion']?> </td>
        <td><?php echo $cli['email']?> </td>
        <td><?php echo $cli['tel_fijo']?> </td>
        <td><?php echo $cli['tel_movil']?> </td>
        <td><a href="controladorOpcionesProductor.php?tipo=editar&nro=<?php echo $cli['id_productor']?>" title="<?php echo $cli['id_productor']?>"><span class="glyphicon glyphicon-pencil iconoTabla"></span></a></td>
        <td><a onclick="return confirm('Esta seguro que quiere eliminar este productor?');" href="controladorOpcionesProductor.php?tipo=borrar&nro=<?php echo $cli['id_productor']?>" title="<?php echo $cli['id_productor']?>"><span class="glyphicon glyphicon-remove iconoTabla"></span></a></td>
      </tr> 
    <?php 
		
    endforeach; }
    ?>  
   </tbody> 
<tfoot class="thead" >
	<tr style="background-color:#fff;">
		<td colspan="9"></td>	
	</tr>
   	<tr class="danger">
   		<td colspan="9">
<?php
//Mostramos las páginas limitadas
$pag_ant = $pag - 1;
$pag_sig = $pag + 1;
$p = $pag_ant - 1;
//Esto solo se hará si hay mas de una página
if ($cant_paginas > 1){
	//Si es la primera página
	if($pag==1){
		echo "<b>1</b>" . " ";
		for($i = 2; $i <= 3; $i++)
			if($i<=($cant_paginas))
				echo "<a href='controladorAdministrador.php?pag=$i'>$i</a> ";
	}
	else{
		//Ir a la primera página
		echo "<a href='controladorAdministrador.php?pag=".($pag-1)."'><<</a> ";
		//Imprime desde la pagina anterior a la actual, hasta la siguiente.
		for ($i=$pag_ant;$i<$pag_sig;$i++){
			//En el caso que estemos en la última página, se imprimen los links a las 3 ultimas páginas
			if($pag == $cant_paginas){
				if($p!=0)
					echo "<a href='controladorAdministrador.php?pag=".$p."'>".$p." </a>";
				echo "<a href='controladorAdministrador.php?pag=".$pag_ant."'>".$pag_ant."</a> ";
				echo "<b>".$pag."</b>&nbsp;";
				break;
				}
				else if ($pag == $i){
					echo "<b>$pag</b>" . " ";
					echo "<a href='controladorAdministrador.php?pag=".$pag_sig."'>".$pag_sig."</a> ";}
			    	else
					if($i<($cant_paginas-1)) 
						echo "<a href='controladorAdministrador.php?&pag=$i'>$i</a> ";
			}
		}
		if($pag<($cant_paginas-1))
			//Si no estamos en la última página
			//Ir a la última página
			echo "<a href='controladorAdministrador.php?pag=".($pag+1)."'>>></a> ";
		}
?>
   		</td>
   	</tr>
</tfoot>
</table>
</div>
</div>
