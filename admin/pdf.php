<?php
 if( isset($_POST['datapdf']) ){
    $class_id           = $_POST["id"];
    $shownotice         = $_POST["notice"];
    $notice             = str_replace('\\','"',$shownotice);
    $showsubject        = $_POST["subject"];
    $subject            = str_replace('\\','"',$showsubject);
    $showadded_by       = $_POST["added_by"];
    $added_by           = str_replace('\\','"',$showadded_by);
    $showinstitute_name = $_POST["institute_name"];
    $institute_name     = str_replace('\\','"',$showinstitute_name);
    $showabout          = $_POST["about"];
    $about              = str_replace('\\','"',$showabout);
    $showaddress        = $_POST["address"];
    $address            = str_replace('\\','"',$showaddress);
    $staffname          = '';
    if (isset($_POST["staffname"])) {

      $staffname        = $_POST["staffname"];

    }
    $img                = $_POST["img"];
    $imgs               = "image/".$img;

//   define('FPDF_FONTPATH','font/');
//   define('FPDF_FONTPATH','font/');

  require('fpdf/fpdf.php');
  // ini_set("session.auto_start", 0);

  class PDF extends FPDF {
  
    // Page header
    function Header() {
          
        // // Add logo to page
        // $this->Image('gfg1.png',10,8,33);
          
        // // Set font family to Arial bold 
        // $this->SetFont('Arial','B',20);
          
        // // Move to the right
        // $this->Cell(80);
          
        // // Header
        // $this->Cell(50,10,'Heading',1,0,'C');
          
        // // Line break
        // $this->Ln(20);
    }
  
    // Page footer
    function Footer() {
          
        // // Position at 1.5 cm from bottom
        // $this->SetY(-15);
          
        // // Arial italic 8
        // $this->SetFont('Arial','I',8);
          
        // // Page number
        // $this->Cell(0,10,'Page ' . 
        //     $this->PageNo() . '/{nb}',0,0,'C');
    }

//     function ChapterBody($notice)
// {
//     // Read text file
//     // $txt = file_get_contents($notice);
//     // Times 12
//     $this->SetFont('Times','',12);
//     // Output justified text
//     $this->MultiCell(0,5,$notice);
//     // Line break
//     $this->Ln();
//     // Mention in italics
//     // $this->SetFont('','I');
//     $this->Cell(0,10,'(end of excerpt)');
// }

//     function PrintChapter($num, $title, $notice)
// {
//     $this->AddPage();
//     $this->ChapterTitle($num,$notice);
//     $this->ChapterBody($notice);
// }
}
  
 
  // Instantiation of FPDF class
  $pdf = new FPDF('P','mm','A4');



  
  // Define alias for number of pages
  $pdf->AliasNbPages();
  $pdf->AddPage();
  $pdf->SetFont('Arial','',25);
  $pdf->Image('assets/img/1mg121.jpeg', 10, 10, -380);
  $pdf->setXY(40,12);
  $pdf->Cell(0,10, $institute_name );

//   $pdf->setXY(90,35);
//   $pdf->SetFont('Times','B',20);
//   $pdf->SetTextColor(194,8,8);
//   $pdf->Text(1,20,"NOTICE");
// //   $pdf->Line(float x1, float y1, float x2, float y2);
//   $pdf->Line(10, 50, 200, 50);


  $pdf->setXY(40,20);
  $pdf->SetFont('Times','',10);
//   $pdf->Ln(1);
  $pdf->MultiCell(0,10,$about);

  $pdf->setXY(40,25);
  $pdf->SetFont('Times','',10);
//   $pdf->Ln(1);
  $pdf->Cell(105,10,$address);
  $pdf->setX(89);
  $pdf->SetFont('Times','B',20);
  $pdf->cell(0,35,"NOTICE");
  $pdf->Line(10, 50, 200, 50);

  $pdf->setXY(10,50);
  $pdf->SetFont('Arial','',12);
  $pdf->Text(163, 58,"Date : " . date('d M, Y'));

//   $pdf->setXY(10,40);
$pdf->setXY(10,70);
$pdf->SetFont('Arial','',12);
  $pdf->MultiCell(0, 10,"Subject : " . $subject);
 
  if($staffname == null){
    ;
   }else{
     $pdf->Ln(1);
     $pdf->SetFont('Arial','',11);
     $pdf->MultiCell(0,10,'To : '. $staffname.',');
   }

    // $pdf->Ln(30);
    // $pdf -> SetRightMargin(10);
  

//   $pdf->SetFont('Times','',11);

//   $pdf->setXY(53,45);
  $pdf->Ln(1);
  $pdf->SetFont('Arial','',11);
  $pdf->MultiCell(0,10,$notice);
//   $pdf->SetMargins(100, 10, 10);
  $pdf->SetFont('Arial','',12 );
  $pdf->Cell(0, 10,"Respectfully, ",0,0,'R');
//   $pdf->setXY(170,50);

//   $pdf->SetLeftMargin(10);
  $pdf->Ln(1);
  $pdf->SetFont('Arial','',12);
  $pdf->Cell(0, 25, $added_by,0,0,'R');
  $pdf->Ln(20);
//   $pdf->SetFont('Arial','',12);
//   $pdf->Cell(0, 10,"Signature : " .$pdf->Image($imgs, 5, 70, 33.78));
  $pdf->Cell( 40, 20, "Signature : ".$pdf->Image($imgs, 35, $pdf->GetY(), 60, 20), 0, 0, false);
  $pdf->Ln(24);
  $pdf->SetFont('Arial','',11);
  $pdf->MultiCell(70, 7,"Place : " . $address);
  // $pdf->Cell(40, 20 );


  // $pdf->setXY(10,35);
  // $pdf->SetTextColor(0,0,139);
  // $pdf->SetFont('Times','B',20);
  // $pdf->Text(90,45,"NOTICE");
  // //   $pdf->Line(float x1, float y1, float x2, float y2);
  // $pdf->Line(10, 50, 200, 50);

//   $pdf->Ln(); line gap

//   for($i = 1; $i <= 30; $i++)
//       $pdf->Cell(0, 10, 'line number ' 
//               . $i, 0, 1);
  $pdf->Output('notice-pdf-report.pdf', 'D');
 }
  ?>