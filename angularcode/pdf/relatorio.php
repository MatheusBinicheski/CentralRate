<?php

 $dataInicio  = $_GET['dataInicio'];
 $dataFinal = $_GET['dataFinal'];
 $ramal3 = $_GET['ramal'];
 $valor = $_GET['valor'];
 $valor2 = $_GET['valor2'];
 $valor3 = $_GET['valor3'];
 $tipo = $_GET['tipo1'];
 $ramal = explode(",", $ramal3);
 $ramal1 = $_GET['ramal1'];
 $valor2 = $_GET['valor2'];
 $tempo = $_GET['tempo'];

    if($tipo == '1'){
        $tipoLigacao = 'Ligações Locais';
        }
    else if($tipo == '2'){
        $tipoLigacao = 'Ligações Nacionais';
        }
    else if($tipo == '3'){
        $tipoLigacao = 'Ligações Celular';
        }
    else if($tipo == '4'){
        $tipoLigacao = 'Todos os Tipos de Ligação';
        }
        if($ramal1 == '-1'){
        $setor = 'Todos os Setores';
        }
        if($ramal1 == '-2'){
        $setor = 'Setor Geral';
        }
        if($ramal1 == '-3'){
        $setor = 'Administrativo / Financeiro';
        }
        if($ramal1 == '-4'){
        $setor = 'Assessoria de Comunicação';
        }
        if($ramal1 == '-5'){
        $setor = 'Assessoria Jurídica';
        }
        if($ramal1 == '-6'){
        $setor = 'CITSaúde';
        }
        if($ramal1 == '-7'){
        $setor = 'Comercial';
        }
        if($ramal1 == '-8'){
        $setor = 'Consultoria / Governança';
        }
        if($ramal1 == '-9'){
        $setor = 'Diretoria';
        }
        if($ramal1 == '-10'){
        $setor = 'DP';
        }
        if($ramal1 == '-11'){
        $setor = 'Infraestrutura';
        }
        if($ramal1 == '-12'){
        $setor = 'Núcleo de Atendimento e Suporte - CITSmart';
        }
        if($ramal1 == '-13'){
        $setor = 'Qualidade';
        }
        if($ramal1 == '-14'){
        $setor = 'RH';
        }
        if($ramal1 == '-15'){
        $setor = 'Superintendentes';
        }

