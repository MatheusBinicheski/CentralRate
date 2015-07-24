<?php 
 session_start(); 

 $teste = $_GET['valor'];

 if($teste != ''){

 $dataInicio  = $_GET['dataInicio'];
 $dataFinal = $_GET['dataFinal'];
 $ramal1 = $_GET['ramal1'];
 $ramal4 = $_GET['ramal1'];
 $valor = $_GET['valor'];
 $valor2 = $_GET['valor2'];
 $valor3 = $_GET['valor3'];
 $tipo = $_GET['tipo1'];
 $ramal = explode(",", $ramal1);

 $_SESSION['dataInicio'] = $dataInicio;
 $_SESSION['dataFinal'] = $dataFinal;
 $_SESSION['ramal'] = $ramal;
 $_SESSION['valor'] = $valor;
 $_SESSION['valor2'] = $valor2;
 $_SESSION['valor3'] = $valor3;
 $_SESSION['tipo1'] = $tipo;
 
 $DB_HOST = '127.0.0.1';
 $DB_USER = 'root';
 $DB_PASS = '';
 $DB_NAME = 'asteriskcdrdb';
 $mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

 if ($tipo == '1'){	
	for ($i = 0; $i <= 150; $i++) {
                if($ramal[$i] != ''){
                $ramal2 = $ramal[$i];
		
		$query="select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $valor), 2) as total from cdr where calldate >= '$dataInicio 00:00:00' and calldate <= '$dataFinal 23:59:59' and src = $ramal2 and dst > 6000 and (select substring(dst,1,1)) < 5 and (select length(dst) as numero2) = 8 and disposition = 'ANSWERED' order by calldate";

   		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
                while ($row1 = $result->fetch_object()){
                        $tempo = str_replace(",",".","$row1->billsec");
                        $total_seconds = $total_seconds + $tempo;
                        $total_preco = $total_preco + $row1->total;
                }
		$total_seconds = number_format($total_seconds, 2, ',', '');;
                $total_preco = number_format($total_preco, 2, ',', '');;
	  }
	}
     }

  if ($tipo == '2'){
        for ($i = 0; $i <= 150; $i++) {
                if($ramal[$i] != ''){
                $ramal2 = $ramal[$i];
		
		$query="select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $valor), 2) as total from cdr where calldate >= '$dataInicio 00:00:00' and calldate <= '$dataFinal 23:59:59' and src = $ramal2 and dst > 6000 and (select substring(dst,3,1)) BETWEEN 1 AND 5 and (select length(dst) as numero2) = 10 and disposition = 'ANSWERED' union select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $valor), 2) as total from cdr where calldate >= '$dataInicio 00:00:00' and calldate <= '$dataFinal 23:59:59' and src = $ramal2 and dst > 6000 and (select substring(dst,4,1)) BETWEEN 1 AND 5 and (select length(dst) as numero2) = 11 and disposition = 'ANSWERED' union select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $valor), 2) as total from cdr where calldate >= '$dataInicio 00:00:00' and calldate <= '$dataFinal 23:59:59' and src = $ramal2 and dst > 6000 and (select substring(dst,6,1)) BETWEEN 1 AND 5 and (select length(dst) as numero2) = 13 and disposition = 'ANSWERED' order by calldate";
	
                $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
                while ($row1 = $result->fetch_object()){
                        $tempo = str_replace(",",".","$row1->billsec");
                        $total_seconds = $total_seconds + $tempo;
                        $total_preco = $total_preco + $row1->total;
                }
                $total_seconds = number_format($total_seconds, 2, ',', '');;
                $total_preco = number_format($total_preco, 2, ',', '');;
          }
        }
     }

  if ($tipo == '3'){
        for ($i = 0; $i <= 150; $i++) {
                if($ramal[$i] != ''){
                $ramal2 = $ramal[$i];

		$query="select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $valor), 2) as total from cdr where calldate >= '$dataInicio 00:00:00' and calldate <= '$dataFinal 23:59:59' and dst > 6000 and (select substring(dst,1,1)) > 6 and (select length(dst) as numero2) = 8 and disposition = 'ANSWERED' and src = $ramal2 union select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $valor), 2) as total from cdr where calldate >= '$dataInicio 00:00:00' and calldate <= '$dataFinal 23:59:59' and dst > 6000 and (select substring(dst,4,1)) > 7 and (select length(dst) as numero2) = 11 and disposition = 'ANSWERED' and src = $ramal2 union select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $valor), 2) as total from cdr where calldate >= '$dataInicio 00:00:00' and calldate <= '$dataFinal 23:59:59' and dst > 6000 and (select substring(dst,3,1)) > 7 and (select length(dst) as numero2) = 10 and disposition = 'ANSWERED' and src = $ramal2 union select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $valor), 2) as total from cdr where calldate >= '$dataInicio 00:00:00' and calldate <= '$dataFinal 23:59:59' and dst > 6000 and (select substring(dst,6,1)) > 7 and (select length(dst) as numero2) = 13 and disposition = 'ANSWERED' and src = $ramal2";	

                $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
                while ($row1 = $result->fetch_object()){
                        $tempo = str_replace(",",".","$row1->billsec");
                        $total_seconds = $total_seconds + $tempo;
                        $total_preco = $total_preco + $row1->total;
                }
                $total_seconds = number_format($total_seconds, 2, ',', '');;
                $total_preco = number_format($total_preco, 2, ',', '');;
          }
        }
     }
  if ($tipo == '4')
{
for ($i = 0; $i < 4; $i++) {
    if($i = 1){
        for ($i2 = 0; $i2 <= 150; $i2++) {
                if($ramal[$i2] != ''){
                $ramal2 = $ramal[$i2];
        $query="select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $valor), 2) as total from cdr where calldate >= '$dataInicio 00:00:00' and calldate <= '$dataFinal 23:59:59' and src = $ramal2 and dst > 6000 and (select substring(dst,1,1)) < 5 and (select length(dst) as numero2) = 8 and disposition = 'ANSWERED' order by calldate";

                $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	     while ($row1 = $result->fetch_object()){
                        $tempo1 = str_replace(",",".","$row1->billsec");
                        $total_seconds1 = $total_seconds1 + $tempo1;
                        $total_preco1 = $total_preco1 + $row1->total;
                }
        }
    }
}
if($i = 2){
        for ($i3 = 0; $i3 <= 150; $i3++) {
        if($ramal[$i3] != ''){
        $ramal3 = $ramal[$i3];
        $query2="select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $valor2), 2) as total from cdr where calldate >= '$dataInicio 00:00:00' and calldate <= '$dataFinal 23:59:59' and src = $ramal3 and dst > 6000 and (select substring(dst,3,1)) BETWEEN 1 AND 5 and (select length(dst) as numero2) = 10 and disposition = 'ANSWERED' union select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $valor2), 2) as total from cdr where calldate >= '$dataInicio 00:00:00' and calldate <= '$dataFinal 23:59:59' and src = $ramal3 and dst > 6000 and (select substring(dst,4,1)) BETWEEN 1 AND 5 and (select length(dst) as numero2) = 11 and disposition = 'ANSWERED' union select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $valor2), 2) as total from cdr where calldate >= '$dataInicio 00:00:00' and calldate <= '$dataFinal 23:59:59' and src = $ramal3 and dst > 6000 and (select substring(dst,6,1)) BETWEEN 1 AND 5 and (select length(dst) as numero2) = 13 and disposition = 'ANSWERED' order by calldate";
 $result2 = $mysqli->query($query2) or die($mysqli->error.__LINE__);
	while ($row2 = $result2->fetch_object()){
                        $tempo2 = str_replace(",",".","$row2->billsec");
                        $total_seconds2 = $total_seconds2 + $tempo2;
                        $total_preco2 = $total_preco2 + $row2->total;
                }
        }
    }
}

if($i = 3){
        for ($i2 = 0; $i2 <= 150; $i2++) {
        if($ramal[$i2] != ''){
        $ramal2 = $ramal[$i2];
        $query3="select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $valor3), 2) as total from cdr where calldate >= '$dataInicio 00:00:00' and calldate <= '$dataFinal 23:59:59' and dst > 6000 and (select substring(dst,1,1)) > 6 and (select length(dst) as numero2) = 8 and disposition = 'ANSWERED' and src = $ramal2 union select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $valor3), 2) as total from cdr where calldate >= '$dataInicio 00:00:00' and calldate <= '$dataFinal 23:59:59' and dst > 6000 and (select substring(dst,4,1)) > 7 and (select length(dst) as numero2) = 11 and disposition = 'ANSWERED' and src = $ramal2 union select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $valor3), 2) as total from cdr where calldate >= '$dataInicio 00:00:00' and calldate <= '$dataFinal 23:59:59' and dst > 6000 and (select substring(dst,3,1)) > 7 and (select length(dst) as numero2) = 10 and disposition = 'ANSWERED' and src = $ramal2 union select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $valor3), 2) as total from cdr where calldate >= '$dataInicio 00:00:00' and calldate <= '$dataFinal 23:59:59' and dst > 6000 and (select substring(dst,6,1)) > 7 and (select length(dst) as numero2) = 13 and disposition = 'ANSWERED' and src = $ramal2";

 $result3 = $mysqli->query($query3) or die($mysqli->error.__LINE__);
	    while ($row3 = $result3->fetch_object()){
                        $tempo3 = str_replace(",",".","$row3->billsec");
                        $total_seconds3 = $total_seconds3 + $tempo3;
                        $total_preco3 = $total_preco3 + $row3->total;
                }
            }
        }
}
	$total_seconds = $total_seconds1 + $total_seconds2 + $total_seconds3;
        $total_preco = $total_preco1 + $total_preco2 + $total_preco3;
}
	$total_seconds = number_format($total_seconds, 2, ',', '');;
        $total_preco = number_format($total_preco, 2, ',', '');;
}
     $ramal2 = $ramal1;
     $ramal2 = $ramal2[2];
     if($ramal2 == '1' || $ramal2 == '2' || $ramal2 == '3' || $ramal2 == '4' || $ramal2 == '5'){
	$ramal1 = substr($ramal1, 0, 3);
}else{
	$ramal1 = substr($ramal1, 0, 2);
}	
     Header ("location: ../index.php?tipo=" . $tipo . "&tempo=" . $total_seconds ."&valor=" . $total_preco . "&ramal1=" . $ramal1 . "&dataInicio=" . $dataInicio . "&dataFinal=" . $dataFinal . "&ramal4=" . $ramal4 . "");

}else{

 $a = $_SESSION['dataInicio'];
 $b = $_SESSION['dataFinal'];
 $c = $_SESSION['ramal'];
 $d = $_SESSION['valor'];
 $f = $_SESSION['valor2'];
 $g = $_SESSION['valor3'];
 $e = $_SESSION['tipo1'];

$DB_HOST = '127.0.0.1';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'asteriskcdrdb';
$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);


