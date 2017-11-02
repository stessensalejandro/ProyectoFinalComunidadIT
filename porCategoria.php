<!DOCTYPE html>
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


<nav>
  <a href="porCategoria.php">Productos</a> |
  <a href="ofertas.php">Ofertas</a> |
  <a href="nosotros.php">Sobre nosotros</a> |
</nav>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comercio_db";
?>

<br>
<br>

<p>categorias</p>

<form method="post" id='formularioPorCate'>
<SELECT name="cat" id="cate">

<?php 

$conexion=mysql_connect("localhost",$username,"") or
die("Problemas en la conexion");
mysql_select_db($dbname,$conexion) or
die("Problemas en la selección de la base de datos");  
mysql_query ("SET NAMES 'utf8'");
$categorias=mysql_query("select categoria from productos",$conexion) or
die("Problemas en el select:".mysql_error());
while($row = mysql_fetch_array($categorias))
{
echo'<OPTION VALUE="'.$row['categoria'].'">'.$row['categoria'].'</OPTION>';
}
 
$seleccionado=$row['categoria'];
$s=$_POST['cate'];

?>
</SELECT>


<script>
$('select#cate').on('change',function(){
    var valor = $(this).val();
    $('#selecciona').text(valor);
});
</script>
<p id="selecciona">
</p>


<SELECT name="pro" id="prod">
<?php 





echo $s;

//$s=$_POST['selecciona'];


$productos=mysql_query("select nombre from productos where categoria='reusables'",$conexion);




while($row = mysql_fetch_array($productos))
{
echo'<OPTION VALUE="'.$row['nombre'].'">'.'<br>'.$row['nombre'].'</OPTION>';
}

?>

</SELECT>

</form>

</html>