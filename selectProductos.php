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
    </head>

<p>

</p>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comercio_db";
?>

<br>
<br>

<p style="display:none">categorias</p>

<form id='formularioPorCate' action="formularioDeCompra.php" method="post">
<SELECT name="cat" id="cate"  style="display:none">

<?php 

$conexion=mysql_connect("localhost",$username,"") or
die("Problemas en la conexion");
mysql_select_db($dbname,$conexion) or
die("Problemas en la selección de la base de datos");  
mysql_query ("SET NAMES 'utf8'");
$categorias=mysql_query("select distinct categoria from productos",$conexion) or
die("Problemas en el select:".mysql_error());
while($row = mysql_fetch_array($categorias))
{
echo'<OPTION VALUE="'.$row['categoria'].'">'.$row['categoria'].'</OPTION>';
}
?>
</SELECT>
<?php
$resultado =$_POST['categoria'];
?>
<p> seleccione el producto</p>
<select id='selectProductosPorCategorias'>
<?php

$productos=mysql_query("select nombre from productos where categoria='$resultado'",$conexion);

while($row2 = mysql_fetch_array($productos,MYSQL_ASSOC))
{
	
echo'<OPTION VALUE="'.$row2['nombre'].'">'.$row2['nombre'].'</OPTION>';

}
?>
</select>

<input type="submit" value="Comprar">

</form>

</html>