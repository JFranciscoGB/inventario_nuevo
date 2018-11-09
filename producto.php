
<?php
include("conexion.php");
include("header.html");
include('session.php');
?>



<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="js/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/estilo_categoria.css">
</head>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/init.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>

  <script src="js/materialize.js"></script>

 
  <script type="text/javascript">
		$(document).ready(function () {
			$("#tag").keyup(function(){
      var query =	 $("#tag").val();
       if(query.length>0)	{
        	$.ajax({
url:'autocompletar.php',
method:'POST',
data:{
search:1,
q: query
},
success: function (data){
$('#response').html(data);		
},
dataType :'text'
          }
          );
           }
            else if(query.length==0){
             $('#response').html("");
           }
			});
      $(document).on('click','li',function(){
        var cli = $(this).text();
         $("#tag").val(cli);
         $("#response").html("");
      });
		});
    //esto es un link
    //https://www.youtube.com/watch?v=D3Ieioouzbo
	</script>

<script type="text/javascript">
		$(document).ready(function () {
			$("#cate").keyup(function(){
      var query =	 $("#cate").val();
       if(query.length>0)	{
        	$.ajax({
url:'autocompletar_cate.php',
method:'POST',
data:{
search:1,
q: query
},
success: function (data){
$('#response_cate').html(data);		
},
dataType :'text'
          }
          );
           }
            else if(query.length==0){
             $('#response_cate').html("");
           }
			});
      $(document).on('click','li',function(){
        var cli = $(this).text();
         $("#tagca").val(cli);
         $("#response").html("");
      });
		});
    //esto es un link
    //https://www.youtube.com/watch?v=D3Ieioouzbo
	</script>


<body>
  <!--
<div class="container">
<div class="section">

       Icon Section   -->
<div class="row">
<div class="col l3 s12">
  </div>
<div class="col l6 s12">
<h4 class="center"> Reporte Soporte Tecnico</h4>
  </div>
<div class="col l2 s12">
<?php
echo "<div class='center'> ".$login_session_nom."</div>";
?>
</div>
</div>     
		<!--  <div id="altura_blanco"></div>
		  1 fila   -->
				<div class="row">
				<form method="POST" action="producto.php"class="col l12 s12">
        <div class="input-field col l4 s12">
				<i class="material-icons prefix">person_add</i>
				 <input id="tag" type="text" name="cliente" class="validate">
				<label  for="icon_prefix">Cliente</label>
        <div id="response">
        </div>
        </div>
  

				<div class="input-field col l4 s12">
				<i class="material-icons prefix">note_add</i>
				<select name="categoria" id="categoria" >
					<option value="" disabled selected >Categoria</option>
					<?php
            global $temp;
						$consulta="select * from categoria";
						$ejecutar=sqlsrv_query($conn,$consulta);
							$i=0;
						while ($fila=sqlsrv_fetch_array($ejecutar)) {
          //  $temp="";
            $seri=$fila['id'];
					$nombr=$fila['nombre'];
							$i++;
              $temp=$seri;
            	echo '<option value='.$seri.'>'.$nombr.'</option>';
							?>
		    <?php
      }
        ?>
					</select>
				</div>
				

        
        


   
   

      			<!--   2 fila   -->
			     
      

				<div class="input-field col l4 s12">
				<i class="material-icons prefix">branding_watermark</i>
				<select name="marca" id="marca">
					<option value="" disabled selected >Marca</option>		
				
         <option value="AMD" >AMD</option>
          <option value="APC" >APC</option>
          <option value="BTICINO" >BTICINO</option>
					<option value="CANON" >CANON</option>
          <option value="DELL" >DELL</option>
          <option value="EPSON" >EPSON</option>
          <option value="HP" >HP</option>
          <option value="IBM" >IBM</option>
          <option value="INTEL" >INTEL</option>
          <option value="LENOVO" >LENOVO</option>
          <option value="MICROSOFT" >MICROSOFT</option>
          <option value="OLG" >OLG</option>
          <option value="SAMSUNG" >SAMSUNG</option>
          <option value="TOSHIBA" >TOSHIBA</option>
				
			
				</select>
				</div>

    <div class="input-field col l4 s12">
          <i class="material-icons prefix">code</i>
          <input id="icon_prefix" type="text" name="serie" class="validate">
          <label for="icon_prefix">Serie</label>
        </div>

				<div class="input-field col l4 s12">
					<i class="material-icons prefix">library_add</i>
					<input id="icon_telephone" type="tel" name="modelo" class="validate">
					<label for="icon_telephone">Modelo</label>
				</div>


         <div class="input-field col l4 s12">
        <i class="material-icons prefix">library_add</i>
        <input id="icon_prefix" type="text" name="observacion" class="validate">
         <label for="icon_prefix">Reporte</label>
         </div>
				</div>
				<!--   3 fila   -->
				
				<!--   4 fila   -->
	
        <!--   5 fila   -->
        <div class="row">
        </div>
        <div class="center" >
          <input type="submit" name="insert" value="INSERTAR DATOS" class="btn">
        </div>
        <div id="altura_blanco"></div>
				</form>

