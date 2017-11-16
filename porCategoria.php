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
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
<body class="text-center">
<p>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
      <ul class="nav navbar-nav">
      <li><a class="active" href="porCategoria.php">Productos</a></li>
      <li><a href="nosotros.php">Nosotros</a></li>
     </ul>
  </div>
</nav>
</p>
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comercio_db";
?>
<br>
<br>
<form class="form-inline"method="post" id='formularioPorCate' action="formularioDeCompra.php">
<div class="panel panel-primary">
  <div class="panel-heading">Elija una categoria</div>
  <div class="panel-body">
<SELECT name="cat" id="selectCategoria" class="form-control" data-live-search="true">
<option value="noOption" disabled="disabled" selected="selected"> Seleccione una Categoria </option>
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

$Cantidad=$_POST['cantidadSeleccionada'];

echo $Cantidad;



$_SESSION['cantidadComprada']  =$Cantidad;


//session_start();
//$_SESSION['nickname']  = 'Jhonnyf';
?>
</div>
</div>
</SELECT>
<br>
<br>
<div class="panel panel-primary">
  <div class="panel-heading">Ordenar por</div>
  <div class="panel-body">
<select name="precio" id="SelectPrecio" class="form-control" data-live-search="true">
<option value="noSelecciona" disabled="disabled" selected="selected"> Seleccione un producto </option>
<option value="menorPrecio">menor precio</option>
<option value="mayorPrecio">mayor precio</option>
</div>
</div>
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
                        $("#contenedor").html('<div><img src="https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif"/></div>');
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
                        $("#contenedor").html('<div><img src="https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif"/></div>');
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
                        $("#contenedor").html('<div><img src="https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif"/></div>');
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




</body>
</html>