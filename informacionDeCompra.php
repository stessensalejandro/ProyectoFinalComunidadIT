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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>

 
<body>


<h1> Gracias por tu Compra!!! </h1>

<form>
<a class="btn btn-primary" href="porCategoria.php" role="button">Volver a la pagina principal</a>

</form>

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
mysql_query("update productos set cantidad--",$conexion) or
die("Problemas en el select:".mysql_error());
?>


</body>


</html>



