<?php
  $page_title = 'Agregar alquiler';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(3);

?>
<?php
 if(isset($_POST['add_alquiler'])){
   $req_fields = array('activo_id','DNI','usuario','negocio','detalle','estado_usu','estado_alq','date' );
   validate_fields($req_fields);
   if(empty($errors)){
    /* $a_activo_id = remove_junk($db->escape($_POST['activo_id']));*/
	 /*$a_activo_id=18;*/
     $a_DNI   = remove_junk($db->escape($_POST['DNI']));
     $a_usuario  = remove_junk($db->escape($_POST['usuario']));
     $a_negocio   = remove_junk($db->escape($_POST['negocio']));
     $a_detalle  = remove_junk($db->escape($_POST['detalle']));
     $a_estado_usu   = remove_junk($db->escape($_POST['estado_usu']));
     $a_estado_alq  = remove_junk($db->escape($_POST['estado_alq']));	
     $date  = $db->escape($_POST['date']);
	 $a_date= make_date();
	 
	 
   /*  if (is_null($_POST['product-photo']) || $_POST['product-photo'] === "") {
       $media_id = '0';
     } else {
       $media_id = remove_junk($db->escape($_POST['product-photo']));
     }*/
   /*  $date    = make_date();*/
     $query  = "INSERT INTO alquiler (";
     $query .=" product_id,DNI,usuario,negocio,detalle,estado_usu,estado_alq,date";
     $query .=") VALUES (";
     $query .=" '18', '{$a_DNI}', '{$a_usuario}', '{$a_negocio}', '{$a_detalle}','{$a_estado_usu}' ,'{$a_estado_alq}','{$a_date}'";
     $query .=")";
 
     if($db->query($query)){
       $session->msg('s',"Activo agregado exitosamente. ");
       redirect('add_alquiler.php', false);
     } else {
       $session->msg('d',' Lo siento, registro falló.');
       redirect('alquiler.php', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('add_alquiler.php',false);
   }

 }

?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
</div>
  <div class="row">
  <div class="col-md-9">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Agregar Activo Alquilado</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="post" action="add_alquiler.php" class="clearfix">
		  
		        <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="activo_id" placeholder="Activo" value="Computadora">
               </div>
              </div>
		  

		  
		  
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="detalle" placeholder="Características">
               </div>
              </div>
			  
			  


              <div class="form-group">
               <div class="row">
                 <div class="col-md-4">
                   <div class="input-group">
                     <span class="input-group-addon">
                      <i class="glyphicon glyphicon-list-alt"></i>
                     </span>
                     <input type="text" class="form-control" name="DNI" placeholder="DNI">
                  </div>
                 </div>
                 <div class="col-md-4">
                   <div class="input-group">
                     <span class="input-group-addon">
                       <i class="glyphicon glyphicon-user"></i>
                     </span>
                     <input type="text" class="form-control" name="usuario" placeholder="Usuario">
                    
                  </div>
                 </div>
				 
                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-tasks"></i>
                      </span>
                      <input type="text" class="form-control" name="negocio" placeholder="Negocio">
                      
                   </div>
                  </div>
				   </div>
				    </div>
				  
				  <div class="form-group">
				  <div class="row">
				 <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-object-align-vertical"></i>
                      </span>
                      <input type="text" class="form-control" name="estado_usu" placeholder="Estado Usuario" Value="Activo">
                      
                   </div>
                  </div>
				  
				  
		          <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-object-align-vertical"></i>
                      </span>
                      <input type="text" class="form-control" name="estado_alq" placeholder="Estado Alquiler" Value="Si">
                      
                   </div>
                  </div>
				  
				  
				 <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-calendar"></i>
                      </span>
                      
					  
			
                  <input type="date" class="form-control datepicker" name="date" data-date-format="yyyy-mm-dd" >
              
				
                      
                   </div>
                  </div>
				  
				  </div>
				  </div>
             
              <button type="submit" name="add_alquiler" class="btn btn-success">Agregar Alquiler</button>
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