require('fpdf.php');
define("FPDF_FONTPATH","font");


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,10, utf8_decode("$tipoLigacao - $setor"), 1, 1);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(30,10, 'Ramal', 1, 0);
$pdf->Cell(40,10, 'Numero Discado', 1, 0);
$pdf->Cell(40,10, 'Data', 1, 0);
$pdf->Cell(40,10, 'Tempo(M)', 1, 0);
$pdf->Cell(40,10, 'Valor(R$)', 1, 1);


    include 'abreConexao1.php';
   
    for ($i = 0; $i <= 150; $i++) {
                if($ramal[$i] != ''){
                $ramal2 = $ramal[$i];
    if ($tipo == '1'){
    $sql = "select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $valor), 2) as total from cdr where calldate >= '$dataInicio 00:00:00' and calldate <= '$dataFinal 23:59:59' and src = $ramal2 and dst > 6000 and (select substring(dst,1,1)) < 5 and (select length(dst) as numero2) = 8 and disposition = 'ANSWERED' order by calldate";
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
}
     if ($tipo == '2'){
    $sql = "select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $valor2), 2) as total from cdr where calldate >= '$dataInicio 00:00:00' and calldate <= '$dataFinal 23:59:59' and src = $ramal2 and dst > 6000 and (select substring(dst,3,1)) BETWEEN 1 AND 5 and (select length(dst) as numero2) = 10 and disposition = 'ANSWERED' union select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $valor2), 2) as total from cdr where calldate >= '$dataInicio 00:00:00' and calldate <= '$dataFinal 23:59:59' and src = $ramal2 and dst > 6000 and (select substring(dst,4,1)) BETWEEN 1 AND 5 and (select length(dst) as numero2) = 11 and disposition = 'ANSWERED' union select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $valor2), 2) as total from cdr where calldate >= '$dataInicio 00:00:00' and calldate <= '$dataFinal 23:59:59' and src = $ramal2 and dst > 6000 and (select substring(dst,6,1)) BETWEEN 1 AND 5 and (select length(dst) as numero2) = 13 and disposition = 'ANSWERED' order by calldate";
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
}
    if ($tipo == '3'){
    $sql = "select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $valor3), 2) as total from cdr where calldate >= '$dataInicio 00:00:00' and calldate <= '$dataFinal 23:59:59' and dst > 6000 and (select substring(dst,1,1)) > 6 and (select length(dst) as numero2) = 8 and disposition = 'ANSWERED' and src = $ramal2 union select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $valor3), 2) as total from cdr where calldate >= '$dataInicio 00:00:00' and calldate <= '$dataFinal 23:59:59' and dst > 6000 and (select substring(dst,4,1)) > 7 and (select length(dst) as numero2) = 11 and disposition = 'ANSWERED' and src = $ramal2 union select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $valor3), 2) as total from cdr where calldate >= '$dataInicio 00:00:00' and calldate <= '$dataFinal 23:59:59' and dst > 6000 and (select substring(dst,3,1)) > 7 and (select length(dst) as numero2) = 10 and disposition = 'ANSWERED' and src = $ramal2 union select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $valor3), 2) as total from cdr where calldate >= '$dataInicio 00:00:00' and calldate <= '$dataFinal 23:59:59' and dst > 6000 and (select substring(dst,6,1)) > 7 and (select length(dst) as numero2) = 13 and disposition = 'ANSWERED' and src = $ramal2";
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
}
    if ($tipo == '4'){
    for ($i2 = 0; $i2 < 4; $i2++) {
    if($i2 = 1){
      		$sql = "select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $valor), 2) as total from cdr where calldate >= '$dataInicio 00:00:00' and calldate <= '$dataFinal 23:59:59' and src = $ramal2 and dst > 6000 and (select substring(dst,1,1)) < 5 and (select length(dst) as numero2) = 8 and disposition = 'ANSWERED' order by calldate";
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
       }
    if($i2 = 2){
                $sql = "select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $valor2), 2) as total from cdr where calldate >= '$dataInicio 00:00:00' and calldate <= '$dataFinal 23:59:59' and src = $ramal2 and dst > 6000 and (select substring(dst,3,1)) BETWEEN 1 AND 5 and (select length(dst) as numero2) = 10 and disposition = 'ANSWERED' union select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $valor2), 2) as total from cdr where calldate >= '$dataInicio 00:00:00' and calldate <= '$dataFinal 23:59:59' and src = $ramal2 and dst > 6000 and (select substring(dst,4,1)) BETWEEN 1 AND 5 and (select length(dst) as numero2) = 11 and disposition = 'ANSWERED' union select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $valor2), 2) as total from cdr where calldate >= '$dataInicio 00:00:00' and calldate <= '$dataFinal 23:59:59' and src = $ramal2 and dst > 6000 and (select substring(dst,6,1)) BETWEEN 1 AND 5 and (select length(dst) as numero2) = 13 and disposition = 'ANSWERED' order by calldate";
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
   }
   if($i2 = 3){
                $sql = "select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $valor3), 2) as total from cdr where calldate >= '$dataInicio 00:00:00' and calldate <= '$dataFinal 23:59:59' and dst > 6000 and (select substring(dst,1,1)) > 6 and (select length(dst) as numero2) = 8 and disposition = 'ANSWERED' and src = $ramal2 union select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $valor3), 2) as total from cdr where calldate >= '$dataInicio 00:00:00' and calldate <= '$dataFinal 23:59:59' and dst > 6000 and (select substring(dst,4,1)) > 7 and (select length(dst) as numero2) = 11 and disposition = 'ANSWERED' and src = $ramal2 union select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $valor3), 2) as total from cdr where calldate >= '$dataInicio 00:00:00' and calldate <= '$dataFinal 23:59:59' and dst > 6000 and (select substring(dst,3,1)) > 7 and (select length(dst) as numero2) = 10 and disposition = 'ANSWERED' and src = $ramal2 union select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $valor3), 2) as total from cdr where calldate >= '$dataInicio 00:00:00' and calldate <= '$dataFinal 23:59:59' and dst > 6000 and (select substring(dst,6,1)) > 7 and (select length(dst) as numero2) = 13 and disposition = 'ANSWERED' and src = $ramal2";
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
    }
  }
}
}
}

   	$pdf->SetFont('Arial','',10);
        $pdf->Cell(95,10, utf8_decode("Tempo Total - $tempo"), 1, 0);
        $pdf->Cell(95,10, utf8_decode("Valor Total - $valor2"), 1, 1);
   include 'fechaConexao.php';

$pdf->Output();
?>
