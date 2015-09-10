<div class="row">
	<div class="col-lg-12">
        <div class="panel panel-danger">
          <div class="panel-heading"><h2 style="text-align:center">Tabla de Coberturas</h2></div>
         <!-- <div class="panel-body">
            <p class="letraTabla">En la siguiente tabla se mostrarán todos los productores, que se encuentran asociados a la página Web, con la posibilidad de editar y eliminar el productor que se desee</p>
          </div>-->
        </div>
	</div>
</div>
<div style="overflow: hidden;">

<br /><br />
<!------------------------------- Buscador ----------------------------------------------------------->
<div class="row">	
    <div class="col-lg-4">
    <form method="post" action="controladorCompania.php" class="form-horizontal">
         <div class="form-group">
         	<label for="buscar" class="col-lg-2 control-label">Buscar:</label>
            <div class="col-lg-6">
            	<div class="row">
                	<div class="col-lg-8">
                    <input type="text" class="form-control" id="buscar" name="buscar" placeholder="buscador de coberturas">
					</div>
                    
                    <div class="col-lg-4">
                    <button type="submit" name="aceptar" class="btn btn-default" style="background-color:#CCC">Aceptar</button>
                    </div>                 
                </div>
        	</div>
		</div>   	
    </form>	
    </div>
	<dic class="col-lg-8"></dic>

</div>		
<!------------------------------- Fin de Buscador ----------------------------------------------------------->

<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" style="width:700px;">
	<thead class="thead"> 
		<tr class="danger">
         <td >DESCRIPCION</td>
         <td >% TASA</td>
		 <td >EDITAR</td>
		 <td>BORRAR</td>
		</tr>
	 </thead>
     
    <tbody class="letraTabla">  
	<?php if($tot_registros < 1){ ?>   
		<tr>
			<td colspan="4">
			<?php echo "No hay resultados";?>	
			</td>
		</tr>	
    <?php 
		}else{
    	foreach($a as $cli):  
    	?>
      	
      <tr>
      	<td><?php echo $cli['descripcion'] ?> </td>
        <td><?php echo $cli['porc_tasa']?> </td>
        <td><a href="controladorCobertura.php?tipo=editar&nro=<?php echo $cli['id_cobertura']?>" title="<?php echo $cli['id_cobertura']?>"><span class="glyphicon glyphicon-pencil iconoTablacober"></span></a></td>
        <td><a onclick="return confirm('Esta seguro que quiere eliminar esta cobertura?');" href="controladorCobertura.php?tipo=borrar&nro=<?php echo $cli['id_cobertura']?>" title="<?php echo $cli['id_cobertura']?>"><span class="glyphicon glyphicon-remove iconoTablacober"></span></a></td>
      </tr> 
    <?php 
		
    endforeach; }
    ?>  
   </tbody> 
<tfoot class="thead">
    <tr>
    	<td colspan="4"></td>
    </tr>
   	<tr class="danger">
   		<td colspan="4">
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
				echo "<a href='controladorCompania.php?pagina=$i'>$i</a> ";
	}
	else{
		//Ir a la primera página
		echo "<a href='controladorCompania.php?pagina=".($pagina-1)."'><<</a> ";
		//Imprime desde la pagina anterior a la actual, hasta la siguiente.
		for ($i=$pag_ant;$i<$pag_sig;$i++){
			//En el caso que estemos en la última página, se imprimen los links a las 3 ultimas páginas
			if($pagina == $tot_paginas){
				if($p!=0)
					echo "<a href='controladorCompania.php?pagina=".$p."'>".$p." </a>";
				echo "<a href='controladorCompania.php?pagina=".$pag_ant."'>".$pag_ant."</a> ";
				echo "<b>".$pagina."</b>&nbsp;";
				break;
				}
				else if ($pagina == $i){
					echo "<b>$pagina</b>" . " ";
					echo "<a href='controladorCompania.php?pagina=".$pag_sig."'>".$pag_sig."</a> ";}
			    	else
					if($i<($tot_paginas-1)) 
						echo "<a href='controladorCompania.php?&pagina=$i'>$i</a> ";
			}
		}
		if($pagina<($tot_paginas-1))
			//Si no estamos en la última página
			//Ir a la última página
			echo "<a href='controladorCompania.php?pagina=".($pagina+1)."'>>></a> ";
		}
?>
   		</td>
   	</tr>
</tfoot>
</table>
</div>
</div>