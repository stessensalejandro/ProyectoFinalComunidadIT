<<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
	<style>
	.credit-card-div  span { padding-top:10px; }
	.credit-card-div img { padding-top:30px; }
	.credit-card-div .small-font { font-size:15px; }
	.credit-card-div .pad-adjust { padding-top:10px; }
	</style>
        <meta charset="UTF-8">
	    <title>Por categorias</title>
		<meta charset="utf-8">
     	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</head>

	
<div class="form-group">
	<form  class="credit-card-div" action="informacionDeCompra.php" method="post">
<div class="panel panel-default" >
 <div class="panel-heading">
     
      <div class="row ">
              <div class="col-md-12">
			  <span class="help-block text-muted small-font" >Número de Tarjeta</span>
                  <input type="text" class="form-control" placeholder="ingrese número de tarjeta" name="nTarjeta" required />
              </div>
          </div>
     <div class="row ">
              <div class="col-md-3 col-sm-3 col-xs-3">
                  <span class="help-block text-muted small-font" >Mes de expiración</span>
                  <input type="text" class="form-control" placeholder="MM" name="mm" required />
              </div>
         <div class="col-md-3 col-sm-3 col-xs-3">
                  <span class="help-block text-muted small-font" >Año de expiración</span>
                  <input type="text" class="form-control" placeholder="YY" name="yy" required/>
              </div>
        <div class="col-md-3 col-sm-3 col-xs-3">
                  <span class="help-block text-muted small-font" >  Codigo de seguridad</span>
                  <input type="text" class="form-control" placeholder="Codigo de Seguridad" name="cSeguridad" required/>
              </div>
         <div class="col-md-3 col-sm-3 col-xs-3">
<img src="assets/img/1.png" class="img-rounded" />
         </div>
          </div>
       </div>
     
 </div> 
 </div>
 
</form>

	 
	
	
	
	
	
	

	
</html>