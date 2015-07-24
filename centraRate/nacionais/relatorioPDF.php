<?php
require('../inc/fpdf.php');
define("FPDF_FONTPATH","../inc/font");


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,10, utf8_decode('Tipo Ligação'), 1, 1);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(30,10, 'Ramal', 1, 0);
$pdf->Cell(40,10, 'Numero Discado', 1, 0);
$pdf->Cell(40,10, 'Data', 1, 0);
$pdf->Cell(40,10, 'Tempo(M)', 1, 0);
$pdf->Cell(40,10, 'Valor(R$)', 1, 1);


    include '../inc/abreConexao1.php';

    $sql = "select src, dst, billsec, calldate from cdr where dst > 6000 and '4060' = src and (select substring(dst,1,1)) < 5 and (select length(dst) as numero2) = 8 and calldate >= '2015-02-01 00:00:00' AND calldate <= '2015-03-01 23:59:59' AND disposition = 'ANSWERED'";
    $resultado = mysql_query($sql);

    while($linha = mysql_fetch_assoc($resultado))
    {
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(30,10, utf8_decode($linha['src']), 1, 0);
        $pdf->Cell(40,10, utf8_decode($linha['dst']), 1, 0);
        $pdf->Cell(40,10, utf8_decode($linha['calldate']), 1, 0);
	$pdf->Cell(40,10, utf8_decode($linha['billsec']), 1, 0);
	$pdf->Cell(40,10, utf8_decode($linha['total']), 1, 1);
        
     }

    include '../inc/fechaConexao.php';


$pdf->Output();
?>
