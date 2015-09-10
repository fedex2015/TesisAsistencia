<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1.0"  />
		<title>Productor-Sistema de Gestion de seguros automotores</title>
      	
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
				<?php echo "$nom"." "."$ape" ?>	
        		<!--Boton de cerrar sesion y el nombre de la compania -->
				<a href="../cerrar.php" class="btn btn-small btn-danger ">Cerrar Sesion</a>
            </div>
		</div><!--Fin de row -->
    </div>
</header>
<!--Fin de cabecera -->

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
   	<!--Pestaña con las diferentes opciones del productor -->
    	<ul class="nav navbar-nav ">
			
        <?php if (@$activaCober==1){ ?>
            <li><a href="#inicio" data-toggle="tab">INICIO</a></li>
        <?php } else {?>
        	<li class="active"><a href="#inicio" data-toggle="tab">INICIO</a></li>
		<?php } ?>
        	
            <li><a href="#perfil" data-toggle="tab">PERFIL</a></li>
        	
			<li><a href="#cliente" data-toggle="tab">NUEVO CLIENTE</a></li>
        	
		<?php if (@$activaCober !=1){ ?>
			<li><a href="#solicitada" data-toggle="tab">COBERTURAS SOLICITADAS</a></li>
        <?php }elseif (@$activaCober==1) { ?>
			<li class="active"><a href="#solicitada" data-toggle="tab">COBERTURAS SOLICITADAS</a></li>
        <?php } ?>
    	</ul>
    </div>
</nav>

<div class="container">    	
	<div class="tab-content">
    		
    	<?php if (@$activaCober==1){ ?>
            <div class="tab-pane" id="inicio">
    		   <?php
				require_once ('../vista/vistaTablaCliente.php'); 
			   ?>
    		</div>
        <?php } else {?>
             <div class="tab-pane active" id="inicio">
    		   <?php
				require_once ('../vista/vistaTablaCliente.php'); 
			   ?>
    		</div>
        <?php } ?>
            
    		<div class="tab-pane active" id="inicio">
    		   <?php
				require_once ('../vista/vistaTablaCliente.php'); 
			   ?>
    		</div>
    		
    		<div class="tab-pane" id="perfil">
				<?php
				 require_once ('../vista/vistaPerfilProductor.php'); 
			    ?>
    		</div>
    		
    		<div class="tab-pane" id="cliente">
    			<?php
	          	require_once('../vista/vistaNuevoCliente.php');
	        	?>
    		</div>
            
		<?php if (@$activaCober !=1){ ?>
            <div class="tab-pane" id="solicitada">
    			<?php
	          	require_once('../vista/vistaTablaSolicitada.php');
	        	?>
    		</div>
         <?php }elseif (@$activaCober==1) { ?>
             <div class="tab-pane active" id="solicitada">
    			<?php
	          	require_once('../vista/vistaTablaSolicitada.php');
	        	?>
    		</div>
         <?php } ?>   
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