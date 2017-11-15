<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
mysql_query("update productos set cantidad=cantidad-1",$conexion) or
die("Problemas en el select:".mysql_error());


if(isset($_POST['dni']))
{
$documento=$_POST['dni'];
//lo trae bien
}
//if(isset($_POST['cantidadSeleccionada']))
//{
$cantidadComprada2=$_POST['cantidadSeleccionada'];
echo $cantidadComprada2;
//}
//

if(isset($_POST['domEntrega']))
{
$domicilioEntrega2=$_REQUEST['domEntrega'];
//lo trae bien
}


$existeComprador=mysql_query("select dni from comprador where dni='$documento'",$conexion) or
die("Problemas en el select:".mysql_error());

		//poner insert de compra
		mysql_query("insert into compras($documento,$cantidadComprada2,$domicilioEntrega2)",$conexion);

echo '<br>';

 if($existeComprador)
        {
		echo 'usted ya habia comprado, gracias por volver a elegir estos productos';
		

		}

		else
			
			{
				$apellido=$_POST['ape'];
				$nombre=$_POST['nom'];
				$email=$_POST['email'];
				$domicilio=$_POST['domicilio'];
				echo 'es su primera compra, esperamos su retorno';
				//poner insert de comprador
				mysql_query("insert into comprador($apellido,$nombre,$documento,$email,$domicilio)",$conexion);
				
				
				
			}
			
			
			
			
			
			
			
?>



<html>
    <head>
        <meta charset="UTF-8">
	    <title>Compra Hecha</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>

 
<body>


<h1> Gracias por tu Compra!!! </h1>

<form>
<a class="btn btn-primary" href="porCategoria.php" role="button">Volver a la pagina principal</a>

</form>



</body>


</html>



