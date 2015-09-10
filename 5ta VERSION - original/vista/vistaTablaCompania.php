<div class="row">
	<div class="col-lg-12">
        <div class="panel panel-danger">
          <div class="panel-heading"><h3>Compañías</h3></div>
          <div class="panel-body">
            <p class="letraTabla">En la siguiente tabla se mostrarán todas los compañías que se encuentran asociadas a la página Web, con la posibilidad de editar y eliminar la compañía que se desee</p>
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
                    <input type="text" class="form-control" id="buscar" name="buscarcom" placeholder="buscar compañía">
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
<!------------------------- Fin de Buscador ----------------------------------------------------->

<div class="table-responsive">	
<table class="table table-striped table-bordered table-hover">
	<thead class="thead"> 
      <tr class="danger">
         <td >RAZON SOCIAL</td>
         <td >DIRECCION</td>
         <td >RC</td>
		 <td >% CONSUMIDOR FINAL</td>
         <td >% MONOTRIBUTO</td>
         <td >% RESP. INSCRIPTO</td>
         <td >PROC. COMISION</td>
         <td >PROC. DE DESCUENTO</td>
		 <td >EDITAR</td>
		 <td>BORRAR</td>
     </tr>
    </thead>
    
    <tbody class="letraTabla">  
    <?php if($tot_registros < 1){?>
     <tr>
     	<td colspan="10">
     	 <?php echo "No hay resultados" ?>	
     	</td>
     </tr>	
    <?php
    }else{ 
       foreach($c as $comp):  
    	?>
      	
      <tr>
      	<td><?php echo $comp['razon_social'] ?> </td>
        <td><?php echo $comp['direccion']?> </td>
        <td><?php echo $comp['rc']?> </td>
        <td><?php echo $comp['por_consuFinal']?> </td>
        <td><?php echo $comp['por_monotri']?> </td>
        <td><?php echo $comp['por_responsable']?> </td>
        <td><?php echo $comp['porc_comision_prod']?> </td>
        <td><?php echo $comp['porc_dto']?> </td>
        <td><a href="controladorOpcionesCompania.php?tipo=editar&nro=<?php echo $comp['id_compania']?>" title="<?php echo $comp['id_compania']?>"><span class="glyphicon glyphicon-pencil iconoTabla"></span></a></td>
        <td><a onclick="return confirm('Esta seguro que quiere eliminar esta compañía?');" href="controladorOpcionesCompania.php?tipo=borrar&nro=<?php echo $comp['id_compania']?>" title="<?php echo $comp['id_compania']?>"><span class="glyphicon glyphicon-remove iconoTabla"></span></a></td>    
      </tr> 
    <?php 
		
    endforeach;} 
    ?>  
   </tbody> 
<tfoot class="thead">
	<tr>
    <td colspan="10"></td>
    </tr>
   	<tr class="danger">
   		<td colspan="10">
<?php
//Mostramos las páginas limitadas
$pag_ant = $pagina - 1;
$pag_sig = $pagina + 1;
$p = $pag_ant - 1;
//Esto solo se hará si hay mas de una página
if ($tot_paginas > 1){
	//Si es la primera página
	if($pagina==1){
		echo "<b>1</b>" . " ";
		for($i = 2; $i <= 3; $i++)
			if($i<=($tot_paginas))
				echo "<a href='controladorAdministrador.php?pagi=$i'>$i</a> ";
	}
	else{
		//Ir a la primera página
		echo "<a href='controladorAdministrador.php?pagi=".($pagina-1)."'><<</a> ";
		//Imprime desde la pagina anterior a la actual, hasta la siguiente.
		for ($i=$pag_ant;$i<$pag_sig;$i++){
			//En el caso que estemos en la última página, se imprimen los links a las 3 ultimas páginas
			if($pagina == $tot_paginas){
				if($p!=0)
					echo "<a href='controladorAdministrador.php?pagi=".$p."'>".$p." </a>";
				echo "<a href='controladorAdministrador.php?pagi=".$pag_ant."'>".$pag_ant."</a> ";
				echo "<b>".$pagina."</b>&nbsp;";
				break;
				}
				else if ($pagina == $i){
					echo "<b>$pagina</b>" . " ";
					echo "<a href='controladorAdministrador.php?pagi=".$pag_sig."'>".$pag_sig."</a> ";}
			    	else
					if($i<($tot_paginas-1)) 
						echo "<a href='controladorAdministrador.php?pagi=$i'>$i</a> ";
			}
		}
		if($pagina<($tot_paginas-1))
			//Si no estamos en la última página
			//Ir a la última página
			echo "<a href='controladorAdministrador.php?pagi=".($pagina+1)."'>>></a> ";
		}
?>
   		</td>
   	</tr>
</tfoot>   
</table>
</div>
</div>