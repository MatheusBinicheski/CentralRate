<?php
require('../inc/fpdf.php');
define("FPDF_FONTPATH","../inc/font");


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,10, utf8_decode('Relatório de provas'), 1, 1);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,10, 'Data de cadastro', 1, 0);
$pdf->Cell(50,10, 'Nome turma', 1, 0);
$pdf->Cell(50,10, 'Nome professor', 1, 0);
$pdf->Cell(30,10, 'Data da prova', 1, 0);
$pdf->Cell(20,10, 'Valor', 1, 1);

    include '../inc/abreConexao.php';

    $sql = "SELECT P.*, T.nome as nomeTurma, P2.nome as nomeProfessor, DATE_FORMAT(P.data_cadastro, '%d/%m/%Y') as dataCadastroDF, DATE_FORMAT(P.data_prova, '%d/%m/%Y') as dataProvaDF FROM tb_prova P
            INNER JOIN tb_turma T ON T.id = P.id_turma
            INNER JOIN tb_professor P2 ON P2.id = P.id_professor";
    $resultado = mysql_query($sql);

    while($linha = mysql_fetch_assoc($resultado))
    {
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(40,10, utf8_decode($linha['dataCadastroDF']), 1, 0);
        $pdf->Cell(50,10, utf8_decode($linha['nomeTurma']), 1, 0);
        $pdf->Cell(50,10, utf8_decode($linha['nomeProfessor']), 1, 0);
        $pdf->Cell(30,10, utf8_decode($linha['dataProvaDF']), 1, 0);
        $pdf->Cell(20,10, utf8_decode($linha['valor']), 1, 1);
        
     }

    include '../inc/fechaConexao.php';


$pdf->Output();
?>