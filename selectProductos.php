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
die("Problemas en la selecci�n de la base de datos");  
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
<select id='selectProductosPorCategorias' name='selectProductosPorCategorias'>
<?php

$productos=mysql_query("select nombre from productos where categoria='$resultado'",$conexion);

while($row2 = mysql_fetch_array($productos,MYSQL_ASSOC))
{
	
echo'<OPTION VALUE="'.$row2['nombre'].'">'.$row2['nombre'].'</OPTION>';

}

//$precio=mysql_query("select precio from productos where nombre='$productoSeleccionado'",$conexion);

?>
</select>


<div class="form-group">
  <label for="sel1">Elija una cantidad del producto:</label>
  <select class="form-control" id="cantidadSeleccionada" name="cantidadSeleccionada">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
	<option>5</option>
    <option>6</option>
    <option>7</option>
    <option>8</option>
	<option>9</option>
    <option>10</option>
  </select>
</div>



<input type="submit" value="Comprar">

</form>

<?php

//echo $_POST['selectProductosPorCategorias'];
//echo $productoSeleccionado;




?>


</html>