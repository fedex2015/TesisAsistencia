<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <!--    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        -->
    <title>Sistemas de Gestion de Seguros</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link href="../css-propio/estilos.css" rel="stylesheet" type="text/css" />
    
    <script type="text/javascript" src="../bootstrap/js/jquery-1.8.2.min.js"></script>
      	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
      	<script type="text/javascript" src="../bootstrap/js/jquery-ui-1.9.1.custom.min.js"></script>
        
<script type="text/javascript">
    $(document).ready(function () {

        $('#myModal').modal('toggle')
		
		});
</script>        
</head>

<body>
<div id="myModal" data-backdrop="static" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="background-color: #cacaca;color: #000;">
	<div class="modal-dialog">
		<div class="modal-content">
            <div class="modal-header" style="background-color:#000">
                <a href="controladorProductor.php"><span class="glyphicon glyphicon-remove pull-right" style="color:#FFF"></span></a>
                <h3 style="color:#FFF">Confirmacion de cobertura</h3>
            </div>
            
            <div class="modal-body">
					<p>El costo del seguro es <?php echo $costoSeguro;?>. Desea confirmarla?</p>
    		</div>
            
             <div class="modal-footer">
             	<a href="../controlador/controladorSolicitudCobertura.php?confirmada=1" class="btn btn-default">Aceptar</a>
        		<a href="../controlador/controladorProductor.php" class="btn btn-default">Cancelar</a>
             </div>
        </div><!----fin modal content--------->        
	</div><!----fin modal dialog--------->
</div><!----fin modal principal--------->
</body>
</html>