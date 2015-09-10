<div class="row">
	<div class="col-lg-12">
        <div class="panel panel-danger">
          <div class="panel-heading"><h2 style="text-align:center">Tabla de Clientes</h2></div>
         <!-- <div class="panel-body">
            <p class="letraTabla">En la siguiente tabla se mostrarán todos los productores, que se encuentran asociados a la página Web, con la posibilidad de editar y eliminar el productor que se desee</p>
          </div>-->
        </div>
	</div>
</div>
<div style="overflow:hidden;">

<br /><br />
<!------------------------------- Buscador ----------------------------------------------------------->
<div class="row">	
	<dic class="col-lg-8"></dic>
    <div class="col-lg-4">
    <form method="post" action="controladorProductor.php" class="form-horizontal">
         <div class="form-group">
         	<label for="buscar" class="col-lg-2 control-label">Buscar:</label>
            <div class="col-lg-6">
            	<div class="row">
                	<div class="col-lg-8">
                    <input type="text" class="form-control" id="buscar" name="buscar" placeholder="buscador de clientes">
					</div>
                    
                    <div class="col-lg-4">
                    <button type="submit" name="aceptar" class="btn btn-default" style="background-color:#CCC">Aceptar</button>
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
		<td >NOMBRE Y APELLIDO</td>
        <td >DNI</td>
		<td >DIRECCION</td>
        <td >TEL FIJO</td>
        <td >CELULAR</td>
        <td >CONDICION IMPOSITIVA</td>
        <td >EDITAR</td>
		<td>BORRAR</td>
		<td >SOLICITAR COBERTURA</td>
    </tr>
    </thead>
    
    <tbody class="letraTabla">  
    <?php 
      if($total_registros < 1)
	  { ?>
	  	<tr>
			<td colspan="13">
	  	  <?php echo "No hay resultados";?>
			</td>
		</tr>
		<?php 		  	   
	  }
	  else{
       foreach($a as $cli):  
    	?>
      	
      <tr>
        <td><?php echo $cli['nombrecliente']?>&nbsp<?php echo $cli['apellidocliente']?> </td>
      	<td><?php echo $cli['dni'] ?> </td>
        <td><?php echo $cli['direccioncliente']?> </td>
        <td><?php echo $cli['tel_fijo']?> </td>
        <td><?php echo $cli['tel_movil']?> </td>
        <td><?php echo $cli['condicionimpositiva']?> </td>
        <td><a href="controladorCliente.php?tipo=editar&nro=<?php echo $cli['id_cliente']?>" title="<?php echo $cli['id_cliente']?>"><span class="glyphicon glyphicon-pencil iconoTabla"></span></a></td>
        <td><a onclick="return confirm('Esta seguro que quiere eliminar este cliente?');" href="controladorCliente.php?tipo=borrar&nro=<?php echo $cli['id_cliente']?>" title="<?php echo $cli['id_cliente']?>"><span class="glyphicon glyphicon-remove iconoTabla"></span></a></td>
        <td><a href="controladorCliente.php?tipo=solicitar&nro=<?php echo $cli['id_cliente']?>" title="<?php echo $cli['id_cliente']?>" class="btn" style="background:#000; color:#FFF; margin-left:10px; font-weight:bold;">Cobertura</a></td>
      </tr> 
    <?php 
		
    endforeach; }
    ?>  
   </tbody> 
 
<tfoot class="thead">
	<tr style="background-color:#fff;">
		<td colspan="13"></td>	
	</tr>
	<tr class="danger">
		<td colspan="13">
<?php
//Mostramos las páginas limitadas
$pag_ant = $pagina - 1;
$pag_sig = $pagina + 1;
$p = $pag_ant - 1;
//Esto solo se hará si hay mas de una página
if ($tot_paginas >= 1){
	//Si es la primera página
	if($pagina==1){
		echo "<b>1</b>" . " ";
		for($i = 2; $i <= 3; $i++)
			if($i<=($tot_paginas))
				echo "<a href='controladorProductor.php?pagina=$i'>$i</a> ";
	}
	else{
		//Ir a la primera página
		echo "<a href='controladorProductor.php?pagina=".($pagina-1)."'><<</a> ";
		//Imprime desde la pagina anterior a la actual, hasta la siguiente.
		for ($i=$pag_ant;$i<$pag_sig;$i++){
			//En el caso que estemos en la última página, se imprimen los links a las 3 ultimas páginas
			if($pagina == $tot_paginas){
				if($p!=0)
					echo "<a href='controladorProductor.php?pagina=".$p."'>".$p." </a>";
				echo "<a href='controladorProductor.php?pagina=".$pag_ant."'>".$pag_ant."</a> ";
				echo "<b>".$pagina."</b>&nbsp;";
				break;
				}
				else if ($pagina == $i){
					echo "<b>$pagina</b>" . " ";
					echo "<a href='controladorProductor.php?pagina=".$pag_sig."'>".$pag_sig."</a> ";}
			    	else
					if($i<($tot_paginas-1)) 
						echo "<a href='controladorProductor.php?&pagina=$i'>$i</a> ";
			}
		}
		if($pagina<($tot_paginas-1))
			//Si no estamos en la última página
			//Ir a la última página
			echo "<a href='controladorProductor.php?pagina=".($pagina+1)."'>>></a> ";
		}
?>    
			</td>
		</tr>
	</tfoot>
</table>
</div>
</div>