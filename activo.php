<?php
  $page_title = 'Lista de productos';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $activos = join_product_table();
?>
<?php include_once('layouts/header.php'); ?>
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
         <div class="pull-right">
           <a href="add_activo.php" class="btn btn-primary">Agregar Activo</a>
         </div>
        </div>
        <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center" style="width: 50px;">#</th>
                <th> Imagen</th> 
                <th> Activo </th>
                <th class="text-center" style="width: 20%;"> Categoría </th>
				<th class="text-center" style="width: 10%;"> Cantidad </th>
                <th class="text-center" style="width: 10%;"> Stock </th>
               <!-- <th class="text-center" style="width: 10%;"> Entradas </th>-->
               <!-- <th class="text-center" style="width: 10%;"> Salidas </th>-->
				<th class="text-center" style="width: 10%;"> Fecha de Actualización</th>
                <th class="text-center" style="width: 100px;"> Acciones </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($activos as $activo):?>
              <tr>
                <td class="text-center"><?php echo count_id();?></td>
                <td>
                   <?php  if($activo['media_id'] === '0'):  ?>
                   <img class="img-avatar img-circle" src="uploads/products/no_image.jpg" alt=""> 
                  <?php  else: ?>
                  <img class="img-avatar img-circle" src="uploads/products/<?php  echo $activo['image']; ?>" alt=""> 
                <?php endif; ?>
                </td>
                <td> <?php echo remove_junk($activo['name']); ?></td>
                <td class="text-center"> <?php echo remove_junk($activo['categorie']); ?></td>
				<td class="text-center p-2 bg-warning text-white"> <?php echo remove_junk($activo['cantidad']); ?></td>
                <td class="text-center p-2 bg-success text-white"> <?php echo remove_junk($activo['stock']); ?></td>
               <!-- <td class="text-center"> <?php /*echo remove_junk($product['buy_price']);*/ ?></td> -->
               <!-- <td class="text-center"> <?php /*echo remove_junk($product['sale_price']);*/ ?></td>-->
			    <td class="text-center"> <?php echo read_date($activo['date']); ?></td>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="edit_activo.php?id=<?php echo (int)$activo['id'];?>" class="btn btn-info btn-xs"  title="Editar" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                     <a href="delete_activo.php?id=<?php echo (int)$activo['id'];?>" class="btn btn-danger btn-xs"  title="Eliminar" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-trash"></span>
                    </a>
                  </div>
                </td>
              </tr>
             <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php include_once('layouts/footer.php'); ?>
