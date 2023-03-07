<?php
   session_start();
   require('C:\xampp\htdocs\pdf2\fpdf.php');
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',20);
    $pdf->Cell(280,35,"TRANSACTION STATEMENT",0,0,"C");
    $pdf->Image("star2.jpeg",10,10,70,30);
    $pdf->Cell(30,50,"",0,1,'C');
    $pdf->SetFont('Arial','B',12);
    $con=mysqli_connect('localhost','root','','db_cus') or die("Connection Failed");
    $acc = $_SESSION["acc_no"];

    $result=mysqli_query($con,"select * from statement where ACCOUNT_NO = " .$acc. "");
    $pdf->Cell(35,10,"Transaction ID",1,0,'C');
    $pdf->Cell(35,10,"Date",1,0,'C');
    $pdf->Cell(57,10,"Description",1,0,'C');
    $pdf->Cell(35,10,"Type",1,0,'C');
    $pdf->Cell(35,10,"Amount",1,0,'C');
    $pdf->Ln();
    while($row=mysqli_fetch_assoc($result))
    {
        if ($row['DESCC'] == "netbanking" && $row['TYPE'] == "withdraw")
        {
          $desc = "netbanking done to " .$row['B_ACC'];
        }
        elseif ($row['DESCC'] == "netbanking" && $row['TYPE'] == "deposit")
        {
          $desc = "netbanking done from " .$row['B_ACC'];
        }
        else
        {
          $desc = $row['DESCC'];
        }
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(35,10,$row['TRANS_ID'],1,0,'C');
        $pdf->Cell(35,10,$row['TRANS_DATE'],1,0,'C');
        $pdf->Cell(57,10,$desc,1,0,'C');
        $pdf->Cell(35,10,$row['TYPE'],1,0,'C');
        $pdf->Cell(35,10,$row['AMOUNT'],1,0,'C');
        $pdf->Ln();
    }
    $pdf->Output();
?>