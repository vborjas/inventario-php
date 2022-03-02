<?php
  $page_title = 'Admin página de inicio';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php
 $c_categorie     = count_by_id('categories');
 $c_product       = count_by_id('activos');
 $c_sale          = count_by_id('herramientas');
 $c_user          = count_by_id('users');
 
 $products_sold   = find_higest_saleing_product('10');
 $recent_products = find_recent_product_added('5');
 $recent_sales    = find_recent_sale_added('7');
 
 
 
 $c_pcsentregadas  =contar_pcsentregadas("herramientas");
 $c_pcalquiladas   =contar_pcsalquiladas("alquiler");
 $c_faltarecojo    =contar_faltarecojo("herramientas");
 $c_pcstock        =contar_pcstock("activos");
 
 
 $lisnegocios         = agrupar_negocio("herramientas");
 $usu_alquilan        = usuarios_alquilanpc("alquiler");
 $recogo_pcs          = pc_recoger("herramientas");
 $stockherramientas   =encontrar_stock();
?>
<?php include_once('layouts/header.php'); ?>

<div class="row">
   <div class="col-md-6">
     <?php echo display_msg($msg); ?>
   </div>
</div>
  <div class="row">
  
  
    

	
	
	<div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-green">
          <i class="glyphicon glyphicon-copy"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_pcsentregadas['total']; ?> </h2>
          <p class="text-muted">PC's Entregadas</p>
        </div>
       </div>
    </div>
	
	
	    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-blue">
          <i class="glyphicon glyphicon-object-align-bottom"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_pcalquiladas['total']; ?> </h2>
          <p class="text-muted">PC's Alquiladas</p>
        </div>
       </div>
    </div>
	
	
	
	
	
	
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-red">
          <i class="glyphicon glyphicon-log-in"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_faltarecojo['total']; ?> </h2>
          <p class="text-muted">Recoger PC</p>
        </div>
       </div>
    </div>

	
	
	
	
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-yellow">
          <i class="glyphicon glyphicon-blackboard"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_pcstock ['total']; ?></h2>
          <p class="text-muted">Stock PC's</p>
        </div>
       </div>
    </div>
</div>

  <div class="row">
  
  
  <!--
  
   <div class="col-md-4">
     <div class="panel panel-default">
       <div class="panel-heading">
         <strong>
           <span class="glyphicon glyphicon-th"></span>
           <span>Entregas con frecuencia</span>
         </strong>
       </div>
       <div class="panel-body">
         <table class="table table-striped table-bordered table-condensed">
          <thead>
           <tr>
             <th>Título</th>
             <th>Total vendido</th>
             <th>Cantidad total</th>
           <tr>
          </thead>
          <tbody>
            <?php /* foreach ($products_sold as  $product_sold): ?>
              <tr>
                <td><?php echo remove_junk(first_character($product_sold['name'])); ?></td>
                <td><?php echo (int)$product_sold['totalSold']; ?></td>
                <td><?php echo (int)$product_sold['totalQty']; ?></td>
              </tr>
            <?php endforeach; */ ?>
          <tbody>
         </table>
       </div>
     </div>
   </div>   -->
   
   
   
   
   
   
   
   <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>PC 3C ENTREGADAS</span>
          </strong>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-bordered table-condensed">
       <thead>
         <tr>
           <th class="text-center" style="width: 50px;">#</th>
           <th>Negocio</th>
           
           <th>Cantidad</th>
         </tr>
       </thead>
       <tbody>
         <?php foreach ($lisnegocios as  $lisnegocio): ?>
         <tr>
           <td class="text-center"><?php echo count_id();?></td>
           <td>
          
             <?php echo remove_junk(first_character($lisnegocio['negocio'])); ?>
           </a>
           </td>
          <?php /*echo remove_junk(ucfirst($recent_sale['date']));*/ ?></td>
           <td><?php echo remove_junk(first_character($lisnegocio['count(id)'])); ?></td>
        </tr>

       <?php endforeach; ?>
       </tbody>
     </table>
    </div>
   </div>
  </div>
  
  
  <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>USUARIOS QUE ALQUILAN PC</span>
          </strong>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-bordered table-condensed">
       <thead>
         <tr>
          
           <th>Usuario</th>
           
           <th>Negocio</th>
         </tr>
       </thead>
       <tbody>
         <?php foreach ($usu_alquilan as  $usuarios_alquilan): ?>
         <tr>
           
           <td>
          
             <?php echo remove_junk(first_character($usuarios_alquilan['usuario'])); ?>
           </a>
           </td>
          <?php /*echo remove_junk(ucfirst($recent_sale['date']));*/ ?></td>
           <td><?php echo remove_junk(first_character($usuarios_alquilan['negocio'])); ?></td>
        </tr>

       <?php endforeach; ?>
       </tbody>
     </table>
    </div>
   </div>
  </div>
  
  
  
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>RECOGER EQUIPO</span>
          </strong>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-bordered table-condensed">
       <thead>
         <tr>
          
           <th>Usuario</th>
           
           <th>Estado</th>
         </tr>
       </thead>
       <tbody>
         <?php foreach ($recogo_pcs  as  $recogo_pc ): ?>
         <tr>
           
           <td>
          
             <?php echo remove_junk(first_character($recogo_pc['usuario'])); ?>
           </a>
           </td>
          <?php /*echo remove_junk(ucfirst($recent_sale['date']));*/ ?></td>
           <td><?php echo remove_junk(first_character($recogo_pc['estado_usu'])); ?></td>
        </tr>

       <?php endforeach; ?>
       </tbody>
     </table>
    </div>
   </div>
  </div>
  
  
  
  
  
  
  
  
  <div class="col-md-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Stock de Herramientas </span>
        </strong>
      </div>
      <div class="panel-body">

        <div class="list-group">
      <?php foreach ($stockherramientas as $stockherramienta): ?>
            <a class="list-group-item clearfix" href="edit_product.php?id=<?php echo    (int)$stockherramienta['id'];?>">
                <h4 class="list-group-item-heading">
                 <?php if($stockherramienta['media_id'] === '0'): ?>
                    <img class="img-avatar img-circle" src="uploads/products/no_image.jpg" alt="">
                  <?php else: ?>
                  <img class="img-avatar img-circle" src="uploads/products/<?php echo $stockherramienta['image'];?>" alt="" />
                <?php endif;?>
                <?php echo remove_junk(first_character($stockherramienta['name']));?>
                  <span class="label label-warning pull-right">
				  
				  
                  <?php  echo (int)$stockherramienta['stock']; ?>
				 
				 
                  </span>
                </h4>
                <span class="list-group-item-text pull-right">
                <?php echo remove_junk(first_character($stockherramienta['categorie'])); ?>
              </span>
          </a>
      <?php endforeach; ?>
    </div>
  </div>
 </div>
</div>
 </div>
 
 
     
 
 
 
  <div class="row">

  </div>



<?php include_once('layouts/footer.php'); ?>
