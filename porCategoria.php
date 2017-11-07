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

<p>
<nav id="navPrincipal">
  <a href="porCategoria.php">Productos</a> |
  <a href="nosotros.php">Sobre nosotros</a> |
</nav>
<<<<<<< HEAD
</p>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comercio_db";
?>
<br>
<br>
<form method="post" id='formularioPorCate' action="formularioDeCompra.php">
<SELECT name="cat" id="selectCategoria" >

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
$seleccionado=$row['categoria'];

echo $seleccionado;

?>
</SELECT>


<script>
$('select#selectCategoria').on('change',function(){
	var seleccionado = $(this).val();
	mostrarPorCategorias(seleccionado);
});

$('select#SelectPrecio').on('change',function(){
	var seleccionado2 = $(this).val();
	
	
	//alert seleccionado2;
	mostrarPorPrecio(seleccionado2);
	//$('select#SelectPrecio').hide();
});

//Carga los productos de una categoria seleccionada
function mostrarPorCategorias(categoria){
        var parametros = {
                "categoria" : categoria,
               };
        $.ajax({
                data:  parametros,
                url:   'selectProductos.php',
                type:  'post',
				beforeSend: function () {
                        $("#contenedor").html("Procesando, espere por favor...");
                },
                success:  function (response) {
					  $("#contenedor").html(response);
						
                }
        });
}

function mostrarPorPrecio(nombre){
        var parametros = {
                "nombre" : nombre,
               };
        $.ajax({
                data:  parametros,
                url:   'selectProductosPorMenorPrecio.php',
                type:  'post',
				beforeSend: function () {
                        $("#contenedor").html("Procesando, espere por favor...");
                },
                success:  function (response) {
					  $("#contenedor").html(response);
						
                }
        });
}
=======

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comercio_db";
?>

<br>
<br>

<p>categorias</p>
>>>>>>> 0d23cf2d82d7e22fdc762db35dd9b6abc8858bf4

<form method="post" id='formularioPorCate'>
<SELECT name="cat" id="cate">

<<<<<<< HEAD

</script>

<p id='contenedor'>

</p>
<br>
<br>
<br>
<div> ordenar por </div>
<select name="precio" id="SelectPrecio">
<option value="menorPrecio" selected>menor precio</option>
<option value="mayorPrecio">mayor precio</option>
</select>

</form>




=======
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
>>>>>>> 0d23cf2d82d7e22fdc762db35dd9b6abc8858bf4

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