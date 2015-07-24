<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SAAP BI</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    
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
        <h1>Importar alunos</h1>
        <?php
            //Conexao com o banco de dados
            $conexao = mysql_connect("localhost", "root", "master");
            if(!$conexao) die ("Falha ao conectar ao banco");

            //Resolvendo problemas de caracteres
            mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $conexao);
                    
            $bd = mysql_select_db("bd_saap");

            $nome_arquivo = "base.csv";

            $objeto = fopen($nome_arquivo, 'r');

            while(($dados = fgetcsv($objeto, 1000, ",")) !== FALSE)
            {
                $id_turma   = (!empty($dados[0]) && isset($dados[0])) ? $dados[0] : null;
                $codigo     = (!empty($dados[1]) && isset($dados[1])) ? $dados[1] : null;
                $nome       = (!empty($dados[2]) && isset($dados[2])) ? $dados[2] : null;
                $email      = (!empty($dados[3]) && isset($dados[3])) ? $dados[3] : null;
                $sexo       = (!empty($dados[4]) && isset($dados[4])) ? $dados[4] : null;
                
                //-----------------------------------------------------
                
                    $sqlRegra3      = "SELECT COUNT(*) as valor FROM tb_aluno A WHERE A.codigo = '" . $codigo ."'";
                    $retorno        = mysql_query($sqlRegra3);
                    $ValorRetorno   = mysql_fetch_assoc($retorno);

                    if($ValorRetorno['valor'] == 0)
                    {
                        if($sexo == 'F' || $sexo == 'M')
                        {

                            $mensagem_email = "";
                            if(!empty($email)){
                                $padrao = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';  

                                if(!preg_match($padrao, $email))  
                                    $mensagem_email = '<p class="text-warning">Falha no cadastro (REGRA#2)> Registro - ID Turma:' . $id_turma . ', Código: ' . $codigo . ', Nome: '. $nome.', E-mail:' . $email .'</p>'; 
                            }


                            if(empty($mensagem_email))
                            {
                                      $sql = "INSERT INTO tb_aluno (id_turma, codigo, nome, email, sexo) VALUES ('$id_turma', '$codigo', '$nome', '$email', '$sexo')";
                                      mysql_query($sql) or die(mysql_error());

                            }
                            else
                            {
                                echo $mensagem_email;
                            }
                        }
                        else
                        {
                            echo '<p class="text-warning">Falha no cadastro (REGRA#1)> Registro - ID Turma:' . $id_turma . ', Código: ' . $codigo . ', Nome: '. $nome.', E-mail:' . $email .'</p>';
                        }
                    }else{
                        echo '<p class="text-warning">Falha no cadastro (REGRA#3)> Código: '.$codigo.'</p> ';
                    }
                    
            } //While

            fclose($objeto);
            mysql_close($conexao);

            echo "<br>Processo Finalizado.";
        
        ?>
        
        
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    
  </body>
</html>
