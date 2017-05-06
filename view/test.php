<?php
include_once '../vendor/setasign/fpdf/fpdf.php';
class Pdf extends FPDF{


    function Header()
  {
      $this->Image('logo2.png',58,10,100);
      // Arial bold 15
      $this->SetFont('Arial','B',15);
      // Move to the right
      $this->Ln(30);
  }
  function Chapter(){


  }
  function  Mybody(){


  }
  function Layout(){

  }
  function  footer(){
    $this->Cell(180,10,"--------------------------------------------------------------------------------",0,1,'C');
    $this->Cell(50, 10, "Nursery_Mail:", 0, 0,'L');
    $this->Cell(50,10,$this->PutLink("MikaelMounir@gmail.com","MikaelMounir@gmail.com") ,0,1,'L');

  }
 public function content($first_name,$mid_name,$last_name,$user_name,$password){

          $this->Cell(50, 10, "First_Name :", 0, 0,'L');
          $this->Cell(50,10,$first_name,0,1,'L');
          $this->Ln(10);

         $this->Cell(50, 10, "Mid_Name :", 0, 0,'L');
         $this->Cell(50,10,$mid_name,0,1,'L');
         $this->Ln(10);

         $this->Cell(50, 10,"Last_Name :", 0, 0,'L');
         $this->Cell(50,10,$last_name,0,1,'L');
         $this->Ln(10);

         $this->Cell(50, 10,"User_Name :", 0, 0,'L');
         $this->Cell(50,10,$user_name,0,1,'L');
         $this->Ln(10);

         $this->Cell(50, 10,"Password :", 0, 0,'L');
         $this->Cell(50,10,$password,0,1,'L');
         $this->Ln(10);


 }
    function PutLink($URL, $txt)
    {
        // Put a hyperlink
        $this->SetTextColor(0,0,255);

        $this->Write(5,$txt,$URL);
        $this->SetTextColor(0);
    }


}
$first_name="Omar";
$mid_name="Mohamed";
$last_name="Rashad";
$user_name="sdasdasdas";
$password="123";
$pdf = new Pdf();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->content($first_name,$mid_name,$last_name,$user_name,$password);
$pdf->Output();




