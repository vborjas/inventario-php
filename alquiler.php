<?php
  $page_title = 'Lista de ventas';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php
$alquiler= busca_todos_alquiler();
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
            <span>Alquiler de Equipos</span>
          </strong>
          <div class="pull-right">
            <a href="add_alquiler.php" class="btn btn-primary">Registrar Alquiler</a>
			
          </div>
        </div>
        <div class="panel-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="text-center" style="width: 30px;">#</th>
                <th> Activo Informático </th>
				<!--<th class="text-center" style="width: 10%;"> CANTIDAD</th>-->
                <th class="text-center" style="width: 10%;"> DNI</th>
                <th class="text-center" style="width: 10%;"> Usuario </th>
				<th class="text-center" style="width: 10%;"> Negocio </th>
                <th class="text-center" style="width: 10%;"> Estado </th>
				<th class="text-center" style="width: 10%;"> Estado Alquiler </th>				
                <th class="text-center" style="width: 20%;"> Fecha Alquiler </th>
                <th class="text-center" style="width: 100px;"> Acciones </th>
             </tr>
            </thead>
           <tbody>
             <?php foreach ($alquiler as $alquilerAct):?>
             <tr>
               <td class="text-center"><?php echo count_id();?></td>
               <td><?php echo remove_junk($alquilerAct['name']); ?></td>
			   <td><?php echo remove_junk($alquilerAct['DNI']); ?></td>
			   <td><?php echo remove_junk($alquilerAct['usuario']); ?></td>
			   <td><?php echo remove_junk($alquilerAct['negocio']); ?></td>
			   <td><?php echo remove_junk($alquilerAct['estado_usu']); ?></td>
			   <td><?php echo remove_junk($alquilerAct['estado_alq']); ?></td>
			   
              <!-- <td class="text-center"><?php/* echo (int)$alquilerAct['qty']; */?></td>
               <td class="text-center"><?php/* echo remove_junk($alquilerAct['price']); */?></td>-->
               <td class="text-center"><?php echo $alquilerAct['date']; ?></td>
               <td class="text-center">
                  <div class="btn-group">
                     <a href="edit_alquiler.php?id=<?php echo (int)$alquilerAct['id'];?>" class="btn btn-warning btn-xs"  title="Edit" data-toggle="tooltip">
                       <span class="glyphicon glyphicon-edit"></span>
                     </a>
                     <a href="delete_alquiler.php?id=<?php echo (int)$alquilerAct['id'];?>" class="btn btn-danger btn-xs"  title="Delete" data-toggle="tooltip">
                       <span class="glyphicon glyphicon-trash"></span>
                     </a>
                  </div>
               </td>
             </tr>
             <?php endforeach;?>
           </tbody>
         </table>
        </div>
      </div>
    </div>
  </div>
<?php include_once('layouts/footer.php'); ?>
