<?php
    session_start();
    require('C:\xampp\htdocs\pdf2\fpdf.php');
    $pdf = new FPDF();
    $pdf->AddPage();
    $b_name=$_SESSION["b_name"];  
    $amount=$_SESSION["amount"]; 
    $today=$_SESSION["today"];
    $account=$_SESSION["account"];
    $ifsc=$_SESSION["ifsc"];
    $fee=$_SESSION["fee"];
    $total=$_SESSION["total"];

    $pdf->SetFont('Arial','B',20);
    $pdf->Cell(280,35,"BANK RECEIPT",0,0,"C");
    $pdf->Image("star2.jpeg",10,10,70,30);
    $pdf->Cell(30,50,"",0,1,'C');
   
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(60,10,"BENEFICIARY NAME: ",0,0,);
    $pdf->SetFont('Arial','',16);
    $pdf->Cell(20,10,$b_name,0,0,);
    $pdf->Ln();
    
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(81,10,"BENEFICIARY ACCOUNT NO: ",0,0);
    $pdf->SetFont('Arial','',16);
    $pdf->Cell(100,10,$account,0,0);
    $pdf->Ln();
    
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(30,10,"AMOUNT: ",0,0);
    $pdf->SetFont('Arial','',16);
    $pdf->Cell(20,10,$amount,0,0);
    $pdf->Ln();

    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(20,10,"DATE: ",0,0);
    $pdf->SetFont('Arial','',16);
    $pdf->Cell(20,10,$today,0,0);
    $pdf->Ln();

    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(53,10,"BANK IFSC CODE: ",0,0);
    $pdf->SetFont('Arial','',16);
    $pdf->Cell(20,10,$ifsc,0,0);
    $pdf->Ln();

    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(55,10,"CONVINIENCE FEE: ",0,0);
    $pdf->SetFont('Arial','',16);
    $pdf->Cell(20,10,$fee,0,0);
    $pdf->Ln();

    $pdf->SetFont('Arial','B',20);
    $pdf->Cell(150,10,"TOTAL: ",0,0,'R');
    $pdf->SetFont('Arial','',20);
    $pdf->Cell(20,10,$total,0,0);
    $pdf->Ln();

    $pdf->Output();
?>