if ($e == '1')
{
for ($i = 0; $i <= 150; $i++) {
                if($c[$i] != ''){
                $ramal2 = $c[$i];

$query="select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $d), 2) as total from cdr where calldate >= '$a 00:00:00' and calldate <= '$b 23:59:59' and src = $ramal2 and dst > 6000 and (select substring(dst,1,1)) < 5 and (select length(dst) as numero2) = 8 and disposition = 'ANSWERED' order by calldate";

		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
        	while($row = $result->fetch_assoc()) {
                $arr[] = $row;
                }
	    }
	}
    }


else if ($e == '2')
{
for ($i = 0; $i <= 150; $i++) {
                if($c[$i] != ''){
                $ramal2 = $c[$i];

$query="select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $d), 2) as total from cdr where calldate >= '$a 00:00:00' and calldate <= '$b 23:59:59' and src = $ramal2 and dst > 6000 and (select substring(dst,3,1)) BETWEEN 1 AND 5 and (select length(dst) as numero2) = 10 and disposition = 'ANSWERED' union select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $d), 2) as total from cdr where calldate >= '$a 00:00:00' and calldate <= '$b 23:59:59' and src = $ramal2 and dst > 6000 and (select substring(dst,4,1)) BETWEEN 1 AND 5 and (select length(dst) as numero2) = 11 and disposition = 'ANSWERED' union select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $d), 2) as total from cdr where calldate >= '$a 00:00:00' and calldate <= '$b 23:59:59' and src = $ramal2 and dst > 6000 and (select substring(dst,6,1)) BETWEEN 1 AND 5 and (select length(dst) as numero2) = 13 and disposition = 'ANSWERED' order by calldate";
 $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
        while($row = $result->fetch_assoc()) {
                $arr[] = $row;
               }
           }
      }
}

