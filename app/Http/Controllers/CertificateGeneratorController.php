<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Attendance;
use TCPDF;
use TCPDFBarcode;
use  Illuminate\Support\Facades\Auth;

use App\Models\CertificateGenerator;


class CertificateGeneratorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function certificate()
    {
        if (Auth::check()) {
            return view('admindash.certificate');
        }
    }
    public function generateCertificate($eventId, $attendanceId)
    {
        // Get the event and attendance record
        $event = Event::findOrFail($eventId);
        $attendance = Attendance::findOrFail($attendanceId);

       
        $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

        $pdf->SetCreator('Your Organization');
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Certificate of Appreciation');
        $pdf->SetSubject('Certificate');
      
        $pdf->SetMargins(0, 0, 0, true);
        $pdf->SetAutoPageBreak(false, 0);

        
        $pdf->AddPage();

        
        $backgroundImagePath = public_path('images/BORDER.jpg');
        $pdf->Image($backgroundImagePath, 0, 0, $pdf->getPageWidth(), $pdf->getPageHeight(), '', '', '', false, 300, '', false, false, 0);


       
        $pdf->SetFont('helvetica', 'B', 24); 
        $pdf->SetTextColor(0, 0, 0);

        
      // Add the organization logo
    $logoPath = public_path('images/logo.png');
    $logoWidth = 9;
    $logoHeight = 9;
    $logoX = ($pdf->getPageWidth() - $logoWidth) / 2;
    $logoY = 10;
    $pdf->Image($logoPath, $logoX, $logoY, $logoWidth, $logoHeight, 'PNG');

    // Add the organization name centered below the logo
    $pdf->SetFont('helvetica', 'B', 14);
    $organizationName = 'SFC|CFC';
    $organizationNameWidth = $pdf->GetStringWidth($organizationName);
    $organizationNameX = ($pdf->getPageWidth() - $organizationNameWidth) / 2;
    $organizationNameY = $logoY + $logoHeight + 5; // Adjust the Y position based on the spacing you want
    $pdf->SetXY($organizationNameX, $organizationNameY);
    $pdf->Cell($organizationNameWidth, 5, $organizationName, 0, 1, 'L');

    // ...

        //  certificate title
        $pdf->SetFont('helvetica', 'B', 18);
        $pdf->Cell(0, 15, 'Certificate of Appreciation', 0, 1, 'C');
     

        //  name and description
        // Add recipient's name and details
        $pdf->SetFont('helvetica', '', 14);
        $pdf->Cell(0, 15, 'Presented to', 0, 1, 'C');
        $pdf->SetFont('helvetica', 'BU', 18); // Set the font to bold
        $pdf->Cell(0, 15, $attendance->name, 0, 1, 'C');
        $pdf->SetFont('helvetica', 'I', 14); // Reset the font to regular
        $pdf->Cell(0, 15, 'In recognition and appreciation of your active participation', 0, 1, 'C');
        $pdf->Cell(0, 15, 'and valuable contribution to the Youth Seminar about ' . $event->title . ', on ' . $event->date . ', ' . $event->time . '.', 0, 1, 'C');
        // Draw a horizontal line (HR) below the text
      
        $pdf->Cell(0, 15, '', 0, 1, 'C'); // Add spacing

        
        
       // $pdf->Cell(0, 15, 'Organized by Singles and Couples for Christ', 0, 1, 'C');
       // $pdf->Cell(0, 15, 'Date: ' . $attendance->time, 0, 1, 'C');
        //$pdf->Cell(0, 10, '', 0, 1, 'C'); // Add spacing


         // Add seminar details
        // $pdf->SetFont('helvetica', '', 12);
         //$pdf->Cell(0, 15, 'Seminar Details:', 0, 1, 'C');
         //$pdf->Cell(0, 15, '- Event: ' . $event->title, 0, 1, 'C');
         //$pdf->Cell(0, 15, '- Date: ' . $attendance->time, 0, 1, 'C');
         //$pdf->Cell(0, 15, '- Location: ' . $event->address, 0, 1, 'C');
         //$pdf->Cell(0, 15, '', 0, 1, 'C'); // Add spacing

         $pdf->SetFont('helvetica', '', 14);
         $pdf->Cell(0, 15, 'Your enthusiasm, dedication, and commitment to personal growth', 0, 1, 'C');
         $pdf->Cell(0, 15, 'and the empowerment of youth have made a significant impact.', 0, 1, 'C');
       

       // Add the digital signature image
       $signaturePath = public_path('images/signature.png');
       $pdf->Image($signaturePath, 160, 160, 50, 0, 'PNG'); // Example: adjust the coordinates and size accordingly

       $pdf->SetFont('helvetica', '', 12); // Example: regular font, size 12
        $pdf->Cell(0, 10, '', 0, 1, 'C'); // Add spacing

// Calculate the width of the "Signed By" text
$signedByText = 'Signed By:';
$signedByTextWidth = $pdf->GetStringWidth($signedByText);

// Calculate the line width based on the text width
$lineWidth = $signedByTextWidth + 10; // Add some margin to the text width

// Draw a horizontal line (HR) above the "Signed By" text
$lineY = $pdf->GetY() - 0; // Adjust the Y position based on the spacing you want
$lineX = ($pdf->getPageWidth() - $lineWidth) / 2; // Center the line based on the text width
$pdf->Line($lineX, $lineY, $lineX + $lineWidth, $lineY);

$pdf->Cell(0, 20, $signedByText, 0, 1, 'C');

// Output the PDF or save it to a file


       $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0, 10, 'Issued on this ' . date('jS F, Y') . '.', 0, 1, 'C');
       
       // Output the PDF or save it to a file
       $pdf->Output('certificate.pdf', 'I');
   }
}
