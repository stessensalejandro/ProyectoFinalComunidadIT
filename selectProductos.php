<<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
	    <title>productos</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>

<?php
include 'conexion.php';
session_start();
$categorias=mysql_query("select distinct categoria from productos",$conexion) or
die("Problemas en el select:".mysql_error());
?>

<br>
<br>

<p style="display:none">categorias</p>

<form class="form-inline" id='formularioPorCate' action="formularioDeCompra.php" method="post">
<SELECT name="cat" id="cate"  style="display:none" class="form-control">

<?php 


while($row = mysql_fetch_array($categorias))
{
echo'<OPTION VALUE="'.$row['categoria'].'">'.$row['categoria'].'</OPTION>';
}
?>
</SELECT>
<?php
$resultado =$_POST['categoria'];
?>

<div class="panel panel-primary">
  <div class="panel-heading">Seleccione el Producto</div>
  <div class="panel-body">

<select id='selectProductosPorCategorias' name='selectProductosPorCategorias' class="form-control" data-live-search="true" required>
<option disabled="disabled" selected="selected">Seleccione el Producto </option>
<?php

$productos=mysql_query("select codigo,nombre,descripcion,precio,imagen from productos where categoria='$resultado'",$conexion);

while($row2 = mysql_fetch_array($productos,MYSQL_ASSOC))
{
	
echo'<OPTION VALUE="'.$row2['nombre'].'">'.$row2['nombre'].' Descripción: '.$row2['descripcion'].'  Precio: $'.$row2['precio'].'</OPTION>';
echo '<img src="'.$row2['imagen'].'">';
}

?>
</div>
</div>
</select>


<div class="form-group">
  <label for="sel1">Elija una cantidad del producto:</label>
  <select class="form-control"  id="cantidadSeleccionada" name="cantidadSeleccionada" class="form-control" data-live-search="true">
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





<input type="submit" id="comprar" name="comprar" value="Comprar" >

</form>

	
	
<script>

$('select#selectProductosPorCategorias').on('change',function(){
	var seleccionado = $(this).val();
	mostrarImagen(seleccionado);
});

function mostrarImagen(imagen){
        var parametros = {
                "imagen" : imagen,
				 };
        $.ajax({
                data:  parametros,
                url:   'mostrarImagen.php',
                type:  'post',
				beforeSend: function () {
                        $("#portaImagen").html('<div><img src="https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif"/></div>');
                },
                success:  function (response) {
					  $("#portaImagen").html(response);
						
                }
        });
}




</script>
	
	
	
	
<p id="portaImagen">







</p>



</html>