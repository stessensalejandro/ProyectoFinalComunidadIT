<!DOCTYPE html>
<html lang="en">
<head>
<style>
.credit-card-div  span { padding-top:10px; }
.credit-card-div img { padding-top:30px; }
.credit-card-div .small-font { font-size:15px; }
.credit-card-div .pad-adjust { padding-top:10px; }


body {
  background-image: url("https://previews.123rf.com/images/photos777/photos7771409/photos777140900060/31700807-textura-del-papel-azul-arrugado-para-el-fondo-Foto-de-archivo.jpg");
		}
#fpago{ font-family: verdana; font-size: 25px; width: 400px; height:50px;}	
input.text, select.text,  {
   background: silver;
   border: 1px solid #393939;
   border-radius: 5px 5px 5px 5px;
   color: #393939;
   font-size: 12px;
   padding: 5px;
}
.titulo{font-size: 50px;color: #ffffff; font-weight: 600;}
.detalleCompra{font-size: 50px;color: #ffffff; font-weight: 600;}
	 .confirmarCompra{
	text-decoration: none;
    padding: 10px;
    font-weight: 600;
    font-size: 20px;
    color: #ffffff;
    background-color: #1883ba;
    border-radius: 6px;
    border: 2px solid #0016b0;
  }
     .confirmarCompra:hover{
    color: #1883ba;
    background-color: #ffffff;}
    label
	{color: #ffffff;}	
	.table
	{color: #ffffff;}
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
include 'conexion.php';
session_start();

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

<h2 class="titulo">Confirmación de compra</h2>
<div class="container">

  
  <form class="form-horizontal" action="informacionDeCompra.php" method="post" id="formularioCompra">
    
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd" >Apellidos:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="ape" placeholder="ingresa apellido" name="ape" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Nombres:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="nom" placeholder="ingresa nombres" name="nom" required>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="ingresa mail" name="email" required>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="Dni">Dni:</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="dni" placeholder="ingresa dni" name="dni" pattern="^[9|8|7|6]\d{8}$" required>
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="email">Domicilio:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="dom" placeholder="ingresa Domicilio" name="dom" required>
      </div>
    </div>
	
  
		<div class="form-group">
      <label class="control-label col-sm-2" for="email">Domicilio de Entrega:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="domEntrega" placeholder="ingresa Domicilio" name="domEntrega" required>
      </div>
    </div>

	
	
 
</div>

<div class="form-group">
  <select class="form-control" id="fpago" name="fpago" required>
  <option disabled="disabled" selected="selected" value="">Elija su tarjeta </option>
    <option>MasterCard</option>
    <option>Visa</option>
    <option>Cabal</option>
   </select>
</div>

<p id="datosTarjeta">


</p>

 <div class="form-group">        
      <div class="control-label col-sm-15">
        <button id="confirmarCompra" class="confirmarCompra" type="submit" onclick="pregunta()" class="btn btn-success">Confirmar Compra</button>
      </div>
<div>
	



<p id="contieneCantidad" name="contieneCantidad">
<?php
$cant=$_POST['cantidadSeleccionada'];
$_SESSION['cantidadComprada']=$cant;

$Producto=$_POST['selectProductosPorCategorias'];
$_SESSION['productoComprado']=$Producto;

?>
</p>
	


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
echo" ";


if(isset($_POST['ape']))
{
$apellido=$_POST['ape'];
}
if(isset($_POST['nom']))
{
$nombre=$_POST['nom'];
}
if(isset($_POST['email']))
{
$email=$_POST['email'];
}
if(isset($_POST['dni']))
{
$dni=$_POST['dni'];
}
if(isset($_POST['dom']))
{
$domicilio=$_POST['dom'];
}
if(isset($_POST['domEntrega']))
{
$domicilioEntrega=$_POST['domEntrega'];

}
if(isset($_POST['fpago']))
{
$formaPago=$_POST['fpago'];
}


$productoSeleccionado=$_POST['selectProductosPorCategorias'];



$imagen=mysql_query("select imagen,precio from productos where nombre='$productoSeleccionado'",$conexion) or
die("Problemas en el select:".mysql_error());



$filaCompra = mysql_fetch_array($imagen);

?>
<h2 class="detalleCompra"> Usted va a confirmar la compra: </h2>

<?php echo '<img class="img-thumbnail" src="'.$filaCompra['imagen'].'.jpg" />';  ?> 

<br>
  <table class="table">
   
      <tr>
        <th><h3> <?php echo 'Precio Unitario: $'.$filaCompra['precio'].' ';   ?> </h3></th>
		<th><h3>  <?php echo 'Cantidad: '.$cant;  ?>  </h3></th>
        <th><h3>  <?php echo 'Precio Total: $'.$filaCompra['precio']*$cant;  ?>  </h3></th>
		
      </tr>
       
   </table>





</html>



