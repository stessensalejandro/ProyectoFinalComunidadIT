<?php
require('/fpdf.php');
include 'conexion.php';


$pdf = new FPDF();





$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetTextColor(100);
$pdf->SetDrawColor(80,40,70);

$pdf->SetFont('helvetica','B',16);

$compras=mysql_query("select * from compras order by numeroCompra asc limit 1",$conexion) or
die("Problemas en el select:".mysql_error());


$filaCompra=mysql_fetch_array($compras,MYSQL_ASSOC);

$columnaCompra=$filaCompra['numeroCompra']+1000;


$pdf->Cell(140,6,'Comprobante de Pago: ');




$total=$_POST['precioProducto']*$_POST['cantidadProducto'];


$pdf->Ln();
$pdf->Ln();
$pdf->Ln();


$pdf->Cell(140,15,'Datos de la Compra: ',1,0,'C');

$pdf->Ln();
$pdf->Cell(140,6,utf8_decode('Numero de ticket: '.$columnaCompra),1,0,'C');
$pdf->Ln();
$pdf->Cell(140,6,utf8_decode('Cantidad: '.$_POST['cantidadProducto'].' unidades'),1,0,'C');
$pdf->Ln();
$pdf->Cell(140,6,utf8_decode('Producto: '.$_POST['descripcionProducto']),1,0,'C');
$pdf->Ln();
$pdf->Cell(140,6,utf8_decode('Precio: $'.$_POST['precioProducto']),1,1,'C');

$pdf->Cell(140,6,utf8_decode('Total: $'.$total),1,1,'C').' Precio Total';

$pdf->Ln();
$pdf->Ln();




$identificacion=$_POST['dniCliente'];
$personas=mysql_query("select * from comprador where dni='$identificacion'",$conexion) or
die("Problemas en el select:".mysql_error());





$filaPersona=mysql_fetch_array($personas,MYSQL_ASSOC);


$columnaNombre=$filaPersona['nombre'];
$columnaApellido=$filaPersona['apellido'];



$pdf->Cell(140,15,'Datos Personales: ',1,0,'C');

$pdf->Ln();
$pdf->Cell(140,6,utf8_decode($_POST['dniCliente']),1,0,'C');
$pdf->Ln();
$pdf->Cell(140,6,utf8_decode($columnaNombre),1,0,'C');
$pdf->Ln();
$pdf->Cell(140,6,utf8_decode($columnaApellido),1,1,'C');
$pdf->Ln();

//$pdf->SetFillColor($r, $g=null, $b=null)

$pdf->Output();
?>
