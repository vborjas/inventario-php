<?php
$page_title = 'Reporte de ventas';
$results = '';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php
  if(isset($_POST['submit'])){
  /*  $req_dates = array('start-date','end-date');*/
	$req_usuario = array('usuario');
   /* validate_fields($req_dates);*/
   
   validate_fields($req_usuario);

    if(empty($errors)):
    /*  $start_date   = remove_junk($db->escape($_POST['start-date']));
      $end_date     = remove_junk($db->escape($_POST['end-date']));
	  	  
     $results      = find_herramienta_by_dates($start_date,$end_date); */
	 
	  $usuario      = remove_junk($db->escape($_POST['usuario']));
	  $results      =encontrar_activos_por_usuario($usuario);
	  $obtDataUsu       =obtener_dataUsu($usuario);
    else:
      $session->msg("d", $errors);
      redirect('herramientas_report.php', false);
    endif;

  } else {
    $session->msg("d", "Ingresa Usuario");
    redirect('herramientas_report.php', false);
  }
?>
<!doctype html>
<html lang="en-US">
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <title>Reporte de ventas</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
   <style>
   @media print {
     html,body{
        font-size: 9.5pt;
        margin: 0;
        padding: 0;
     }.page-break {
       page-break-before:always;
       width: auto;
       margin: auto;
      }
    }
    .page-break{
      width: 980px;
      margin: 0 auto;
    }
     .herramienta-head{
       margin: 40px 0;
       text-align: center;
     }.herramienta-head h1,.herramienta-head strong{
       padding: 10px 20px;
       display: block;
     }.herramienta-head h1{
       margin: 0;
       border-bottom: 1px solid #212121;
     }.table>thead:first-child>tr:first-child>th{
       border-top: 1px solid #000;
      }
      table thead tr th {
       text-align: center;
       border: 1px solid #ededed;
     }table tbody tr td{
       vertical-align: middle;
     }.herramienta-head,table.table thead tr th,table tbody tr td,table tfoot tr td{
       border: 1px solid #212121;
       white-space: nowrap;
     }.herramienta-head h1,table thead tr th,table tfoot tr td{
       background-color: #f8f8f8;
     }tfoot{
       color:#000;
       text-transform: uppercase;
       font-weight: 500;
     }
   </style>
</head>
<body>





  
  <?php if($results): ?>
    <div class="page-break">
       <div class="herramienta-head pull-right">
           <h1>Entrega de Herramientas 3C</h1>
           <!--<strong><?php if(isset($start_date)){ echo $start_date;}?> Usuario: <?php if(isset($usuario)){echo $usuario;}?> </strong>-->
		   
		 
		 
		 <?php foreach($obtDataUsu as $obtDataUsuario): ?>
     
     <tr>
		 <tr>
		
		
		   <?php $dataDNI= remove_junk($obtDataUsuario['DNI']);?>
		   <?php $datanegocio= remove_junk($obtDataUsuario['negocio']);?>
		   
		  <strong> Usuario: <?php if(isset($usuario)){echo $usuario;}?>  - DNI:<?php if(isset($obtDataUsuario)){echo $dataDNI;}?> - Negocio:<?php if(isset($obtDataUsuario)){echo $datanegocio;}?></strong>
		 
		 </tr>

        <?php endforeach; ?>
		
	
		 
       </div>





      <table class="table table-border">
        <thead>
          <tr>
              <th>Fecha de Entrega</th>
              <th>Activo Informático</th>
              <th>Detalle de Activo</th>
            
          </tr>
        </thead>
        <tbody>
		
          <?php foreach($results as $result): ?>
           <tr>
              <td class=""><?php echo remove_junk($result['date']);?></td>
              <td class="desc">
                <h6><?php echo remove_junk(ucfirst($result['name']));?></h6>
              </td>
              <td class="text-center"><?php echo remove_junk($result['detalle']);?></td>
              
             
              
          </tr>
        <?php endforeach; ?>
		

		
		
		
		
		
        </tbody>
        <tfoot>
         <tr class="text-center">
           <td colspan="4">Las herramientas de trabajo, son revisadas y entregadas en correcto funcionamiento.</td>
             
			

        
          <!-- <td colspan="4">área de Sistemas 3C</td>-->
           
           
         </tr>
        </tfoot>
      </table>
    </div>
  <?php
    else:
        $session->msg("d", "No se encontraron activos. ");
        redirect('herramientas_report.php', false);
     endif;
  ?>
  
  
  
  
  
  
  
  


  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
</body>
</html>
<?php if(isset($db)) { $db->db_disconnect(); } ?>
