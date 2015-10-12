<script src="file:///C|/wamp32/www/Cel1811/templates/lib/auxiliares.js" type="text/javascript"></script>

<div class="header">
    <h1 class="page-title">Asignación de Cursos</h1>
</div>
  
<div class="container-fluid">
    <div class="row-fluid">
    <?php session_start(); if ($_SESSION["admin"]) {  ?> 
      <div class="btn-toolbar">
        <button id="newNews" class="btn btn-primary"><i class="icon-plus"></i> Nueva Asignación</button>
        <div class="btn-group"> </div>
      </div>
    <?php } ?>

    <div class="well">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#activos" data-toggle="tab">Activas</a><li>
        <li><a href="#inactivos" data-toggle="tab">Inactivas</a></li>
      </ul>
      <div id="myTabContent" class="tab-content">
        <div class="tab-pane active in" id="activos">
          <table class="table tablesorter">
            <thead> 
              <tr>
                <th style="min-width: 20px; padding-bottom: 5px;">#</th>
                <th style="min-width: 100px; padding-bottom: 5px;">Curso</th>
                <th style="min-width: 140px; padding-bottom: 5px;">Docente</th>
                <th style="min-width: 140px; padding-bottom: 5px;">Cargo</th>
              </tr>
            </thead>
          <tbody>
            <?php foreach ($view->asignacion_act as $asig): { ?>
              <tr>
                  <td><?php echo $asig['Id_asig']?></td>
                  <td><?php echo $noti['DictadosId_curso']?></td>
                  <td><?php echo $noti['DocentesId_docente']?></td>
                  <td><?php echo $noti['Desc_cargo']?></td>
                  <td> 
                  <?php if ($_SESSION["admin"]) { ?>                                              
                    <a href="#" class="editNews" data-id="<?php echo $asig['Id_asig'] ?>"><i class="icon-pencil" title="Editar"></i></a>
                    <a href="#BajaModal" data-toggle="modal" class="delete" role="button" data-id="<?php echo $asig['Id_asig'] ?>"><i class="icon-arrow-down" title="Dar de baja"></i></a>
                </td></tr>
                <?php } ?>
            <?php } endforeach; ?>
          </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="inactivos">
        <table class="table tablesorter">
          <thead> 
              <tr>
                <th style="min-width: 20px; padding-bottom: 5px;">#</th>
                <th style="min-width: 100px; padding-bottom: 5px;">Curso</th>
                <th style="min-width: 140px; padding-bottom: 5px;">Docente</th>
                <th style="min-width: 140px; padding-bottom: 5px;">Cargo</th>
              </tr>
          </thead>
        <tbody>
          <?php foreach ($view->asignacion_inact as $asig): { ?>
            <tr>
                  <td><?php echo $asig['Id_asig']?></td>
                  <td><?php echo $noti['DictadosId_curso']?></td>
                  <td><?php echo $noti['DocentesId_docente']?></td>
                  <td><?php echo $noti['Desc_cargo']?></td>
                  <td> 
                  <?php if ($_SESSION["admin"]) { ?>                                              
                  <a href="#" class="altaNoti" data-id="<?php echo $asig['Id_asig'] ?>"><i class="icon-arrow-up" title="Dar de Alta"></i></a>
                  <a href="#" class="editNews" data-id="<?php echo $asig['Id_asig'] ?>"><i class="icon-pencil" title="Editar"></i></a>
                  <a href="#DeleteModal" data-toggle="modal" class="delete" role="button" data-id="<?php echo $asig['Id_asig'] ?>"><i class="icon-remove" title="Eliminar"></i></a>
            </td></tr>
                  <?php } ?>
          <?php } endforeach; ?>
        </tbody>
      </table>
    </div>

    <div class="modal small hide fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Confirmación</h3>
        </div>
        <div class="modal-body">
            <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Esta seguro que quiere eliminar esta asignación?</p>
        </div>
        <div class="modal-footer">
            <button class="btn btn-danger deleteNews" data-dismiss="modal">Eliminar</button>
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
        </div>  
    </div>

    <div class="modal small hide fade" id="BajaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Confirmación</h3>
    </div>
    <div class="modal-body">
        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Esta seguro que quiere dar de baja esta asignación?</p>
    </div>
    <div class="modal-footer">
        <button class="btn btn-danger bajaNoti" data-dismiss="modal">Confirmar</button>      
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    </div>  
    </div>  

</div>        


