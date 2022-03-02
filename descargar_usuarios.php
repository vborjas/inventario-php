<?php
  $page_title = 'Ventas mensuales';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php
 

 $listar_usuarios=listar_usuario();

?>





 <?php 
header("Pragma: public");
header("Expires: 0");
$filename = "UsuariosPc3C.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

?>


  <div class="row">



    <div class="col-md-12">
      <div class="panel panel-default">



        <div class="panel-body">






          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="text-center" style="width: 50px;">#</th>
                <th class="text-center" style="width: 15%;"> Equipo</th>
                <th class="text-center" style="width: 15%;"> Usuario </th>
                <th class="text-center"> Detalle </th>
               <th class="text-center" style="width: 15%;"> Fecha Entrega / Alquiler </th>
             </tr>
            </thead>
           <tbody>
             <?php foreach ($listar_usuarios as $listar_usuario):?>
             <tr>
               <td class="text-center"><?php echo count_id();?></td>
               <td class="text-center"><?php echo remove_junk($listar_usuario['name']); ?></td>
               <td class="text-center"><?php echo remove_junk($listar_usuario['usuario']); ?></td>
               <td class="text-center"><?php echo remove_junk($listar_usuario['detalle']); ?></td>
               <td class="text-center"><?php echo date("d/m/Y", strtotime ($listar_usuario['date'])); ?></td>
             </tr>
             <?php endforeach;?>
           </tbody>
         </table>
        </div>
      </div>
    </div>





  </div>










<?php include_once('layouts/footer.php'); ?>
