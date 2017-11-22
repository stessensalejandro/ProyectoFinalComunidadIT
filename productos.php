<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
	<style>
	body {
  background-image: url("https://image.freepik.com/vector-gratis/fondo-con-diseno-de-comercio-electronico_23-2147650066.jpg");
		}
		nav{
	/*Bordes redondeados*/
	-webkit-border-radius:10px;/*Para chrome y Safari*/
	-moz-border-radius:10px;/*Para Firefox*/
	-o-border-radius:10px;/*Para Opera*/
	border-radius:10px;/*El estandar por defecto*/
	background-image: -webkit-gradient(linear, left top, left bottom, from(#FFF), to(#CCC));/*Para chrome y Safari*/
	/*Degradados*/
	background-image: -moz-linear-gradient(top center, #FFF, #CCC);/*Para Firefox*/
	<!-- background-image: -o-linear-gradient(top, #FFF, #CCC);/*Para Opera*/-->
	<!-- background-image: linear-gradient(top, #FFF, #CCC);/*El estandar por defecto*/-->
	overflow:hidden;
	width:100%;
}
    
	
#selectCategoria{ font-family: verdana; font-size: 25px; width: 400px; height:40px;}
  
  
#SelectPrecio{ font-family: verdana; font-size: 25px; width: 400px; height:50px;}

	
	</style>
        <meta charset="UTF-8">
	    <title>productos</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script>
function pregunta(){ 
    if (confirm('¿Estas seguro de comprar este producto?')){ 
       document.tuformulario.submit() 
    } 
} 

</script>
	</head>
<body class="text-center" src="imagenFondo.jpg">
<p>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
      <ul class="nav navbar-nav">
      <li><a class="active" href="productos.php"><h2> Productos </h2></a></li>
      <li><a href="nosotros.php"> <h2> Nosotros </h2> </a></li>
     </ul>
  </div>
</nav>
</p>
<?php
include 'conexion.php';
session_start();
?>
<br>
<br>
<form class="form-inline" method="post" id='formularioPorCate' action="formularioDeCompra.php" onclick="this.disabled=true;" required>
<div>
  <div>
<SELECT name="cat" id="selectCategoria" class="form-control" data-live-search="true" required>
<option value="noOption" disabled="disabled" selected="selected"> Seleccione una Categoria </option>
<?php 
$categorias=mysql_query("select distinct categoria from productos",$conexion) or
die("Problemas en el select:".mysql_error());

while($row = mysql_fetch_array($categorias))
{
echo'<OPTION VALUE="'.$row['categoria'].'">'.$row['categoria'].'</OPTION>';
}
$seleccionado=$row['categoria'];

echo $seleccionado;





$nombreProducto=$_POST['selectProductosPorCategorias'];

echo $nombreProducto;


$_SESSION['productoSeleccionado']=$nombreProducto;


$Cantidad=$_POST['cantidadSeleccionada'];
$_SESSION['cantidadComprada'] =$Cantidad;


$Producto=$_POST['selectProductosPorCategorias'];
$_SESSION['productoComprado']=$Producto;


?>
</div>
</div>
</SELECT>
<br>
<br>
<div>

<div>
<select name="precio" id="SelectPrecio" class="form-control"  required>
<option value="noSelecciona" disabled="disabled" selected="selected" > Elija su filtro de busqueda </option>
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