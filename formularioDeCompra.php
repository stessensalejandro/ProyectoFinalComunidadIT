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
  <form class="form-horizontal" action="informacionDeCompra.php">
    
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Apellido:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" placeholder="ingresa apellido" name="ape" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Nombres:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" placeholder="ingresa nombres" name="nom" required>
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
        <input type="number" class="form-control" id="email" placeholder="ingresa dni" name="email" required>
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="email">Domicilio:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email" placeholder="ingresa Domicilio" name="email" required>
      </div>
    </div>
	
  
	
 <div class="form-group">
  <label for="sel1">Elija su forma de pago:</label>
  <select class="form-control" id="sel1">
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
$productoAComprar=$_POST['formularioPorCate'];
echo $productoAComprar;



?>
</html>



