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

<div> ordenar por </div>
<select name="precio" id="SelectPrecio">
<option value="menorPrecio" selected>menor precio</option>
<option value="mayorPrecio">mayor precio</option>
</select>

<script>
$('select#selectCategoria').on('change',function(){
	var seleccionado = $(this).val();
	mostrarPorCategorias(seleccionado);
});

$('select#SelectPrecio').on('change',function(){
	var seleccionado2 = $(this).val();
	
	if (seleccionado2 == 'menorPrecio')
	{
	//alert seleccionado2;
	mostrarPorMenorPrecio(seleccionado2);
	}
	else
	mostrarPorMayorPrecio(seleccionado2);
		
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

function mostrarPorMenorPrecio(nombre){
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
function mostrarPorMayorPrecio(nombre){
        var parametros = {
                "nombre" : nombre,
               };
        $.ajax({
                data:  parametros,
                url:   'selectProductosPorMayorPrecio.php',
                type:  'post',
				beforeSend: function () {
                        $("#contenedor").html("Procesando, espere por favor...");
                },
                success:  function (response) {
					  $("#contenedor").html(response);
						
                }
        });
}


</script>

<p id='contenedor'>

</p>
<br>
<br>
<br>


</form>

<?php

//$productoSeleccionado=$_POST['selectProductosPorCategorias'];
//echo $productoSeleccionado;

?>





</html>