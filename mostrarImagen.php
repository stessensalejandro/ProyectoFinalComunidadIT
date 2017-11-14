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
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comercio_db";

$conexion=mysql_connect("localhost",$username,"") or
die("Problemas en la conexion");
mysql_select_db($dbname,$conexion) or
die("Problemas en la selección de la base de datos");  
mysql_query ("SET NAMES 'utf8'");

?>

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
?>
<div class="col-md-18 ">

    
<?php    
echo '<img class="img-thumbnail" src="'.$fila['imagen'].'.jpg" />';
?>
<div class="h-30"></div>
</div>
</div>


</html>