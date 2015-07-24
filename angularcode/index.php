<?php
    require("../login/config.php");
    if(empty($_SESSION['user']))
    {
        header("Location: ../login/index.php");
        die("Redirecting to index.php");
    }
?>
<!DOCTYPE html>
<html ng-app="myApp" ng-app lang="en">
<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    ul>li, a{cursor: pointer;}
    </style>
    <title>Faturamento</title>
    <!-- Bootstrap Padrão centralRate -->
    <link rel="icon" href="../centralRate/logo_central.png">

    <!-- Bootstrap core CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">	
	
</head>
<body>
<div class="navbar navbar-default" id="navbar">
    <div class="container" id="navbar-container">
    <div class="navbar-header">
	<ul class="nav pull-right">
<li><a class="btn btn-lg btn-primary btn-block" href="../login/logout.php">Sair</a></li>
<li><a class="btn btn-lg btn-primary btn-block" href="../centralRate/index.php">Voltar a Consulta</a></li>
</ul>
<h1 class="form-signin"><img alt="CentralRate" src="../centralRate/logo_central.png"></h1>

<div ng-controller="customersCrtl">
<div class="container">
<br/>
    <?php
    $tipo = $_GET['tipo'];
    $ramal1 = $_GET['ramal1'];
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
    echo"<h1 class='form-signin-heading'>$tipoLigacao - $setor</h1>";
    ?>	

    <div class="row">
        <div class="col-md-2">PageSize:
            <select ng-model="entryLimit" class="form-control">
                <option>5</option>
                <option>10</option>
                <option>20</option>
                <option>50</option>
                <option>100</option>
		<option>200</option>
            </select>
        </div>
        <div class="col-md-3">Filter:
            <input type="text" ng-model="search" ng-change="filter()" placeholder="Filter" class="form-control" />
        </div>
        <div class="col-md-4">
            <h5>Registros Filtrados {{ filtered.length }} de {{ totalItems}} total ligações</h5>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12" ng-show="filteredItems > 0">
            <table class="table table-striped table-bordered">
            <thead>
            <th>Ramal&nbsp;<a ng-click="sort_by('src');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>Número Discado&nbsp;<a ng-click="sort_by('dst');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>Data&nbsp;<a ng-click="sort_by('calldate');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>Tempo (M)&nbsp;<a ng-click="sort_by('billsec');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>Valor (R$)&nbsp;<a ng-click="sort_by('total');"><i class="glyphicon glyphicon-sort"></i></a></th>
            </thead>
            <tbody>
                <tr ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                    <td>{{data.src}}</td>
                    <td>{{data.dst}}</td>
                    <td>{{data.calldate}}</td>
                    <td>{{data.billsec}}</td>
                    <td>{{data.total}}</td>
                </tr>
            </tbody>
            </table>
        </div>
        <div class="col-md-12" ng-show="filteredItems == 0">
            <div class="col-md-12">
                <h4>Nenhuma Ligação Encontrada!</h4>
            </div>
        </div>
        <div class="col-md-12" ng-show="filteredItems > 0">    
            <div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
            
        </div>
    </div>
</div>
<?php
 $dataInicio  = $_GET['dataInicio'];
 $dataFinal = $_GET['dataFinal'];
 $ramal4 = $_GET['ramal4'];
 $tipo = $_GET['tipo'];
 $valor = $_GET['valor'];
 $tempo = $_GET['tempo'];

	echo "<a href='pdf/relatorio.php?dataInicio=$dataInicio&dataFinal=$dataFinal&ramal=$ramal4&tipo1=$tipo&valor=0.11&valor2=0.25&valor3=0.81&ramal1=$ramal1&tempo=$tempo&valor2=$valor' excludedParams='*' target='_blank'>Gerar PDF</a>";
?>
	<?php
	$valor = $_GET['valor'];
	$tempo = $_GET['tempo'];
	echo"<h2 class='form-signin-heading'>Tempo Total (m)</h2><h4 class='form-signin-heading'>$tempo</h4>";
	echo"<h2 class='form-signin-heading'>Valor Total (R$)</h2><h4 class='form-signin-heading'>$valor</h4>";			
	?>
</div>
<script src="js/angular.min.js"></script>
<script src="js/ui-bootstrap-tpls-0.10.0.min.js"></script>
<script src="app/app.js"></script>         
    </body>
</html>
