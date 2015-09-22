<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <!--    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        -->
    <title>Sistemas de Gestion de Seguros</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link href="css-propio/estilos.css" rel="stylesheet" type="text/css" />
</head>

<body>
<!-----------------------------------Cabecera------------------------------------------------------->
<header>
  <div class="container">
    <div class="row">
      <div class="hidden-xs col-sm-1 col-md-1 col-lg-1"> 
      	<img src="img/logo1.png" alt="imagen que contiene el logo" class="logo"> 
      </div>
            
      <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11">
        <h3 class="texto">Sistema de Gestion de Seguros2445454</h3>
      </div>
    </div>
  </div>
</header>
<!-----------------------------------Fin Cabecera-------------------------------------------------------> 
<br /><br /><br />
<div class="container">
  <section>
  <!--comienzo del row-->
    <div class="row">
      <div class="col-xs-1 col-sm-4 col-md-4"></div>
      
      <div class="col-xs-10 col-sm-4 col-md-4">
        <form class="form-horizontal well" action="validacionLoguin.php" method="post">
       
          <fieldset>
            <legend>Iniciar Sesion</legend>
            <div class="form-group">
              <label for="usuario" class="col-lg-6 control-label">Nombre de usuario</label>
              <div class="col-lg-6">
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="usuario" pattern="[a-zA-ZñÑ0-9-\s]{3,60}" required>
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="col-lg-6 control-label">Contraseña</label>
              <div class="col-lg-6">
                <input type="password" class="form-control" id="password" name="contrasena" placeholder="Contraseña" pattern="[a-zA-ZñÑ0-9-\s]{3,60}" required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset-6 col-lg-6">
                <button type="submit" class="btn btn-default">Entrar</button>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
      
      <div class="col-xs-1 col-sm-4 col-md-4"></div>
    </div>
    <!--Fin del row-->
  </section>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')</script> 
<script src="js/vendor/bootstrap.min.js"></script> 
<script src="js/main.js"></script>
</body>
</html>
