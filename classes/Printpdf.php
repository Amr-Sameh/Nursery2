<?php
include_once '../vendor/setasign/fpdf/fpdf.php';
class Pdf1 extends FPDF{

    function Header()
  {
     // $this->Image('C:\xampp\htdocs\Nursery2\view\images\logo2.png',58,10,100);
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
    $this->Cell(50,10,$this->PutLink("MikaelMounir@gmail.com","MikaelMounir@gmail.com") ,0,1,'L'); // write the mail
    $this->Ln(5);
    $this->Cell(50,10,"Nursery_Phone: ",0,0,'L'); // nursery phone
    $this->Cell(50,10,"234324234",0,0,'L'); // write the phone
      $this->Ln(18);
      $this->SetTextColor(0,0,255);
    $this->Cell(50,10,"* Please fill your profile information on Site",0,0,'L');


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



?>


