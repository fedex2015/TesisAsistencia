<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1.0"  />
		<title>Administrador-Sistema de Gestion de seguros automotores</title>
      	
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
				<?php echo "Administrador"; ?>	
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
   	<!--Pestaña con las diferentes opciones del administrador -->
    	<ul class="nav navbar-nav" >
    		<?php if ((@$activaPro!=1) && (@$activaCom!=1)){ ?>
    			<li class="active"><a href="#tab1" data-toggle="tab">Inicio</a></li>
    		<?php }else { ?>
    			<li><a href="#tab1" data-toggle="tab">Inicio</a></li>
			<?php } ?>	 
    		
    		
    		<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Listas</a>
    			<ul class="dropdown-menu">
    			 <?php if((@$activaPro!=1) && (@$activaCom!=1)){ ?>	
      				<li><a href="#tab2" data-toggle="tab">Productores</a></li>
      				<li><a href="#tab3" data-toggle="tab">Compañias</a></li>
    			 <?php } else { if(@$activaPro==1){ ?>
    			 	<li class="active"><a href="#tab2" data-toggle="tab">Productores</a></li>
    			 	<li><a href="#tab3" data-toggle="tab">Compañias</a></li>
    			 <?php } else { if(@$activaCom==1){ ?>
    			 	<li><a href="#tab2" data-toggle="tab">Productores</a></li>
    			 	<li class="active"><a href="#tab3" data-toggle="tab">Compañias</a></li>
    			 <?php }} }?>	
    			</ul>
  			</li>
  		
  			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#1">Nuevo Usuario</a>
    			<ul class="dropdown-menu">
      				<li><a href="#tab4" data-toggle="tab">Productores</a></li>
      				<li><a href="#tab5" data-toggle="tab">Compañias</a></li>
    			</ul>
  			</li>
  
    	</ul>
 </div><!--Fin del div collapse-->
</nav>  

<div class="container">
	<div class="tab-content">
    		<?php if((@$activaPro!=1) && (@$activaCom!=1)){ ?>
    			<div class="tab-pane active" id="tab1">
    		       <p>Pagina principal</p>
    			</div>
    		<?php } else{ ?>
    			<div class="tab-pane" id="tab1">
    		       <p>Pagina principal</p>
    			</div>
    		<?php } ?>
   <!-- ************************************************************ --> 
			<?php if(@$activaPro!=1){ ?>			 	    		 
    			<div class="tab-pane" id="tab2">
    				<?php
					require_once ('../vista/vistaTablaProductor.php'); 
					?>
    			</div>
    		<?php } else {?>
    			<div class="tab-pane active" id="tab2">
    				<?php
					require_once ('../vista/vistaTablaProductor.php'); 
					?>
    			</div>
    		<?php } ?>
   <!-- ************************************************************ -->
			<?php if(@$activaCom!=1){ ?>    		
    			<div class="tab-pane" id="tab3">
    				<?php
						require_once ('../vista/vistaTablaCompania.php'); 
					?>
    			</div>
    		<?php } else { ?>
    			<div class="tab-pane active" id="tab3">
    				<?php
						require_once ('../vista/vistaTablaCompania.php'); 
					?>
    			</div>
    		<?php } ?>	
	<!-- ************************************************************ -->
	    		
    			<div class="tab-pane" id="tab4">
    				<?php
					require_once ('../vista/vistaNuevoProductor.php'); 
					?>
    			</div>
    		
    			<div class="tab-pane" id="tab5">
    				<?php
					require_once ('../vista/vistaNuevaCompania.php'); 
					?>
    			</div>
    		
    	</div>
</div><!--Fin del contenedor-->

 		
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