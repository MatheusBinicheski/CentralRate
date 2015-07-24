<!DOCTYPE html>
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
            <li class="active"><a href="#">Principal</a></li>
            <li><a href="../aluno/listar.php">Aluno</a></li>
            <li><a href="../professor/listar.php">Professor</a></li>
            <li><a href="../prova/listar.php">Prova</a></li>
            <li><a href="../questao/listar.php">Questão</a></li>
            <li><a href="../turma/listar.php">Turma</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
      
    <div class="container tema">
        <h1>Listagem de turmas</h1>
        <a href="relatorioPDF.php">Relatório PDF</a>
         <table class="table table-striped">
            <thead>
            <th>#</th>
            <th>Data de Cadastro</th>
            <th>Nome</th>
            <th>Curso</th>
            <th>Instituição</th>
            <th>Professor</th>
            </thead>
            <tbody>
            <?php
                    include '../inc/abreConexao.php';

                    $sql = "SELECT T.*, P.nome as nomeProfessor , DATE_FORMAT(T.data_cadastro, '%d/%m/%Y') as dataCadastroDF
                            FROM tb_turma T
                            INNER JOIN tb_professor P ON P.id = T.id_professor";
                    
                    $resultado = mysql_query($sql);
            
                    while($linha = mysql_fetch_assoc($resultado))
                    {
                        echo '<tr>';
                            echo '<td>'. $linha['id'] .'</td>';
                            echo '<td>'. $linha['dataCadastroDF'] .'</td>';
                            echo '<td>'. $linha['nome'] .'</td>';
                            echo '<td>'. $linha['curso'] .'</td>';
                            echo '<td>'. $linha['instituicao'] .'</td>';
                            echo '<td>'. $linha['nomeProfessor'] .'</td>';
                        echo '</tr>';
                     }
                    include '../inc/fechaConexao.php';
            ?>
            </tbody>
        </table>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  </body>
</html>
