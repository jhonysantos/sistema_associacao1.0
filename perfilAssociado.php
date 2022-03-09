<?php
  session_start();
    
  if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)){

      unset($_SESSION['usuario']);
      unset($_SESSION['senha']);
      header('Location: index.php');
  }else{
      $logado = $_SESSION['usuario'];
  }

  if(!empty($_GET['id'])){
        
    include_once('config.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM associados WHERE id=$id";

    $result = $conexao->query($sqlSelect);

    if($result->num_rows > 0){
        while($user_data = mysqli_fetch_assoc($result)){
            $id = $user_data['id'];
            $nome = $user_data['nome'];
            $estadoCivil = $user_data['estado_civil'];
            $nacionalidade = $user_data['nacionalidade'];
            $profissao = $user_data['profissao'];
            $cpf = $user_data['cpf'];
            $email = $user_data['email'];
            $telefone = $user_data['telefone'];
            $genero = $user_data['genero'];
            $dataNascimento = $user_data['data_nascimento'];
            $cidade = $user_data['cidade'];
            $estado = $user_data['estado'];
            $endereco = $user_data['endereco'];
            $planoAssociado = $user_data['plano'];
            $dataAquisicao = $user_data['data_aquisicao'];
        }
        

    }else{
        header('Location: associados.php');
    }
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1,shink-to-fit=no" />
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/style.css" />
        <title>Associados</title>
    </head>
    <body>
        <div class="container ">
            <div class="row justify-content-between botom">
                <div class="col-1">
                  <button onclick="window.location.href='associados.php'" type="button" class="btn btn-success">Voltar</button>
                </div>
                <div class="col-1">
                  <button onclick="window.location.href='sair.php'" type="button" class="btn btn-danger">Sair</button>
                </div>
            </div>
            <fieldset class="bodyContainer">
                <legend class="cabecalho"><b> <?php echo $nome ?></b></legend>
                <div class="row text-center">
                    <div class="col-md-4">
                      <p><strong>Matricula do Associado</strong></p>
                      <p><?php echo $id ?></p>
                    </div>
                    <div class="col-md-4">
                      <p><strong>Estado Civil</strong></p>
                      <p><?php echo $estadoCivil ?></p>
                    </div>
                    <div class="col-md-4">
                      <p><strong>Nacionalidade</strong></p>
                      <p><?php echo $nacionalidade ?></p>
                    </div>
                </div>
                <hr/>
                <div class="row text-center">
                    <div class="col-md-4">
                      <p><strong>CPF</strong></p>
                      <p><?php echo $cpf ?></p>
                    </div>
                    <div class="col-md-4">
                      <p><strong>E-mail</strong></p>
                      <p><?php echo $email ?></p>
                    </div>
                    <div class="col-md-4">
                      <p><strong>Profissão</strong></p>
                      <p><?php echo $profissao ?></p>
                    </div>
                </div>
                <hr/>
                <div class="row text-center">
                    <div class="col-md-4">
                      <p><strong>Sexo</strong></p>
                      <p><?php echo $genero ?></p>
                    </div>
                    <div class="col-md-4">
                      <p><strong>Data de Nascimento</strong></p>
                      <p><?php echo $dataNascimento ?></p>
                    </div>
                    <div class="col-md-4">
                      <p><strong>Telefone</strong></p>
                      <p><?php echo $telefone ?></p>
                    </div>
                </div>
                <hr/>
                <div class="row text-center">
                    <div class="col-md-4">
                      <p><strong>Estado</strong></p>
                      <p><?php echo $estado ?></p>
                    </div>
                    <div class="col-md-4">
                      <p><strong>Endereço</strong></p>
                      <p><?php echo $endereco ?></p>
                    </div>
                    <div class="col-md-4">
                      <p><strong>Cidade</strong></p>
                      <p><?php echo $cidade ?></p>
                    </div>
                </div>
                <hr/>
                <div class="row justify-content-center text-center">
                   <div class="col-md-6">
                      <p><strong>Data de Aquisição</strong></p>
                      <p><?php echo $dataAquisicao ?></p>
                    </div>
                    <div class="col-md-4">
                      <p><strong>Plano Atual</strong></p>
                      <p><?php echo $planoAssociado ?></p>
                    </div>
                </div><br/><br/>
                <hr />
                <div id="actions" class="row justify-content-center">
                        <?php echo "<a class='btn btn-primary btn-sm' href='editarAssociado.php?id=$id'>Editar</a>" ?>
                </div>
            </fieldset>
        <script type="text/javascript" src="assets/js/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
    </body>
</html>