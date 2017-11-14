<!DOCTYPE html>
<html lang="en">
<head>
<style>
.credit-card-div  span { padding-top:10px; }
.credit-card-div img { padding-top:30px; }
.credit-card-div .small-font { font-size:15px; }
.credit-card-div .pad-adjust { padding-top:10px; }
</style>
  <title>Formulario de Compra</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 </head>

<body>

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
<a href="porCategoria.php"><img src="volver.jpg" class="img-circle"></a>

<div class="container">

  <h2>Confirmacion de compra</h2>
  <form class="form-horizontal" action="informacionDeCompra.php" method="post">
    
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd" >Apellido:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" placeholder="ingresa apellido" name="ape" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd" >Nombres:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" placeholder="ingresa nombres" name="nom" required>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="email" >Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="ingresa mail" name="email" required>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="Dni">Dni:</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="dni" placeholder="ingresa dni" name="dni" required>
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="email">Domicilio:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="dom" placeholder="ingresa Domicilio" name="domicilio" required>
      </div>
    </div>
	
  
	

	
	
 
</div>


 <div class="form-group">
  <label for="sel1">Elija su forma de pago:</label>
  <select class="form-control" id="fpago" name="fpago">
    <option>MasterCard</option>
    <option>Visa</option>
    <option>Cabal</option>
   </select>
</div>

<p id="datosTarjeta">


</p>

 <div class="form-group">        
      <div class="control-label col-sm-15">
        <button type="submit" class="btn btn-success">Confirmar Compra</button>
      </div>
    </div>
	




	


	
  </form>


<script>
$('select#fpago').on('change',function(){
	var seleccionado = $(this).val();
	console.log(seleccionado);
	mostrarDatosTarjeta(seleccionado);
});

function mostrarDatosTarjeta(tarjeta){
        var parametros = {
                "tarjeta" : tarjeta,
               };
        $.ajax({
                data:  parametros,
                url:   'tarjetaDatos.php',
                type:  'post',
				beforeSend: function () {
                        $("#datosTarjeta").html('<div><img src="https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif"/></div>');
                },
                success:  function (response) {
					  $("#datosTarjeta").html(response);
						
                }
        });
}

</script>


</body>

<?php





echo "Usted va a confirmar la compra de: ";

echo $_POST['cantidadSeleccionada'];
echo" ";
echo $_POST['selectProductosPorCategorias'];

if(isset($_POST['ape']))
{
$apellido=$_POST['ape'];
}
if(isset($_POST['nom']))
{
$nombre=$_POST['nom'];
}
if(isset($_POST['ape']))
{
$email=$_POST['ape'];
}
if(isset($_POST['dni']))
{
$dni=$_POST['dni'];
}
if(isset($_POST['dom']))
{
$domicilio=$_POST['dom'];
}
if(isset($_POST['fpago']))
{
$formaPago=$_POST['fpago'];
}


$productoSeleccionado=$_POST['selectProductosPorCategorias'];
echo $productoSeleccionado;
mysql_query("update Productos from productos set cantidad=cantidad-1 where nombre='$productoSeleccionado'",$conexion) or
die("Problemas en el select:".mysql_error());





?>
</html>



