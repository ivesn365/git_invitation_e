
<?php


// Include the main TCPDF library (search for installation path).
require_once('tcpdf.php');
require_once('../header.php');

// Fetch website content
$websiteContent = file_get_contents('http://localhost/events/invitation_pdf.php');

// Create new PDF document
$pdf = new TCPDF();

// Add a page
$pdf->AddPage();

// Write HTML content
$pdf->writeHTML($websiteContent);

// Output PDF
ob_clean();
$pdf->Output('google.pdf', 'F');
