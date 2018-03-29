<?php
namespace App\FPDF;
use FPDF ;
use Cake\I18n\Time;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PDF
 *
 * @author buruk
 */

class LIFERUNG extends FPDF
{
protected $col = 0; // Current column
protected $y0;      // Ordinate of column start

function Header()
{
    // Logo
    $this->Image('img/logo.png',80,16,40);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
   
    // Line break
    $this->Ln(30);
}



function SetCol($col)
{
    // Set position at a given column
    $this->col = $col;
    $x = 10+$col*65;
    $this->SetLeftMargin($x);
    $this->SetX($x);

}
function SetRow($row){ 
   
        $this->SetY($this->Ln()+$row);
}


function ChapterTitle()
{
    // Title
    $this->SetFont('Arial','B',18);
   $this->SetFillColor(255,255,255);
    $this->Cell(0,8,"LIFERUNGSCHEIN",0,1,'J',true);
    $this->Ln(8);
    // Save ordinate
    $this->y0 = $this->GetY();
}

function ChapterBody($usersDetail)
{
    
   
    // Read text file
   // $txt = file_get_contents($file);
$file='+49(0) 9651 318 660 2 mail@coalblack.supply';
$file1='Steinweg 50';
$file2='96450 Coburg';
$file3='Bankverbindung';
$file4='Sparkasse Co-Lif';
$file5='DE34 7835 0000 0040 8124 97';
$file6='BYLADEM1COB';
$file7='212/280/30586';
    // Font
    $this->SetFont('Arial','',10);
    // Output text in a 6 cm width column
    $this->MultiCell(50,5,$file,0,1,'l');
    $this->Ln(15);
    $this->MultiCell(50,5,$file1,0,1,'l');
    $this->MultiCell(50,5,$file2,0,1,'l');
    $this->Ln(15);
    $this->SetFont('Arial','B',10);
    $this->MultiCell(50,5,$file3,0,1,'l');
    $this->SetFont('Arial','',10);
    $this->MultiCell(50,5,$file4,0,1,'l');
    $this->Ln();
    $this->SetFont('Arial','B',10);
    $this->MultiCell(50,5,'IBAN',0,1,'l');
    $this->SetFont('Arial','',10);
    $this->MultiCell(55,5,$file5,0,1,'l');
     $this->Ln();
    $this->SetFont('Arial','B',10);
    $this->MultiCell(50,5,'BIC',0,1,'l');
    $this->SetFont('Arial','',10);
    $this->MultiCell(55,5,$file6,0,1,'l');
         $this->Ln();
    $this->SetFont('Arial','B',10);
    $this->MultiCell(50,5,'Steuernummer',0,1,'l');
    $this->SetFont('Arial','',10);
    $this->MultiCell(55,5,$file7,0,1,'l');
    // Mention
//    $this->SetFont('','I');
//    $this->Cell(0,5,'(end of excerpt)');
    // Go back to first column
    $this->SetCol(1);
     $this->SetRow(55);
   foreach($usersDetail as $row)
    { 
      
         $this->Cell(50,5, $row->studio_name ,0,1,'l');
         $this->Cell(50,5, $row->address_line_1,0,1,'l');
         $this->Cell(50,5, $row->address_line_2 ,0,1,'l');
    
         $this->Cell(50,5, $row->postal_code,0,1,'l');
         $this->Cell(50,5, $row->city ,0,1,'l');
         $this->Cell(50,5, $row->state ,0,1,'l');
         $this->Cell(50,5, $row->country,0,1,'l');
         $this->Ln(15);
        
    }

    $this->Ln();
}

function FancyTable( $data)
{
  
    // Header
 
  $this->SetFillColor(240,240,240);
  $this->Cell(40,7,'Beschreibung',1,0,'C',1);
  $this->Cell(15,7,'Menge',1,0,'C',1);
  $this->Cell(40,7,'Einheit.',1,0,'C',1);

  $this->Ln();
 

    // Data

    // Data
    
    foreach($data as $row)
    { 
     
        foreach($data as $col)
    { 
     
          
$this->Cell(40,6,$col->product->product_name,'LR');
$this->Cell(15,6,$col->quantity,'LR');
$this->Cell(40,6,$col->product->unit,'LR');

$this->Ln();

     }
 $this->Cell(95,0,'','T');

    }
   
}
function FancyTable1( $data)
{ $steuer=0;
$netto=0;
$ges=0;
  foreach($data as $row)
    { 
           $netto=$netto+$row->price-$row->price*19/100;
     $steuer=$steuer+$row->price*19/100;
     $ges=$ges+$row->price;
    }

    // Header
 

    // Data

}
function Ending($text){
    $this->Ln(8);
     $this->SetCol(1);
     $this->SetRow( $this->GetY());
     
       $this->SetFont('Arial','',10);
    $this->MultiCell(100,5,utf8_decode($text));
    $this->Ln();
      $this->MultiCell(150,5,utf8_decode('Beste Grüße'));
          $this->Ln();
        $this->MultiCell(150,5,utf8_decode('CoalBlack-Tattoo Supply'));
}
function PrintDate($transactions){

   

  $this->MultiCell(50,5,'Datum: '.$transactions->created_date,0,1,'l');
   $this->MultiCell(50,5,'Bestell#: '.$transactions->order_number,0,1,'l');
  $this->MultiCell(50,5,'Lieferungs#: '.'CBLS'.$transactions->id,0,1,'l');

}


function PrintChapter($usersDetail)
{
    // Add chapter
    $this->AddPage();
    
    $this->ChapterTitle();

    $this->ChapterBody($usersDetail);
   
     //$this->ChapterBody1($usersDetail);
}


}
