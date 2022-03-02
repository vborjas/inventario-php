<?php
  $page_title = 'Edit herramientas';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php
$herramienta = find_by_id('herramientas',(int)$_GET['id']);
if(!$herramienta){
  $session->msg("d","Missing product id.");
  redirect('herramientas.php');
}
?>
<?php $activo = find_by_id('activos',$herramienta['product_id']); ?>
<?php

  if(isset($_POST['update_herramienta'])){
    $req_fields = array('title','DNI','usuario','negocio','estado_usu','estado_entrega', 'date' );
    validate_fields($req_fields);
        if(empty($errors)){
          $p_id      = $db->escape((int)$activo['id']);
        /*  $s_qty     = $db->escape((int)$_POST['quantity']);*/
		 
		  $s_DNI   = $db->escape($_POST['DNI']);
          $s_usuario  = $db->escape($_POST['usuario']);
		  $s_negocio    = $db->escape($_POST['negocio']);
		  $s_detalle    = $db->escape($_POST['detalle']);
          $s_estado_usu  = $db->escape($_POST['estado_usu']);
		  $s_estado_entrega  = $db->escape($_POST['estado_entrega']);
		  $date      = $db->escape($_POST['date']);
          $s_date    = date("Y-m-d", strtotime($date));

          $sql  = "UPDATE herramientas SET";
          $sql .= " product_id= '{$p_id}',DNI='{$s_DNI}',usuario='{$s_usuario}',negocio='{$s_negocio}',detalle='{$s_detalle}',estado_usu='{$s_estado_usu}',estado_entrega='{$s_estado_entrega}',date='{$s_date}'";
          $sql .= " WHERE id ='{$herramienta['id']}'";
          $result = $db->query($sql);
          if( $result && $db->affected_rows() === 1){
                    update_product_qty($s_qty,$p_id);
                    $session->msg('s',"Registro Actualizado.");
                    redirect('edit_herramienta.php?id='.$herramienta['id'], false);
                  } else {
                    $session->msg('d',' Falló al Actualizar!');
                    redirect('herramientas.php', false);
                  }
        } else {
           $session->msg("d", $errors);
           redirect('edit_herramienta.php?id='.(int)$herramienta['id'],false);
        }
  }

?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
  </div>
</div>
<div class="row">

  <div class="col-md-12">
  <div class="panel">
    <div class="panel-heading clearfix">
      <strong>
        <span class="glyphicon glyphicon-th"></span>
        <span>Entregas de Equipo</span>
     </strong>
     <div class="pull-right">
       <a href="herramientas.php" class="btn btn-primary">Mostrar Entrega de Equipos</a>
     </div>
    </div>
    <div class="panel-body">
       <table class="table table-bordered">
         <thead>
          <th> Activo Informático </th>
          <th> DNI </th>
          <th> Usuario </th>
          <th> Negocio </th>
		  <th> Detalle </th>
          <th> Estado </th>
          <th> Retorno de Activo </th>		  
          <th> Fecha Entrega</th>
          <th> Action</th>
         </thead>
           <tbody  id="product_info">
              <tr>
              <form method="post" action="edit_herramienta.php?id=<?php echo (int)$herramienta['id']; ?>">
               
                <td id="s_name">
             <input type="text" class="form-control" id="sug_input" name="title" value="<?php echo remove_junk($activo['name']); ?>">
                  <div id="result" class="list-group"></div>
                </td>
				
                <td id="s_DNI">
                  <input type="text" class="form-control" name="DNI" value="<?php echo remove_junk($herramienta['DNI']); ?>" >
                </td>

                <td id="s_usuario">
                  <input type="text" class="form-control" name="usuario" value="<?php echo remove_junk($herramienta['usuario']); ?>" >
                </td>				
				
				<td id="s_negocio">
                <input type="text" class="form-control" name="negocio" value="<?php echo remove_junk($herramienta['negocio']); ?>" >
                </td>
				
				<td id="s_detalle">
                <input type="text" class="form-control" name="detalle" value="<?php echo remove_junk($herramienta['detalle']); ?>" >
                </td>
				
				<td id="s_estado_usu">
                <input type="text" class="form-control" name="estado_usu" value="<?php echo remove_junk($herramienta['estado_usu']); ?>" >
                </td>				
				
				<td id="s_estado_entrega">
                <input type="text" class="form-control" name="estado_entrega" value="<?php echo remove_junk($herramienta['estado_entrega']); ?>" >
                </td>
				
				<!--
				
                <td id="s_qty">
                  <input type="text" class="form-control" name="quantity" value="<?php /* echo (int)$sale['qty']; ?>">
                </td>
				
                <td id="s_price">
                  <input type="text" class="form-control" name="price" value="<?php echo remove_junk($product['sale_price']); ?>" >
                </td>
				
                <td>
                  <input type="text" class="form-control" name="total" value="<?php echo remove_junk($sale['price']); */ ?>">
                </td>
				
				-->
				
                <td id="s_date">
                  <input type="date" class="form-control datepicker" name="date" data-date-format="" value="<?php echo remove_junk($herramienta['date']); ?>">
                </td>
                <td>
                  <button type="submit" name="update_herramienta" class="btn btn-primary">Actualizar</button>
                </td>
              </form>
              </tr>
           </tbody>
       </table>

    </div>
  </div>
  </div>

</div>

<?php include_once('layouts/footer.php'); ?>
