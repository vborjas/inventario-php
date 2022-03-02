<?php
  $page_title = 'Agregar Alquiler';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php

  if(isset($_POST['add_alquiler'])){
   /* $req_fields = array('s_id','DNI','usuario','negocio','quantity','price','total', 'date' );*/
	$req_fields = array('s_id','DNI','usuario','negocio','quantity','date','estado_usu','estado_entrega' );
    validate_fields($req_fields);
        if(empty($errors)){
          $p_id      = $db->escape((int)$_POST['s_id']);
		  $s_DNI    = $db->escape($_POST['DNI']);
		  $s_usuario = $db->escape($_POST['usuario']);
		  $s_negocio  = $db->escape($_POST['negocio']);
		  $s_detalle  = $db->escape($_POST['detalle']);
           $s_qty     = $db->escape((int)$_POST['quantity']);
		  $s_estado_usu = $db->escape($_POST['estado_usu']);
		  $s_estado_alq  = $db->escape($_POST['estado_entrega']);
		  
		 /* $s_total   = $db->escape($_POST['total']);*/
          $date      = $db->escape($_POST['date']);
          $s_date    = make_date();

          $sql  = "INSERT INTO alquiler (";
          $sql .= " product_id,DNI,usuario,negocio,detalle,estado_usu,estado_alq,date";
		  
          $sql .= ") VALUES (";
          $sql .= "'{$p_id}','{$s_DNI}','{$s_usuario}','{$s_negocio}','{$s_detalle}','{$s_estado_usu}','{$s_estado_alq}','{$s_date}'";
          $sql .= ")";
 
 
                if($db->query($sql)){
                 update_product_qty($s_qty,$p_id);
                  $session->msg('s',"Activo Agregado ");
                  redirect('add_alquiler.php', false);
                } else {
                  $session->msg('d','Lo siento, registro falló.');
                  redirect('add_alquiler.php', false);
                }
        } else {
           $session->msg("d", $errors);
           redirect('add_alquiler.php',false);
        }
  }

?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
    <form method="POST" action="ajax.php" autocomplete="off" id="sug-form">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-primary">Búsqueda</button>
            </span>
            <input type="text" id="sug_input" class="form-control" name="title"  placeholder="Buscar activo">
		
         </div>
         <div id="result" class="list-group"></div>
        </div>
    </form>
  </div>
</div>
<div class="row">

  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Registro Alquiler de Equipos</span>
       </strong>
      </div>
      <div class="panel-body">
        <form method="post" action="add_alquiler.php">
         <table class="table table-bordered">
           <thead>
            <th> Activo </th>
            <th> DNI </th>
            <th> Usuario </th>
            <th> Negocio </th>
			<th> Detalle Activo</th>
			<th> Cantidad </th>
			<th> Estado </th>
			<th> Estado Alquiler </th>
            <th> Fch Alquiler</th>
            <th> Acciones</th>
           </thead>
		   
             <tbody  id="product_info"> </tbody>
			 
         </table>
       </form>
      </div>
    </div>
  </div>

</div>

<?php include_once('layouts/footer.php'); ?>
