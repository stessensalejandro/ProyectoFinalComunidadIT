<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
	<style>
	#desc,#nom{/*Bordes redondeados*/
	-webkit-border-radius:10px;/*Para chrome y Safari*/
	-moz-border-radius:10px;/*Para Firefox*/
	-o-border-radius:10px;/*Para Opera*/
	border-radius:10px;/*El estandar por defecto*/
	background-image: -webkit-gradient(linear, left top, left bottom, from(#FFF), to(#CCC));/*Para chrome y Safari*/
	/*Degradados*/
	background-image: -moz-linear-gradient(top center, #FFF, #CCC);/*Para Firefox*/
	overflow:hidden;
	width:30%;
	align:center;}
	</style>
        <meta charset="UTF-8">
	    <title>Imagen del Producto</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
    </head>


<?php
include 'conexion.php';
session_start();
?>
<form class="form-inline" id='formularioAgregar'>
<br>
<br>

<?php

//capturo lo que me trae el ajax
$producto=$_POST['imagen'];


$imagen=mysql_query("select * from productos where nombre='$producto'",$conexion) or
die("Problemas en el select:".mysql_error());

echo '<br>';

$fila=mysql_fetch_array($imagen);
?>

<?php
echo '<br>';
?>



<?php
echo '<br>';

?>

<div class="row">
<h2 id="desc"> <?php echo $fila['descripcion']; ?> </h2>
<h2 id="nom"> <?php echo $fila['nombre']; ?> </h2>    
<?php    
echo '<img class="img-thumbnail" src="'.$fila['imagen'].'.jpg" />';

?>
</div>

</form>





<form action="productos.php" method="post">
<!--<input type="text" id="pSeleccionado" value=<?php //echo $producto?> >
<input type="submit" value="agregar a carrito"> -->




</form>

<?php


//echo 'la cantidad comprada es: '.$_SESSION['cantidadComprada'];



$codigos = fopen("codigos.txt", "a") or die("Unable to open file!");
$filaProducto=mysql_query("select * from productos where nombre='$producto'",$conexion) or
die("Problemas en el select:".mysql_error());$producto."\n";
$fila=mysql_fetch_array($filaProducto);

$txt=$fila['codigo'];
//echo 'lo que quiero insertar en el archivo es: '.$txt;
fwrite($codigos, $txt.PHP_EOL, FILE_APPEND);

?>


</html>