<!DOCTYPE html>
<html lang="en">
<head>
  <title>Formulario de Compra</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

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
	
  
	
 <div class="form-group">
  <label for="sel1">Elija su forma de pago:</label>
  <select class="form-control" id="sel1" name="fpago">
    <option>MasterCard</option>
    <option>Visa</option>
    <option>Cabal</option>
    <option>Rapipago</option>
  </select>
</div>
	
	
  <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Confirmar Compra</button>
      </div>
    </div>
		
  </form>
</div>

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



?>
</html>