else if ($e == '3')
{
for ($i = 0; $i <= 150; $i++) {
                if($c[$i] != ''){
                $ramal2 = $c[$i];
	$query="select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $d), 2) as total from cdr where calldate >= '$a 00:00:00' and calldate <= '$b 23:59:59' and dst > 6000 and (select substring(dst,1,1)) > 6 and (select length(dst) as numero2) = 8 and disposition = 'ANSWERED' and src = $ramal2 union select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $d), 2) as total from cdr where calldate >= '$a 00:00:00' and calldate <= '$b 23:59:59' and dst > 6000 and (select substring(dst,4,1)) > 7 and (select length(dst) as numero2) = 11 and disposition = 'ANSWERED' and src = $ramal2 union select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $d), 2) as total from cdr where calldate >= '$a 00:00:00' and calldate <= '$b 23:59:59' and dst > 6000 and (select substring(dst,3,1)) > 7 and (select length(dst) as numero2) = 10 and disposition = 'ANSWERED' and src = $ramal2 union select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $d), 2) as total from cdr where calldate >= '$a 00:00:00' and calldate <= '$b 23:59:59' and dst > 6000 and (select substring(dst,6,1)) > 7 and (select length(dst) as numero2) = 13 and disposition = 'ANSWERED' and src = $ramal2"; 
	
 $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
        while($row = $result->fetch_assoc()) {
                $arr[] = $row;
               }
           }
      }
}

