<?php
require("./fpdf/fpdf.php"); // path to fpdf.php
$pdf = new FPDF(); $pdf->addPage();
$pdf->setFont("Helvetica", 'B', 16); $pdf->cell(40, 10, "Invoice Omkar");
$pdf->output();
?>