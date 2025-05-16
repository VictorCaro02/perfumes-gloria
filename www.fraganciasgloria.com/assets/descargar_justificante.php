<?php
require('./fpdf/fpdf.php'); // Ruta al archivo FPDF.php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"];
    $usuario = $_POST["usuario"];
    $email = $_POST["email"];
    $mensaje = $_POST["mensaje"];
    $fecha = $_POST["fecha"];

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(0,10,'Justificante de Contacto',0,1,'C');
    $pdf->Ln(10);

    $pdf->SetFont('Arial','',12);
    $pdf->Cell(40,10,'Nombre: '); $pdf->Cell(0,10,utf8_decode($nombre),0,1);
    $pdf->Cell(40,10,'Usuario: '); $pdf->Cell(0,10,utf8_decode($usuario),0,1);
    $pdf->Cell(40,10,'Email: ');   $pdf->Cell(0,10,utf8_decode($email),0,1);
    $pdf->Cell(40,10,'Fecha: ');   $pdf->Cell(0,10,utf8_decode($fecha),0,1);
    $pdf->Ln(10);
    $pdf->MultiCell(0,10,"Mensaje:\n".utf8_decode($mensaje));

    $pdf->Output("D", "justificante_contacto.pdf");
    exit;
} else {
    echo "Acceso no permitido.";
}
