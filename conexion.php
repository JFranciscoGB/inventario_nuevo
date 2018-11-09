<?php
$serverName='DESKTOP-TPGBHUB\SQLEXPRESS';
$infoConex= array("Database"=>"inventario_v1","UID"=>"sa","PWD"=>"inventario$1","CharacterSet"=>"UTF-8");
$conn = sqlsrv_connect($serverName,$infoConex);



if ($conn) {

//echo"CONEXION EXITOSA";
}
else {
echo "FALLO";
 die( print_r( sqlsrv_errors(), true));
}
 ?>
