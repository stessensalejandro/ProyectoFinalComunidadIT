<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
	    <title>Compra Hecha</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
	body {
  background-image: url("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJ4yyydEmOH5UuepbEBugfU820FeVUUVj1oD6nqS5ra71qoOCmkw");
		}
	#botonVolver{
	text-decoration: none;
    padding: 10px;
    font-weight: 600;
    font-size: 20px;
    color: #ffffff;
    background-color: #1883ba;
    border-radius: 6px;
    border: 2px solid #0016b0;
  }
    #botonVolver:hover{
    color: #1883ba;
    background-color: #ffffff;}
    label
	{color: #ffffff;}	
	.table
	{color: #ffffff;}
	#detalleCompra{
	
    	color: #black;
		font-size:40px;
		padding: 10px;
		
	}
	</style>
	</head>
<body>





</body>
</html>

<?php
require ('conexion.php');
session_start();

$documento=$_POST['dni'];
$cantidad=$_SESSION['cantidadComprada'];
$domicilioEntrega=$_POST['domEntrega'];
$hoy=date("Y-m-d");
$productoComprado=$_SESSION['productoComprado'];
$codigoProducto=mysql_query("select * from productos where nombre='$productoComprado'",$conexion) or
die("Problemas en el select:".mysql_error());

$compras=mysql_query("select * from compras order by numeroCompra asc limit 1",$conexion) or
die("Problemas en el select:".mysql_error());
$numeroCompra = mysql_fetch_array($compras,MYSQL_ASSOC);


$codigoFila = mysql_fetch_array($codigoProducto,MYSQL_ASSOC);




?>
<div class="alert alert-info">
<table class="table" id="detalleCompra">
<thead class="thead-inverse">
<tr>

<th>
Codigo del Producto
</th>
<th>
Nombre del Producto
</th>
<th>
Cantidad del Producto
</th>
<th>
Precio del Producto
</th>
<th>
Total
</th>
<thead>
</tr>
 <tr class="active">

 <td class="success">
<?php echo $codigoFila['codigo'].'<br>'; ?> 
</td>
<td class="success">
<?php echo $codigoFila['nombre'].'<br>'; ?>
</td>
 <td class="success">
<?php echo $cantidad.'<br>'; ?>
 </td>
  <td class="success">
<?php echo '$'.$codigoFila['precio'].'<br>'; ?>
 </td>
 <td class="success"> 
 <?php echo '$'.$codigoFila['precio']*$cantidad.'<br>'; ?>
 </td>
 </tr>
 
</table>
</div>
<?php
$codigo=$codigoFila['codigo'];
$existeComprador=mysql_query("select * from comprador where dni='$documento'",$conexion) or
die("Problemas en el select:".mysql_error());
echo '<br>';
$filaComprador = mysql_fetch_array($existeComprador,MYSQL_ASSOC);
?>
<?php
//esta variable me mantiene si la consulta me trajo algun resultado
$comproAlgunaVez=$filaComprador['dni'];

if (!$comproAlgunaVez)
{
$apellido=$_POST['ape'];
$nombre=$_POST['nom'];
$email=$_POST['email'];
$domicilio=$_POST['dom'];
?>

<div class="alert alert-info"> <h1>  Es su primera compra, esperamos su retorno </h1> </div>

<?php
mysql_query("insert into comprador (`apellido`,`nombre`, `dni`, `email`, `domicilio`) VALUES('$apellido','$nombre','$documento','$email','$domicilio')",$conexion) or
die("Problemas en el insert comprador:.'<br>'".mysql_error());

echo '<br>';
//registro la compra
mysql_query("INSERT INTO `compras`(`numeroCompra`,`fecha`, `codigo`, `dni`, `cantidad`, `domicilioCompra`) VALUES(0,'$hoy','$codigo','$documento','$cantidad','$domicilioEntrega')",$conexion) or
die("Problemas en el insert compras:".mysql_error());
echo "Se ha registrado su compra correctamente";
echo '<br>';
}
else//si ya fue cliente
{
	?>
	<div class="alert alert-success"> <h1>  Gracias por elegirnos una vez mas </h1> </div>
	<?php
}	
//hago la actualizacion del producto
mysql_query("update productos set cantidad=cantidad-'$cantidad'",$conexion) or
die("Problemas en el select:".mysql_error());
?>	
	

<form action="generarFactura.php" method="post" target="_blank">
<button type="submit" target="_blank" value="obtener Factura"><img title="Pulse aquí para obtener su Ticket de compra" src="https://cdn4.iconfinder.com/data/icons/meBaze-Freebies/512/download.png" class="img-responsive"  width="120" height="236" alt="Ticket de Compra"> </button>

<input type="hidden" name="cantidadProducto" id="cantidadProducto" value=<?php echo $cantidad?> >
<input type="hidden" name="descripcionProducto" id="descripcionProducto" value=<?php echo $codigoFila['nombre']?> >
<input type="hidden" name="precioProducto" id="precioProducto" value=<?php echo $codigoFila['precio']?> >

<input type="hidden" name="dniCliente" id="dniCliente" value=<?php echo $documento?> >

</form>    
<br>
<a class="btn btn-primary" id="botonVolver" href="productos.php" role="button" title="Pulse aquí para volver a la página principal">Volver a Comprar</a>	
</html>	



	
	




