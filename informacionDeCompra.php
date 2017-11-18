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
    </head>
<body>




<form>
<a class="btn btn-primary" href="productos.php" role="button">Volver a la pagina principal</a>
</form>
</body>
</html>






<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comercio_db";

$conexion=mysql_connect("localhost",$username,"") or
die("Problemas en la conexion");
mysql_select_db($dbname,$conexion) or
die("Problemas en la selección de la base de datos");  
mysql_query ("SET NAMES 'utf8'");



$documento=$_POST['dni'];
echo '<br>';	
echo 'la cantidad comprada es '.'<br>'.' ';	
$cantidad=$_SESSION['cantidadComprada'];
echo ($cantidad);
echo '<br>';


if(isset($_POST['domEntrega']))
{
$domicilioEntrega=$_POST['domEntrega'];
//lo trae bien
echo 'se lo llevaremos al domicilio de entrega '.'<br>';
echo $domicilioEntrega;
}
$hoy=date("Y-m-d");
echo '<br>';
echo '<br>';


$productoComprado=$_SESSION['productoComprado'];

$codigoProducto=mysql_query("select codigo from productos where nombre='$productoComprado'",$conexion) or
die("Problemas en el select:".mysql_error());

$codigoFila = mysql_fetch_array($codigoProducto,MYSQL_ASSOC);

echo 'el codigo del producto comprado es '.$codigoFila['codigo'];

$codigo=$codigoFila['codigo'];

$existeComprador=mysql_query("select dni,nombre from comprador where dni='$documento'",$conexion) or
die("Problemas en el select:".mysql_error());
echo '<br>';


$filaComprador = mysql_fetch_array($existeComprador,MYSQL_ASSOC);

echo 'el comprador tiene dni: '.$filaComprador['dni'];
echo 'el comprador tiene nombre: '.$filaComprador['nombre'];

//esta variable me mantiene si la consulta me trajo algun resultado
$comproAlgunaVez=$filaComprador['dni'];

if (!$comproAlgunaVez)
{
echo 'es su primera compra';
$apellido=$_POST['ape'];
$nombre=$_POST['nom'];
$email=$_POST['email'];
$domicilio=$_POST['dom'];
?>

<div class="alert alert-info">  es su primera compra, esperamos su retorno  </div>

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
	<div class="alert alert-success">  Gracias por elegirnos una vez mas </div>
	<?php
}	
//hago la actualizacion del producto
mysql_query("update productos set cantidad=cantidad-'$cantidad'",$conexion) or
die("Problemas en el select:".mysql_error());
	
?>



