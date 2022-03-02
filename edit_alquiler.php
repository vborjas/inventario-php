<?php
  $page_title = 'Editar alquiler';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php
$alquiler = find_by_id('alquiler',(int)$_GET['id']);

if(!$alquiler){
  $session->msg("d","Missing product id.");
  redirect('alquiler.php');
}
?>
<?php $activos = find_by_id('activos',$alquiler['product_id']); ?>
<?php

  if(isset($_POST['edit_alquiler'])){
    $req_fields = array('title','DNI','usuario','negocio','estado_usu','estado_alq', 'date' );
    validate_fields($req_fields);
        if(empty($errors)){
          $p_id      = $db->escape((int)$product['id']);
        /*  $s_qty     = $db->escape((int)$_POST['quantity']);*/
		 
		  $s_DNI   = $db->escape($_POST['DNI']);
          $s_usuario  = $db->escape($_POST['usuario']);
		  $s_negocio    = $db->escape($_POST['negocio']);
		  $s_detalle    = $db->escape($_POST['detalle']);
          $s_estado_usu  = $db->escape($_POST['estado_usu']);
		  $s_estado_alq  = $db->escape($_POST['estado_alq']);
		  $date      = $db->escape($_POST['date']);
          $s_date    = date("Y-m-d", strtotime($date));

          $sql  = "UPDATE alquiler SET";
          $sql .= " product_id='{$p_id}',DNI='{$s_DNI}',usuario='{$s_usuario}',negocio='{$s_negocio}',detalle='{$s_detalle}',estado_usu='{$s_estado_usu}',estado_alq='{$s_estado_alq}',date='{$s_date}'";
          $sql .= " WHERE id ='{$alquiler['id']}'";
          $result = $db->query($sql);
          if( $result && $db->affected_rows() === 1){
                    update_product_qty($s_qty,$p_id);
                    $session->msg('s',"Registro Actualizado.");
                    redirect('edit_alquiler.php?id='.$alquiler['id'], false);
                  } else {
                    $session->msg('d',' Falló al Actualizar!');
                    redirect('alquiler.php', false);
                  }
        } else {
           $session->msg("d", $errors);
           redirect('edit_alquiler.php?id='.(int)$alquiler['id'],false);
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
        <span>Alquiler de Equipo</span>
     </strong>
     <div class="pull-right">
       <a href="alquiler.php" class="btn btn-primary">Mostrar Alquiler de Equipos</a>
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
          <th> Estado de Alquiler </th>		  
          <th> Fecha Alquiler</th>
          <th> Action</th>
         </thead>
           <tbody  id="product_info">
              <tr>
              <form method="post" action="edit_alquiler.php?id=<?php echo (int)$alquiler['id']; ?>">
                <td id="s_name">
                  <input type="text" class="form-control" id="sug_input" name="title" value="<?php echo remove_junk($activos['name']); ?>">
                  <div id="result" class="list-group"></div>
                </td>
				
                <td id="s_DNI">
                  <input type="text" class="form-control" name="DNI" value="<?php echo remove_junk($alquiler['DNI']); ?>" >
                </td>

                <td id="s_usuario">
                  <input type="text" class="form-control" name="usuario" value="<?php echo remove_junk($alquiler['usuario']); ?>" >
                </td>				
				
				<td id="s_negocio">
                <input type="text" class="form-control" name="negocio" value="<?php echo remove_junk($alquiler['negocio']); ?>" >
                </td>
				
				<td id="s_detalle">
                <input type="text" class="form-control" name="detalle" value="<?php echo remove_junk($alquiler['detalle']); ?>" >
                </td>
				
				<td id="s_estado_usu">
                <input type="text" class="form-control" name="estado_usu" value="<?php echo remove_junk($alquiler['estado_usu']); ?>" >
                </td>				
				
				<td id="s_estado_alq">
                <input type="text" class="form-control" name="estado_alq" value="<?php echo remove_junk($alquiler['estado_alq']); ?>" >
                </td>
				
				<!--
				
                <td id="s_qty">
                  <input type="text" class="form-control" name="quantity" value="<?php /* echo (int)$alquiler['qty']; ?>">
                </td>
				
                <td id="s_price">
                  <input type="text" class="form-control" name="price" value="<?php echo remove_junk($product['alquiler_price']); ?>" >
                </td>
				
                <td>
                  <input type="text" class="form-control" name="total" value="<?php echo remove_junk($alquiler['price']); */ ?>">
                </td>
				
				-->
				
                <td id="s_date">
                  <input type="date" class="form-control datepicker" name="date" data-date-format="" value="<?php echo remove_junk($alquiler['date']); ?>">
                </td>
                <td>
                  <button type="submit" name="edit_alquiler" class="btn btn-primary">Actualizar</button>
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
