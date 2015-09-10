<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1.0"  />
		<title>Compañía-Sistema de Gestion de seguros automotores</title>
      	
      	<link href="../css-propio/estilos.css" rel="stylesheet" type="text/css" />
      	<link type="text/css" href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
      
      	
      	<script type="text/javascript" src="../bootstrap/js/jquery-1.8.2.min.js"></script>
      	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
      	<script type="text/javascript" src="../bootstrap/js/jquery-ui-1.9.1.custom.min.js"></script>
     
</head>

<body >	
<!--Cabecera de la pagina con el logo nuestro -->
<header>
	<div class="container">
    	<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
               	<div class="row">
                	<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1"> 
						<img src="../img/logo1.png" class="logo" />
					</div>
                    
                    <div class="hidden-xs col-sm-11 col-md-11 col-lg-11">
        				<h3 class="texto">Sistema de Gestion de Seguros</h3>
      				</div>			
				</div><!-- Fin de row2-->
            </div>
			
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 centrar nombreUsuario"> 
				<?php echo "$rason" ?>	
        		<!--Boton de cerrar sesion y el nombre de la compania -->
				<a href="../cerrar.php" class="btn btn-small btn-danger ">Cerrar Sesion</a>
            </div>
		</div><!--Fin de row -->
    </div>
</header>

<nav class="navbar navbar-default">
	<div class="navbar-header">
    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        	<span class="sr-only">Cambiar navegacion</span>
        	<span class="icon-bar"></span>
        	<span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div><!--Fin del navbar-header-->
	
<!-- Agrupar los enlaces de navegación, los formularios y cualquier
       otro elemento que se pueda ocultar al minimizar la barra -->
 	<div class="collapse navbar-collapse navbar-ex1-collapse">
    
   <!--Pestaña con las diferentes opciones del administrador -->
    <div class="tabbable tabs-stacked"> 
    	<ul class="nav navbar-nav">
    		<?php if(@$activa!=1 ){ ?>
			
			<li class="active"><a href="#inicio" data-toggle="tab">INICIO</a></li>
        	<li><a href="#perfilCompa" data-toggle="tab">PERFIL</a></li>
        	<li><a href="#listado" data-toggle="tab">COBERTURAS</a></li>
			<li><a href="#cobertura" data-toggle="tab">NUEVA COBERTURA</a></li>
  
        	<?php } else{  ?>
        	
        	<li><a href="#inicio" data-toggle="tab">INICIO</a></li>
  			<li><a href="#perfilCompa" data-toggle="tab">PERFIL</a></li>
        	<li class="active"><a href="#listado" data-toggle="tab">COBERTURAS</a></li>
			<li><a href="#cobertura" data-toggle="tab">NUEVA COBERTURA</a></li>
        	
        	<?php } ?>	
    	</ul>
	</div><!--Fin del div collapse-->
</nav>     
    	
<div class="container">
	<div class="tab-content">
			<?php if(@$activa!=1){ ?>	
    			<div class="tab-pane active" id="inicio">
    		   		<?php
			   		require_once ('../vista/vistaTablaSolicitadasCompa.php');
			 		?>
    			</div>
    	 	<?php } else{  ?>
    			<div class="tab-pane" id="inicio">
    		   		<?php
			   		require_once ('../vista/vistaTablaSolicitadasCompa.php');
			 		?>
    			</div>
    		<?php } ?>
    		
    			<div class="tab-pane" id="perfilCompa">
					<?php
					require_once ('../vista/vistaPerfilCompania.php'); 
			    	?>
    			</div>
    	
    		<?php if(@$activa!=1 ){ ?>	
    			<div class="tab-pane" id="listado">
    				<?php
	          	 	require_once ('../vista/vistaTablaCobertura.php'); 
	        		?>
    			</div>
    		<?php } else{  ?>
    			<div class="tab-pane active" id="listado">
    				<?php
	          	 	require_once ('../vista/vistaTablaCobertura.php'); 
	        		?>
    			</div>
    		<?php } ?>		
    	
    			<div class="tab-pane" id="cobertura">
    				<?php
	          		require_once('../vista/vistaNuevaCobertura.php');
	        		?>
    			</div>
    		    		
    </div> <!--Fin de la pestaña -->
</div>	<!--Fin del contenedor -->

<footer style="margin-top:60px;">
<div class="container">
	<div class="row">
    	<div class="col-lg-4">
        	<h4>Alumnos</h4>
        	<p>Mikel Arbide</p>
            <p>Ignacio Barberis</p>
            <p>Carla Locaso</p>
        </div>
    	<div class="col-lg-4"><h4>Arquitectura Web</h4></div>
    	<div class="col-lg-4">
        	<h4>Profesor</h4>
            <p>Sebastian L</p>
        </div>
    </div>
</div>
</footer>
</body>
</html>	