<<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
	    <title>Por categorias</title>
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

echo $fila['descripcion'];

echo '<br>';

echo $fila['nombre'];

echo '<br>';

?>

<div class="col-md-18 ">
    
<?php    
echo '<img class="img-thumbnail" src="'.$fila['imagen'].'.jpg" />';

?>
<div class="h-30"></div>

</div>

</form>

</html>