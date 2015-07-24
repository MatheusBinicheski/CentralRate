<!DOCTYPE html>
<?php
    require("../../login/config.php");
    if(empty($_SESSION['user']))
    {
        header("Location: ../../login/index.php");
        die();
    }
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SAAP BI</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    
    <link rel="stylesheet" href="../css/estilos.css">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div role="navigation" class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="#" class="navbar-brand">SAAP</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="../index.php">Principal</a></li>
	    <li><a href="../locais/listar.php">Chamadas Locais</a></li>
            <li><a href="../nacionais/listar.php">Chamadas Nacionais</a></li>
            <li><a href="../locaisNacionais/listar.php">Chamadas Locais e Nacionais</a></li>
            <li><a href="../questao/listar.php">Questão</a></li>
            <li><a href="../turma/listar.php">Turma</a></li>
	    <li><a href="../../login/logout.php">Log Out</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

<div class="container tema">
    <div class="row">
        <div class="col-md-6">

        <h1>Chamadas Nacionais</h1>
        <a href="importar.php">Importação</a> | 
        <a href="relatorioPDF.php">Relatório PDF</a>


        <table class="table table-striped">
            <thead>
            <th>Ramal</th>
            <th>Número Discado</th>
            <th>Data</th>
            <th>Tempo(s)</th>
            <th>Valor</th>
            </thead>
            <tbody>
            <?php
                    include '../inc/abreConexao1.php';
			$dataInicio = $_GET['dataInicio'];
			$dataFinal = $_GET['dataFinal'];
			$ramal1 = $_GET['ramal1'];
			$ramal = explode(",", $ramal1);
			
		for ($i = 0; $i <= 150; $i++) {
         	if($ramal[$i] != ''){
         	$ramal1 = $ramal[$i];
                    $sql = "select src, dst, billsec, calldate from cdr where dst > 6000 and '$ramal1' = src and (select substring(dst,3,1)) BETWEEN 1 AND 5 and (select length(dst) as numero2) = 10 and calldate >= '$dataInicio 00:00:00' AND calldate <= '$dataFinal 23:59:59' AND disposition = 'ANSWERED' UNION select src, dst, billsec, calldate from cdr where dst > 6000 and '$ramal1' = src and (select substring(dst,4,1)) BETWEEN 1 AND 5 and (select length(dst) as numero2) = 11 and calldate >= '$dataInicio 00:00:00' AND calldate <= '$dataFinal 23:59:59' AND disposition = 'ANSWERED' UNION select src, dst, billsec, calldate from cdr where dst > 6000 and '$ramal1' = src and (select substring(dst,6,1)) BETWEEN 1 AND 5 and (select length(dst) as numero2) = 13 and calldate >= '$dataInicio 00:00:00' AND calldate <= '$dataFinal 23:59:59' AND disposition = 'ANSWERED';";
                    $resultado = mysql_query($sql);


//                    $cont_feminino  = 0;
//                    $cont_masculino = 0;
//                    $cont_nao_infor = 0;
                    while($linha = mysql_fetch_assoc($resultado))
                    {
                        echo '<tr>';
//                            echo '<td>'. $linha['id'] .'</td>';
                            echo '<td style=width:15%>'. $linha['src'] .'</td>';
                            echo '<td style=width:30%>'. $linha['dst'] .'</td>';
                            echo '<td style=width:30%>'. $linha['calldate'] .'</td>';
			    echo '<td style=width:10%>'. $linha['billsec'] .'</td>';
                            $ligacao=($linha['billsec'] /60) * 0.25;
                            $ligacao = number_format($ligacao, 2, ',', '');;
                            echo "<td align=center style='width:20%;'>". $ligacao ."</td>";
			    $total_seconds=$total_seconds + $linha['billsec'] /60;
                            $total_preco=($total_seconds * 0.25);
                            $total_preco = number_format($total_preco, 2, ',', '');; 
//                            $sexo = ($linha['sexo'] == 'F') ? 'Feminino' : 'Masculino';
//                            echo '<td>'. $sexo .'</td>';
//                            echo '<td><a href="mailto:'.$linha['email'].'?Subject=Email via painel">'. $linha['email'] .'</a></td>';
                        echo '</tr>';
                        
//                        if($linha['sexo'] == 'F')
//                            $cont_feminino++;
//                        else if($linha['sexo'] == 'M')
//                            $cont_masculino++;
//                        else
//                            $cont_nao_infor++;
                 
			}       
                     }
		}
		
                   include '../inc/fechaConexao.php';
            ?>
            </tbody>
        </table>
        
	 <table class="table table-striped">
            <thead>
            <th>Total Minutos</th>
            <th>Total Valor R$</th>
            </thead>
        <tbody>
        <?php
        echo "<tr>";
        echo "<th  align=center>". $total_seconds ."</td>";
        echo "<th align=center>". $total_preco ."</td>";
        echo "</tr>";
        include '../inc/fechaConexao.php';
        ?>
         </tbody>
        </table>

    </div>

<div class="container tema">
    <div class="row">
        <div class="col-md-6">
        <div id="grafico2" style="width: 600px; height: 500px;"></div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    
    <!-- GRAFICO 1 -->
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Sexo', 'Quantidade'],
          ['Feminino',      <?php echo $cont_feminino; ?>],
          ['Masculino',      <?php echo $cont_masculino; ?>],
          ['Não Informado',  <?php echo $cont_nao_infor; ?>],
        ]);

        var options = {
          title: 'Gráfico por sexo'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
    
    <?php
                include '../inc/abreConexao.php';

                $sql = "SELECT A.id_turma, A.sexo, COUNT(*) as total FROM tb_aluno A WHERE 1 = 1 AND A.sexo = 'M' GROUP BY A.id_turma
                        UNION
                        SELECT A.id_turma, A.sexo, COUNT(*) as total FROM tb_aluno A WHERE 1 = 1 AND A.sexo = 'F' GROUP BY A.id_turma";
                
                $resultado = mysql_query($sql);
                
                $grafico2 = array();
                while($linha = mysql_fetch_assoc($resultado))
                {
                    $grafico2[$linha['id_turma']][$linha['sexo']] = $linha['total'];
                    
                }
                
                $conteudo_grafico2 = "";
                foreach ($grafico2 as $chave => $valor) {

                    $qnt_masculino = $valor['M'];
                    $qnt_feminino  = $valor['F'];

                    $conteudo_grafico2 .= "['Turma ID:".$chave."', ".$qnt_masculino.", ".$qnt_feminino."],";
                }
                
                include '../inc/fechaConexao.php';
    
    
    ?>
    
    
    
    
    <!-- GRAFICO 2-->
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Truma (ID)', 'Masculino', 'Feminino'],
          <?php echo $conteudo_grafico2;?>
        ]);

        var options = {
          title: 'Chamadas Locais',
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('grafico2'));
        chart.draw(data, options);
      }
    </script>
    
    
  </body>
</html>