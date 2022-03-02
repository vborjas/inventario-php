<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(3);
?>
<?php
  $d_herramienta = find_by_id('herramientas',(int)$_GET['id']);
  if(!$d_herramienta){
    $session->msg("d","ID vacío.");
    redirect('herramientas.php');
  }
?>
<?php
  $delete_id = delete_by_id('herramientas',(int)$d_herramienta['id']);
  if($delete_id){
      $session->msg("s","Registro Eliminado.");
      redirect('herramientas.php');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('herramientas.php');
  }
?>
