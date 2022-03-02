<?php
  $page_title = 'Listar Herramientas';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php
 

 $listar_usuarios=listar_usuario();

?>





<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
  </div>
</div>






  <div class="row">



    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
          



          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Gestores con PC 3C y alquiler de  equipo</span> 
          
           <form class="clearfix" method="post" action="descargar_usuarios.php">

            <div class="form-group">
              <br>
                 <button type="submit" name="submit"  class="btn btn-warning">Descargar Lista</button>
            </div>
          </form>









          </strong>


        </div>


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
