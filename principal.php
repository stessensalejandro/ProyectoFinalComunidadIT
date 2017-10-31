<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Negocio</title>
    </head>






<nav>
  <a href="porCategoria.php">Productos</a> |
  <a href="ofertas.php">Ofertas</a> |
  <a href="nosotros.php">Sobre nosotros</a> |
  </nav>

 
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comercio_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO Productos values(1,'bolsa',15,'10 unidades','descartables');";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
?> 



</html>