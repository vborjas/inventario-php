<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(3);
?>
<?php
  $d_sale = find_by_id('alquiler',(int)$_GET['id']);
  if(!$d_sale){
    $session->msg("d","ID vacío.");
    redirect('alquiler.php');
  }
?>
<?php
  $delete_id = delete_by_id('alquiler',(int)$d_sale['id']);
  if($delete_id){
      $session->msg("s","Registro Eliminado.");
      redirect('alquiler.php');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('alquiler.php');
  }
?>
