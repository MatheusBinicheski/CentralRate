<?php
require('../inc/fpdf.php');
define("FPDF_FONTPATH","../inc/font");


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,10, utf8_decode('Relatório de questões'), 1, 1);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(70,10, 'Pergunta', 1, 0);
$pdf->Cell(70,10, 'Gabarito', 1, 0);
$pdf->Cell(50,10, utf8_decode('Nível'), 1, 1);

    include '../inc/abreConexao.php';

    $sql = "SELECT *, DATE_FORMAT(Q.data_cadastro, '%d/%m/%Y') as dataCadastroDF FROM tb_questao Q";
    $resultado = mysql_query($sql);

    while($linha = mysql_fetch_assoc($resultado))
    {
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(70,10, utf8_decode($linha['pergunta']), 1, 0);
        $pdf->Cell(70,10, utf8_decode($linha['gabarito']), 1, 0);
        $pdf->Cell(50,10, utf8_decode($linha['nivel']), 1, 1);
        
     }

    include '../inc/fechaConexao.php';


$pdf->Output();
?>