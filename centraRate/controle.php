<?php
	
	$tipoLigacao = $_POST['tipo'];
	$dataInicio2 = $_POST['daterange'];
	$dataFinal2 = $_POST['daterange'];
	$ramal1 = implode(",", $_POST['ramais']);
	$dataInicio1 = substr($dataInicio2, 0, 10);
	$dataInicio = date("Y-m-d", strtotime($dataInicio1));		
	$dataFinal1 = substr($dataFinal2, -10, 10);
	$dataFinal = date("Y-m-d", strtotime($dataFinal1));
	
	if ($tipoLigacao == '1'){
	$tipo = 1;
	Header("Location: ../angularcode/ajax/getCustomers.php?dataInicio=" . $dataInicio . "&dataFinal=" . $dataFinal . "&ramal1=" . $ramal1 . "&tipo1=" . $tipo . "&valor=0.11");
	}
	else if ($tipoLigacao == '2'){
	 $tipo = 2;
        Header("Location: ../angularcode/ajax/getCustomers.php?dataInicio=" . $dataInicio . "&dataFinal=" . $dataFinal . "&ramal1=" . $ramal1 . "&tipo1=" . $tipo . "&valor=0.25");
	}
	else if ($tipoLigacao == '3'){
	$tipo = 3;
        Header("Location: ../angularcode/ajax/getCustomers.php?dataInicio=" . $dataInicio . "&dataFinal=" . $dataFinal . "&ramal1=" . $ramal1 . "&tipo1=" . $tipo . "&valor=0.81");
        }
	else if ($tipoLigacao == '4'){
        $tipo = 4;
        Header("Location: ../angularcode/ajax/getCustomers.php?dataInicio=" . $dataInicio . "&dataFinal=" . $dataFinal . "&ramal1=" . $ramal1 . "&tipo1=" . $tipo . "&valor=0.11&valor2=0.25&valor3=0.81");
}
?>
