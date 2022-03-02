<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $product = find_by_id('activos',(int)$_GET['id']);
  if(!$product){
    $session->msg("d","ID vacío");
    redirect('activo.php');
  }
?>
<?php
  $delete_id = delete_by_id('activos',(int)$product['id']);
  if($delete_id){
      $session->msg("s","Activo eliminado");
      redirect('activo.php');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('activo.php');
  }
?>