<?php
if(isset($_POST['insert'])){
	
$categoria=$_POST['categoria'];
$cliente=$_POST['cliente'];
$serie=$_POST['serie'];
$marca=$_POST['marca'];
$modelo=$_POST['modelo'];
$observacion=$_POST['observacion'];
$ingreso=$_POST['ingreso'];
date_default_timezone_set('America/Lima');
//echo date('l jS \of F Y h:i:s A');
$fecha_entrada= date("Y-m-d H:i:s");
$fechota = (string)$fecha_entrada;
//echo "FECHA ".$hoy;
//echo "PROBANDO VARIABLES ".$categoria." -".$cliente;
$fecha_salida="Sin Salida";
	echo"</br>";echo"</br>";
	//echo" CAMBIANDO A NO  VER RESULTADOS";echo"</br>";
	//echo "IP ".$ip;echo"</br>";
	//echo "CAPACIDAD ".$capacidad;echo"</br>";
	//echo "UBICACION ".$ubicacion;echo"</br>";
	//echo "ANEXO".$anexo;echo"</br>";
  $cat= (int) $categoria;
  $insertar="INSERT INTO equipo_o(serie,marca,modelo,observacion,fecha_ingreso,fecha_salida,id_categoria,cliente_ruc)
   VALUES ('$serie','$marca','$modelo','$observacion','$fechota','$fecha_salida',$cat,'$cliente')";

  $ejecutar=sqlsrv_query($conn,$insertar);
	if($ejecutar){
//echo "<h3>INSERTADO CORRECTAMENTE</h3>";
	}
	else {
echo "<h4>NO INSERTADO ERRORRRRRR</h4>";
if( ($errors = sqlsrv_errors() ) != null) {
        foreach( $errors as $error ) {
            echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
            echo "code: ".$error[ 'code']."<br />";
            echo "message: ".$error[ 'message']."<br />";
        }
    }
	}


}
else{
 //echo "<h3>SIN ACCION</h3>";
}
 ?>



				 <table class="responsive-table">
        <thead>
          <tr>
		  <th>Cliente </th>
              <th>Categoria</th>
              <th>Serie</th>
			        <th>Marca</th>
							<th>Modelo</th>
              <th>Observacion</th>
		          
              <th>Fecha Entrada</th>
              <th>Editar</th>
              <th>Eliminar</th>
          </tr>
        </thead>

        <tbody>
          <?php
          $consulta="select equipo_o.serie,equipo_o.marca,equipo_o.modelo,equipo_o.observacion,
					equipo_o.fecha_ingreso,equipo_o.cliente_ruc,categoria.nombre ,cliente.razon_social
					from equipo_o  INNER JOIN categoria on equipo_o.id_categoria=categoria.id
					INNER JOIN cliente ON equipo_o.cliente_ruc=cliente.ruc";
          $ejecutar=sqlsrv_query($conn,$consulta);
          $i=0;
          while ($fila=sqlsrv_fetch_array($ejecutar)) {
            // code...
           $seri=$fila['serie'];
		   $categoria=$fila['nombre'];
           $cliente=$fila['razon_social'];
           $marca=$fila['marca'];
           $modelo=$fila['modelo'];
           $observacion=$fila['observacion'];
           $fecha_entrada=$fila['fecha_ingreso'];
           $i++;

           ?>

          <!---cuerpo de tabla --->
          <tr>
           <td><?php echo $cliente ?></td>
		   <td><?php echo $categoria ?></td>
            <td><?php echo $seri?></td>
            <td><?php echo $marca?></td>
            <td><?php echo $modelo ?></td>
            <td><?php echo $observacion?></td>
            <td><?php echo $fecha_entrada?></td>
            <td><a href="producto.php?editar=<?php echo $seri?>">Editar</a></td>
            <td><a href="producto.php?borrar=<?php echo $seri?>">Borrar</a></td>

          </tr>
          <!---final del cuerpo de tabla--->

          </tbody>
          <?php } ?>
          </table>





          <?php
           if(isset($_GET['editar'])){
          echo '<div id="altura_blanco"></div>';
            include("editar_producto.php");
          }
          ?>

          <?php
          if(isset($_GET['borrar'])){
          $borrar_id=$_GET['borrar'];
          $consulta="DELETE from equipo_o where serie='$borrar_id'";
          $ejecutar=sqlsrv_query($conn,$consulta);

          if($ejecutar){
            echo "<script>alert('Registro Eliminado')</script>";
            echo "<script>window.open('producto.php','_self')</script>";
              }

            }
          ?>


       <div id="altura_blanco"></div> <div id="altura_blanco"></div>
                  

          <?php
          include("footer.html");
           ?>

  <!--  Scripts-->

 <script>
  $(document).ready(function() {
    $('select').material_select();
  });
  </script>
  </body>
</html>