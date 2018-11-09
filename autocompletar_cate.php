

<?php

include("conexion.php");


if (isset($_POST['search'])){
    
    $response ="<ul><li>Empresa No Registrada</li></ul>";
   
  $q =$_POST['q'];
  
 // echo "QUE ES Q ".$q;
	$consulta="select nombre  from categoria where nombre  LIKE '%$q%' ";
          
  $ejecutar2=sqlsrv_query($conn,$consulta);
  
  $params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
$ejecutar = sqlsrv_query( $conn, $consulta , $params, $options );

$row_count = sqlsrv_num_rows( $ejecutar );

if ($row_count === false){
   
  
}
   
else{
   // echo $row_count;
  
       while ($fila=sqlsrv_fetch_array($ejecutar)) {
        $response ="<ul>";
        
      $nombrw=$fila['nombre'];
$response .="<li>";
      $response .=$nombrw;
    $response .="</li>";
   
  }
  $response .="</ul>";

}
   

  
 
  exit($response);
}
else{

}



?>