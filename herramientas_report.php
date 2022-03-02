<?php
$page_title = 'Reporte';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php include_once('layouts/header.php'); ?>





<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="panel">
      <div class="panel-heading">

      </div>
      <div class="panel-body">




          <form class="clearfix" method="post" action="herramienta_report_process.php">
            <div class="form-group">
              <label class="form-label">Ingresar Usuario</label>
                <div class="input-group">

				  
				  
                </div>
				<input type="text" class="form-control" name="usuario" placeholder="usuario">
				
            </div>
            <div class="form-group">
                 <button type="submit" name="submit" class="btn btn-primary">Generar nota entrega</button>
            </div>
          </form>
      </div>









    </div>
  </div>

</div>




<?php include_once('layouts/footer.php'); ?>
