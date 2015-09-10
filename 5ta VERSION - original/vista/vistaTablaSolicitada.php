<?php  
include_once ('../modelo/modeloConexion.php');
include_once ('../modelo/modeloCliente.php');
include_once ('../modelo/modeloCompania.php');
include_once ('../modelo/modeloCobertura.php');
?>
<script type="text/javascript">
$('document').ready(inicio);

	function inicio(){
		$('.ok').on('click',abrirFull);//aca decimos que si se hizo clic en la imagen, se cargue la funcion abrirFull
		}
	function abrirFull(){
		alert('La cobertura ya fue aceptada por la compañía, por lo que no pude ser eliminada!');
		}	
</script>		
<div class="row">
	<div class="col-lg-12">
        <div class="panel panel-danger">
          <div class="panel-heading"><h3>Coberturas Solicitadas</h3></div>
          <div class="panel-body">
            <p class="letraTabla">En la siguiente tabla se muestran todas las coberturas que fueron solicitadas por los clientes a cada compañía.</p>
            <p>Si la cobertura todavía no fue aceptada por la compañía, la misma puede ser cancelada, en caso contrario no prodrá ser cancelada.</p>
          </div>
        </div>
	</div>
</div>

<div style="overflow: hidden;">
<br /><br />
<!------------------------------- Buscador ----------------------------------------------------------->
<!--<div class="row">	
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
</div>-->		
<!------------------------------- Fin de Buscador ----------------------------------------------------------->

<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
	<thead class="thead"> 
      <tr class="danger">
         <td>Cliente</td>
         <td>Compañia</td>
         <td >Cobertura</td>
         <td >Descripción Auto</td>
		 <td >Modelo</td>
         <td >Suma Asegurada</td>
         <td >Costo Total</td>
         <td >Fecha solicitada</td>
		 <td >Confirmada</td>
		 <td>Eliminar</td>
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
       foreach($soli as $cobersoli):  
    	?>
      	
      <tr>
      	<td>
        	<?php 
				$cliente=$cobersoli['id_cliente'];
				$nombreCli=nombreCli($cliente);
				echo $nombreCli['nombrecliente']; 
			?>
        </td>
        <td>
			<?php
			 	$compania=$cobersoli['id_compania'];
				$nombreCompa=nombreCompa($compania);
				echo $nombreCompa['razon_social'];
			?> 
 		</td>
        <td>
        <?php
			 	$cobertura=$cobersoli['id_cobertura'];
				$nombreCober=nombreCober($cobertura);
				echo $nombreCober['descripcion'];
			?> 
        </td>
        <td><?php echo $cobersoli['descripcion']?> </td>
        <td><?php echo $cobersoli['modelo']?> </td>
        <td><?php echo $cobersoli['sumaAsegurada']?> </td>
        <td><?php echo $cobersoli['costoTotal']?> </td>
        <td><?php echo $cobersoli['fechaSolicitud']?> </td>
        <td><?php echo $cobersoli['confirmada']?> </td>
        <?php if($cobersoli['confirmada']==0){?>
        <td><a onclick="return confirm('Esta seguro que quiere eliminar esta cobertura solicitada?');" href="controladorSolicitudCobertura.php?tipo=borrar&nro=<?php echo $cobersoli['id_cobSolicitada']?>&ok=<?php echo $cobersoli['confirmada']?>"><span class="glyphicon glyphicon-remove iconoTabla"></span></a></td>
        <?php } else {?>
        <td><a href="#" class="ok"><span class="glyphicon glyphicon-remove iconoTabla"></span></a></td>
        <?php }?>
      </tr> 
    <?php 
		
    endforeach; }
    ?>  
   </tbody> 
<tfoot class="thead" >
	<tr style="background-color:#fff;">
		<td colspan="10"></td>	
	</tr>
   	<tr class="danger">
   		<td colspan="10">
<?php
//Mostramos las páginas limitadas
$pag_ant = $pag - 1;
$pag_sig = $pag + 1;
$p = $pag_ant - 1;
//Esto solo se hará si hay mas de una página
if ($cant_paginas >= 1){
	//Si es la primera página
	if($pag==1){
		echo "<b>1</b>" . " ";
		for($i = 2; $i <= 3; $i++)
			if($i<=($cant_paginas))
				echo "<a href='controladorProductor.php?pag=$i'>$i</a> ";
	}
	else{
		//Ir a la primera página
		echo "<a href='controladorProductor.php?pag=".($pag-1)."'><<</a> ";
		//Imprime desde la pagina anterior a la actual, hasta la siguiente.
		for ($i=$pag_ant;$i<$pag_sig;$i++){
			//En el caso que estemos en la última página, se imprimen los links a las 3 ultimas páginas
			if($pag == $cant_paginas){
				if($p!=0)
					echo "<a href='controladorProductor.php?pag=".$p."'>".$p." </a>";
				echo "<a href='controladorProductor.php?pag=".$pag_ant."'>".$pag_ant."</a> ";
				echo "<b>".$pag."</b>&nbsp;";
				break;
				}
				else if ($pag == $i){
					echo "<b>$pag</b>" . " ";
					echo "<a href='controladorProductor.php?pag=".$pag_sig."'>".$pag_sig."</a> ";}
			    	else
					if($i<($cant_paginas-1)) 
						echo "<a href='controladorProductor.php?&pag=$i'>$i</a> ";
			}
		}
		if($pag<($cant_paginas-1))
			//Si no estamos en la última página
			//Ir a la última página
			echo "<a href='controladorProductor.php?pag=".($pag+1)."'>>></a> ";
		}
?>    
			</td>
		</tr>
	</tfoot>
</table>
</div>
</div>