<!-- <?php include("../linkDB.php"); //database connection function ?> -->


<?php
require('managervieworderrefreshments.php');


// Retrieve data from the database
$query = "SELECT * FROM client_refreshments ";
$res = mysqli_query($linkDB, $query); 

// Initialize the PDF object
$pdf = new FPDF();
$pdf->AddPage();

// Set the font and cell width
$pdf->SetFont('Arial', 'B', 12);
$cell_width = 40;

// Add the headers
$pdf->Cell($cell_width, 10, 'ID', 1);
$pdf->Cell($cell_width, 10, 'Date', 1);
$pdf->Cell($cell_width, 10, 'Email', 1);

$pdf->Ln();

// Add the data
while($row = mysqli_fetch_assoc($result)) {
    $pdf->Cell($cell_width, 10, $row['id'], 1);
    $pdf->Cell($cell_width, 10, $row['date'], 1);
    $pdf->Cell($cell_width, 10, $row['email'], 1);
    
    $pdf->Ln();
}

// Output the PDF
$pdf->Output();
?>