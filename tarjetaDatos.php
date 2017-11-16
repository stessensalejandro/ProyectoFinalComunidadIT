<<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
	    <title>Por categorias</title>
		 <meta charset="utf-8">
		 <meta name="viewport" content="width=device-width, initial-scale=1">
		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		 
    </head>

	<form  class="credit-card-div" action="informacionDeCompra.php">
<div class="panel panel-default" >
 <div class="panel-heading">
     
      <div class="row ">
              <div class="col-md-12">
			  <span class="help-block text-muted small-font" >Número de Tarjeta</span>
                  <input type="text" class="form-control" placeholder="ingrese número de tarjeta" pattern="^[9|8|7|6]\d{8}$" required />
              </div>
          </div>
     <div class="row ">
              <div class="col-md-3 col-sm-3 col-xs-3">
                  <span class="help-block text-muted small-font" >Mes de expiración</span>
                  <input type="text" class="form-control" placeholder="MM" pattern="^[9|8|7|6]\d{8}$" required />
              </div>
         <div class="col-md-3 col-sm-3 col-xs-3">
                  <span class="help-block text-muted small-font" >Año de expiración</span>
                  <input type="text" class="form-control" placeholder="YY" pattern="^[9|8|7|6]\d{8}$" required/>
              </div>
        <div class="col-md-3 col-sm-3 col-xs-3">
                  <span class="help-block text-muted small-font" >  Codigo de seguridad</span>
                  <input type="text" class="form-control" placeholder="Codigo de Seguridad" required pattern="[0-9]+" required/>
              </div>
         <div class="col-md-3 col-sm-3 col-xs-3">
<img src="assets/img/1.png" class="img-rounded" />
         </div>
          </div>
       </div>
     
    
</form>

	 
	
	
	
	
	
	

	
</html>