else if ($e == '4')
{
for ($i = 0; $i < 4; $i++) {
    if($i = 1){
        for ($i2 = 0; $i2 <= 150; $i2++) {
                if($c[$i2] != ''){
                $ramal2 = $c[$i2];
        $query="select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $d), 2) as total from cdr where calldate >= '$a 00:00:00' and calldate <= '$b 23:59:59' and src = $ramal2 and dst > 6000 and (select substring(dst,1,1)) < 5 and (select length(dst) as numero2) = 8 and disposition = 'ANSWERED' order by calldate";

                $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
                while($row = $result->fetch_assoc()) {
                $arr[] = $row;
                }
        }
    }
}
if($i = 2){
        for ($i3 = 0; $i3 <= 150; $i3++) {
        if($c[$i3] != ''){
        $ramal3 = $c[$i3];
        $query2="select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $f), 2) as total from cdr where calldate >= '$a 00:00:00' and calldate <= '$b 23:59:59' and src = $ramal3 and dst > 6000 and (select substring(dst,3,1)) BETWEEN 1 AND 5 and (select length(dst) as numero2) = 10 and disposition = 'ANSWERED' union select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $f), 2) as total from cdr where calldate >= '$a 00:00:00' and calldate <= '$b 23:59:59' and src = $ramal3 and dst > 6000 and (select substring(dst,4,1)) BETWEEN 1 AND 5 and (select length(dst) as numero2) = 11 and disposition = 'ANSWERED' union select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $f), 2) as total from cdr where calldate >= '$a 00:00:00' and calldate <= '$b 23:59:59' and src = $ramal3 and dst > 6000 and (select substring(dst,6,1)) BETWEEN 1 AND 5 and (select length(dst) as numero2) = 13 and disposition = 'ANSWERED' order by calldate";
 $result2 = $mysqli->query($query2) or die($mysqli->error.__LINE__);
        while($row2 = $result2->fetch_assoc()) {
                $arr[] = $row2;
               }
        }
    }
}

if($i = 3){
        for ($i2 = 0; $i2 <= 150; $i2++) {
        if($c[$i2] != ''){
        $ramal2 = $c[$i2];
        $query3="select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $g), 2) as total from cdr where calldate >= '$a 00:00:00' and calldate <= '$b 23:59:59' and dst > 6000 and (select substring(dst,1,1)) > 6 and (select length(dst) as numero2) = 8 and disposition = 'ANSWERED' and src = $ramal2 union select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $g), 2) as total from cdr where calldate >= '$a 00:00:00' and calldate <= '$b 23:59:59' and dst > 6000 and (select substring(dst,4,1)) > 7 and (select length(dst) as numero2) = 11 and disposition = 'ANSWERED' and src = $ramal2 union select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $g), 2) as total from cdr where calldate >= '$a 00:00:00' and calldate <= '$b 23:59:59' and dst > 6000 and (select substring(dst,3,1)) > 7 and (select length(dst) as numero2) = 10 and disposition = 'ANSWERED' and src = $ramal2 union select distinct src, dst, calldate, REPLACE(FORMAT(billsec /60, 2), '.', ',') as billsec, FORMAT(((billsec /60) * $g), 2) as total from cdr where calldate >= '$a 00:00:00' and calldate <= '$b 23:59:59' and dst > 6000 and (select substring(dst,6,1)) > 7 and (select length(dst) as numero2) = 13 and disposition = 'ANSWERED' and src = $ramal2";

 $result3 = $mysqli->query($query3) or die($mysqli->error.__LINE__);
        while($row3 = $result3->fetch_assoc()) {
                $arr[] = $row3;
               }
            }
        }
}
}
}
# JSON-encode the response
$json_response = json_encode($arr);
// # Return the response
echo $json_response;
}        	
?>
