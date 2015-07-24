<?php
require('../inc/fpdf.php');
define("FPDF_FONTPATH","../inc/font");


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,10, utf8_decode('Relatório de turmas'), 1, 1);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,10, 'Nome', 1, 0);
$pdf->Cell(50,10, 'Curso', 1, 0);
$pdf->Cell(40,10, utf8_decode('Instituição'), 1, 0);
$pdf->Cell(50,10, 'Professor', 1, 1);

    include '../inc/abreConexao.php';

    $sql = "SELECT T.*, P.nome as nomeProfessor , DATE_FORMAT(T.data_cadastro, '%d/%m/%Y') as dataCadastroDF
            FROM tb_turma T
            INNER JOIN tb_professor P ON P.id = T.id_professor";
    $resultado = mysql_query($sql);

    while($linha = mysql_fetch_assoc($resultado))
    {
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(50,10, utf8_decode($linha['nome']), 1, 0);
        $pdf->Cell(50,10, utf8_decode($linha['curso']), 1, 0);
        $pdf->Cell(40,10, utf8_decode($linha['instituicao']), 1, 0);
        $pdf->Cell(50,10, utf8_decode($linha['nomeProfessor']), 1, 1);
        
     }

    include '../inc/fechaConexao.php';


$pdf->Output();
?>